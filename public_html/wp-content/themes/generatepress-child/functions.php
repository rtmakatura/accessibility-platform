<?php
function child_enqueue_styles() {
    // DON'T enqueue parent styles for full control
    // wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    
    // Load our modular CSS system (main.css imports all modules)
    wp_enqueue_style(
        'custom-accessibility-css', 
        get_stylesheet_directory_uri() . '/assets/css/main.css', 
        array(), 
        '3.0.1' // Updated version for flat design fixes
    );
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles');

// Debug: Check if our CSS is loading
function debug_css_loading() {
    if (current_user_can('administrator')) {
        echo '<!-- DEBUG: Custom CSS should be loading from: ' . get_stylesheet_directory_uri() . '/assets/css/main.css -->';
    }
}
add_action('wp_head', 'debug_css_loading');

// Remove GeneratePress defaults for full control
function remove_generatepress_styles() {
    wp_dequeue_style('generate-style');
    wp_dequeue_style('generate-mobile-style');
    wp_dequeue_style('generate-style-grid');
    wp_dequeue_style('generate-main'); // This is the main.min.css file
    wp_dequeue_style('generate-main-style');
    wp_dequeue_style('generatepress-style');
    wp_dequeue_style('generate-child-css');
    
    // Remove GP Premium styles too
    wp_dequeue_style('generate-blog');
    wp_dequeue_style('generate-colors');
    wp_dequeue_style('generate-backgrounds');
    wp_dequeue_style('generate-menu-plus');
    wp_dequeue_style('generate-spacing');
    wp_dequeue_style('generate-typography');
}
add_action('wp_enqueue_scripts', 'remove_generatepress_styles', 99);

// Optional: Add preload hints for better performance
function preload_critical_css() {
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/assets/css/main.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
    echo '<noscript><link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/main.css"></noscript>';
}
// Uncomment the next line if you want to enable CSS preloading
// add_action('wp_head', 'preload_critical_css', 1);

// Enqueue page-specific JavaScript
function enqueue_page_scripts() {
    // Accessibility Auditing page script
    if (is_page_template('page-accessibility-auditing.php')) {
        wp_enqueue_script(
            'accessibility-auditing-js',
            get_stylesheet_directory_uri() . '/assets/js/accessibility-auditing.js',
            array(),
            '1.0.0',
            true // Load in footer
        );
        
        // Localize script for AJAX
        wp_localize_script('accessibility-auditing-js', 'audit_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('audit_quote_nonce')
        ));
    }
    
    // Risk Calculator page script (if exists)
    if (is_page_template('page-risk-calculator.php')) {
        wp_enqueue_script(
            'risk-calculator-js',
            get_stylesheet_directory_uri() . '/assets/js/risk-calculator.js',
            array(),
            '1.0.0',
            true
        );
    }
    
    // Resources page styles
    if (is_page_template('page-resources.php') || is_page_template('page-resource-generic.php') || is_page_template('page-wcag-guide.php')) {
        wp_enqueue_style(
            'resources-css',
            get_stylesheet_directory_uri() . '/assets/css/resources.css',
            array('custom-accessibility-css'),
            '1.0.0'
        );
    }
    
    // Lawsuit Trends page styles
    if (is_page_template('page-lawsuit-trends.php')) {
        wp_enqueue_style(
            'lawsuit-trends-css',
            get_stylesheet_directory_uri() . '/assets/css/lawsuit-trends.css',
            array('custom-accessibility-css'),
            '1.0.0'
        );
    }
    
    // Opportunity section tooltips for home page
    if (is_page_template('page-templates/page-custom-home.php')) {
        // Enqueue opportunity section CSS
        wp_enqueue_style(
            'opportunity-section-css',
            get_stylesheet_directory_uri() . '/assets/css/opportunity-section.css',
            array(),
            '1.0.0'
        );
        
        // Enqueue opportunity tooltips JavaScript
        wp_enqueue_script(
            'opportunity-tooltips-js',
            get_stylesheet_directory_uri() . '/assets/js/opportunity-tooltips.js',
            array(),
            '1.0.0',
            true
        );
        
        // Enqueue accessible menubar for the home page
        wp_enqueue_style(
            'accessible-menubar-css',
            get_stylesheet_directory_uri() . '/assets/css/accessible-menubar.css',
            array('custom-accessibility-css'),
            '1.0.0'
        );
        
        wp_enqueue_script(
            'accessible-menubar-js',
            get_stylesheet_directory_uri() . '/assets/js/accessible-menubar.js',
            array(),
            '1.0.0',
            true
        );
        
        // Enqueue smart sticky navigation
        wp_enqueue_style(
            'smart-sticky-nav-css',
            get_stylesheet_directory_uri() . '/assets/css/smart-sticky-nav.css',
            array('accessible-menubar-css'),
            '1.0.0'
        );
        
        wp_enqueue_script(
            'smart-sticky-nav-js',
            get_stylesheet_directory_uri() . '/assets/js/smart-sticky-nav.js',
            array('accessible-menubar-js'),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_page_scripts');

// Handle audit quote form submission via AJAX
function handle_audit_quote_submission() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'audit_quote_nonce')) {
        wp_send_json_error('Security check failed');
        return;
    }
    
    // Sanitize form data
    $company_name = sanitize_text_field($_POST['company_name']);
    $contact_name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $website_url = esc_url_raw($_POST['website_url']);
    $services = isset($_POST['services']) ? array_map('sanitize_text_field', $_POST['services']) : array();
    $timeline = sanitize_text_field($_POST['timeline']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Prepare email
    $to = get_option('admin_email');
    $subject = 'New Accessibility Audit Quote Request from ' . $company_name;
    
    $email_body = "New accessibility audit quote request:\n\n";
    $email_body .= "Company: $company_name\n";
    $email_body .= "Contact: $contact_name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Website: $website_url\n";
    $email_body .= "Services: " . implode(', ', $services) . "\n";
    $email_body .= "Timeline: $timeline\n";
    $email_body .= "Message:\n$message\n";
    
    $headers = array(
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $contact_name . ' <' . $email . '>'
    );
    
    // Send email
    $sent = wp_mail($to, $subject, $email_body, $headers);
    
    // Send confirmation email to user
    if ($sent) {
        $user_subject = 'Thank you for your accessibility audit inquiry';
        $user_body = "Dear $contact_name,\n\n";
        $user_body .= "Thank you for requesting an accessibility audit quote. We've received your inquiry and will respond within 24 business hours.\n\n";
        $user_body .= "Summary of your request:\n";
        $user_body .= "Website: $website_url\n";
        $user_body .= "Services interested in: " . implode(', ', $services) . "\n";
        $user_body .= "Timeline: $timeline\n\n";
        $user_body .= "If you have any urgent questions, please don't hesitate to call us at 1-800-ACCESS-NOW.\n\n";
        $user_body .= "Best regards,\n";
        $user_body .= get_bloginfo('name') . " Team\n";
        
        wp_mail($email, $user_subject, $user_body);
        
        wp_send_json_success('Quote request sent successfully');
    } else {
        wp_send_json_error('Failed to send quote request. Please try again.');
    }
}
add_action('wp_ajax_handle_audit_quote', 'handle_audit_quote_submission');
add_action('wp_ajax_nopriv_handle_audit_quote', 'handle_audit_quote_submission');

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

// Enqueue Risk Calculator assets for specific page template
function enqueue_risk_calculator_assets() {
    // Only load on risk calculator page template
    if (is_page_template('page-risk-calculator.php')) {
        // Enqueue JavaScript
        wp_enqueue_script(
            'risk-calculator-js',
            get_stylesheet_directory_uri() . '/assets/js/risk-calculator.js',
            array(), // No dependencies
            '1.0.0',
            true // Load in footer
        );
        
        // Add script attributes for better performance
        add_filter('script_loader_tag', function($tag, $handle) {
            if ($handle === 'risk-calculator-js') {
                return str_replace('<script', '<script defer', $tag);
            }
            return $tag;
        }, 10, 2);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_risk_calculator_assets');

// Register navigation menus
function register_accessibility_nav_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Navigation',
        'services' => 'Services Menu (for dropdown)',
        'footer' => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'register_accessibility_nav_menus');

// Create custom walker for dropdown navigation
class Accessibility_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    // Add dropdown functionality to navigation
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"nav-dropdown__menu\" role=\"menu\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        
        // Check if item has children
        $has_children = in_array('menu-item-has-children', $classes);
        
        if ($depth === 0) {
            $class_names = $has_children ? 'nav-dropdown nav-item' : 'nav-item';
        } else {
            $class_names = 'nav-dropdown__item';
        }
        
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) .'"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target).'"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) .'"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) .'"' : '';
        
        // Add dropdown attributes for parent items
        if ($has_children && $depth === 0) {
            $attributes .= ' class="nav-link nav-dropdown__toggle" aria-expanded="false" aria-haspopup="true"';
        } else if ($depth === 0) {
            $attributes .= ' class="nav-link"';
        } else {
            $attributes .= ' class="nav-dropdown__link" role="menuitem"';
        }
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

