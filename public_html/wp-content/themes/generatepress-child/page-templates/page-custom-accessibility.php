<?php
/*
Template Name: Custom Accessibility Page
*/

get_header(); ?>

<div class="custom-accessibility-page">
    <main role="main" id="main-content">
        <h1><?php the_title(); ?></h1>
        <div class="custom-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>