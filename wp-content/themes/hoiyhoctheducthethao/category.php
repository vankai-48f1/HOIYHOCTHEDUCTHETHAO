<?php get_header() ?>
<!-- Page Content -->
<div class="category">
    <!-- Header -->
    <?php get_template_part('template-parts/header/header', 'category'); ?>
    <!-- List article -->
    <div class="container">
        <div class="row category__row">
            <?php
            $category = get_queried_object();
            if ($category) :
                $args = array(
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    // 'showposts' => -1,
                    'posts_per_page' => -1,
                    'cat' => $category->term_id,
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                        <div class="col-sm-6 col-lg-4 col-12">
                            <?php get_template_part('template-parts/article', 'part'); ?>
                        </div>
            <?php endwhile;
                endif;
                // Reset Post Data
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <!-- Pagination -->
        <?php post_pagination() ?>
    </div>
</div>
<!-- /.container -->
<?php get_footer() ?>