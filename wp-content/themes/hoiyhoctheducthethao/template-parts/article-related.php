<article class="article-item">
    <div class="article-item__wrapper">
        <a href="<?php the_permalink() ?>" class="article-item__thumb">
            <?php the_post_thumbnail('blog-thumbnail',  ['class' => 'img-absolute-option']) ?>
        </a>
        <div href="<?php the_permalink() ?>" class="article-item__content">
            <h2 class="article-item__title font-primary-semiBold-16 cl-black mb-3"><?php the_title() ?></h2>
            <div class="article-item__date-create article-item__date-create--related font-primary-regular-14">
                <a href="<?php the_permalink() ?>">
                    <?php echo get_the_date('d/m/Y') ?>
                </a>
                <span class="seperate"><i class="fas fa-circle"></i></span>
                <!-- Categories  -->
                <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a>
            </div>
        </div>
    </div>
</article>