// Add navigation JavaScript functionality
function enqueue_navigation_scripts() {
    wp_enqueue_script(
        'navigation-js',
        get_stylesheet_directory_uri() . '/assets/js/navigation.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_navigation_scripts');

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

// Enqueue Smart Sticky Navigation Assets Globally
function enqueue_smart_sticky_nav_assets() {
    // Load on all pages for consistent navigation experience
    wp_enqueue_style(
        'accessible-menubar-css',
        get_stylesheet_directory_uri() . '/assets/css/accessible-menubar.css',
        array('custom-accessibility-css'),
        '1.0.1'
    );
    
    wp_enqueue_script(
        'accessible-menubar-js',
        get_stylesheet_directory_uri() . '/assets/js/accessible-menubar.js',
        array(),
        '1.0.1',
        true
    );
    
    // Smart sticky navigation enhancement
    wp_enqueue_style(
        'smart-sticky-nav-css',
        get_stylesheet_directory_uri() . '/assets/css/smart-sticky-nav.css',
        array('accessible-menubar-css'),
        '1.0.1'
    );
    
    wp_enqueue_script(
        'smart-sticky-nav-js',
        get_stylesheet_directory_uri() . '/assets/js/smart-sticky-nav.js',
        array('accessible-menubar-js'),
        '1.0.1',
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_smart_sticky_nav_assets');

// Enqueue Back to Top Button Assets
function enqueue_back_to_top_assets() {
    // Enqueue the CSS
    wp_enqueue_style(
        'back-to-top-css',
        get_stylesheet_directory_uri() . '/assets/css/back-to-top.css',
        array('custom-accessibility-css'), // Load after main CSS
        '1.0.0'
    );
    
    // Enqueue the JavaScript
    wp_enqueue_script(
        'back-to-top-js',
        get_stylesheet_directory_uri() . '/assets/js/back-to-top.js',
        array(), // No dependencies - pure vanilla JS
        '1.0.0',
        true // Load in footer for better performance
    );
    
    // Add async attribute for better performance
    add_filter('script_loader_tag', function($tag, $handle) {
        if ($handle === 'back-to-top-js') {
            return str_replace('<script', '<script async', $tag);
        }
        return $tag;
    }, 10, 2);
}
add_action('wp_enqueue_scripts', 'enqueue_back_to_top_assets');

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