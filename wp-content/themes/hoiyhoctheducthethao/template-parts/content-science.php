<!-- List article -->
<div class="container">
    <div class="row category__row">
        <?php
        $catlist = get_field('navigation_science');
        $cateIdFromUrl = $_GET["cate"];
        if ($catlist) :
            $term_id = $cateIdFromUrl ? $cateIdFromUrl : $catlist[0];
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
                'posts_per_page' => 15,
                'cat' => $term_id,
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
                    // args passed template part
                    $args = array(
                        "cate_link" => get_category_link($term_id),
                        "cate_name" => get_cat_name($term_id),
                    );
        ?>
                    <div class="col-sm-6 col-lg-4 col-12">
                        <?php get_template_part('template-parts/article', 'part', $args); ?>
                    </div>
        <?php endwhile;
                $big = 999999999;
                $html = paginate_links(array(
                    'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'     => '?paged=%#%',
                    'current'    => max(1, $paged),
                    'total'      => $the_query->max_num_pages,
                    'mid_size'   => 1,
                    'prev_text'    => __('<i class="fas fa-chevron-left"></i>'),
                    'next_text'    => __('<i class="fas fa-chevron-right"></i>'),
                ));

                $html = "<div class='pagination-post'>" . $html . "</div>";

                echo $html;
            endif;
            // Reset Post Data
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <!-- < ?php post_pagination() ?> -->
    <!-- Pagination -->
</div>