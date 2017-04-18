<?php
/**
 * Template Name: photo-gallery
 */
get_header(); ?>
    <div class="mainWrap mainWrap-medium">
        <section class="l-articles row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <h2 class="title-4"><?php the_field('page_title'); ?></h2>
                    <select class="sortArticles-select">
                        <option selected><?php the_field('sort_last'); ?></option>
                        <option><?php the_field('sort_popular'); ?></option>
                    </select>
                </div>
            </div>
            <ul class="articlesList articlesList-detail column small-12 row">
                <?php
                $i = true;
                $photos = array(
                    'numberposts' => 8,
                    'post_type' => 'photos',
                    'posts_per_page' => 8
                );

                $photos = new WP_Query($photos);
                if ($photos->have_posts()) {
                    while ($photos->have_posts()) {
                        $photos->the_post(); ?>
                        <?php if ($i) {
                            $i = false; ?>
                            <li class="columns column-block large-8 small-12 articlesList-medium"><a
                                        class="articlesList-item-banner twoThirds" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg"><img src="<?php the_field('post_image'); ?>"></div>
                                    <p class="title-1 white"><?php the_field('post_title'); ?></p>
                                    <div class="counters">
<!--                                        <div class="counters-item"><i class="icon-user"></i>Автор</div>-->
                                        <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                        <div class="counters-item"><i class="icon-comment"></i>113</div>
                                    </div>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4 articlesList-medium">
                                <a
                                        class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>"><img
                                            class="articlesList-item-img" src="<?php the_field('post_image'); ?>"></a><a
                                        class="title-3"
                                        href="<?php the_field('post_image'); ?>"><?php the_field('post_title'); ?></a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                                <p class="text-p"><?= strip_tags(get_field('post_description')); ?>
                                </p>
                            </li>
                        <?php }
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <div class="column small-12">
                <div class="button-more"><span><?php the_field('load_more_posts'); ?></span><i class="icon-squares"></i>
                </div>
            </div>
        </section>
    </div>
<?php get_footer(); ?>