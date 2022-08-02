<!-- Blog Post -->
<article class="post-item mg-bt-2">

    <a class="post-item-thumb" href="<?php the_permalink() ?>">
        <?php the_post_thumbnail('blog-thumbnail',  ['class' => 'img-op']) ?>
    </a>

    <div class="post-item-desc">
        <a href="<?php the_permalink() ?>" class="cl-black">
            <h2 class="post-item-title"><?php the_title() ?></h2>
            <div class="post-item-excerpt"><?php the_excerpt() ?></div>
        </a>
        <div class="post-item-link text-muted">
            <a href="<?php the_permalink() ?>" class="mbutton bg-prm cl-white hover-btn-opacity">Read More &rarr;</a>
        </div>
    </div>

</article>