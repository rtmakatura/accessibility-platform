/**
 * Accessible Menubar JavaScript for WordPress
 * Implements WCAG-compliant keyboard navigation and interaction
 */

class AccessibleWordPressMenubar {
  constructor(navElement) {
    this.nav = navElement;
    this.mobileMenuToggle = this.nav.querySelector('.accessible-menubar__toggle');
    this.mobileMenu = this.nav.querySelector('.accessible-menubar__mobile-menu');
    this.menubar = this.nav.querySelector('.accessible-menubar__menu[role="menubar"]');
    this.submenuToggles = this.nav.querySelectorAll('[aria-haspopup="true"]');
    this.isMobileMenuOpen = false;
    this.activeSubmenu = null;
    this.focusedIndex = -1;
    
    this.init();
  }

  init() {
    this.setupMobileMenu();
    this.setupSubmenuToggles();
    this.setupKeyboardNavigation();
    this.setupClickOutside();
    this.setupHoverInteractions();
  }

  // Mobile menu functionality
  setupMobileMenu() {
    if (!this.mobileMenuToggle || !this.mobileMenu) return;

    this.mobileMenuToggle.addEventListener('click', (e) => {
      e.preventDefault();
      this.toggleMobileMenu();
    });

    // Close mobile menu on window resize
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1025 && this.isMobileMenuOpen) {
        this.closeMobileMenu();
      }
    });
  }

  toggleMobileMenu() {
    this.isMobileMenuOpen = !this.isMobileMenuOpen;
    
    this.mobileMenuToggle.setAttribute('aria-expanded', this.isMobileMenuOpen.toString());
    this.mobileMenuToggle.setAttribute('aria-label', 
      this.isMobileMenuOpen ? 'Close mobile menu' : 'Open mobile menu'
    );
    
    if (this.isMobileMenuOpen) {
      this.mobileMenu.style.display = 'block';
      document.body.style.overflow = 'hidden';
      
      // Focus first menu item
      const firstMenuItem = this.mobileMenu.querySelector('[role="menuitem"]');
      if (firstMenuItem) {
        setTimeout(() => firstMenuItem.focus(), 100);
      }
    } else {
      this.closeMobileMenu();
    }
  }

  closeMobileMenu() {
    this.isMobileMenuOpen = false;
    this.mobileMenuToggle.setAttribute('aria-expanded', 'false');
    this.mobileMenuToggle.setAttribute('aria-label', 'Open mobile menu');
    this.mobileMenu.style.display = 'none';
    document.body.style.overflow = '';
    
    // Close any open mobile submenus
    this.closeAllMobileSubmenus();
  }

  // Desktop submenu functionality
  setupSubmenuToggles() {
    this.submenuToggles.forEach((toggle, index) => {
      const submenu = toggle.nextElementSibling;
      if (!submenu) return;

      toggle.addEventListener('click', (e) => {
        e.preventDefault();
        this.toggleSubmenu(toggle, submenu, index);
      });

      // Mobile submenu toggles
      const mobileToggle = this.mobileMenu?.querySelector(`[aria-controls="${submenu.id.replace('services-', 'mobile-services-')}"]`);
      if (mobileToggle) {
        mobileToggle.addEventListener('click', (e) => {
          e.preventDefault();
          this.toggleMobileSubmenu(mobileToggle);
        });
      }
    });
  }

  toggleSubmenu(toggle, submenu, index) {
    const isOpen = toggle.getAttribute('aria-expanded') === 'true';
    
    // Close all other submenus
    this.closeAllSubmenus();
    
    if (!isOpen) {
      this.openSubmenu(toggle, submenu, index);
    }
  }

  openSubmenu(toggle, submenu, index) {
    this.activeSubmenu = { toggle, submenu, index };
    
    toggle.setAttribute('aria-expanded', 'true');
    submenu.classList.add('accessible-menubar__submenu--open');
    
    // Focus first submenu item for keyboard users
    if (document.activeElement === toggle) {
      const firstMenuItem = submenu.querySelector('[role="menuitem"]');
      if (firstMenuItem) {
        setTimeout(() => firstMenuItem.focus(), 50);
      }
    }
  }

  closeAllSubmenus() {
    this.submenuToggles.forEach(toggle => {
      const submenu = toggle.nextElementSibling;
      if (submenu) {
        toggle.setAttribute('aria-expanded', 'false');
        submenu.classList.remove('accessible-menubar__submenu--open');
      }
    });
    this.activeSubmenu = null;
  }

  // Mobile submenu functionality
  toggleMobileSubmenu(toggle) {
    const submenuId = toggle.getAttribute('aria-controls');
    const submenu = document.getElementById(submenuId);
    const arrow = toggle.querySelector('.accessible-menubar__mobile-arrow');
    
    if (!submenu || !arrow) return;
    
    const isOpen = toggle.getAttribute('aria-expanded') === 'true';
    
    // Close all other mobile submenus
    this.closeAllMobileSubmenus();
    
    if (!isOpen) {
      toggle.setAttribute('aria-expanded', 'true');
      submenu.style.display = 'block';
      arrow.textContent = '−';
    }
  }

  closeAllMobileSubmenus() {
    const mobileToggles = this.mobileMenu?.querySelectorAll('[aria-haspopup="true"]');
    mobileToggles?.forEach(toggle => {
      const submenuId = toggle.getAttribute('aria-controls');
      const submenu = document.getElementById(submenuId);
      const arrow = toggle.querySelector('.accessible-menubar__mobile-arrow');
      
      if (submenu && arrow) {
        toggle.setAttribute('aria-expanded', 'false');
        submenu.style.display = 'none';
        arrow.textContent = '+';
      }
    });
  }

  // Keyboard navigation
  setupKeyboardNavigation() {
    this.nav.addEventListener('keydown', (e) => {
      switch (e.key) {
        case 'Escape':
          this.handleEscape(e);
          break;
        case 'ArrowDown':
          this.handleArrowDown(e);
          break;
        case 'ArrowUp':
          this.handleArrowUp(e);
          break;
        case 'ArrowRight':
          this.handleArrowRight(e);
          break;
        case 'ArrowLeft':
          this.handleArrowLeft(e);
          break;
        case 'Home':
          this.handleHome(e);
          break;
        case 'End':
          this.handleEnd(e);
          break;
        case 'Enter':
        case ' ':
          this.handleEnterSpace(e);
          break;
      }
    });
  }

  handleEscape(e) {
    if (this.isMobileMenuOpen) {
      e.preventDefault();
      this.closeMobileMenu();
      this.mobileMenuToggle.focus();
    } else if (this.activeSubmenu) {
      e.preventDefault();
      this.closeAllSubmenus();
      this.activeSubmenu.toggle.focus();
    }
  }

  handleArrowDown(e) {
    if (this.activeSubmenu) {
      e.preventDefault();
      this.focusNextSubmenuItem();
    } else if (this.isMenubarFocused()) {
      e.preventDefault();
      this.openSubmenuFromMenubar();
    }
  }

  handleArrowUp(e) {
    if (this.activeSubmenu) {
      e.preventDefault();
      this.focusPreviousSubmenuItem();
    }
  }

  handleArrowRight(e) {
    if (this.isMenubarFocused()) {
      e.preventDefault();
      this.focusNextMenubarItem();
    }
  }

  handleArrowLeft(e) {
    if (this.isMenubarFocused()) {
      e.preventDefault();
      this.focusPreviousMenubarItem();
    }
  }

  handleHome(e) {
    if (this.isMenubarFocused()) {
      e.preventDefault();
      this.focusFirstMenubarItem();
    } else if (this.activeSubmenu) {
      e.preventDefault();
      this.focusFirstSubmenuItem();
    }
  }

  handleEnd(e) {
    if (this.isMenubarFocused()) {
      e.preventDefault();
      this.focusLastMenubarItem();
    } else if (this.activeSubmenu) {
      e.preventDefault();
      this.focusLastSubmenuItem();
    }
  }

  handleEnterSpace(e) {
    const target = e.target;
    if (target.getAttribute('aria-haspopup') === 'true') {
      e.preventDefault();
      target.click();
    }
  }

  // Helper methods for keyboard navigation
  isMenubarFocused() {
    const menubarItems = this.menubar?.querySelectorAll('[role="menuitem"]');
    return Array.from(menubarItems || []).includes(document.activeElement);
  }

  focusNextMenubarItem() {
    const menubarItems = Array.from(this.menubar?.querySelectorAll('[role="menuitem"]') || []);
    const currentIndex = menubarItems.indexOf(document.activeElement);
    const nextIndex = (currentIndex + 1) % menubarItems.length;
    menubarItems[nextIndex]?.focus();
  }

  focusPreviousMenubarItem() {
    const menubarItems = Array.from(this.menubar?.querySelectorAll('[role="menuitem"]') || []);
    const currentIndex = menubarItems.indexOf(document.activeElement);
    const prevIndex = currentIndex <= 0 ? menubarItems.length - 1 : currentIndex - 1;
    menubarItems[prevIndex]?.focus();
  }

  focusFirstMenubarItem() {
    const menubarItems = this.menubar?.querySelectorAll('[role="menuitem"]');
    menubarItems?.[0]?.focus();
  }

  focusLastMenubarItem() {
    const menubarItems = this.menubar?.querySelectorAll('[role="menuitem"]');
    if (menubarItems) {
      menubarItems[menubarItems.length - 1]?.focus();
    }
  }

  openSubmenuFromMenubar() {
    const focused = document.activeElement;
    if (focused?.getAttribute('aria-haspopup') === 'true') {
      focused.click();
    }
  }

  focusNextSubmenuItem() {
    if (!this.activeSubmenu) return;
    
    const submenuItems = Array.from(this.activeSubmenu.submenu.querySelectorAll('[role="menuitem"]'));
    const currentIndex = submenuItems.indexOf(document.activeElement);
    const nextIndex = (currentIndex + 1) % submenuItems.length;
    submenuItems[nextIndex]?.focus();
  }

  focusPreviousSubmenuItem() {
    if (!this.activeSubmenu) return;
    
    const submenuItems = Array.from(this.activeSubmenu.submenu.querySelectorAll('[role="menuitem"]'));
    const currentIndex = submenuItems.indexOf(document.activeElement);
    
    if (currentIndex <= 0) {
      // Return to parent menubar item
      this.closeAllSubmenus();
      this.activeSubmenu.toggle.focus();
    } else {
      const prevIndex = currentIndex - 1;
      submenuItems[prevIndex]?.focus();
    }
  }

  focusFirstSubmenuItem() {
    if (!this.activeSubmenu) return;
    
    const firstItem = this.activeSubmenu.submenu.querySelector('[role="menuitem"]');
    firstItem?.focus();
  }

  focusLastSubmenuItem() {
    if (!this.activeSubmenu) return;
    
    const submenuItems = this.activeSubmenu.submenu.querySelectorAll('[role="menuitem"]');
    if (submenuItems.length > 0) {
      submenuItems[submenuItems.length - 1].focus();
    }
  }

  // Hover interactions for desktop
  setupHoverInteractions() {
    if (!this.menubar) return;
    
    const menuItems = this.menubar.querySelectorAll('li[role="none"]');
    
    menuItems.forEach(item => {
      const toggle = item.querySelector('[aria-haspopup="true"]');
      const submenu = item.querySelector('.accessible-menubar__submenu');
      
      if (toggle && submenu) {
        let hoverTimeout;
        
        item.addEventListener('mouseenter', () => {
          clearTimeout(hoverTimeout);
          if (window.innerWidth >= 1025) {
            this.closeAllSubmenus();
            
            const index = Array.from(this.submenuToggles).indexOf(toggle);
            this.openSubmenu(toggle, submenu, index);
          }
        });
        
        item.addEventListener('mouseleave', () => {
          if (window.innerWidth >= 1025) {
            hoverTimeout = setTimeout(() => {
              this.closeAllSubmenus();
            }, 150);
          }
        });
      }
    });
  }

  // Click outside to close
  setupClickOutside() {
    document.addEventListener('click', (e) => {
      if (!this.nav.contains(e.target)) {
        this.closeAllSubmenus();
        if (this.isMobileMenuOpen) {
          this.closeMobileMenu();
        }
      }
    });
  }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  const navElement = document.querySelector('.accessible-menubar');
  if (navElement) {
    new AccessibleWordPressMenubar(navElement);
  }
});