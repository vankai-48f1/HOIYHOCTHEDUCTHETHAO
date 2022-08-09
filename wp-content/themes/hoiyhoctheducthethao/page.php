<?php get_header() ?>
<!-- Page Content -->
<div class="container">

    <!-- Header -->
    <div class="page__header">
        <?php get_template_part('template-parts/header/header', 'partial', get_the_title()); ?>
    </div>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/content-page', get_post_format()); ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

        <!-- < ?php get_sidebar() ?> -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php get_footer() ?>