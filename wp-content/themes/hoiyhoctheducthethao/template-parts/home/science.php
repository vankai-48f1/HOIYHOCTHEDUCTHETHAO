<div class="hm-science">
    <div class="container">
        <!-- Header -->
        <div class="hm-session-header">
            <div class="hm-science__header">
                <?php get_template_part('template-parts/header/header', 'partial', array("title" => get_field('title_science'))); ?>
            </div>
            <!-- See more -->
            <div class="hm-science__link">
                <a class="see-more-btn" href="<?php echo get_field('link_science') ? get_field('link_science')['url'] : "#" ?>">Xem thêm</a>
            </div>
        </div>
        
        <?php
        $terms = get_field('category_popular');
        if ($terms) : ?>
            <div class="row">
                <?php foreach ($terms as $term) : ?>
                    <div class="col-md-4 col-12 mb-4 hm-science__col">
                        <?php
                        $args = array(
                            'post_status' => 'publish',
                            'post_type' => 'post',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'showposts' => 3,
                            'cat' => $term,
                        );
                        $i = 0;
                        $the_query = new WP_Query($args);
                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();
                                $i++;
                        ?>
                                <article class="article-science">
                                    <div class="article-science__wrapper cl-black">
                                        <a href="<?php the_permalink() ?>" class="article-science__thumb cl-black">
                                            <?php the_post_thumbnail('blog-thumbnail',  ['class' => 'img-absolute-option']) ?>
                                        </a>
                                        <?php if ($i === 1) : ?>
                                            <a href="<?php echo get_category_link($term) ?>" class="article-science__cate"><?php echo get_cat_name($term); ?></a>
                                        <?php endif; ?>
                                        <div class="article-science__content">
                                            <a href="<?php the_permalink() ?>" class="cl-black">
                                                <h3 class="article-science__title <?php echo $i != 1 ? "font-primary-semiBold-14" : ""; ?>"><?php the_title() ?></h3>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                        <?php endwhile;
                        endif;
                        // Reset Post Data
                        wp_reset_postdata(); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>