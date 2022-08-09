<div class="hm-about-us mb-5">
    <div class="container">
        <div class="hm-about-us__main">
            <?php if (have_rows('about_us_home')) :  while (have_rows('about_us_home')) : the_row(); ?>
                    <?php
                    $about_us_title = get_sub_field('title');
                    $about_us_logo = get_sub_field('about_us_logo');
                    $about_us_image = get_sub_field('about_us_image');
                    $about_us_link = get_sub_field('about_us_link');
                    $description = get_sub_field('description');
                    ?>

                    <div class="row justify-content-between">
                        <!-- Content Left -->
                        <div class="col-md-6 col-12">
                            <?php if ($about_us_image) : ?>
                                <div class="hm-about-us__image-area">
                                    <div class="hm-about-us__image-area-square"></div>
                                    <img src="<?php echo $about_us_image['url'] ?>" />
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="hm-about-us__content">
                                <!-- Section header -->
                                <?php get_template_part('template-parts/header/header', 'partial', array("title" => $about_us_title)); ?>
                                <div class="hm-about-us__description font-primary-regular-18"><?php echo $description ?></div>
                                <div class="hm-about-us__link">
                                    <a class="see-more-btn" href="<?php echo $about_us_link ? $about_us_link['url'] : "#" ?>">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hm-about-us__logo-right">
                        <?php echo $about_us_logo; ?>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</div>