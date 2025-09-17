<?php
// Test PHP syntax checker
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test including the functions.php file
$functions_file = __DIR__ . '/public_html/wp-content/themes/generatepress-child/functions.php';

if (file_exists($functions_file)) {
    // Check syntax without executing
    $code = file_get_contents($functions_file);
    $tokens = @token_get_all($code);
    
    if ($tokens === false) {
        echo "SYNTAX ERROR in functions.php\n";
    } else {
        echo "functions.php syntax: OK\n";
    }
} else {
    echo "functions.php not found\n";
}

// Check all PHP template files
$template_files = [
    'page-templates/page-custom-home.php',
    'page-resources.php',
    'page-resource-generic.php',
    'page-wcag-guide.php'
];

foreach ($template_files as $template) {
    $file_path = __DIR__ . '/public_html/wp-content/themes/generatepress-child/' . $template;
    if (file_exists($file_path)) {
        $code = file_get_contents($file_path);
        $tokens = @token_get_all($code);
        if ($tokens === false) {
            echo "SYNTAX ERROR in $template\n";
        } else {
            echo "$template syntax: OK\n";
        }
    } else {
        echo "$template: not found\n";
    }
}

echo "\nAll PHP syntax checks completed.\n";