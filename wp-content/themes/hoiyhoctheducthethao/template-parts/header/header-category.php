<div class="category-hd">
    <div class="container">
        <div class="category-hd__inner">
            <?php
            $catlist = get_field('navigation_science');
            $cateParamUrl = $_GET["cate"];
            ?>
            <div class="category-hd__title <?php echo !$catlist ? 'category-hd__title-without-list' : '' ?>">
                <h1 class="font-primary-bold-40"><?php echo get_field('navigation_science') ? get_the_title() : single_cat_title() ?><span class="header-partial__icon"></span></h1>
            </div>

            <?php
            if ($catlist) {
            ?>
                <div class="subcat-list">
                    <ul>
                        <?php foreach ($catlist as $cateId) { ?>
                            <?php $current_class = !$cateParamUrl && $catlist[0] == $cateId ? "current-cate" : ''; ?>
                            <li class="<?php echo $cateParamUrl == $cateId ? "current-cate" : $current_class ?>">
                                <a href="<?php echo get_query_var('paged') < 2 ? "?cate=" . $cateId : esc_url(get_pagenum_link(1)); ?>"><?php echo get_cat_name($cateId) ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php }
            // var_dump(get_query_var('paged'));
            ?>
        </div>
    </div>
</div>