<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-article column small-12">
            <section class="articleWide-visualContent">
                <figure class="articleWide-visualContent-img"><img src="<?php the_field('main-image'); ?>"></figure>
                <div class="articleWide-visualContent-text">
                    <div class="category category-m category-overview">Обзор</div>
                    <div class="article-visualContent-title">
                        <h1 class="title-0 white"><?php the_title(); ?></h1>
                    </div>
                    <div class="counters">
                        <div class="counters-item"><i class="icon-time"></i><span><?= get_the_date(); ?></span></div>
                        <div class="counters-item"><i
                                    class="icon-comment"></i><span><?php get_comments_number(); ?></span></div>
                        <div class="counters-item"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
                    </div>
                </div>
            </section>
            <section class="articleWide-content">
                <div class="article-content-text">
                    <p class="text-sub"><?php the_field('short-desc'); ?></p>
                    <?php the_field('text-1'); ?>
                </div>
                <div class="article-gallary">
                    <div class="article-gallary-labels">
                        <div class="article-gallary-counters"><span class="current"></span><span class="number"></span>
                        </div>
                        <!--<div class="article-gallary-social">
                            <button class="social-button fb"><i class="icon-fb"></i></button>
                            <button class="social-button tw"><i class="icon-twitter"></i></button>
                            <button class="social-button vk"><i class="icon-vk"></i></button>
                            <button class="social-button gp"><i class="icon-google-plus"></i></button>
                        </div>-->
                    </div>
                    <div class="article-gallary-slider owl-carousel">
                        <?php
                        $gallery = get_field('gallery');
                        foreach ($gallery as $photo) { ?>
                            <figure class="article-gallary-photo"><img
                                        src="<?= $photo['url']; ?>" alt="<?= $photo['alt']; ?>"></figure>
                        <?php } ?>
                    </div>
                    <div class="article-gallary-previews-wrap">
                        <div class="article-gallary-previews owl-carousel">
                            <?php
                            $gallery = get_field('gallery');
                            foreach ($gallery as $photo) { ?>
                                <figure class="article-gallary-previews-one"><img
                                            src="<?= $photo['url']; ?>" alt="<?= $photo['alt']; ?>"></figure>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="article-content-text">
                    <?php the_field('text-2'); ?>
                </div>
                <figure class="article-float-left"><img src="<?php the_field('left-image-1'); ?>"></figure>
                <div class="article-content-text">
                    <?php the_field('right-text-1'); ?>
                </div>
                <figure class="article-float-right"><img src="<?php the_field('right-image-1'); ?>"></figure>
                <div class="article-content-text">
                    <?php the_field('left-text-1'); ?>
                </div>
                <figure class="artice-img-wide">
                    <!--<div class="article-gallary-social">
                        <button class="social-button fb"><i class="icon-fb"></i></button>
                        <button class="social-button tw"><i class="icon-twitter"></i></button>
                        <button class="social-button vk"><i class="icon-vk"></i></button>
                        <button class="social-button gp"><i class="icon-google-plus"></i></button>
                    </div>-->
                    <img src="<?php the_field('big-image-1'); ?>">
                    <figcaption><?php the_field('big-image-1-desc'); ?></figcaption>
                </figure>
                <div class="article-content-text">
                    <?php the_field('text-3'); ?>
                </div>
                <div class="article-gallary">
                    <div class="article-gallary-labels">
                        <div class="article-gallary-counters"><span class="current"></span><span class="number"></span>
                        </div>
                        <!--<div class="article-gallary-social">
                            <button class="social-button fb"><i class="icon-fb"></i></button>
                            <button class="social-button tw"><i class="icon-twitter"></i></button>
                            <button class="social-button vk"><i class="icon-vk"></i></button>
                            <button class="social-button gp"><i class="icon-google-plus"></i></button>
                        </div>-->
                    </div>
                    <div class="article-gallary-slider owl-carousel">
                        <?php
                        $gallery = get_field('gallery_2');
                        foreach ($gallery as $photo) { ?>
                            <figure class="article-gallary-photo"><img
                                        src="<?= $photo['url']; ?>" alt="<?= $photo['alt']; ?>"></figure>
                        <?php } ?>
                    </div>
                    <div class="article-gallary-previews-wrap">
                        <div class="article-gallary-previews owl-carousel">
                            <?php
                            $gallery = get_field('gallery_2');
                            foreach ($gallery as $photo) { ?>
                                <figure class="article-gallary-previews-one"><img
                                            src="<?= $photo['url']; ?>" alt="<?= $photo['alt']; ?>"></figure>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="article-content-text">
                    <?php the_field('text-4'); ?>
                </div>
                <figure class="article-float-left"><img src="<?php the_field('left-image-2'); ?>"></figure>
                <div class="article-content-text">
                    <?php the_field('right-text-2'); ?>
                </div>
            </section>
            <section class="articleWide-social">
                <div class="shareSocial">
                    <?php the_favorites_button(); ?>
                    <?php echo do_shortcode('[TheChamp-Sharing count="1"]') ?>
                    <div class="shareSocial-counters"><i class="icon-view"></i><span><?php the_views() ?></span></div>
                </div>
                <div class="tags">
                    <p class="text-sub">Теги:</p>
                    <div class="tags-list">
                        <?php
                        $tags = get_the_tags();
                        if ($tags) {
                            foreach ($tags as $tag) {
                                echo '<span class="tags-one" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</span>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <section class="article-subscribe">
                    <div class="section-title">
                        <h2 class="title-4"><img src="<?= get_template_directory_uri(); ?>/app/img/icon-plane.svg">Подписаться
                            на рассылку</h2>
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="9" title="Подписка на рассылку" html_class="article-subscribe-form"]'); ?>
                    <script>
                        jQuery('form.article-subscribe-form input[type="submit"]').replaceWith('<button class="button button-primary" type="submit">Подписаться</button>');
                    </script>
                </section>
                <?php comments_template('/comments.php', true); ?>
        </article>
        <section class="articleWide-footer">
            <a style="display: block;" target="_blank" href="<?php the_field('adv-link'); ?>"
               class="articleSpecial columns small-12">
                <img src="<?php the_field('adv-image') ?>">
            </a>
            <section class="l-siblingsArticle column small-12 row"><?php
                if (get_permalink(get_adjacent_post(false, '', true)) != get_the_permalink()) {
                    ?>
                    <a href="<?= get_permalink(get_adjacent_post(false, '', true)); ?>"
                       class="column medium-6 small-12">
                        <div class="siblingsArticle-one prev"><?php
                            ?><img class="siblingsArticle-one-bg" src="<?php the_field('main-image'); ?>">
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
                            ?><img class="siblingsArticle-one-bg"
                                   src="<?php the_field('main-image'); ?>">
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
                            <li class="articlesList-item-hover columns column-block large-3 medium-4 small-12">
                                <a class="articlesList-item-text" href="<?php the_permalink(); ?>">
                                    <figure class="articlesList-item-img-wrap">
                                        <img style="width: 255px; height: 165px;" class="articlesList-item-img"
                                             src="<?= get_the_post_thumbnail_url(); ?>">
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
                                            <div class="counters-item"><i
                                                        class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                            </div>
                                            <div class="counters-item"><i
                                                        class="icon-comment"></i><?= get_comments_number(); ?></div>
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
        </section>
    </div>
    <style>
        strong {
            color: #333;
        }

        .article-quote-author strong {
            font-weight: 500;
            color: #656565;
        }

        #ajax-load-more {
            width: 100%;
        }
    </style>
    <script>
        jQuery('.article-content-text > p').addClass('text-p');
        jQuery('.article-content-text > h2').addClass('title-0');
        jQuery('.article-content-text  ul').addClass('article-inner-list');
        jQuery('.article-content-text  ul li').wrapInner('<span></span>');
        //    jQuery('.article-content-text > h3').addClass('interview-question');
        jQuery('.article-content-text > blockquote').addClass('article-quote');

        jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
            jQuery('div.alm-reveal').addClass("articlesList-compact column small-12 row");
        });
        jQuery(document).ready(function () {
            jQuery('div.alm-btn-wrap button').addClass("button-more-light").wrap("<div class='column small-12'></div>");
            jQuery('div.alm-btn-wrap button.button-more-light').append("<i class='icon-squares'></i>");
        });
    </script>

<?php get_footer(); ?>