/**
 * Accessible Tooltip System for Opportunity Section
 * Supports keyboard navigation, screen readers, and touch devices
 */

(function() {
    'use strict';

    class TooltipManager {
        constructor() {
            this.activeTooltip = null;
            this.tooltips = new Map();
            this.init();
        }

        init() {
            // Wait for DOM to be ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', () => this.setup());
            } else {
                this.setup();
            }
        }

        setup() {
            this.createOverlay();
            this.initializeTooltips();
            this.bindEvents();
        }

        createOverlay() {
            // Create overlay for mobile
            this.overlay = document.createElement('div');
            this.overlay.className = 'tooltip-overlay';
            this.overlay.setAttribute('aria-hidden', 'true');
            document.body.appendChild(this.overlay);

            // Close tooltip when overlay is clicked
            this.overlay.addEventListener('click', () => this.closeAllTooltips());
        }

        initializeTooltips() {
            const triggers = document.querySelectorAll('.tooltip-trigger');
            
            triggers.forEach((trigger, index) => {
                // Generate unique ID
                const tooltipId = `tooltip-${index}`;
                const tooltip = trigger.nextElementSibling;
                
                if (tooltip && tooltip.classList.contains('tooltip')) {
                    // Set ARIA attributes
                    trigger.setAttribute('aria-describedby', tooltipId);
                    trigger.setAttribute('aria-expanded', 'false');
                    trigger.setAttribute('role', 'button');
                    trigger.setAttribute('tabindex', '0');
                    trigger.setAttribute('aria-haspopup', 'true');
                    trigger.setAttribute('aria-label', trigger.getAttribute('aria-label') || 'Show additional information');
                    
                    tooltip.setAttribute('id', tooltipId);
                    tooltip.setAttribute('role', 'tooltip');
                    tooltip.setAttribute('aria-hidden', 'true');
                    
                    // Store reference
                    this.tooltips.set(trigger, tooltip);
                    
                    // Add close button for mobile
                    if (!tooltip.querySelector('.tooltip-close')) {
                        const closeBtn = document.createElement('button');
                        closeBtn.className = 'tooltip-close';
                        closeBtn.innerHTML = '<span aria-hidden="true">×</span>';
                        closeBtn.setAttribute('aria-label', 'Close tooltip');
                        closeBtn.setAttribute('tabindex', '0');
                        closeBtn.addEventListener('click', (e) => {
                            e.stopPropagation();
                            this.closeTooltip(trigger);
                            trigger.focus(); // Return focus to trigger
                        });
                        closeBtn.addEventListener('keydown', (e) => {
                            if (e.key === 'Enter' || e.key === ' ') {
                                e.preventDefault();
                                e.stopPropagation();
                                this.closeTooltip(trigger);
                                trigger.focus();
                            }
                        });
                        tooltip.insertBefore(closeBtn, tooltip.firstChild);
                    }
                }
            });
        }

        bindEvents() {
            // Keyboard events
            document.addEventListener('keydown', this.handleKeydown.bind(this));

            // Click events for triggers
            this.tooltips.forEach((tooltip, trigger) => {
                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.toggleTooltip(trigger);
                });

                // Enhanced hover events for desktop with debouncing
                if (!this.isTouchDevice()) {
                    let hoverTimeout;
                    let isHovering = false;

                    trigger.addEventListener('mouseenter', () => {
                        isHovering = true;
                        clearTimeout(hoverTimeout);
                        hoverTimeout = setTimeout(() => {
                            if (isHovering && !this.activeTooltip) {
                                this.openTooltip(trigger);
                            }
                        }, 300); // Delay to prevent flickering
                    });

                    trigger.addEventListener('mouseleave', () => {
                        isHovering = false;
                        clearTimeout(hoverTimeout);
                        hoverTimeout = setTimeout(() => {
                            if (!isHovering && this.activeTooltip === trigger) {
                                const tooltip = this.tooltips.get(trigger);
                                if (tooltip && !tooltip.matches(':hover')) {
                                    this.closeTooltip(trigger);
                                }
                            }
                        }, 200);
                    });

                    // Keep tooltip open when hovering over it
                    tooltip.addEventListener('mouseenter', () => {
                        clearTimeout(hoverTimeout);
                    });

                    tooltip.addEventListener('mouseleave', () => {
                        hoverTimeout = setTimeout(() => {
                            if (this.activeTooltip === trigger && !trigger.matches(':hover')) {
                                this.closeTooltip(trigger);
                            }
                        }, 200);
                    });
                }
            });

            // Close tooltips when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.tooltip') && !e.target.classList.contains('tooltip-trigger')) {
                    this.closeAllTooltips();
                }
            });

            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => this.repositionTooltips(), 250);
            });

            // Handle scroll to reposition tooltips
            let scrollTimer;
            window.addEventListener('scroll', () => {
                clearTimeout(scrollTimer);
                scrollTimer = setTimeout(() => this.repositionTooltips(), 100);
            }, { passive: true });
        }

        handleKeydown(e) {
            // Escape key closes active tooltip
            if (e.key === 'Escape') {
                if (this.activeTooltip) {
                    this.closeTooltip(this.activeTooltip);
                    this.activeTooltip.focus();
                }
                return;
            }

            // Enter or Space on trigger toggles tooltip
            if ((e.key === 'Enter' || e.key === ' ') && e.target.classList.contains('tooltip-trigger')) {
                e.preventDefault();
                this.toggleTooltip(e.target);
            }

            // Tab navigation support
            if (e.key === 'Tab' && this.activeTooltip) {
                const tooltip = this.tooltips.get(this.activeTooltip);
                if (tooltip && tooltip.contains(document.activeElement)) {
                    // If tabbing out of tooltip, close it
                    if (e.shiftKey && document.activeElement === tooltip.firstElementChild) {
                        e.preventDefault();
                        this.closeTooltip(this.activeTooltip);
                        this.activeTooltip.focus();
                    }
                }
            }
        }

        toggleTooltip(trigger) {
            const tooltip = this.tooltips.get(trigger);
            if (!tooltip) return;
            
            const isOpen = trigger.getAttribute('aria-expanded') === 'true';
            
            if (isOpen) {
                this.closeTooltip(trigger);
            } else {
                this.openTooltip(trigger);
            }
        }

        openTooltip(trigger) {
            const tooltip = this.tooltips.get(trigger);
            if (!tooltip) return;

            // Close any other open tooltips only on mobile or when clicking
            if (this.isMobile()) {
                this.closeAllTooltips();
            }

            // Open this tooltip
            trigger.setAttribute('aria-expanded', 'true');
            tooltip.setAttribute('aria-hidden', 'false');

            // Use requestAnimationFrame for smooth animation
            requestAnimationFrame(() => {
                tooltip.classList.add('active');

                // Show overlay on mobile
                if (this.isMobile()) {
                    this.overlay.classList.add('active');
                    this.overlay.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                // Position tooltip
                this.positionTooltip(trigger, tooltip);
            });

            // Set active tooltip
            this.activeTooltip = trigger;

            // Announce to screen readers
            this.announceTooltip(tooltip);
        }

        closeTooltip(trigger) {
            const tooltip = this.tooltips.get(trigger);
            if (!tooltip) return;
            
            trigger.setAttribute('aria-expanded', 'false');
            tooltip.setAttribute('aria-hidden', 'true');
            tooltip.classList.remove('active');
            
            // Hide overlay
            this.overlay.classList.remove('active');
            this.overlay.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            
            // Clear active tooltip
            if (this.activeTooltip === trigger) {
                this.activeTooltip = null;
            }
        }

        closeAllTooltips() {
            this.tooltips.forEach((tooltip, trigger) => {
                this.closeTooltip(trigger);
            });
        }


        positionTooltip(trigger, tooltip) {
            if (this.isMobile()) {
                // Center on mobile
                return;
            }

            // Reset position and make visible for measurement
            tooltip.style.left = '';
            tooltip.style.right = '';
            tooltip.style.top = '';
            tooltip.style.bottom = '';

            // Get positions
            const triggerRect = trigger.getBoundingClientRect();
            const tooltipRect = tooltip.getBoundingClientRect();
            const viewportWidth = window.innerWidth;
            const viewportHeight = window.innerHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Calculate optimal position
            const tooltipWidth = tooltipRect.width;
            const tooltipHeight = tooltipRect.height;
            const triggerCenterX = triggerRect.left + (triggerRect.width / 2);

            // Horizontal positioning
            let leftPosition = triggerCenterX - (tooltipWidth / 2);

            if (leftPosition < 20) {
                // Too far left
                tooltip.style.left = '20px';
                tooltip.style.right = 'auto';
            } else if (leftPosition + tooltipWidth > viewportWidth - 20) {
                // Too far right
                tooltip.style.left = 'auto';
                tooltip.style.right = '20px';
            } else {
                // Center above trigger
                tooltip.style.left = '50%';
                tooltip.style.transform = 'translateX(-50%)';
            }

            // Vertical positioning - check if tooltip fits above
            if (triggerRect.top - tooltipHeight - 12 < 0) {
                // Show below if not enough space above
                tooltip.style.bottom = 'auto';
                tooltip.style.top = 'calc(100% + 12px)';
                tooltip.classList.add('tooltip-below');
                tooltip.classList.remove('tooltip-above');
            } else {
                // Show above (default)
                tooltip.style.top = 'auto';
                tooltip.style.bottom = 'calc(100% + 12px)';
                tooltip.classList.remove('tooltip-below');
                tooltip.classList.add('tooltip-above');
            }
        }

        repositionTooltips() {
            if (this.activeTooltip) {
                const tooltip = this.tooltips.get(this.activeTooltip);
                if (tooltip) {
                    this.positionTooltip(this.activeTooltip, tooltip);
                }
            }
        }

        announceTooltip(tooltip) {
            // Create or get live region
            let liveRegion = document.getElementById('tooltip-live-region');
            if (!liveRegion) {
                liveRegion = document.createElement('div');
                liveRegion.id = 'tooltip-live-region';
                liveRegion.setAttribute('role', 'status');
                liveRegion.setAttribute('aria-live', 'polite');
                liveRegion.setAttribute('aria-atomic', 'true');
                liveRegion.style.position = 'absolute';
                liveRegion.style.left = '-10000px';
                liveRegion.style.width = '1px';
                liveRegion.style.height = '1px';
                liveRegion.style.overflow = 'hidden';
                document.body.appendChild(liveRegion);
            }
            
            // Announce tooltip content
            const content = tooltip.querySelector('.tooltip-content');
            if (content) {
                // Clean up text for screen reader announcement
                const textContent = content.textContent.replace(/\s+/g, ' ').trim();
                liveRegion.textContent = `Additional information: ${textContent}`;

                // Clear announcement after a delay
                setTimeout(() => {
                    liveRegion.textContent = '';
                }, 5000);
            }
        }

        isTouchDevice() {
            return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
        }

        isMobile() {
            return window.innerWidth <= 768;
        }
    }

    // Initialize tooltip manager
    new TooltipManager();

    // Optional: Animate numbers on scroll
    const animateNumbers = () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const target = element.getAttribute('data-counter');
                    if (target) {
                        animateCounter(element, target);
                        observer.unobserve(element);
                    }
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('[data-counter]').forEach(el => {
            observer.observe(el);
        });
    };

    function animateCounter(element, target) {
        const duration = 2000;
        const isDecimal = target.includes('.');
        const numericTarget = parseFloat(target.replace(/[^\d.]/g, ''));
        const suffix = target.replace(/[\d.]/g, '');
        const start = 0;
        const increment = numericTarget / (duration / 16);
        let current = start;

        const timer = setInterval(() => {
            current += increment;
            if (current >= numericTarget) {
                current = numericTarget;
                clearInterval(timer);
            }
            
            const display = isDecimal ? current.toFixed(1) : Math.floor(current);
            element.textContent = display + suffix;
        }, 16);
    }

    // Initialize animations if user hasn't opted out
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        animateNumbers();
    }

})();