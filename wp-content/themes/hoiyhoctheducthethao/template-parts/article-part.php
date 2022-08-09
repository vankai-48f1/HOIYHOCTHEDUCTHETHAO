<article class="article-item">
    <div class="article-item__wrapper">
        <a href="<?php the_permalink() ?>" class="article-item__thumb">
            <?php the_post_thumbnail('blog-thumbnail',  ['class' => 'img-absolute-option']) ?>
        </a>
        <a href="<?php echo $args["cate_link"] ? $args["cate_link"] : get_category_link(get_queried_object()->term_id) ?>" class="article-item__category"><?php echo $args["cate_name"] ? $args["cate_name"] : get_queried_object()->name; ?></a>
        <a href="<?php the_permalink() ?>" class="article-item__content">
            <h2 class="article-item__title font-primary-semiBold-16 cl-black mb-3"><?php the_title() ?></h2>
            <div class="article-item__excerpt font-primary-regular-14 mb-3"><?php the_excerpt() ?></div>
            <div class="article-item__date-create font-primary-regular-14"><?php echo get_the_date('d/m/Y') ?></div>
        </a>
    </div>
</article>