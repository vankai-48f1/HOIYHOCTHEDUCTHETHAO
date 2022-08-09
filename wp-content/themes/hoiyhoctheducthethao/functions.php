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
    register_nav_menu('primary-menu', __('Primary Menu'));
    register_nav_menu('footer-menu', __('Footer Menu'));
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


if (!function_exists('post_pagination')) {
    function post_pagination($paged = '', $max_page = '')
    {
        global $wp_query;

        if (!$paged) {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
        }

        if (!$max_page) {
            global $wp_query;
            $max_page = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
        }

        $big  = 999999999; // need an unlikely integer

        $html = paginate_links(array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'     => '?paged=%#%',
            'current'    => max(1, $paged),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text'    => __('<i class="fas fa-chevron-left"></i>'),
            'next_text'    => __('<i class="fas fa-chevron-right"></i>'),
        ));

        $html = "<div class='pagination-post'>" . $html . "</div>";

        echo $html;
    }
}


// Bài viết mới nhất

function yhoc_get_latest_post($quantity = 5)
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


function yhoc_get_tags_post($quantity = 0)
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


function mget_related_post($count = 6)
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
        'post_status' => 'publish',
        'post_type' => 'post',
        'showposts' => $count,
        'orderby' => 'date',
        'order' => 'DESC',
        'cat'         => $cateIds,
        'exclude'     => $post->ID
    );

    $queryRelatedPost = new WP_Query($args);

    if ($queryRelatedPost->have_posts()) : ?>
        <div class="related-post row category__row">
            <?php while ($queryRelatedPost->have_posts()) : $queryRelatedPost->the_post(); ?>
                <div class="col-sm-6 col-lg-4 col-12">
                    <?php get_template_part('template-parts/article', 'related'); ?>
                </div>
            <?php endwhile; ?>
        </div>
<?php endif;
    wp_reset_postdata();
}


function yhoc_customize_options($wp_customize)
{
    $wp_customize->add_section(
        'site-logo',
        array(
            'title' => 'Site Logo',
            'description' => 'Fields information for site logo',
            'priority' => 25
        )
    );

    $wp_customize->add_setting('logo', array('default' => ''));
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'logo', array(
            'label' => 'Logo',
            'section' => 'site-logo',
            'settings' => 'logo'
        ))
    );

    $wp_customize->add_setting('site-name', array('default' => ''));
    $wp_customize->add_control('site-name', array(
        'label' => 'Name',
        'section' => 'site-logo',
        'type' => 'text',
        'settings' => 'site-name'
    ));

    $wp_customize->add_setting('site-short-name', array('default' => ''));
    $wp_customize->add_control('site-short-name', array(
        'label' => 'Short Name',
        'section' => 'site-logo',
        'type' => 'text',
        'settings' => 'site-short-name'
    ));

    $wp_customize->add_setting('site-description', array('default' => ''));
    $wp_customize->add_control('Facebook', array(
        'label' => 'Description',
        'section' => 'site-logo',
        'type' => 'textarea',
        'settings' => 'site-description'
    ));
}
add_action('customize_register', 'yhoc_customize_options');

if (function_exists('acf_add_options_page')) {
    /**
     * Add Option ACF
     */
    acf_add_options_page(
        array(
            'page_title'    => __('Theme Options'),
            'icon_url'      => 'dashicons-admin-generic',
        )
    );
}


// Remove last breadcrum in single page
add_filter('wpseo_breadcrumb_single_link_info', 'remove_post_title_wpseo_breadcrumb', 10, 3);
function remove_post_title_wpseo_breadcrumb($link_info, $index, $crumbs)
{
    if (is_single()) {
        if (is_singular() && isset($link_info['id']))
            return [];
        return $link_info;
    }
    return $link_info;
}
