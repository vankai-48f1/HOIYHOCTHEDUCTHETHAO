<?php
// Setup defaults
$args_defaults = array(
    'class-wrap' => '',
    'slider_name'  => 'slideshow',
);

$args = wp_parse_args($args, $args_defaults);
?>

<?php if (have_rows($args['slider_name'])) : ?>
    <div class="slider-single <?php echo $args['class-wrap'] ?>">
        <?php while (have_rows($args['slider_name'])) : the_row();
            $image = get_sub_field('image');
        ?>
            <div class="slider-single__item">
                <div class="slider-single__image-wrap">
                    <div class="slider-single__image">
                        <?php if ($image) { ?>
                            <img src="<?php echo $image['url']; ?>" alt="slide image" width="100%" />
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>