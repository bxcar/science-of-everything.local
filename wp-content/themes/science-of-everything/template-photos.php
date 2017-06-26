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
                    <select class="sortArticles-select" onChange="window.location.href=this.value">
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
                $i = true;
                $sort = '';
                if (!isset($_GET['sort']) || ($_GET['sort'] == 'date')) {
                    $orderby = 'date';
                } else {
                    $orderby = 'meta_value_num';
                }
                $photos = array(
                    'numberposts' => 8,
                    'post_type' => 'photos',
                    'posts_per_page' => 8,
                    'orderby' => $orderby,
                    'meta_key' => 'views',
                    'order' => 'DESC'
                );

                $photos = new WP_Query($photos);
                if ($photos->have_posts()) {
                    while ($photos->have_posts()) {
                        $photos->the_post(); ?>
                        <?php if ($i) {
                            $i = false; ?>
                            <li class="articlesList-item-hover columns column-block large-8 small-12 articlesList-medium"><a
                                        class="articlesList-item-banner twoThirds" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg"><img src="<?php the_field('post_image'); ?>">
                                    </div>
                                    <p class="title-1 white"><?php the_field('post_title'); ?></p>
                                    <div class="counters">
                                        <!--                                        <div class="counters-item"><i class="icon-user"></i>Автор</div>-->
                                        <div class="counters-item"><i
                                                    class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                        <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                    </div>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="articlesList-item-text articlesList-item-hover columns column-block medium-6 small-12 large-4 articlesList-medium">
                                <a
                                        class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>"><img
                                            class="articlesList-item-img" src="<?php the_field('post_image'); ?>"></a><a
                                        class="title-3"
                                        href="<?php the_field('post_image'); ?>"><?php the_field('post_title'); ?></a>
                                <div class="counters">
                                    <div class="counters-item"><i
                                                class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                </div>
                                <p class="text-p"><?= strip_tags(get_field('post_description')); ?></p>
                            </li>
                        <?php }
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <!--<div class="column small-12">
                <div class="button-more"><span><?php /*the_field('load_more_posts'); */ ?></span><i class="icon-squares"></i>
                </div>
            </div>-->
            <?php if($_GET['sort'] == 'popular') {
                echo do_shortcode('[ajax_load_more post_type="photos" meta_key="views" orderby="meta_value_num" order="DESC" posts_per_page="6" offset="8" pause="true" scroll="false" button_label="' . get_field('load_more_posts') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
            } else {
                echo do_shortcode('[ajax_load_more post_type="photos" posts_per_page="6" offset="8" pause="true" scroll="false" button_label="' . get_field('load_more_posts') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
            }?>
            <style>
                /*.articlesList-item-text.columns.column-block.medium-6.small-12.large-4.articlesList-medium {
                    display: inline-block;
                    float: left;
                }*/

                .ajax-load-more-wrap {
                    width: 100%;
                }

                .button-more .button-more {
                    margin-top: 0;
                }
            </style>
            <script>
                jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
                    jQuery('div.alm-reveal').addClass("articlesList articlesList-detail column small-12 row");
                });

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
        </section>
    </div>
<?php get_footer(); ?>