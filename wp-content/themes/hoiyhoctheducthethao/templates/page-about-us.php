<?php

/**
 * Template Name: About Us
 */
get_header();
?>
<?php if (have_posts()) : ?>
    <div class="page-about">
        <?php while (have_posts()) : the_post(); ?>

            <div class="container">
                <div class="post__breadcrumb">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
                    }
                    ?>
                </div>

                <!-- Intro -->
                <?php $intro_about = get_field('intro_about') ?>
                <div class="about-intro mb-4">
                    <div class="row">
                        <div class="col-lg-6 col-12 about-intro__col-left">
                            <div class="about-intro__left">
                                <div class="about-intro__content post-body">
                                    <h2><?php echo $intro_about['title']; ?></h2>
                                    <div class="about-intro__description"><?php echo $intro_about['description']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 about-intro__col-right">
                            <div class="about-intro__right">
                                <?php if ($intro_about['image']) : ?>
                                    <div class="about-intro__image">
                                        <img src="<?php echo $intro_about['image']['url']; ?>" />
                                    </div>
                                    <h2 class="about-intro__big-title">HSMA</h2>
                                <?php endif; ?>
                                <div class="about-intro__rectangle"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="page-about__body post-body">
                    <div class="page-about__main">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>