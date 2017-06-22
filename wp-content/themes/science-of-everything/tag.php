<?php
//Modify button to view more
session_start();
$_SESSION['ix_past'] = false;
$_SESSION['ix_upcoming'] = false;
$_SESSION['upcoming_ev'] = false;
$_SESSION['past_ev'] = false;
$_SESSION['is_front_page'] = false;
$_SESSION['category'] = true;
$_SESSION['blog'] = false;
get_header(); ?>
    <div class="mainWrap mainWrap-medium">
        <section class="l-articles row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <h2 class="title-4"><?php single_cat_title(); ?></h2>
                    <select class="sortArticles-select">
                        <?php
                        global $cat;
                        if (!isset($_GET['sort']) || ($_GET['sort'] == 'date')) { ?>
                            <option selected
                                    value="<?= get_category_link($cat); ?>?sort=date"><?php the_field('sort_last', 'option'); ?></option>
                            <option value="<?= get_category_link($cat); ?>?sort=popular"><?php the_field('sort_popular', 'option'); ?></option>
                        <?php } else { ?>
                            <option value="<?= get_category_link($cat); ?>?sort=date"><?php the_field('sort_last', 'option'); ?></option>
                            <option selected
                                    value="<?= get_category_link($cat); ?>?sort=popular"><?php the_field('sort_popular', 'option'); ?></option>
                        <?php } ?>
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
<!--                                    <img class="articlesList-item-img" src="--><?//= get_the_post_thumbnail_url(); ?><!--">-->
                                    <img class="articlesList-item-img" <?php if (get_field('book_mini')) { ?>
                                        style=""
                                    <?php } else { ?>
                                        style=""
                                    <?php } ?>
                                        class="articlesList-item-img"
                                        <?php if (get_field('video_id')) { ?>
                                            src="https://img.youtube.com/vi/<?php the_field('video_id'); ?>/0.jpg"
                                        <?php } elseif (get_field('post_image')) { ?>
                                            src="<?php the_field('post_image'); ?>"
                                        <?php } elseif (get_field('book_mini')) { ?>
                                            src="<?php the_field('book_mini'); ?>"
                                        <?php } else { ?>
                                            src="<?php the_post_thumbnail_url(); ?>"
                                        <?php } ?> >
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
                                        <img class="articlesList-item-img" <?php if (get_field('book_mini')) { ?>
                                            style=""
                                        <?php } else { ?>
                                            style=""
                                        <?php } ?>
                                             class="articlesList-item-img"
                                            <?php if (get_field('video_id')) { ?>
                                                src="https://img.youtube.com/vi/<?php the_field('video_id'); ?>/0.jpg"
                                            <?php } elseif (get_field('post_image')) { ?>
                                                src="<?php the_field('post_image'); ?>"
                                            <?php } elseif (get_field('book_mini')) { ?>
                                                src="<?php the_field('book_mini'); ?>"
                                            <?php } else { ?>
                                                src="<?php the_post_thumbnail_url(); ?>"
                                            <?php } ?> >
                                    </div>
                                    <div class="category category-technology"><?php single_cat_title(); ?></div>
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
                ?>
            </ul>
            <div class="column small-12">
                <!--                <div class="button-more"><span>СМОТРЕТЬ БОЛЬШЕ</span><i class="icon-squares"></i></div>-->
                <?php
                $tag = get_queried_object();
//                echo $tag->slug;
                if ($_GET['sort'] == 'popular') {
                    echo do_shortcode('[ajax_load_more post_type="topics" tag="' . $tag->slug . '" meta_key="views" orderby="meta_value_num" order="DESC" posts_per_page="9" offset="9" pause="true" scroll="false" button_label="' . __('Смотреть больше', 'science-of-everything') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
                } else {
                    echo do_shortcode('[ajax_load_more post_type="topics" tag="' . $tag->slug . '" posts_per_page="9" offset="9" pause="true" scroll="false" button_label="' . __('Смотреть больше', 'science-of-everything') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
                } ?>
            </div>
        </section>
    </div>
    <style>
        .articlesList-item-bg img {
            height: 100%;
        }

        .articlesList-item-img {
            width: 350px;
            height: 230px;
        }
    </style>
    <script>
        jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
            jQuery('div.alm-reveal').addClass("articlesList column small-12 row");
        });

        window.onload = function () {
            jQuery('.ui-selectmenu-menu.sortArticles-select-menu ul').remove();
            jQuery('.ui-selectmenu-menu.sortArticles-select-menu').html('<ul aria-hidden="false" aria-labelledby="ui-id-3-button" id="ui-id-3-menu" role="listbox" tabindex="0" class="ui-menu ui-corner-bottom ui-widget ui-widget-content" aria-activedescendant="ui-id-4" aria-disabled="false" style="width: 194px;"><a href="<?= get_category_link($cat); ?>?sort=date"><li class="ui-menu-item"><div id="ui-id-4" tabindex="-1" role="option" class="ui-menu-item-wrapper ui-state-active"><?php the_field('sort_last', 'option'); ?></div></li></a><a href="<?= get_category_link($cat); ?>?sort=popular"><li class="ui-menu-item"><div id="ui-id-5" tabindex="-1" role="option" class="ui-menu-item-wrapper"><?php the_field('sort_popular', 'option'); ?></div></li></a></ul>');
        }
    </script>
<?php get_footer(); ?>