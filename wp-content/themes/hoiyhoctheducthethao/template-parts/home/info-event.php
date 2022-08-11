<div class="hm-info-event mb-5">
    <div class="container">
        <div class="hm-info-event__main">
            <!-- header -->
            <div class="hm-session-header">
                <div class="hm-info-event__header">
                    <?php get_template_part('template-parts/header/header', 'partial', array("title" => get_field('title_info_event'))); ?>
                </div>
                <!-- See more -->
                <div class="hm-info-event__link">
                    <a class="see-more-btn" href="<?php echo get_field('link_info_event') ? get_field('link_info_event')['url'] : "#" ?>">Xem thêm</a>
                </div>
            </div>
            <!-- List article -->
            <div class="hm-info-event__articles">
                <?php
                $category_info_event = get_field('category_info_event');
                if ($category_info_event) :
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'showposts' => 4,
                        'cat' => $category_info_event,
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                            <article class="article-infor-event mb-4">
                                <a href="<?php the_permalink() ?>" class="article-infor-event__wrapper">
                                    <div class="article-infor-event__thumb">
                                        <?php the_post_thumbnail('blog-thumbnail',  ['class' => 'img-absolute-option']) ?>
                                    </div>
                                    <div class="article-infor-event__content">
                                        <h2 class="article-infor-event__title font-primary-semiBold-16"><?php the_title() ?></h2>
                                        <div class="article-infor-event__description">
                                            <h2 class="font-primary-semiBold-16 mb-2"><?php the_title() ?></h2>
                                            <div class="article-infor-event__excerpt font-primary-regular-14"><?php the_excerpt() ?></div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                <?php endwhile;
                    endif;
                    // Reset Post Data
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
</div>