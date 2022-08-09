<div class="contact">
    <div class="<?php echo get_field('display_contact_form') == false ? 'contact__container' : 'container'; ?>">
        <!-- Header -->
        <div class="contact__header">
            <?php get_template_part('template-parts/header/header', 'partial', array("title" => get_field('title_contact'))); ?>
        </div>
        <div class="contact__body">
            <!-- left -->
            <div class="contact__content-left">
                <?php if (get_field('display_contact_form')) : ?>
                    <h3 class="font-primary-bold-24 mb-4">Thông tin</h3>
                <?php endif; ?>
                <div class="contact__information contact__information--phone">
                    <a href="<?php echo get_field('phone_number_contact') ? 'tel:' . get_field('phone_number_contact') : '#'; ?>" class="contact__information-wrap">
                        <img class="contact__information-icon contact__information-icon--phone" src="<?php echo get_template_directory_uri() ?>/assets/images/phone.svg" alt="">
                        <span class="contact__information-text"><?php echo get_field('phone_number_contact'); ?></span>
                    </a>
                </div>
                <div class="contact__information contact__information--email">
                    <a href="<?php echo get_field('email_contact') ? 'mailto:' . get_field('email_contact') : '#'; ?>" class="contact__information-wrap">
                        <img class="contact__information-icon" src="<?php echo get_template_directory_uri() ?>/assets/images/mail.svg" alt="">
                        <span class="contact__information-text"><?php echo get_field('email_contact'); ?></span>
                    </a>
                </div>
                <div class="contact__information contact__information--address">
                    <div class="contact__information-wrap">
                        <img class="contact__information-icon" src="<?php echo get_template_directory_uri() ?>/assets/images/map-pin.svg" alt="">
                        <span class="contact__information-text"><?php echo get_field('address_contact'); ?></span>
                    </div>
                </div>
                <div class="contact__information contact__information--coordinate">
                    <?php if (get_field('coordinate_contact')) : ?>
                        <div class="contact__information-map">
                            <iframe src="https://maps.google.com/maps?q=<?php echo get_field('coordinate_contact'); ?>&output=embed" width="600" height="203" frameborder="0" style="border:0"></iframe>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (get_field('display_see_more')) : ?>
                    <div class="contact__see-more">
                        <a class="see-more-btn" href="<?php echo get_field('link_contact') ? get_field('link_contact')['url'] : "#" ?>">Xem thêm</a>
                    </div>
                <?php endif; ?>
            </div>
            <!-- right -->
            <div class="contact__content-right <?php echo get_field('display_contact_form') == false ? 'contact__content-right--logo' : ''; ?>">
                <?php if (get_field('display_contact_form')) : ?>
                    <?php echo do_shortcode(get_field('form_contact')) ?>
                <?php else : ?>
                    <?php
                    /**
                     * Data header top
                     */
                    $site_logo = get_theme_mod('logo');
                    ?>
                    <?php if ($site_logo) : ?>
                        <div class="site-info site-info--contact">
                            <div class="site-info__logo-wrap site-info__logo-wrap--contact mb-3">
                                <div class="site-info__logo site-info__logo--contact">
                                    <img src="<?php echo $site_logo; ?>" alt="Site logo" width="100%" />
                                </div>
                            </div>
                            <div class="site-info__body">
                                <div class="site-info__name site-info__name--contact"><?php echo get_theme_mod("site-name") ?></div>
                                <div class="site-info__short-name site-info__short-name--contact mb-2"><?php echo get_theme_mod("site-short-name") ?></div>
                                <div class="site-info__description site-info__description--contact"><?php echo get_theme_mod("site-description") ?></div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>