<?php
/*
Template Name: Blank Custom HTML
*/

// Get WordPress data
$page_title = get_the_title();
$page_content = '';
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $page_content = get_the_content();
    }
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/custom-accessibility.css">
</head>
<body <?php body_class(); ?>>
    
    <a class="skip-link screen-reader-text" href="#main-content">Skip to main content</a>
    
    <header role="banner">
        <nav role="navigation" aria-label="Main navigation">
            <h2 class="screen-reader-text">Main Navigation</h2>
            <!-- Your custom navigation here -->
        </nav>
    </header>
    
    <main role="main" id="main-content" tabindex="-1">
        <h1><?php echo $page_title; ?></h1>
        <div class="content-area">
            <?php echo apply_filters('the_content', $page_content); ?>
        </div>
    </main>
    
    <footer role="contentinfo">
        <!-- Custom footer -->
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>