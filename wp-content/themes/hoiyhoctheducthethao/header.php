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


    <link href="<?php echo get_template_directory_uri() ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/mdefine.css" rel="stylesheet"> <!-- My custom CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/style.css" rel="stylesheet"> <!-- Style CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/responsive.css" rel="stylesheet"> <!-- Responsive CSS -->
    <link href="<?php echo get_template_directory_uri() ?>/vendor/Font-Awesome/css/font-awesome.min.css" rel="stylesheet"> <!-- font-awesome 4.7 CSS -->

    <!-- slick -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/vendor/slick/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/vendor/slick/slick-theme.css">

    <?php wp_head() ?>
</head>

<body>

    <!-- Navigation -->