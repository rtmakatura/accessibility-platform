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
            this.openMethod = null; // Track how tooltip was opened: 'click' or 'hover'
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
                    // Get the stat label for better context
                    const statLabel = trigger.closest('.stat-label')?.textContent.replace('?', '').trim();
                    const ariaLabel = statLabel ? `Show more information about ${statLabel}` : 'Show additional information';

                    // Set comprehensive ARIA attributes
                    trigger.setAttribute('aria-describedby', tooltipId);
                    trigger.setAttribute('aria-expanded', 'false');
                    trigger.setAttribute('role', 'button');
                    trigger.setAttribute('tabindex', '0');
                    trigger.setAttribute('aria-haspopup', 'dialog');
                    trigger.setAttribute('aria-label', ariaLabel);

                    tooltip.setAttribute('id', tooltipId);
                    tooltip.setAttribute('role', 'tooltip');
                    tooltip.setAttribute('aria-hidden', 'true');
                    tooltip.setAttribute('aria-live', 'polite');
                    
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
                    this.toggleTooltip(trigger, 'click');
                });

                // Enhanced hover events for desktop with improved anti-flicker logic
                if (!this.isTouchDevice()) {
                    let hoverTimeout;
                    let closeTimeout;
                    let isTooltipHovered = false;
                    let isTriggerHovered = false;

                    trigger.addEventListener('mouseenter', (e) => {
                        // Don't trigger hover if opened by click
                        if (this.activeTooltip === trigger && this.openMethod === 'click') {
                            return;
                        }

                        isTriggerHovered = true;
                        clearTimeout(closeTimeout);
                        clearTimeout(hoverTimeout);

                        // Only open if not already open
                        if (this.activeTooltip !== trigger) {
                            hoverTimeout = setTimeout(() => {
                                if (isTriggerHovered && this.openMethod !== 'click') {
                                    this.openTooltip(trigger, 'hover');
                                }
                            }, 200); // Reduced delay for better responsiveness
                        }
                    });

                    trigger.addEventListener('mouseleave', (e) => {
                        // Don't close if opened by click
                        if (this.activeTooltip === trigger && this.openMethod === 'click') {
                            return;
                        }

                        isTriggerHovered = false;
                        clearTimeout(hoverTimeout);

                        // Only close if tooltip is also not hovered and was opened by hover
                        if (this.activeTooltip === trigger && this.openMethod === 'hover') {
                            closeTimeout = setTimeout(() => {
                                if (!isTriggerHovered && !isTooltipHovered) {
                                    this.closeTooltip(trigger);
                                }
                            }, 100); // Small delay to allow moving to tooltip
                        }
                    });

                    // Tooltip hover handling
                    tooltip.addEventListener('mouseenter', (e) => {
                        // Don't interfere with click-opened tooltips
                        if (this.openMethod === 'click') {
                            return;
                        }

                        isTooltipHovered = true;
                        clearTimeout(closeTimeout);
                        clearTimeout(hoverTimeout);
                    });

                    tooltip.addEventListener('mouseleave', (e) => {
                        // Don't close if opened by click
                        if (this.openMethod === 'click') {
                            return;
                        }

                        isTooltipHovered = false;

                        // Check if we're moving back to trigger
                        const relatedTarget = e.relatedTarget;
                        if (relatedTarget && relatedTarget === trigger) {
                            isTriggerHovered = true;
                            return;
                        }

                        // Close if not hovering either element and was opened by hover
                        if (this.openMethod === 'hover') {
                            closeTimeout = setTimeout(() => {
                                if (!isTriggerHovered && !isTooltipHovered && this.activeTooltip === trigger) {
                                    this.closeTooltip(trigger);
                                }
                            }, 100);
                        }
                    });

                    // Store timeouts for cleanup
                    trigger._hoverTimeout = hoverTimeout;
                    trigger._closeTimeout = closeTimeout;
                }
            });

            // Close tooltips when clicking outside (only for click-opened tooltips)
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.tooltip') && !e.target.classList.contains('tooltip-trigger')) {
                    if (this.openMethod === 'click') {
                        this.closeAllTooltips();
                    }
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
                    e.preventDefault();
                    e.stopPropagation();
                }
                return;
            }

            // Enter or Space on trigger toggles tooltip
            if ((e.key === 'Enter' || e.key === ' ') && e.target.classList.contains('tooltip-trigger')) {
                e.preventDefault();
                e.stopPropagation();
                this.toggleTooltip(e.target);
            }

            // Arrow key navigation between tooltips
            if (e.target.classList.contains('tooltip-trigger')) {
                const allTriggers = Array.from(document.querySelectorAll('.tooltip-trigger'));
                const currentIndex = allTriggers.indexOf(e.target);
                let nextIndex = -1;

                if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                    nextIndex = (currentIndex + 1) % allTriggers.length;
                } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                    nextIndex = (currentIndex - 1 + allTriggers.length) % allTriggers.length;
                }

                if (nextIndex !== -1) {
                    e.preventDefault();
                    this.closeAllTooltips();
                    allTriggers[nextIndex].focus();
                }
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

        toggleTooltip(trigger, method = 'click') {
            const tooltip = this.tooltips.get(trigger);
            if (!tooltip) return;

            const isOpen = trigger.getAttribute('aria-expanded') === 'true';

            if (isOpen) {
                this.closeTooltip(trigger);
            } else {
                this.openTooltip(trigger, method);
            }
        }

        openTooltip(trigger, method = 'hover') {
            const tooltip = this.tooltips.get(trigger);
            if (!tooltip) return;

            // Prevent reopening if already open
            if (this.activeTooltip === trigger) {
                // Update method if switching from hover to click
                if (method === 'click' && this.openMethod === 'hover') {
                    this.openMethod = 'click';
                }
                return;
            }

            // Close any other open tooltips
            if (this.activeTooltip && this.activeTooltip !== trigger) {
                this.closeTooltip(this.activeTooltip);
            }

            // Track how it was opened
            this.openMethod = method;

            // Open this tooltip
            trigger.setAttribute('aria-expanded', 'true');
            tooltip.setAttribute('aria-hidden', 'false');

            // Position tooltip first to prevent layout jumps
            this.positionTooltip(trigger, tooltip);

            // Use requestAnimationFrame for smooth animation
            requestAnimationFrame(() => {
                tooltip.classList.add('active');
                tooltip.style.pointerEvents = 'auto';

                // Show overlay on mobile or when clicked
                if (this.isMobile() || method === 'click') {
                    this.overlay.classList.add('active');
                    this.overlay.setAttribute('aria-hidden', 'false');
                    if (this.isMobile()) {
                        document.body.style.overflow = 'hidden';
                    }
                }
            });

            // Set active tooltip
            this.activeTooltip = trigger;

            // Announce to screen readers
            this.announceTooltip(tooltip);
        }

        closeTooltip(trigger) {
            const tooltip = this.tooltips.get(trigger);
            if (!tooltip) return;

            // Clear any pending timeouts
            if (trigger._hoverTimeout) {
                clearTimeout(trigger._hoverTimeout);
            }
            if (trigger._closeTimeout) {
                clearTimeout(trigger._closeTimeout);
            }

            trigger.setAttribute('aria-expanded', 'false');
            tooltip.setAttribute('aria-hidden', 'true');
            tooltip.classList.remove('active');
            tooltip.style.pointerEvents = 'none';

            // Hide overlay
            this.overlay.classList.remove('active');
            this.overlay.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';

            // Clear active tooltip and method
            if (this.activeTooltip === trigger) {
                this.activeTooltip = null;
                this.openMethod = null;
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
                liveRegion.setAttribute('aria-live', 'assertive');
                liveRegion.setAttribute('aria-atomic', 'true');
                liveRegion.className = 'sr-only';
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
                const title = tooltip.querySelector('.tooltip-title')?.textContent || '';
                const listItems = Array.from(tooltip.querySelectorAll('.tooltip-list li')).map(li => li.textContent).join(', ');
                const announcement = title ? `${title}. ${listItems}` : listItems;

                liveRegion.textContent = announcement;

                // Clear announcement after a delay
                setTimeout(() => {
                    liveRegion.textContent = '';
                }, 100);
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