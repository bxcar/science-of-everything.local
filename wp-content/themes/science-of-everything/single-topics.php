<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-article column large-8 small-12">
            <section class="article-visualContent">
                <figure class="article-visualContent-img"><img class="obj-fit height-inh" src="<?php the_post_thumbnail_url(); ?>">
                </figure>
                <div class="article-visualContent-text">
                    <div class="article-visualContent-details">
                        <div class="category category-m category-technology"><?php
                                                $categories = get_the_category();
                                                if ($categories) {
                                                    foreach ($categories as $category) {
                                                        echo '<a href="'.get_term_link($category->term_id) .'">' . $category->name . '</a>';
                                                    }
                                                }
                                                ?></div>
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
            <div class="shareSocial">
                <?php the_favorites_button(); ?>
                <?php echo do_shortcode('[TheChamp-Sharing count="1"]') ?>
                <div class="shareSocial-counters"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
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
                <h2 class="title-2"><img class="obj-fit height-inh" src="<?= get_template_directory_uri(); ?>/app/img/icon-newspaper.png"><?php _e('Популярные статьи', 'science-of-everything'); ?></h2>
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
                        <?php $i++;
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <a href="<?php the_field('adv_link'); ?>" target="_blank" class="sidebar-advertising">
                <img class="obj-fit height-inh" src="<?php the_field('adv_image'); ?>">
            </a>
        </aside>
        <a style="display: block;" target="_blank" href="<?php the_field('adv_link_2'); ?>"
           class="articleSpecial columns small-12">
            <img class="obj-fit height-inh" src="<?php the_field('adv_image_2') ?>">
        </a>
        <section class="l-otherArticles column small-12 row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <div class="title-4"><?php _e('Похожие новости', 'science-of-everything'); ?></div>
                </div>
            </div>
            <ul class="articlesList-compact column small-12 row">
                <?php
                $categories = get_the_category();
                $cat_arr = array();
                $i = 0;
                if ($categories) {
                    foreach ($categories as $category) {
                        $cat_arr[$i] = $category->cat_ID;
                        $i++;
                    }
                }
                $popular_posts_args = array(
                    'post_type' => 'topics',
                    'posts_per_page' => 4,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'views',
                    'order' => 'DESC',
                    'category__in' => $cat_arr
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
        </section>
    </div>
    <script>
        jQuery('.article-content-text p').addClass('text-p');
        jQuery('.article-content-text blockquote').addClass('article-quote');
        jQuery('.article-content-text ul').addClass('article-inner-list');
        jQuery('.article-content-text ul li').wrapInner('<span></span>');
    </script>
    <style>
        .article-content-text img.alignleft {
            display: block;
            width: auto;
            max-width: 50%;
            float: left;
            margin-right: 7.4%;
        }

        .article-content-text strong {
            font-size: 16px;
            line-height: 1.5;
            font-weight: 500;
            color: #333333;
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
<?php get_footer(); ?>