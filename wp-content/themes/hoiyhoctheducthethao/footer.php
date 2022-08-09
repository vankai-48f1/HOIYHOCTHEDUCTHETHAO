<!-- Footer -->

<!-- Hiden is page 404 -->
<?php if (!is_404()) : ?>
    <footer class="footer">
        <div class="container">
            <!-- Footer Column -->
            <div class="footer__top-row row">

                <div class="col-md-4 col-12 mb-4">
                    <div class="footer__column-section">
                        <?php
                        /**
                         * Data site
                         */
                        $site_logo = get_theme_mod('logo');
                        ?>
                        <?php if ($site_logo) : ?>
                            <div class="site-info site-info-footer header-logo__link">
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
                            </div>
                            <div class="footer__slogan"><?php echo get_field('slogan', 'option') ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-4 col-12 mb-4">
                    <div class="footer__column-section">
                        <h3 class="font-primary-semiBold-14 cl-white">Danh mục:</h3>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'footer-menu',
                                'depth'  => 3,
                                'container'  => '',
                                'container_class'      => 'footer-menu',
                                'menu_class'  => 'footer__nav-menu',
                            )
                        );
                        ?>
                    </div>
                </div>

                <div class="col-md-4 col-12 mb-4">
                    <div class="footer__column-section footer__column-section--social">
                        <h3 class="font-primary-semiBold-14 cl-white">Theo dõi chúng tôi:</h3>
                        <ul class="footer__social">
                            <?php
                            $social = get_field('social', 'option');
                            ?>
                            <?php if ($social['facebook']) : ?>
                                <li><a href="<?php echo $social['facebook'] ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/Facebook.png" alt=""></a></li>
                            <?php endif; ?>
                            <?php if ($social['google_plus']) : ?>
                                <li><a href="<?php echo $social['google_plus'] ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/Google Plus.png" alt=""></a></li>
                            <?php endif; ?>
                            <?php if ($social['youtube']) : ?>
                                <li><a href="<?php echo $social['youtube'] ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/YouTube.png" alt=""></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="footer__copyright text-center">
                <span><?php echo get_field("copyright", "option") ?></span>
            </div>
        </div>
        <!-- /.container -->
    </footer>

    <!-- backtotop -->
    <div class="backtotop-btn" id="backtotop-btn">
        <div class="backtotop-icon"></div>
    </div>
    <!-- Shadow backdrop -->
    <div class="body-backdrop"></div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo get_template_directory_uri() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/vendor/slick/slick.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/main.js"></script>
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/slider.js"></script>
    <?php wp_footer() ?>
<?php endif; ?>
</body>

</html>