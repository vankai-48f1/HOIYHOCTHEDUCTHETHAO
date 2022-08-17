<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Title -->
    <h1 class="font-primary-bold-40 mb-4"><?php the_title() ?></h1>

    <div class="post-lead">
        <!-- Author -->
        <!-- <div class="post-author">
            < ?php $avatar_url = get_avatar_url(get_the_author_meta('ID'), array('size' => 450)); ?>
            <a href="< ?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <div class="author-picture" style="background-image: url('< ?php echo esc_url($avatar_url); ?>')"></div>
            </a>
            Date/Time
            <div class="post-author-info">
                <div class="post-author-name">
                    < ?php the_author_posts_link() ?>
                </div>
                <div class="post-date">< ?php echo get_the_date('d/m/Y') ?></div>
            </div>
        </div> -->
        <!-- Share -->
        <div class="post-share">
            <div class="post-date"><strong style="color: #000;">Ngày đăng:</strong> <?php echo get_the_date('d/m/Y') ?>&ensp;</div>
            <div class="post-share-main"><i class="far fa-share-alt"></i>&ensp;Share</div>
        </div>
    </div>
    <!-- Post Content -->
    <div class="post-body post-body-single">
        <?php the_content() ?>
    </div>

    <?php if (has_tag()) : ?>
        <!-- Tags -->
        <hr>
        <div class="post-tags">
            <?php the_tags('', '') ?>
        </div>
    <?php endif; ?>

    <!-- Related Post -->
    <hr>
    <div class="post-relative">
        <div class="post-relative-hd">
            <h2 class="font-primary-bold-40 text-upper cl-black d-flex">Bạn Có thể quan tâm<span class="header-partial__icon"></span></h2>
        </div>
        <?php mget_related_post() ?>
    </div>
</article>