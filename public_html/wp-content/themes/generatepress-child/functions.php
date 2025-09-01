<?php
function child_enqueue_styles() {
    // DON'T enqueue parent styles for full control
    // wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    
    // Load our modular CSS system (main.css imports all modules)
    wp_enqueue_style(
        'custom-accessibility-css', 
        get_stylesheet_directory_uri() . '/assets/css/main.css', 
        array(), 
        '2.0.0' // Updated version for new modular system
    );
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles');

// Remove GeneratePress defaults for full control
function remove_generatepress_styles() {
    wp_dequeue_style('generate-style');
    wp_dequeue_style('generate-mobile-style');
    wp_dequeue_style('generate-style-grid');
}
add_action('wp_enqueue_scripts', 'remove_generatepress_styles', 20);

// Optional: Add preload hints for better performance
function preload_critical_css() {
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/assets/css/main.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<noscript><link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/main.css"></noscript>';
}
// Uncomment the next line if you want to enable CSS preloading
// add_action('wp_head', 'preload_critical_css', 1);

// Add theme support for accessibility features
function accessibility_theme_setup() {
    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width'         => 1200,
        'height'        => 400,
        'flex-height'   => true,
        'flex-width'    => true,
    ));
    
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));
    
    // Add support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'accessibility_theme_setup');

// Add accessibility-focused body classes
function accessibility_body_classes($classes) {
    // Add class for JavaScript detection
    $classes[] = 'js-loading';
    
    // Add class for better focus management
    $classes[] = 'focus-outline';
    
    // Add class for the current page template
    if (is_front_page()) {
        $classes[] = 'page-home';
    }
    
    return $classes;
}
add_filter('body_class', 'accessibility_body_classes');

// Add skip link to the beginning of the page
function add_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#main">Skip to content</a>';
}
add_action('wp_body_open', 'add_skip_link');

// Improve accessibility of menu items
function add_menu_link_attributes($atts, $item, $args) {
    // Add aria-current for current page
    if (in_array('current-menu-item', $item->classes)) {
        $atts['aria-current'] = 'page';
    }
    
    // Add aria-expanded for dropdown menus
    if (in_array('menu-item-has-children', $item->classes)) {
        $atts['aria-expanded'] = 'false';
        $atts['aria-haspopup'] = 'true';
    }
    
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_attributes', 10, 3);

// Add proper heading hierarchy
function fix_heading_hierarchy($content) {
    // This function can be used to automatically fix heading hierarchy
    // Implementation depends on your specific needs
    return $content;
}
// Uncomment if you need automatic heading hierarchy fixes
// add_filter('the_content', 'fix_heading_hierarchy');

// Add live region for dynamic content updates
function add_live_regions() {
    echo '<div id="live-region" class="live-region" aria-live="polite" aria-atomic="true"></div>';
    echo '<div id="live-region-assertive" class="live-region" aria-live="assertive" aria-atomic="true"></div>';
}
add_action('wp_footer', 'add_live_regions');

// Optimize CSS delivery for better performance
function optimize_css_delivery() {
    // Remove query strings from static resources for better caching
    if (!is_admin()) {
        add_filter('script_loader_src', 'remove_script_version', 15, 1);
        add_filter('style_loader_src', 'remove_script_version', 15, 1);
    }
}
add_action('init', 'optimize_css_delivery');

function remove_script_version($src) {
    $parts = explode('?ver', $src);
    return $parts[0];
}

// Add accessibility-focused customizer options
function accessibility_customizer($wp_customize) {
    // Add section for accessibility settings
    $wp_customize->add_section('accessibility_settings', array(
        'title'    => 'Accessibility Options',
        'priority' => 30,
    ));
    
    // Add setting for high contrast mode
    $wp_customize->add_setting('high_contrast_mode', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('high_contrast_mode', array(
        'label'   => 'Enable High Contrast Mode',
        'section' => 'accessibility_settings',
        'type'    => 'checkbox',
    ));
    
    // Add setting for reduced motion
    $wp_customize->add_setting('reduced_motion', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('reduced_motion', array(
        'label'   => 'Reduce Motion by Default',
        'section' => 'accessibility_settings',
        'type'    => 'checkbox',
    ));
}
add_action('customize_register', 'accessibility_customizer');

// Add inline JavaScript for accessibility enhancements
function accessibility_inline_scripts() {
    ?>
    <script>
    // Remove js-loading class when JavaScript is ready
    document.documentElement.classList.remove('js-loading');
    document.documentElement.classList.add('js-loaded');
    
    // Focus management for modals and dropdowns
    window.AccessibilityHelpers = {
        trapFocus: function(element) {
            const focusableElements = element.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            const firstFocusableElement = focusableElements[0];
            const lastFocusableElement = focusableElements[focusableElements.length - 1];
            
            element.addEventListener('keydown', function(e) {
                if (e.key === 'Tab') {
                    if (e.shiftKey) {
                        if (document.activeElement === firstFocusableElement) {
                            lastFocusableElement.focus();
                            e.preventDefault();
                        }
                    } else {
                        if (document.activeElement === lastFocusableElement) {
                            firstFocusableElement.focus();
                            e.preventDefault();
                        }
                    }
                }
                
                if (e.key === 'Escape') {
                    // Close modal or dropdown
                    const closeButton = element.querySelector('[aria-label="Close"], .close, .modal-close');
                    if (closeButton) {
                        closeButton.click();
                    }
                }
            });
        },
        
        announceToScreenReader: function(message, priority = 'polite') {
            const liveRegion = document.getElementById(
                priority === 'assertive' ? 'live-region-assertive' : 'live-region'
            );
            if (liveRegion) {
                liveRegion.textContent = message;
                setTimeout(() => {
                    liveRegion.textContent = '';
                }, 1000);
            }
        }
    };
    </script>
    <?php
}
add_action('wp_footer', 'accessibility_inline_scripts');
?>