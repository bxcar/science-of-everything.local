<?php
/**
 * Template Name: blog
 */
session_start();
$_SESSION['ix_past'] = false;
$_SESSION['ix_upcoming'] = false;
$_SESSION['upcoming_ev'] = false;
$_SESSION['past_ev'] = false;
$_SESSION['is_front_page'] = false;
$_SESSION['category'] = false;
$_SESSION['blog'] = true;
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
            <ul class="articlesList articlesList-detail column small-12 row">
                <?php
                $i = 0;
                $sort = '';
                if (!isset($_GET['sort']) || ($_GET['sort'] == 'date')) {
                    $orderby = 'date';
                } else {
                    $orderby = 'meta_value_num';
                }

                $photos = array(
                    'post_type' => 'post',
                    'posts_per_page' => 7,
                    'orderby' => $orderby,
                    'meta_key' => 'views',
                    'order' => 'DESC',
                );

                $photos = new WP_Query($photos);
                if ($photos->have_posts()) {
                    while ($photos->have_posts()) {
                        $photos->the_post();
                        if ($i == 0) { ?>
                            <li class="columns column-block large-8 small-12 articlesList-medium">
                                <a class="articlesList-item-banner twoThirds" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg"><img src="<?php the_post_thumbnail_url(); ?>">
                                    </div>
                                    <p class="title-1 white"><?php the_title(); ?></p>
                                    <div class="counters">
                                        <div class="counters-item"><i class="icon-user"></i><?php the_author(); ?></div>
                                        <div class="counters-item"><i
                                                    class="icon-time"></i><?php wp_days_ago_v3(0, 86400); ?></div>
                                        <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                    </div>
                                </a>
                            </li>
                        <?php } elseif (($i == 3) || ($i == 4)) { ?>
                            <li class="columns column-block medium-6 small-12 large-4 center">
                                <a class="articlesList-item-banner" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg"><img src="<?php the_post_thumbnail_url(); ?>">
                                    </div>
                                    <p class="title-3 white"><?php the_title(); ?></p>
                                    <div class="counters">
                                        <div class="counters-item"><i class="icon-user"></i><?php the_author(); ?></div>
                                        <div class="counters-item"><i
                                                    class="icon-time"></i><?php wp_days_ago_v3(0, 86400); ?></div>
                                        <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                    </div>
                                </a>
                            </li>
                            <?php if ($i == 3) { ?>
                                <li class="columns column-block large-4 medium-6 small-12 hide-for-small show-for-large">
                                    <a target="_blank"
                                       href="<?php the_field('ads2_link', get_option('page_on_front')); ?>">
                                        <img src="<?php the_field('ads2_image', get_option('page_on_front')); ?>">
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4<?php if ($i == 1) {
                                echo ' articlesList-medium';
                            } ?>">
                                <a class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>">
                                    <img class="articlesList-item-img" style="width: 350px; height: 230px;" src="<?php the_post_thumbnail_url(); ?>"></a><a
                                        class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-user"></i><?php the_author(); ?></div>
                                    <div class="counters-item"><i
                                                class="icon-time"></i><?php wp_days_ago_v3(0, 86400); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                </div>
                                <p class="text-p"><?= get_the_excerpt(); ?></p>
                            </li>
                        <?php } ?>
                        <?php $i++;
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <div class="column small-12">
                <?php if($_GET['sort'] == 'popular') {
                    echo do_shortcode('[ajax_load_more post_type="post" meta_key="views" orderby="meta_value_num" order="DESC" posts_per_page="6" offset="7" pause="true" scroll="false" button_label="' . get_field('load_more_posts') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
                } else {
                    echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="6" offset="7" pause="true" scroll="false" button_label="' . get_field('load_more_posts') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
                }?>
            </div>
        </section>
    </div>
    <style>
        .ajax-load-more-wrap {
            width: 100%;
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
        };

        jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
            jQuery('div.alm-reveal').addClass("articlesList articlesList-detail column small-12 row");
        });
    </script>
<?php get_footer(); ?>
