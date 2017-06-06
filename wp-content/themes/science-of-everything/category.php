<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium">
        <section class="l-articles row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <h2 class="title-4"><?php single_cat_title(); ?></h2>
                    <select class="sortArticles-select">
                        <option selected><?php the_field('sort_last', 'option'); ?></option>
                        <option><?php the_field('sort_popular', 'option'); ?></option>
                    </select>
                </div>
            </div>
            <ul class="articlesList column small-12 row">
                <?php
                $i = 0;
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        if (($i != 1) && ($i != 8)) {
                            ?>
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4">
                                <a class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>">
                                    <img class="articlesList-item-img" src="<?= get_the_post_thumbnail_url(); ?>">
                                </a>
                                <p class="category-text category-text-technology"><?php single_cat_title(); ?></p>
                                <a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <p class="text-p"><?= get_the_excerpt(); ?></p>
                            </li>
                        <?php } else {
                            ?>
                            <li class="columns column-block medium-6 small-12 large-4">
                                <a class="articlesList-item-banner" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg">
                                        <img src="<?= get_the_post_thumbnail_url(); ?>">
                                    </div>
                                    <div class="category category-technology"><?php single_cat_title(); ?></div>
                                    <p class="title-3 white"><?php the_title(); ?></p>
                                    <div class="counters">
                                        <div class="counters-item"><i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                        <div class="counters-item"><i class="icon-comment"></i>113</div>
                                    </div>
                                </a>
                            </li>
                        <?php }
                        $i++;
                    }
                }
                ?>
            </ul>
            <div class="column small-12">
                <div class="button-more"><span>СМОТРЕТЬ БОЛЬШЕ</span><i class="icon-squares"></i></div>
            </div>
        </section>
    </div>
<style>
    .articlesList-item-bg img {
        height: 100%;
    }
</style>
<?php get_footer(); ?>