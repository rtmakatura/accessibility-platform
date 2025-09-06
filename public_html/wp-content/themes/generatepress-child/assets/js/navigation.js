/**
 * Navigation JavaScript
 * Handles dropdown menus, mobile navigation, and smooth scrolling
 */

(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        initNavigation();
    });

    function initNavigation() {
        initDropdownMenus();
        initMobileNavigation();
        initSmoothScrolling();
        initServiceNavigation();
    }

    /**
     * Initialize dropdown menu functionality
     */
    function initDropdownMenus() {
        const dropdowns = document.querySelectorAll('.nav-dropdown');
        
        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.nav-dropdown__toggle');
            const menu = dropdown.querySelector('.nav-dropdown__menu');
            
            if (!toggle || !menu) return;

            // Handle hover events (desktop)
            dropdown.addEventListener('mouseenter', function() {
                if (window.innerWidth >= 1024) {
                    openDropdown(dropdown, toggle, menu);
                }
            });

            dropdown.addEventListener('mouseleave', function() {
                if (window.innerWidth >= 1024) {
                    closeDropdown(dropdown, toggle, menu);
                }
            });

            // Handle click events (mobile and keyboard)
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                
                const isOpen = toggle.getAttribute('aria-expanded') === 'true';
                
                // Close all other dropdowns first
                closeAllDropdowns();
                
                if (!isOpen) {
                    openDropdown(dropdown, toggle, menu);
                }
            });

            // Handle keyboard navigation
            toggle.addEventListener('keydown', function(e) {
                switch(e.key) {
                    case 'Enter':
                    case ' ':
                        e.preventDefault();
                        toggle.click();
                        break;
                    case 'ArrowDown':
                        e.preventDefault();
                        openDropdown(dropdown, toggle, menu);
                        // Focus first menu item
                        const firstLink = menu.querySelector('.nav-dropdown__link');
                        if (firstLink) firstLink.focus();
                        break;
                    case 'Escape':
                        closeDropdown(dropdown, toggle, menu);
                        toggle.focus();
                        break;
                }
            });

            // Handle menu item keyboard navigation
            const menuItems = menu.querySelectorAll('.nav-dropdown__link');
            menuItems.forEach((item, index) => {
                item.addEventListener('keydown', function(e) {
                    switch(e.key) {
                        case 'ArrowDown':
                            e.preventDefault();
                            const nextItem = menuItems[index + 1];
                            if (nextItem) {
                                nextItem.focus();
                            } else {
                                menuItems[0].focus(); // Loop to first
                            }
                            break;
                        case 'ArrowUp':
                            e.preventDefault();
                            const prevItem = menuItems[index - 1];
                            if (prevItem) {
                                prevItem.focus();
                            } else {
                                menuItems[menuItems.length - 1].focus(); // Loop to last
                            }
                            break;
                        case 'Escape':
                            closeDropdown(dropdown, toggle, menu);
                            toggle.focus();
                            break;
                        case 'Tab':
                            if (e.shiftKey && index === 0) {
                                // Shift+Tab on first item - close dropdown
                                closeDropdown(dropdown, toggle, menu);
                            } else if (!e.shiftKey && index === menuItems.length - 1) {
                                // Tab on last item - close dropdown
                                closeDropdown(dropdown, toggle, menu);
                            }
                            break;
                    }
                });
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.nav-dropdown')) {
                closeAllDropdowns();
            }
        });
    }

    /**
     * Open dropdown menu
     */
    function openDropdown(dropdown, toggle, menu) {
        toggle.setAttribute('aria-expanded', 'true');
        menu.style.display = 'block';
        dropdown.classList.add('nav-dropdown--open');
        
        // Announce to screen readers
        announceToScreenReader('Submenu expanded');
    }

    /**
     * Close dropdown menu
     */
    function closeDropdown(dropdown, toggle, menu) {
        toggle.setAttribute('aria-expanded', 'false');
        menu.style.display = 'none';
        dropdown.classList.remove('nav-dropdown--open');
    }

    /**
     * Close all dropdown menus
     */
    function closeAllDropdowns() {
        const dropdowns = document.querySelectorAll('.nav-dropdown');
        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.nav-dropdown__toggle');
            const menu = dropdown.querySelector('.nav-dropdown__menu');
            if (toggle && menu) {
                closeDropdown(dropdown, toggle, menu);
            }
        });
    }

    /**
     * Initialize mobile navigation
     */
    function initMobileNavigation() {
        const navToggle = document.querySelector('.nav-toggle');
        const navMenu = document.querySelector('.nav-menu');
        const body = document.body;
        
        if (!navToggle || !navMenu) return;

        navToggle.addEventListener('click', function() {
            const isOpen = navToggle.getAttribute('aria-expanded') === 'true';
            
            if (isOpen) {
                closeMobileNav();
            } else {
                openMobileNav();
            }
        });

        // Close mobile nav on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navToggle.getAttribute('aria-expanded') === 'true') {
                closeMobileNav();
                navToggle.focus();
            }
        });

        // Close mobile nav when clicking overlay
        document.addEventListener('click', function(e) {
            if (body.classList.contains('nav-open') && !e.target.closest('.nav-menu') && !e.target.closest('.nav-toggle')) {
                closeMobileNav();
            }
        });

        function openMobileNav() {
            navToggle.setAttribute('aria-expanded', 'true');
            navToggle.classList.add('nav-toggle--active');
            navMenu.classList.add('nav-menu--open');
            body.classList.add('nav-open');
            
            // Focus first menu item
            const firstLink = navMenu.querySelector('.nav-link');
            if (firstLink) {
                setTimeout(() => firstLink.focus(), 100);
            }
            
            announceToScreenReader('Navigation menu opened');
        }

        function closeMobileNav() {
            navToggle.setAttribute('aria-expanded', 'false');
            navToggle.classList.remove('nav-toggle--active');
            navMenu.classList.remove('nav-menu--open');
            body.classList.remove('nav-open');
            
            // Close any open dropdowns
            closeAllDropdowns();
            
            announceToScreenReader('Navigation menu closed');
        }
    }

    /**
     * Initialize smooth scrolling for anchor links
     */
    function initSmoothScrolling() {
        const anchorLinks = document.querySelectorAll('a[href*="#"]:not([href="#"])');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                const url = new URL(href, window.location.href);
                
                // Only handle same-page anchors
                if (url.pathname === window.location.pathname && url.hash) {
                    const target = document.querySelector(url.hash);
                    
                    if (target) {
                        e.preventDefault();
                        
                        // Close mobile nav if open
                        const navToggle = document.querySelector('.nav-toggle');
                        if (navToggle && navToggle.getAttribute('aria-expanded') === 'true') {
                            const navMenu = document.querySelector('.nav-menu');
                            const body = document.body;
                            
                            navToggle.setAttribute('aria-expanded', 'false');
                            navToggle.classList.remove('nav-toggle--active');
                            navMenu.classList.remove('nav-menu--open');
                            body.classList.remove('nav-open');
                        }
                        
                        // Smooth scroll to target
                        const headerOffset = 80; // Account for fixed header
                        const elementPosition = target.offsetTop;
                        const offsetPosition = elementPosition - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });

                        // Update URL
                        history.pushState(null, null, href);

                        // Focus target for accessibility
                        setTimeout(() => {
                            target.focus({preventScroll: true});
                            target.setAttribute('tabindex', '-1'); // Make focusable
                        }, 500);
                    }
                }
            });
        });
    }

    /**
     * Handle special service navigation logic
     */
    function initServiceNavigation() {
        const servicesDropdown = document.querySelector('.nav-dropdown[data-services]');
        const servicesLink = document.querySelector('a[href*="services"]');
        
        // If we're on the home page, make services link scroll to services section
        if (isHomePage() && servicesLink) {
            const servicesSection = document.querySelector('#services, [data-section="services"], .services');
            
            if (servicesSection) {
                // Clone the original link behavior for dropdown toggle
                servicesLink.addEventListener('click', function(e) {
                    // If this is the main services link (not in dropdown), handle specially
                    if (this.classList.contains('nav-dropdown__toggle')) {
                        // Let dropdown handle normally
                        return;
                    } else {
                        // Smooth scroll to services section
                        e.preventDefault();
                        servicesSection.scrollIntoView({ 
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            }
        }
    }

    /**
     * Check if current page is homepage
     */
    function isHomePage() {
        return window.location.pathname === '/' || 
               window.location.pathname === '' || 
               document.body.classList.contains('home') ||
               document.body.classList.contains('page-home');
    }

    /**
     * Announce to screen readers
     */
    function announceToScreenReader(message) {
        const announcement = document.createElement('div');
        announcement.setAttribute('aria-live', 'polite');
        announcement.setAttribute('aria-atomic', 'true');
        announcement.className = 'sr-only';
        announcement.textContent = message;
        
        document.body.appendChild(announcement);
        
        setTimeout(() => {
            if (document.body.contains(announcement)) {
                document.body.removeChild(announcement);
            }
        }, 1000);
    }

    // Add screen reader only class if it doesn't exist
    if (!document.querySelector('style[data-navigation-styles]')) {
        const style = document.createElement('style');
        style.setAttribute('data-navigation-styles', '');
        style.textContent = `
            .sr-only {
                position: absolute !important;
                width: 1px !important;
                height: 1px !important;
                padding: 0 !important;
                margin: -1px !important;
                overflow: hidden !important;
                clip: rect(0, 0, 0, 0) !important;
                white-space: nowrap !important;
                border: 0 !important;
            }
        `;
        document.head.appendChild(style);
    }

})();