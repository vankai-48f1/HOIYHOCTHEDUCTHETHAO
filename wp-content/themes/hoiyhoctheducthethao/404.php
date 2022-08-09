<?php get_header() ?>
<!-- Page Content -->
<div class="page-404">
    <div class="container page-404__container pss-relative">
        <div class="page-404__content">
            <h1 class="page-404__number">404</h1>
            <h3 class="page-404__status">OOPS</h3>
            <div class="page-404__description">The page you requested could not be found...</div>
            <a href="<?php echo home_url() ?>" class="page-404__btn-back-home see-more-btn">BACK TO HOME</a>
        </div>
    </div>
    <div class="page-404__image">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/404.png" alt="">
    </div>
</div>
<!-- /.container -->
<?php get_footer() ?>