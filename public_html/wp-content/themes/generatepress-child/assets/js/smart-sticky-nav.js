/**
 * Smart Sticky Navigation
 * Hides on scroll down, shows on scroll up, with compact mode
 */

class SmartStickyNav {
  constructor() {
    this.nav = document.querySelector('.accessible-menubar');
    if (!this.nav) {
      console.error('Smart Sticky Nav: Navigation element not found!');
      return;
    }
    
    // Configuration
    this.config = {
      hideThreshold: 100,      // Minimum scroll before hiding
      compactThreshold: 50,    // When to trigger compact mode
      scrollDelta: 5,          // Minimum scroll change to trigger
      hideOffset: 10,          // Extra pixels to fully hide
      animationDuration: 300   // Animation duration in ms
    };
    
    // State
    this.state = {
      lastScrollY: 0,
      currentScrollY: 0,
      isHidden: false,
      isCompact: false,
      isScrollingDown: false,
      ticking: false
    };
    
    // Get nav height for calculations
    this.navHeight = this.nav.offsetHeight;
    
    this.init();
  }
  
  init() {
    console.log('Smart Sticky Nav: Initializing...');
    
    // Add necessary CSS classes
    this.nav.classList.add('smart-sticky');
    
    // Create a spacer to prevent content jump
    this.createSpacer();
    
    // Set up scroll listener with throttling
    this.setupScrollListener();
    
    // Set up resize listener
    this.setupResizeListener();
    
    // Handle initial state
    this.handleScroll();
    
    console.log('Smart Sticky Nav: Initialized successfully!');
  }
  
  createSpacer() {
    // Create a spacer element to maintain layout when nav becomes fixed
    this.spacer = document.createElement('div');
    this.spacer.className = 'nav-spacer';
    this.spacer.style.height = '0px';
    this.nav.parentNode.insertBefore(this.spacer, this.nav);
  }
  
  setupScrollListener() {
    let scrollTimeout;
    
    window.addEventListener('scroll', () => {
      this.state.currentScrollY = window.scrollY;
      
      // Clear the timeout for scroll end detection
      clearTimeout(scrollTimeout);
      
      // Request animation frame for smooth updates
      if (!this.state.ticking) {
        window.requestAnimationFrame(() => {
          this.handleScroll();
          this.state.ticking = false;
        });
        this.state.ticking = true;
      }
      
      // Detect when scrolling stops
      scrollTimeout = setTimeout(() => {
        this.onScrollStop();
      }, 150);
    }, { passive: true });
  }
  
  setupResizeListener() {
    let resizeTimeout;
    
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        this.navHeight = this.nav.offsetHeight;
        this.updateSpacerHeight();
      }, 250);
    });
  }
  
  handleScroll() {
    const scrollY = this.state.currentScrollY;
    const scrollDiff = scrollY - this.state.lastScrollY;
    const absScrollDiff = Math.abs(scrollDiff);
    
    // Ignore small scroll changes
    if (absScrollDiff < this.config.scrollDelta) return;
    
    // Determine scroll direction
    this.state.isScrollingDown = scrollDiff > 0;
    
    // Handle compact mode
    if (scrollY > this.config.compactThreshold) {
      this.enableCompactMode();
    } else {
      this.disableCompactMode();
    }
    
    // Handle hide/show based on scroll direction and position
    if (scrollY > this.config.hideThreshold) {
      if (this.state.isScrollingDown && !this.state.isHidden) {
        this.hideNav();
      } else if (!this.state.isScrollingDown && this.state.isHidden) {
        this.showNav();
      }
    } else {
      // Always show nav when near top
      if (this.state.isHidden) {
        this.showNav();
      }
    }
    
    // Update last scroll position
    this.state.lastScrollY = scrollY;
  }
  
  onScrollStop() {
    // Optional: Show nav when user stops scrolling
    // This improves accessibility by ensuring nav is available
    const scrollY = this.state.currentScrollY;
    
    if (scrollY > this.config.hideThreshold * 2 && this.state.isHidden) {
      // Add a subtle hint animation
      this.nav.classList.add('nav-hint');
      setTimeout(() => {
        this.nav.classList.remove('nav-hint');
      }, 300);
    }
  }
  
  hideNav() {
    this.state.isHidden = true;
    this.nav.classList.add('nav-hidden');
    this.nav.classList.remove('nav-visible');
    
    // Add transform for smooth slide up
    const hideAmount = this.navHeight + this.config.hideOffset;
    this.nav.style.transform = `translateY(-${hideAmount}px)`;
    
    // Update spacer to prevent content jump
    this.updateSpacerHeight();
  }
  
  showNav() {
    this.state.isHidden = false;
    this.nav.classList.remove('nav-hidden');
    this.nav.classList.add('nav-visible');
    
    // Reset transform
    this.nav.style.transform = 'translateY(0)';
    
    // Update spacer
    this.updateSpacerHeight();
  }
  
  enableCompactMode() {
    if (!this.state.isCompact) {
      this.state.isCompact = true;
      this.nav.classList.add('nav-compact');
      
      // Trigger reflow for smooth transition
      this.nav.offsetHeight;
      
      // Update spacer for new height
      setTimeout(() => {
        this.navHeight = this.nav.offsetHeight;
        this.updateSpacerHeight();
      }, 50);
    }
  }
  
  disableCompactMode() {
    if (this.state.isCompact) {
      this.state.isCompact = false;
      this.nav.classList.remove('nav-compact');
      
      // Update spacer for new height
      setTimeout(() => {
        this.navHeight = this.nav.offsetHeight;
        this.updateSpacerHeight();
      }, 50);
    }
  }
  
  updateSpacerHeight() {
    // Only add spacer height when nav is fixed
    if (this.state.currentScrollY > 0) {
      this.spacer.style.height = `${this.navHeight}px`;
    } else {
      this.spacer.style.height = '0px';
    }
  }
  
  // Public methods
  reset() {
    this.showNav();
    this.disableCompactMode();
    this.state.lastScrollY = 0;
    this.state.currentScrollY = 0;
  }
  
  destroy() {
    // Clean up event listeners and elements
    window.removeEventListener('scroll', this.handleScroll);
    window.removeEventListener('resize', this.setupResizeListener);
    this.spacer?.remove();
    this.nav.classList.remove('smart-sticky', 'nav-hidden', 'nav-visible', 'nav-compact');
    this.nav.style.transform = '';
  }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  console.log('Smart Sticky Nav: DOM Loaded, checking for navigation element...');
  
  const navElement = document.querySelector('.accessible-menubar');
  console.log('Smart Sticky Nav: Navigation element found:', navElement);
  
  // Only initialize on desktop and tablet
  if (window.innerWidth >= 768) {
    if (navElement) {
      window.smartStickyNav = new SmartStickyNav();
      console.log('Smart Sticky Nav: Instance created and attached to window.smartStickyNav');
    } else {
      console.error('Smart Sticky Nav: Could not find .accessible-menubar element!');
    }
  } else {
    console.log('Smart Sticky Nav: Skipped - Mobile viewport detected');
  }
  
  // Reinitialize on significant resize
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      if (window.innerWidth >= 768 && !window.smartStickyNav) {
        window.smartStickyNav = new SmartStickyNav();
      } else if (window.innerWidth < 768 && window.smartStickyNav) {
        window.smartStickyNav.destroy();
        window.smartStickyNav = null;
      }
    }, 250);
  });
});