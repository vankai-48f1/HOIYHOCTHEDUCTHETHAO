<?php get_header() ?>
<!-- Page Content -->
<div class="container">

    <div class="my-4 page-header">
        <h1 class="font-primary-bold-40 text-upper">Tác giả:&ensp;<small><?php the_author() ?></small><span class="header-partial__icon"></span></h1>
    </div>
    <div class="row category__row">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <div class="col-sm-6 col-lg-4 col-12">
                    <?php get_template_part('template-parts/article', 'part'); ?>
                </div>

            <?php endwhile; ?>

        <?php endif; ?>
        <!-- Pagination -->
        <?php post_pagination() ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php get_footer() ?>