<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package science-of-everything
 */

get_header();
global $query_string;
query_posts($query_string. '&post_status=trash');?>

<div class="mainWrap mainWrap-medium row">
    <article class="l-article column large-8 small-12">
        <section class="article-visualContent">
            <figure class="article-visualContent-img"><img class="obj-fit height-inh" src="<?= get_the_post_thumbnail_url(); ?>"></figure>
            <div class="article-visualContent-text">
                <div class="article-visualContent-details">
                    <div class="counters">
                        <div class="counters-item"><i class="icon-time"></i><span><?= get_the_date(); ?></span></div>
                        <div class="counters-item"><i class="icon-comment"></i><span><?= get_comments_number(); ?></span></div>
                        <div class="counters-item"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
                    </div>
                </div>
                <div class="article-visualContent-title">
                    <h1 class="title-0 white"><?php the_title(); ?></h1>
                </div>
            </div>
        </section>
        <section class="article-content">
            <div class="article-content-text">
                <?php the_content(); ?>
            </div>
        </section>
        <div class="article-author">
            <figure class="article-author-avatar"><?= get_wp_user_avatar(get_current_user_id()); ?></figure>
            <p class="title-4"><?php the_author_meta('first_name', get_current_user_id());
                echo ' ';
                the_author_meta('last_name', get_current_user_id()); ?></p>
            <!--<div class="article-author-links">
                <a class="fb" href="#"><i class="icon-fb"></i></a>
                <a class="tw" href="#"><i class="icon-twitter"></i></a>
                <a class="in" href="#"><i class="icon-linkedin"></i></a>
            </div>-->
        </div>
        <div class="shareSocial">
            <?php the_favorites_button(); ?>
