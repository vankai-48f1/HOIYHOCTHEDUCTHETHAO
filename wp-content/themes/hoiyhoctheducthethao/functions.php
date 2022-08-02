<?php

// Thêm ảnh đại diện
add_theme_support('post-thumbnails');

// Ảnh này sẽ hiện ở ngoài blog
add_image_size('blog-thumbnail', 700, 350, true);

// Ảnh này sẽ hiện ở trong post
add_image_size('post-large', 900, 600, true);

add_image_size('post-small', 250, 200, true);


// Khai báo menu
function register_my_menu()
{
    register_nav_menu('main-menu', __('Main Menu')); // đặt tên là Header Menu
}
add_action('init', 'register_my_menu');

// Khai báo sidebar
function mtem_blog_widgets_init()
{
    register_sidebar(array(
        'name'            => __('Sidebar', 'sidebar'),
        'id'             => 'sidebar',
        'description'     => __('Sidebar')
    ));
}
add_action('widgets_init', 'mtem_blog_widgets_init');


// Tạo related posts 
function mtem_blog_related_post($title = 'Bài viết liên quan', $count = 5)
{

    global $post;
    $tag_ids = array();
    $current_cat = get_the_category($post->ID);
    $current_cat = $current_cat[0]->cat_ID;
    $this_cat = '';
    $tags = get_the_tags($post->ID);
    if ($tags) {
        foreach ($tags as $tag) {
            $tag_ids[] = $tag->term_id;
        }
    } else {
        $this_cat = $current_cat;
    }

    $args = array(
        'post_type'   => get_post_type(),
        'numberposts' => $count,
        'orderby'     => 'rand',
        'tag__in'     => $tag_ids,
        'cat'         => $this_cat,
        'exclude'     => $post->ID
    );
    $related_posts = get_posts($args);

    if (empty($related_posts)) {
        $args['tag__in'] = '';
        $args['cat'] = $current_cat;
        $related_posts = get_posts($args);
    }
    if (empty($related_posts)) {
        return;
    }
    $post_list = '';
    foreach ($related_posts as $related) {

        $post_list .= '<div class="media mb-4 ">';
        $post_list .= '<img class="mr-3 img-thumbnail" style="width: 150px" src="' . get_the_post_thumbnail_url($related->ID, 'post-small') . '" alt="Generic placeholder image">';
        $post_list .= '<div class="media-body align-self-center">';
        $post_list .= '<h5 class="mt-0"><a href="' . get_permalink($related->ID) . '">' . $related->post_title . '</a></h5>';
        $post_list .= get_the_category($related->ID)[0]->cat_name;

        $post_list .= '</div>';
        $post_list .= '</div>';
    }

    return sprintf('
			<div class="card my-4">
				<h4 class="card-header">%s</h4>
				<div class="card-body">%s</div>
			</div>
		', $title, $post_list);
}


if (!function_exists('mtem_pagination')) {
    function mtem_pagination()
    {
        if (paginate_links() != '') { ?>
            <div class="pagination-post">
                <?php
                global $wp_query;
                $big = 999999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'prev_text'    => __('<i class="far fa-chevron-double-left"></i>'),
                    'next_text'    => __('<i class="far fa-chevron-double-right"></i>'),
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages
                ));
                ?>
            </div>
        <?php }
    }
}


// Bài viết mới nhất

function mtem_get_latest_post($quantity = 5)
{
    global $post;

    $latest = array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'showposts' => $quantity,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $queryLatest = new WP_Query($latest);

    if ($queryLatest->have_posts()) :
        echo '<div class="latest-post">';
        while ($queryLatest->have_posts()) : $queryLatest->the_post();
            echo '<div class="latest-post__block">
                        <div class="latest-post__thumb">' . get_the_post_thumbnail() . '</div>
                        <div class="latest-post__content">
                            <h5 class="latest-post__title">' . get_the_title() . '</h5>
                            <div class="latest-post__date">' . get_the_date('F j, Y') . '</div>
                        </div>
                    </div>';
        endwhile;
        echo '</div>';
    endif;
    wp_reset_postdata();
}


// tags


function mtem_get_tags_post($quantity = 0)
{
    $args_tags = array(
        'type'      => 'post',
        'orderby'   => 'date',
        'order'     => 'DESC',
        'number'    => $quantity ? $quantity : null,
        'child_of'  => 0,
        'taxonomy'  => 'post_tag',
        'hide_empty' => 0
    );
    $tags_list = get_categories($args_tags);

    echo '<ul class="tags-post">';
    foreach ($tags_list as $tags) : ?>
        <li>
            <a class="hover-red" href="<?php echo $tags->slug; ?>">
                <?php echo $tags->name; ?>
            </a>
        </li>
    <?php endforeach;
    echo '</ul>';
}


function mtem_get_related_random_post($count = 6)
{
    global $post;
    $postcat = get_the_category($post->ID);
    $cateIds = array();

    if (!empty($postcat)) {
        foreach ($postcat  as $cate) {
            array_push($cateIds, $cate->cat_ID);
        }
    }

    $args = array(
        'post_type'   => get_post_type(),
        'showposts' => $count,
        'orderby'     => 'rand',
        'cat'         => 3,
        'exclude'     => $post->ID
    );

    $queryRelatedPost = new WP_Query($args);

    if ($queryRelatedPost->have_posts()) : ?>
        <div class="related-post">
            <?php while ($queryRelatedPost->have_posts()) : $queryRelatedPost->the_post(); ?>
                <div class="related-post__itemt">
                    <div class="related-post__thumb">
                        <a href="<?php echo get_the_permalink() ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                        <h3 class="related-post__title"><?php the_title() ?></h3>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
<?php endif;
    wp_reset_postdata();
}


function mtem_logo_web($wp_customize)
{
    $wp_customize->add_section(
        'logo',
        array(
            'title' => 'Logo',
            'description' => 'logo',
            'priority' => 25
        )
    );

    $wp_customize->add_setting('Logo', array('default' => ''));
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'Logo', array(
            'label' => 'Logo',
            'section' => 'logo',
            'settings' => 'Logo'
        ))
    );
}
add_action('customize_register', 'mtem_logo_web');