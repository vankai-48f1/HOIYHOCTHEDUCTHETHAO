<?php get_header() ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-2 mb-4 page-header">
                Tìm kiếm:
                <small><?php the_search_query(); ?></small>
            </h1>

            <?php if (have_posts()) : ?>
                <div class="row category__row">
                    <?php while (have_posts()) : the_post(); ?>

                        <div class="col-sm-6 col-lg-4 col-12">
                            <?php get_template_part('template-parts/article', 'part'); ?>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php else : ?>

                <p>
                    Không có bài viết nào phù hợp với từ khóa: <strong><?php the_search_query(); ?></strong>
                </p>

                <?php get_template_part('template-parts/form', 'search'); ?>


            <?php endif; ?>

            <!-- Pagination -->
            <?php mtem_pagination() ?>

        </div>

        <?php get_sidebar() ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php get_footer() ?>