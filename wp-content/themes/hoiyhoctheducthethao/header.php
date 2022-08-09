<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php if (is_front_page()) : ?>
            <?php bloginfo('name') ?>
        <?php elseif (is_single()) : ?>
            <?php echo wp_title('', true, ''); ?>
        <?php else : ?>
            <?php echo wp_title('', true, ''); ?>
        <?php endif ?>
    </title>


    <link href="<?php echo get_template_directory_uri() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/commons.css" rel="stylesheet"> <!-- My custom CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/style.css" rel="stylesheet"> <!-- Style CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/responsive.css" rel="stylesheet"> <!-- Responsive CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/vendor/fontawesome-5.15.3/css/all.min.css" rel="stylesheet"> <!-- font-awesome 5.15.3 CSS -->

    <!-- slick -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendor/slick/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/vendor/slick/slick-theme.css">

    <?php wp_head() ?>
</head>

<body>

    <header>
        <div class="header-main">
            <div class="container">
                <div class="header-top">
                    <div class="header-top__row">
                        <?php
                        /**
                         * Data header top
                         */
                        $site_logo = get_theme_mod('logo');
                        ?>
                        <div class="header-top__left">
                            <div class="header-top__left-inner cl-white">
                                <?php if ($site_logo) : ?>
                                    <a href="<?php echo home_url() ?>" class="site-info header-logo__link">
                                        <div class="site-info__logo-wrap">
                                            <div class="site-info__logo">
                                                <img src="<?php echo $site_logo; ?>" alt="Site logo" width="100%" />
                                            </div>
                                        </div>
                                        <div class="site-info__body">
                                            <div class="site-info__name"><?php echo get_theme_mod("site-name") ?></div>
                                            <div class="site-info__short-name"><?php echo get_theme_mod("site-short-name") ?></div>
                                            <div class="site-info__description"><?php echo get_theme_mod("site-description") ?></div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Hiden is page 404 -->
                        <?php if (!is_404()) : ?>
                            <div class="header-top__right">
                                <div class="header-top__right-inner">
                                    <button class="hd-user-btn"><img src="<?php echo get_template_directory_uri() ?>/assets/images/user.svg" alt=""></button>
                                    <button class="hd-hamburger-btn hd-hamburger-btn--style"><img src="<?php echo get_template_directory_uri() ?>/assets/images/hamburger.png" alt=""></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Hiden is page 404 -->
            <?php if (!is_404()) : ?>
                <div class="header-nav-area bg-prm">
                    <div class="container">
                        <div class="header-nav">
                            <div class="header-nav__menu-wrap">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'primary-menu',
                                        'depth'  => 3,
                                        'container'  => 'nav',
                                        'container_class'      => 'primary-menu-container',
                                        'menu_class'  => 'header-nav__menu header-nav__menu-primary',
                                    )
                                );
                                ?>
                            </div>
                            <div class="hd-search-btn">
                                <button class="hd-search-btn__icon hd-hamburger-btn">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/search.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- Header fixed right partial-->
        <?php get_template_part("template-parts/header/fixed", "right") ?>
    </header>