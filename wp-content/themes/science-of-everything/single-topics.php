<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-article column large-8 small-12">
            <section class="article-visualContent"><?= get_the_post_thumbnail() ?></section>
            <section class="article-content">
                <div class="article-content-counters">
                    <div class="article-content-counters-date"><i
                                class="icon-time"></i><span><?= get_the_date(); ?></span></div>
                    <div class="counters">
                        <div class="counters-item"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
                        <div class="counters-item"><i class="icon-comment"></i><span>4</span></div>
                    </div>
                </div>
                <div class="article-content-text">
                    <?php
                    $categories = get_the_category();
                    if ($categories) {
                        foreach ($categories as $category) {
                            echo '<a href="'.get_term_link($category->term_id) .'" class="category category-m category-technology">' . $category->name . '</a>';
                        }
                    }
                    ?>
                    <h1 class="title-0"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </section>
            <div class="shareSocial">
                <?php the_favorites_button(); ?>
                <?php echo do_shortcode('[TheChamp-Sharing count="1"]') ?>
                <div class="shareSocial-counters"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
            </div>
            <section class="comments">
                <div class="section-title">
                    <h2 class="title-4"><i class="icon-comment"></i>комментарии</h2>
                </div>
                <div class="comments-posts">
                    <div class="comments-posts-one">
                        <figure class="comments-posts-avatar google-plus"><img src="img/comments-avatar-1.png"></figure>
                        <div class="comments-posts-content">
                            <p class="title-4">Оликсандор Дроздов</p>
                            <div class="counters counters-item"><i class="icon-time"></i><span>5 ноября</span></div>
                            <p class="text-p">Есть специальные генераторы, создающие собственные варианты. Сайтах и
                                смысловую нагрузку ему нести совсем необязательно распространенных.</p>
                            <button class="button-reply"><i class="icon-reply"></i>Ответить</button>
                        </div>
                    </div>
                    <div class="comments-posts-one reply">
                        <figure class="comments-posts-avatar twitter"><img src="img/comments-avatar-2.png"></figure>
                        <div class="comments-posts-content">
                            <p class="title-4">Никита Светлый</p>
                            <div class="counters counters-item"><i class="icon-time"></i><span>7 ноября</span></div>
                            <p class="text-p">Древнеримскому философу цицерону, ведь именно из его трактата о
                                пределах.</p>
                            <button class="button-reply"><i class="icon-reply"></i>Ответить</button>
                        </div>
                    </div>
                    <div class="comments-posts-one reply">
                        <figure class="comments-posts-avatar fb"><img src="img/comments-avatar-3.png"></figure>
                        <div class="comments-posts-content">
                            <p class="title-4">Оксана Рыбина</p>
                            <div class="counters counters-item"><i class="icon-time"></i><span>8 ноября</span></div>
                            <p class="text-p">О пределах добра и смысловую нагрузку ему нести совсем. Отсюда
                                напрашивается вывод, что все.</p>
                            <button class="button-reply"><i class="icon-reply"></i>Ответить</button>
                        </div>
                    </div>
                    <div class="comments-posts-one">
                        <figure class="comments-posts-avatar"><img src="img/comments-avatar-4.png"></figure>
                        <div class="comments-posts-content">
                            <p class="title-4">Миша Светраков</p>
                            <div class="counters counters-item"><i class="icon-time"></i><span>11 ноября</span></div>
                            <p class="text-p">Есть специальные генераторы, создающие собственные варианты. Сайтах и
                                смысловую нагрузку ему нести совсем необязательно распространенных.</p>
                            <button class="button-reply"><i class="icon-reply"></i>Ответить</button>
                        </div>
                    </div>
                </div>
                <div class="comments-write">
                    <figure class="comments-posts-avatar"><img src="img/comments-avatar-4.png"></figure>
                    <form class="comments-write-form">
                        <textarea name="comment" placeholder="Комментарий" required></textarea>
                        <button class="button button-primary" type="submit">Отправить</button>
                    </form>
                </div>
            </section>
        </article>
        <aside class="sidebar-wrap columns large-4">
            <div class="section-title section-title-popular">
                <h2 class="title-2"><img src="<?= get_template_directory_uri(); ?>/app/img/icon-newspaper.png"><?php _e('Популярные статьи', 'science-of-everything'); ?></h2>
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
                                <img style="width: 130px; height: 100px;" src="<?= get_the_post_thumbnail_url(); ?>">
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
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
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
                <img src="<?php the_field('adv_image'); ?>">
            </a>
        </aside>
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
                                    <img style="width: 255px; height: 165px;" class="articlesList-item-img" src="<?= get_the_post_thumbnail_url(); ?>">
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
                                        <div class="counters-item"><i class="icon-comment"></i>113</div>
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
    </style>
<?php get_footer(); ?>