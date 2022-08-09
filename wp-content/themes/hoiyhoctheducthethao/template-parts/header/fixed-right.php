<div class="hd-fixed-right">
    <div class="hd-fixed-right__inner">
        <!-- Input Search -->
        <div class="hd-fixed-right__search">
            <?php get_template_part('template-parts/form', 'search'); ?>
        </div>

        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary-menu',
                'depth'  => 2,
                'container'  => 'nav',
                'container_class'      => 'primary-menu-fixed',
                'menu_class'  => 'hd-fixed-right__menu header-nav__menu-primary',
            )
        );
        ?>
        <!-- Btn Close -->
        <div class="hd-fixed-right__close">
            <button class="hd-fixed-right__close-btn"><i class="far fa-times"></i></button>
        </div>
    </div>
</div>