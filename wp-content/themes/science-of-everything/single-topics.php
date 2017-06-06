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
                <button class="shareSocial-bookmark"><i class="icon-bookmark"></i><span>Довавить в закладку</span>
                </button>
                <button class="shareSocial-social fb"><i class="icon-fb"></i><span>35</span></button>
                <button class="shareSocial-social tw"><i class="icon-twitter"></i><span>35</span></button>
                <button class="shareSocial-social vk"><i class="icon-vk"></i><span>18</span></button>
                <button class="shareSocial-social gp"><i class="icon-google-plus"></i><span>25</span></button>
                <button class="shareSocial-more"><i class="icon-plus"></i></button>
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
                <h2 class="title-2"><img src="img/icon-newspaper.png">ПОПУЛЯРНЫЕ СТАТЬИ</h2>
            </div>
            <ul class="sidebar-list">
                <li><a class="sidebar-list-img" href="rubric-article.html"><img src="img/sidebar-img-1.png"></a>
                    <div class="sidebar-item-content">
                        <p class="category-text category-text-sm category-text-technology">ТЕХНОЛОГИИ</p><a
                                class="title-sm" href="rubric-article.html">«Легкие-на-чипе» научили курению в затяг</a>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </li>
                <li><a class="sidebar-list-img" href="rubric-article.html"><img src="img/sidebar-img-2.png"></a>
                    <div class="sidebar-item-content">
                        <p class="category-text category-text-sm category-text-astro">АСТРОФИЗИКА</p><a class="title-sm"
                                                                                                        href="rubric-article.html">Идентифицированы
                            области мозга, связанны...</a>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </li>
                <li><a class="sidebar-list-img" href="rubric-article.html"><img src="img/sidebar-img-3.png"></a>
                    <div class="sidebar-item-content">
                        <p class="category-text category-text-sm category-text-psycho">ПСИХОЛОГИЯ</p><a class="title-sm"
                                                                                                        href="rubric-article.html">Идентифицированы
                            области мозга, связанны...</a>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </li>
                <li><a class="sidebar-list-img" href="rubric-article.html"><img src="img/sidebar-img-4.png"></a>
                    <div class="sidebar-item-content">
                        <p class="category-text category-text-sm category-text-medtech">МедТех</p><a class="title-sm"
                                                                                                     href="rubric-article.html">Идентифицированы
                            области мозга, связанны...</a>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </li>
                <li><a class="sidebar-list-img" href="rubric-article.html"><img src="img/sidebar-img-5.png"></a>
                    <div class="sidebar-item-content">
                        <p class="category-text category-text-sm category-text-future">БУДУЩЕЕ</p><a class="title-sm"
                                                                                                     href="rubric-article.html">Идентифицированы
                            области мозга, связанны...</a>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="<?php the_field('adv_link'); ?>" target="_blank" class="sidebar-advertising">
                <img src="<?php the_field('adv_image'); ?>">
            </a>
        </aside>
        <section class="l-otherArticles column small-12 row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <div class="title-4">Похожие новости</div>
                </div>
            </div>
            <ul class="articlesList-compact column small-12 row">
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text"
                                                                              href="rubric-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-33.png">
                        </figure>
                        <div class="articlesList-item-text-content">
                            <p class="category-text category-text-technology">ТЕХНОЛОГИИ</p>
                            <p class="title-4">Хакерам потребовалось менее минуты, чтобы взломать флагман Google</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text"
                                                                              href="rubric-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-5.png"></figure>
                        <div class="articlesList-item-text-content">
                            <p class="category-text category-text-astro">АСТРОФИЗИКА</p>
                            <p class="title-4">Глобальное потепление</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text"
                                                                              href="rubric-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-11.png">
                        </figure>
                        <div class="articlesList-item-text-content">
                            <p class="category-text category-text-psycho">ПСИХОЛОГИЯ</p>
                            <p class="title-4">Поверхностную оценку сексуальности связали с одобрением насилия</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12 hide-for-medium-only"><a
                            class="articlesList-item-text" href="rubric-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-34.png">
                        </figure>
                        <div class="articlesList-item-text-content">
                            <p class="category-text category-text-medtech">МедТех</p>
                            <p class="title-4">Апофения: увидеть незримое и поверить в заговор</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
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