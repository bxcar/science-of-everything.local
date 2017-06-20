<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-article column large-8 small-12">
            <section class="article-content-text">
                <figure class="article-float-left"><?= get_the_post_thumbnail(); ?></figure>
                <h1 class="title-0"><?php the_title(); ?></h1>
                <?php the_content(); ?>
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
            <div class="section-title section-title-books">
                <h2 class="title-2"><img src="<?= get_template_directory_uri(); ?>/app/img/icon-book.png"><?php _e('Книги', 'science-of-everything'); ?></h2>
            </div>
            <ul class="sidebar-list">
                <?php
                $books_args = array(
                    'post_type' => 'book',
                    'posts_per_page' => 5
                );

                $books = new WP_Query($books_args);
                if ($books->have_posts()) {
                    while ($books->have_posts()) {
                        $books->the_post(); ?>
                        <li><a class="sidebar-img-books" href="<?php the_permalink(); ?>"><img style="width: 77px; height: 100px;" src="<?php the_field('book_mini'); ?>"></a>
                            <div class="sidebar-item-content books">
                                <a class="title-sm" href="<?php the_permalink(); ?>"><?= wp_trim_words(get_the_title(), 8); ?></a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <a href="<?php the_field('adv_link'); ?>" target="_blank" class="sidebar-advertising"><img src="<?php the_field('adv_image'); ?>"></a>
        </aside>
    </div>
<script>
    jQuery('.article-content-text p').addClass('text-p');
    jQuery('.article-content-text blockquote').addClass('article-quote');
    jQuery('.article-content-text ul').addClass('article-inner-list');
    jQuery('.article-content-text ul li').wrapInner('<span></span>');
</script>
<style>
    .article-content-text {
        width: 100% !important;
        margin-bottom: 55px;
    }

    .article-content-text strong {
        font-size: 16px;
        line-height: 1.5;
        font-weight: 500;
        color: #333333;
    }

    .article-content-text h3 {
        color: black;
        font-weight: 400;
        line-height: normal;
        font-size: 100%;
    }
</style>
<?php get_footer(); ?>