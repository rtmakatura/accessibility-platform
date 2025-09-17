/**
 * Accessible Back to Top Button
 * WCAG 2.1 AA Compliant Implementation
 * 
 * Features:
 * - Only appears on long pages (4+ screen heights)
 * - Intelligent scroll detection with intent recognition
 * - Keyboard accessible (Tab, Enter, Space)
 * - Screen reader friendly with ARIA attributes
 * - Respects reduced motion preferences
 * - Touch-friendly 44x44px minimum target
 * - High contrast and focus management
 */

(function() {
    'use strict';
    
    // Configuration constants
    const CONFIG = {
        // Show button after scrolling this many screen heights
        SHOW_AFTER_SCREENS: 2,
        // Minimum page height to show button (in screen heights)
        MIN_PAGE_HEIGHT_SCREENS: 4,
        // Scroll up threshold to detect intent (pixels)
        SCROLL_UP_THRESHOLD: 100,
        // Debounce delay for scroll events (ms)
        SCROLL_DEBOUNCE: 16,
        // Animation duration (ms) - will be 0 if user prefers reduced motion
        ANIMATION_DURATION: 800
    };
    
    let backToTopButton = null;
    let lastScrollTop = 0;
    let scrollUpDistance = 0;
    let isVisible = false;
    let scrollTimeout = null;
    let prefersReducedMotion = false;
    
    /**
     * Check if user prefers reduced motion
     */
    function checkReducedMotionPreference() {
        prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    }
    
    /**
     * Create the HTML structure for the back to top button
     */
    function createButton() {
        // Create button element
        backToTopButton = document.createElement('button');
        backToTopButton.className = 'back-to-top';
        backToTopButton.setAttribute('aria-label', 'Back to top of page');
        backToTopButton.setAttribute('title', 'Back to Top');
        backToTopButton.setAttribute('type', 'button');
        
        // Create inner HTML with icon and text
        backToTopButton.innerHTML = `
            <svg class="back-to-top__icon" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                <path d="M8 3.293l4.646 4.647a.5.5 0 0 0 .708-.708L8 2.879 2.646 7.232a.5.5 0 1 0 .708.708L8 3.293z"/>
            </svg>
            <span class="back-to-top__text">Back to Top</span>
            <span class="back-to-top__sr-only">Return to the top of the page</span>
        `;
        
        // Add event listeners
        backToTopButton.addEventListener('click', scrollToTop);
        backToTopButton.addEventListener('keydown', handleKeydown);
        
        // Insert into DOM
        document.body.appendChild(backToTopButton);
    }
    
    /**
     * Handle keyboard navigation
     */
    function handleKeydown(event) {
        // Activate on Enter or Space key
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            scrollToTop();
        }
    }
    
    /**
     * Smooth scroll to top with accessibility considerations
     */
    function scrollToTop() {
        // Announce to screen readers
        announceToScreenReaders('Scrolling to top of page');
        
        if (prefersReducedMotion) {
            // Instant scroll for users who prefer reduced motion
            window.scrollTo(0, 0);
            // Focus management - move focus to a logical element at the top
            focusTopElement();
        } else {
            // Smooth scroll animation
            const startPosition = window.pageYOffset;
            const startTime = performance.now();
            
            function animateScroll(currentTime) {
                const timeElapsed = currentTime - startTime;
                const progress = Math.min(timeElapsed / CONFIG.ANIMATION_DURATION, 1);
                
                // Easing function for smooth animation
                const easeInOutCubic = progress < 0.5
                    ? 4 * progress * progress * progress
                    : 1 - Math.pow(-2 * progress + 2, 3) / 2;
                
                const scrollPosition = startPosition * (1 - easeInOutCubic);
                window.scrollTo(0, scrollPosition);
                
                if (progress < 1) {
                    requestAnimationFrame(animateScroll);
                } else {
                    // Animation complete - manage focus
                    focusTopElement();
                }
            }
            
            requestAnimationFrame(animateScroll);
        }
    }
    
    /**
     * Focus management after scrolling to top
     */
    function focusTopElement() {
        // Try to focus on the main content area first
        const mainContent = document.querySelector('main, #main, .main-content, #content');
        if (mainContent && mainContent.getAttribute('tabindex') !== null) {
            mainContent.focus();
            return;
        }
        
        // Fallback to the first focusable element or skip link
        const skipLink = document.querySelector('.skip-link, .screen-reader-text');
        const firstFocusable = document.querySelector('a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])');
        
        if (skipLink) {
            skipLink.focus();
        } else if (firstFocusable) {
            firstFocusable.focus();
        }
    }
    
    /**
     * Announce messages to screen readers
     */
    function announceToScreenReaders(message) {
        const announcement = document.createElement('div');
        announcement.setAttribute('aria-live', 'polite');
        announcement.setAttribute('aria-atomic', 'true');
        announcement.className = 'sr-only';
        announcement.textContent = message;
        
        document.body.appendChild(announcement);
        
        // Remove after announcement
        setTimeout(() => {
            document.body.removeChild(announcement);
        }, 1000);
    }
    
    /**
     * Check if page is long enough to show the button
     */
    function isPageLongEnough() {
        const pageHeight = Math.max(
            document.body.scrollHeight,
            document.body.offsetHeight,
            document.documentElement.clientHeight,
            document.documentElement.scrollHeight,
            document.documentElement.offsetHeight
        );
        
        const screenHeight = window.innerHeight;
        return pageHeight > (screenHeight * CONFIG.MIN_PAGE_HEIGHT_SCREENS);
    }
    
    /**
     * Determine if button should be visible based on scroll position and intent
     */
    function shouldShowButton() {
        if (!isPageLongEnough()) return false;
        
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const screenHeight = window.innerHeight;
        const showThreshold = screenHeight * CONFIG.SHOW_AFTER_SCREENS;
        
        // Must be past the show threshold
        if (scrollTop < showThreshold) return false;
        
        // Detect scroll direction and intent
        const isScrollingUp = scrollTop < lastScrollTop;
        
        if (isScrollingUp) {
            scrollUpDistance += (lastScrollTop - scrollTop);
        } else {
            scrollUpDistance = 0; // Reset if scrolling down
        }
        
        lastScrollTop = scrollTop;
        
        // Show if user has scrolled up enough to indicate intent
        return scrollUpDistance >= CONFIG.SCROLL_UP_THRESHOLD;
    }
    
    /**
     * Show the back to top button
     */
    function showButton() {
        if (!isVisible) {
            isVisible = true;
            backToTopButton.classList.add('back-to-top--visible');
            backToTopButton.setAttribute('tabindex', '0');
            
            // Announce button availability to screen readers (only first time)
            if (scrollUpDistance === CONFIG.SCROLL_UP_THRESHOLD) {
                announceToScreenReaders('Back to top button is now available');
            }
        }
    }
    
    /**
     * Hide the back to top button
     */
    function hideButton() {
        if (isVisible) {
            isVisible = false;
            backToTopButton.classList.remove('back-to-top--visible');
            backToTopButton.setAttribute('tabindex', '-1');
        }
    }
    
    /**
     * Handle scroll events with debouncing
     */
    function handleScroll() {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        
        scrollTimeout = setTimeout(() => {
            if (shouldShowButton()) {
                showButton();
            } else {
                hideButton();
            }
        }, CONFIG.SCROLL_DEBOUNCE);
    }
    
    /**
     * Handle resize events
     */
    function handleResize() {
        // Recalculate visibility on resize
        if (!isPageLongEnough() && isVisible) {
            hideButton();
        }
    }
    
    /**
     * Initialize the back to top functionality
     */
    function init() {
        // Check for reduced motion preference
        checkReducedMotionPreference();
        
        // Listen for changes in motion preference
        const mediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
        mediaQuery.addListener(checkReducedMotionPreference);
        
        // Only initialize if page is long enough
        if (isPageLongEnough()) {
            createButton();
            
            // Add event listeners
            window.addEventListener('scroll', handleScroll, { passive: true });
            window.addEventListener('resize', handleResize, { passive: true });
            
            // Initial scroll check
            handleScroll();
        }
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
})();