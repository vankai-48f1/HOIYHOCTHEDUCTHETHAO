<?php

/**
 * Template Name: Contact
 */
get_header();
?>
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <div class="page-contact">
            <!-- Contact partial -->
            <?php get_template_part('template-parts/content', 'contact') ?>
        </div>
    <?php endwhile; ?>

<?php endif; ?>
<?php get_footer(); ?>