<?php

/**
 * Template Name: Kiến thức
 */
get_header() ?>
<!-- Page Content -->
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        <div class="page-science">
            <!-- Header -->
            <?php get_template_part('template-parts/header/header', 'category'); ?>
            <!-- Content -->
            <?php get_template_part('template-parts/content', 'science'); ?>
        </div>
    <?php endwhile; ?>

<?php endif; ?>
<!-- /.container -->
<?php get_footer() ?>