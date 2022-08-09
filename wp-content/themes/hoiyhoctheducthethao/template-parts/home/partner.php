<div class="hm-partner">
    <div class="container">
        <!-- Header -->
        <div class="hm-partner__header">
            <?php get_template_part('template-parts/header/header', 'partial', array("title" => get_field('title_partner'))); ?>
        </div>
        <ul class="hm-partner__list hm-partner-slider">
            <?php
            if (have_rows('partner')) : while (have_rows('partner')) : the_row();
                    $logo_icon = get_sub_field('image');
                    $link = get_sub_field('link');
                    $logo_icon_img =  $logo_icon ? '<img src="' . $logo_icon['url'] . '" alt="">'  : null;
            ?>
                    <li class="hm-partner__item">
                        <a href="<?php echo $link ? $link['url'] : '#'; ?>">
                            <?php echo $logo_icon_img ?>
                        </a>
                    </li>
            <?php
                endwhile;
            endif;
            ?>
        </ul>
    </div>
</div>