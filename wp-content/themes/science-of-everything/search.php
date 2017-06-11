<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <div class="l-search column small-12">
            <div class="section-title-inner">
                <form class="search-form searchform" name="searchform" role="search" method="get" id="searchform"
                      action="<?php echo home_url('/') ?>">
                    <input name="s" id="s" type="text" placeholder="Поиск" value="<?php the_search_query(); ?>">
                    <button style="display: none;" id="searchsubmit" type="submit"><i class="icon-search"></i></button>
                </form>
                <p class="search-count"><i class="icon-search"></i>
                    <span><?php global $wp_query; echo $wp_query->found_posts; ?></span>
                    <span class="hide-for-small-only">Результаты поиска</span>
                </p>
            </div>
            <p class="search-hint">Введите для повторного поиска</p>
            <ul class="articlesList-compact row">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); ?>
                        <li class="columns column-block large-3 medium-4 small-12">
                            <a class="articlesList-item-text dark" href="<?php the_permalink(); ?>">
                                <figure style="width: auto; height: 165px; margin-left: auto; margin-right: auto;"
                                        class="articlesList-item-img-wrap">
                                    <img <?php if (get_field('book_mini')) { ?>
                                        style="width: auto; height: 165px;"
                                    <?php } else { ?>
                                        style="width: 255px; height: 165px;"
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
                                </figure>
                                <div class="articlesList-item-text-content">
                                    <p class="title-5 white"><?= wp_trim_words(get_the_title(), 7); ?></p>
                                    <div class="counters">
                                        <div class="counters-item"><i class="icon-time"></i><?= get_the_date(); ?></div>
                                        <div class="counters-item"><i class="icon-comment"></i>113</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                } else {
                    ?>
                    <div>По вашему запросу ничего не найдено, попробуйте сформулировать ваш вопрос иначе</div>
                    <?php
                }
                ?>
                <!--<li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                              href="authors-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-4.png"></figure>
                        <div class="articlesList-item-text-content">
                            <p class="title-5 white">Анизотропию реликтового излучения распечатали на 3D-принтере</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                              href="authors-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-6.png"></figure>
                        <div class="articlesList-item-text-content">
                            <p class="title-5 white">Комплекс молекулярных облаков Ореол Цефея скрывает в себе
                                туманность Призрак</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                              href="authors-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-7.png"></figure>
                        <div class="articlesList-item-text-content">
                            <p class="title-5 white">Главное за неделю: о флирте и насилии, замедлении старения и
                                «звезде инопланетян»</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                              href="authors-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-8.png"></figure>
                        <div class="articlesList-item-text-content">
                            <p class="title-5 white">Футуристический Лотос C-01 мотоциклов продано на аукционе</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                              href="authors-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-9.png"></figure>
                        <div class="articlesList-item-text-content">
                            <p class="title-5 white">Фантастические световые установки по шкале Collectif</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                              href="authors-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-10.png">
                        </figure>
                        <div class="articlesList-item-text-content">
                            <p class="title-5 white">Потрясающие Минималистский Градиент Часы</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                              href="authors-article.html">
                        <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                        src="img/articles-list-item-img-11.png">
                        </figure>
                        <div class="articlesList-item-text-content">
                            <p class="title-5 white">3D Печатный веб Установка игры со светом</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </a>
                </li>-->
            </ul>
            <button class="button-more-light">Загрузить больше результатов поиска</button>
        </div>
    </div>
<?php get_footer(); ?>