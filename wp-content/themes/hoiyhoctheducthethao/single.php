<?php get_header() ?>
<!-- Page Content -->
<div class="container">
    <div class="post__breadcrumb">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
        }
        ?>
    </div>
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content-single', get_post_format()); ?>

        <?php endwhile; ?>

    <?php endif; ?>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php get_footer() ?>