<!--            <button class="shareSocial-bookmark"><i class="icon-bookmark"></i><span>Довавить в закладку</span></button>-->
            <?php echo do_shortcode('[TheChamp-Sharing count="1"]') ?>
            <div class="shareSocial-counters"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
        </div>
        <div class="tags">
            <p class="text-sub">Теги:</p>
            <div class="tags-list">
                <?php
                $tags = get_the_tags();
                if ($tags) {
                    foreach ($tags as $tag) {
                        echo '<a class="tags-one" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                    }
                }
                ?>
            </div>
        </div>
        <section class="article-subscribe">
            <div class="section-title">
                <h2 class="title-4"><img class="obj-fit height-inh" src="<?= get_template_directory_uri(); ?>/app/img/icon-plane.svg">Подписаться на рассылку</h2>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="9" title="Подписка на рассылку" html_class="article-subscribe-form"]'); ?>
            <script>
                jQuery('form.article-subscribe-form input[type="submit"]').replaceWith('<button class="button button-primary" type="submit">Подписаться</button>');
            </script>
        </section>
        <?php comments_template('/comments.php', true); ?>
    </article>
    <aside class="sidebar-wrap columns large-4">
        <div class="section-title section-title-popular">
            <h2 class="title-2"><img class="obj-fit height-inh" src="<?= get_template_directory_uri(); ?>/app/img/icon-newspaper.png">ПОПУЛЯРНЫЕ СТАТЬИ</h2>
        </div>
        <ul class="sidebar-list">
            <?php
            $popular_posts_args = array(
                'post_type' => 'topics',
                'posts_per_page' => 5,
                'orderby' => 'meta_value_num',
                'meta_key' => 'views',
                'order' => 'DESC',
            );

            $popular_posts = new WP_Query($popular_posts_args);
            if ($popular_posts->have_posts()) {
                while ($popular_posts->have_posts()) {
                    $popular_posts->the_post(); ?>
                    <li>
                        <a class="sidebar-list-img" href="<?php the_permalink(); ?>">
                            <img class="obj-fit height-inh" style="width: 130px; height: 100px;" src="<?= get_the_post_thumbnail_url(); ?>">
                        </a>
                        <div class="sidebar-item-content">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                foreach ($categories as $category) {
                                    echo '<p class="category-text category-text-sm category-text-technology">' . $category->name . '</p>';
                                }
                            }
                            ?>
                            <a class="title-sm" href="<?php the_permalink(); ?>"><?= wp_trim_words(get_the_title(), 4); ?></a>
                            <div class="counters">
                                <div class="counters-item">
                                    <i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
            wp_reset_postdata();
            ?>
        </ul>
        <div class="sidebar-advertising">
            <a target="_blank" href="<?php the_field('ads2_link', get_option( 'page_on_front' )); ?>">
                <img class="obj-fit height-inh" src="<?php the_field('ads2_image', get_option( 'page_on_front' )); ?>">
            </a>
        </div>
    </aside>
    <section class="l-siblingsArticle column small-12 row"><?php
        if (get_permalink(get_adjacent_post(false, '', true)) != get_the_permalink()) {
            ?>
            <a href="<?= get_permalink(get_adjacent_post(false, '', true)); ?>" class="column medium-6 small-12">
                <div class="siblingsArticle-one prev"><?php
                    ?><img class="siblingsArticle-one-bg obj-fit height-inh" src="<?= get_the_post_thumbnail_url(); ?>">
                    <p class="siblingsArticle-one-move">Предыдущая статья</p>
                    <p class="title-4 white"><?= get_the_title(get_adjacent_post(false, '', true)); ?></p>
                </div>
            </a>
            <?php
        } ?>

        <?php if (get_permalink(get_adjacent_post(false, '', false)) != get_the_permalink()) {
            ?>
            <a style="" href="<?= get_permalink(get_adjacent_post(false, '', false)); ?>"
               class="column medium-6 small-12">
                <div class="siblingsArticle-one next"><?php
                    ?><img class="siblingsArticle-one-bg obj-fit height-inh"
                           src="<?= get_the_post_thumbnail_url(); ?>">
                    <p class="siblingsArticle-one-move">Следующая статья</p>
                    <p class="title-4 white"><?= get_the_title(get_adjacent_post(false, '', false)); ?></p>
                </div>
            </a>
            <?php
        } ?>
    </section>
    <section class="l-otherArticles column small-12 row">
        <div class="column small-12">
            <div class="section-title-inner">
                <div class="title-4"><?php _e('Лучшие материалы', 'science-of-everything'); ?></div>
            </div>
        </div>
        <ul class="articlesList-compact column small-12 row">
            <?php
            $popular_posts_args = array(
                'post_type' => 'topics',
                'posts_per_page' => 4,
                'orderby' => 'meta_value_num',
                'meta_key' => 'views',
                'order' => 'DESC',
            );

            $popular_posts = new WP_Query($popular_posts_args);
            if ($popular_posts->have_posts()) {
                while ($popular_posts->have_posts()) {
                    $popular_posts->the_post(); ?>
                    <li class="columns column-block large-3 medium-4 small-12">
                        <a class="articlesList-item-text" href="<?php the_permalink(); ?>">
                            <figure class="articlesList-item-img-wrap">
                                <img class="articlesList-item-img obj-fit height-inh" src="<?= get_the_post_thumbnail_url(); ?>">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <?php
                                $categories = get_the_category();
                                if ($categories) {
                                    foreach ($categories as $category) {
                                        echo '<p class="category-text category-text-technology">' . $category->name . '</p>';
                                    }
                                }
                                ?>
                                <p class="title-4"><?php the_title(); ?></p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php $i++;
                }
            }
            wp_reset_postdata();
            ?>
        </ul>
        <?php echo do_shortcode('[ajax_load_more post_type="topics" meta_key="views" orderby="meta_value_num" order="DESC" offset="4" posts_per_page="16" pause="true" scroll="false" button_label="' . __('Смотреть больше', 'science-of-everything') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]'); ?>
    </section>
</div>
    <script>
        jQuery('div.article-content-text p').addClass("text-p");
        jQuery('div.article-content-text blockquote').addClass("info-quote");
        jQuery("div.article-content-text blockquote p").each(function () {
            jQuery(this).replaceWith(this.childNodes);
        });
    </script>
<style>
    div.article-content-text strong {
        font-size: 16px;
        line-height: 1.5;
        font-weight: 500;
        color: #333333;
    }

    .siblingsArticle-one-bg {
        top: -85px;
    }

    strong {
        font-size: 16px;
        line-height: 1.5;
        font-weight: 500;
        color: #333333;
    }

    #ajax-load-more {
        width: 100%;
    }

    .articlesList-compact .articlesList-item-img-wrap img {
        width: 255px;
        height: 165px;
    }

    @media screen and (max-width: 639px) {
        .articlesList-compact .articlesList-item-img-wrap img {
            width: 100%;
            height: auto;
        }
    }
</style>
    <script>
        jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
            jQuery('div.alm-reveal').addClass("articlesList-compact column small-12 row");
        });
        jQuery( document ).ready(function() {
            jQuery('div.alm-btn-wrap button').addClass("button-more-light").wrap("<div class='column small-12'></div>");
            jQuery('div.alm-btn-wrap button.button-more-light').append("<i class='icon-squares'></i>");
        });
    </script>
<?php get_footer(); ?>