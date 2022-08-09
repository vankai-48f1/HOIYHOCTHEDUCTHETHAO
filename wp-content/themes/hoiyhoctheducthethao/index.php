<?php
/*
Template Name: Home
*/
?>

<?php get_header() ?>
<!-- Page Content -->
<?php if (have_posts()) : ?>
    <main class="hm-page">
        <?php while (have_posts()) : the_post(); ?>
            <!-- Intro -->
            <?php
            $intro = get_field('intro_home');
            $args_intro = array(
                'class-wrap' => 'arrow-style-primary',
                'slider_name'  => 'slider_home',
            )
            ?>
            <div class="hm-intro">
                <!-- slider -->
                <?php get_template_part('template-parts/slider/slider', 'single', $args_intro); ?>
                <div class="hm-intro__polygon">
                    <div class="hm-intro__polygon-white"></div>
                    <div class="hm-intro__polygon-green-light"></div>
                    <div class="hm-intro__polygon-green-dark"></div>
                </div>
            </div>

            <!-- About us -->
            <?php get_template_part('template-parts/home/about', 'us'); ?>

            <!-- Information - Event -->
            <?php get_template_part('template-parts/home/info', 'event'); ?>

            <!-- Science -->
            <?php get_template_part('template-parts/home/science'); ?>

            <!-- Partner -->
            <?php get_template_part('template-parts/home/partner'); ?>

            <!-- Contact -->
            <?php get_template_part('template-parts/content', 'contact'); ?>

        <?php endwhile; ?>
    </main>
<?php endif; ?>
<!-- /.container -->
<?php get_footer() ?>