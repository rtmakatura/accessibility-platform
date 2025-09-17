<?php
// Test script to verify smart sticky navigation status
require_once('public_html/wp-load.php');

echo "=== Smart Sticky Navigation Status Check ===\n\n";

// Check if functions exist
if (function_exists('enqueue_smart_sticky_nav_assets')) {
    echo "✓ Function enqueue_smart_sticky_nav_assets exists\n";
} else {
    echo "✗ Function enqueue_smart_sticky_nav_assets NOT found\n";
}

// Check if files exist
$theme_dir = get_stylesheet_directory();
$files_to_check = [
    '/assets/js/smart-sticky-nav.js',
    '/assets/css/smart-sticky-nav.css',
    '/assets/js/accessible-menubar.js',
    '/assets/css/accessible-menubar.css'
];

echo "\nFile Status:\n";
foreach ($files_to_check as $file) {
    $full_path = $theme_dir . $file;
    if (file_exists($full_path)) {
        $size = filesize($full_path);
        echo "✓ $file (Size: " . number_format($size) . " bytes)\n";
    } else {
        echo "✗ $file NOT FOUND\n";
    }
}

// Check if scripts are enqueued
echo "\nEnqueued Scripts:\n";
global $wp_scripts;
do_action('wp_enqueue_scripts');

$our_scripts = ['smart-sticky-nav-js', 'accessible-menubar-js'];
foreach ($our_scripts as $handle) {
    if (wp_script_is($handle, 'enqueued')) {
        echo "✓ $handle is enqueued\n";
    } else {
        echo "✗ $handle is NOT enqueued\n";
    }
}

echo "\nEnqueued Styles:\n";
$our_styles = ['smart-sticky-nav-css', 'accessible-menubar-css'];
foreach ($our_styles as $handle) {
    if (wp_style_is($handle, 'enqueued')) {
        echo "✓ $handle is enqueued\n";
    } else {
        echo "✗ $handle is NOT enqueued\n";
    }
}

echo "\n=== URLs ===\n";
echo "JS URL: " . get_stylesheet_directory_uri() . '/assets/js/smart-sticky-nav.js' . "\n";
echo "CSS URL: " . get_stylesheet_directory_uri() . '/assets/css/smart-sticky-nav.css' . "\n";

echo "\nAccess these URLs at:\n";
echo "http://localhost:3001/wp-content/themes/generatepress-child/assets/js/smart-sticky-nav.js\n";
echo "http://localhost:3001/wp-content/themes/generatepress-child/assets/css/smart-sticky-nav.css\n";
?>