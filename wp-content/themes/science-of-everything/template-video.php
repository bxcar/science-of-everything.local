<?php
/**
 * Template Name: video
 */
get_header(); ?>
    <div class="mainWrap mainWrap-medium">
        <section class="l-articles row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <h2 class="title-4"><?php the_field('page_title'); ?></h2>
                    <select class="sortArticles-select">
                        <?php
                        if (!isset($_GET['sort']) || ($_GET['sort'] == 'date')) { ?>
                            <option selected
                                    value="<?= get_permalink(); ?>?sort=date"><?php the_field('sort_last'); ?></option>
                            <option value="<?= get_permalink(); ?>?sort=popular"><?php the_field('sort_popular'); ?></option>
                        <?php } else { ?>
                            <option value="<?= get_permalink(); ?>?sort=date"><?php the_field('sort_last'); ?></option>
                            <option selected
                                    value="<?= get_permalink(); ?>?sort=popular"><?php the_field('sort_popular'); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <ul class="articlesList-compact articlesList-detail column small-12 row">
                <?php
                $i = 0;
                $sort = '';
                $orderby = '';
                $meta_key = '';
                if (!isset($_GET['sort']) || ($_GET['sort'] == 'date')) {
                    $orderby = 'date';
                    $meta_key = '';
                } else {
                    $orderby = 'meta_value_num';
                    $meta_key = 'views';
                }

                $photos = array(
                    'numberposts' => 10,
                    'post_type' => 'videos',
                    'posts_per_page' => 10,
                    'orderby' => $orderby,
                    'meta_key' => $meta_key,
                    'order' => 'DESC',
                );

                $photos = new WP_Query($photos);
                if ($photos->have_posts()) {
                    while ($photos->have_posts()) {
                        $photos->the_post(); ?>
                        <?php if ($i >= 2 && $i <= 7) { ?>
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4 articlesList-medium-plus">
                                <a class="articlesList-item-img-wrap articlesList-item-video"
                                   href="<?php the_permalink(); ?>"><!--
                                --><img class="articlesList-item-img" src="https://img.youtube.com/vi/<?php
                                    the_field('video_id'); ?>/0.jpg"></a><!--
                                    --><a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <div class="counters">
                                    <div class="counters-item"><i
                                                class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                </div>
                                <p class="text-p"><?= strip_tags(get_field('description')); ?>
                                </p>
                            </li>
                        <?php } else { ?>
                            <li class="columns column-block large-6 medium-12 small-12"><!--
                            --><a class="articlesList-item-banner center" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg"><!--
                                    --><img style="top: -60px;" src="https://img.youtube.com/vi/<?php
                                        the_field('video_id'); ?>/0.jpg"></div>
                                    <p class="title-3 white"><?php the_title(); ?></p>
                                    <div class="counters">
                                        <div class="counters-item"><i
                                                    class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                        <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                    </div>
                                </a>
                            </li>
                        <?php }
                        $i++;
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <div class="column small-12">
                <?php if ($_GET['sort'] == 'popular') {
                    echo do_shortcode('[ajax_load_more post_type="videos" meta_key="views" orderby="meta_value_num" order="DESC" posts_per_page="10" offset="10" pause="true" scroll="false" button_label="' . get_field('load_more_posts') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
                } else {
                    echo do_shortcode('[ajax_load_more post_type="videos" posts_per_page="10" offset="10" pause="true" scroll="false" button_label="' . get_field('load_more_posts') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
                } ?>
            </div>
        </section>
    </div>
    <style>
        li.columns.column-block.large-6.medium-12.small-12 .articlesList-item-banner.center {
            max-width: 480px;
            max-height: 250px;
            margin-left: auto;
            margin-right: auto;
        }

        .articlesList-detail .articlesList-item-img-wrap {
            height: 150px;
        }

        .articlesList-item-img {
            margin-top: -40px;
        }

        .articlesList-medium-plus.articlesList-item-text {
            height: 380px;
        }

        @media print, screen and (min-width: 64em) {
            .large-4 {
                max-width: 28%;
                margin-left: auto;
                margin-right: auto;
            }

            .alm-reveal .large-4 {
                max-width: 33.3333333333333%;
            }
        }

        .alm-reveal li.articlesList-item-text.columns.column-block.medium-6.small-12.large-4.articlesList-medium-plus {
            float: left;
        }

        .articlesList-item-text.columns.column-block.medium-6.small-12.large-4.articlesList-medium {
            display: inline-block;
        }

        .ajax-load-more-wrap {
            width: 100%;
            padding-right: 0.9375rem;
            padding-left: 0.9375rem;
        }

        .button-more .button-more {
            margin-top: 0;
        }

    </style>
    <script>
        jQuery(document).ready(function () {
            jQuery('div.alm-btn-wrap').addClass('button-more');
            jQuery('div.alm-btn-wrap button').html('<span>Смотреть больше</span><i class=\'icon-squares\'></i>');
            jQuery('.ui-selectmenu-menu.sortArticles-select-menu ul li div').wrapInner("<a href='http://google.com'></a>");
        });

        window.onload = function () {
            jQuery('.ui-selectmenu-menu.sortArticles-select-menu ul').remove();
            jQuery('.ui-selectmenu-menu.sortArticles-select-menu').html('<ul aria-hidden="false" aria-labelledby="ui-id-3-button" id="ui-id-3-menu" role="listbox" tabindex="0" class="ui-menu ui-corner-bottom ui-widget ui-widget-content" aria-activedescendant="ui-id-4" aria-disabled="false" style="width: 194px;"><a href="<?= get_permalink(); ?>?sort=date"><li class="ui-menu-item"><div id="ui-id-4" tabindex="-1" role="option" class="ui-menu-item-wrapper ui-state-active"><?php the_field('sort_last'); ?></div></li></a><a href="<?= get_permalink(); ?>?sort=popular"><li class="ui-menu-item"><div id="ui-id-5" tabindex="-1" role="option" class="ui-menu-item-wrapper"><?php the_field('sort_popular'); ?></div></li></a></ul>');
        }
    </script>
<?php get_footer(); ?>