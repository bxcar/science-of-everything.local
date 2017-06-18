<?php
/**
 * Template Name: user-account
 */
get_header(); ?>
    <section class="l-aboutAuthor grey-section-bg">
        <div class="mainWrap mainWrap-medium row">
            <div class="column small-12">
                <div class="aboutAuthor-detail">
                    <div class="aboutAuthor-detail-innerWrap left">
                        <div class="aboutAuthor-detail-item"><span class="medium">Город:</span>
                            <span><?php the_author_meta('city', get_current_user_id()); ?></span>
                        </div>
                        <!--                        <div class="aboutAuthor-detail-item"><span class="medium">Пол:</span> <span>Женский</span></div>-->
                        <div class="aboutAuthor-detail-item"><span class="medium">Возраст:</span> <span><?=
                                calculateAge(get_the_author_meta('birthday-day', get_current_user_id()), get_the_author_meta('birthday-month', get_current_user_id()), get_the_author_meta('birthday-year', get_current_user_id()));
                                ?></span>
                        </div>
                    </div>
                    <div class="aboutAuthor-detail-innerWrap right">
                        <a class="aboutAuthor-detail-item" href="user-account.html">История публикаций</a>
                        <a class="aboutAuthor-detail-item" href="send-post.html">Подать материал</a>
                        <a class="aboutAuthor-detail-item" href="<?= wp_logout_url(home_url()); ?>">Выйти</a>
                    </div>
                </div>
                <div class="aboutAuthor-person">
                    <div class="aboutAuthor-person-photo">
                        <figure><?= get_wp_user_avatar(get_current_user_id()); ?></figure>
                        <a class="aboutAuthor-person-photo-link settings"
                           href="<?= get_permalink(icl_object_id(470, 'page', true, ICL_LANGUAGE_CODE)); ?>"
                           title="Редактировать профайл"><i class="icon-settings"></i></a>
                        <!--                        <a class="aboutAuthor-person-photo-link social fb" href="#"><i class="icon-fb"></i></a>-->
                    </div>
                    <p class="aboutAuthor-person-name"><?php the_author_meta('first_name', get_current_user_id()); echo ' '; the_author_meta('last_name', get_current_user_id()); ?></p>
                    <p class="aboutAuthor-person-status"><?php
                        $user_meta = get_userdata(get_current_user_id());
                        if ($user_roles = $user_meta->roles[0] == 'administrator') {
                            echo 'Администратор';
                        } elseif ($user_roles = $user_meta->roles[0] == 'subscriber') {
                            echo 'Пользователь';
                        } elseif ($user_roles = $user_meta->roles[0] == 'author') {
                            echo 'Автор';
                        } else {
                            echo $user_roles = $user_meta->roles[0];
                        }//array of roles the user is part of.?></p>
                </div>
                <div class="aboutAuthor-counters"><a class="aboutAuthor-counters-one purple"
                                                     href="blog-author.html#author-share"><i
                                class="aboutAuthor-counters-one-icon icon-earth"></i><span
                                class="aboutAuthor-counters-one-number">147</span>
                        <p class="text-p">Поделились</p></a><a class="aboutAuthor-counters-one blue"
                                                               href="blog-author.html#author-bookmarks"><i
                                class="aboutAuthor-counters-one-icon icon-bookmark-o"></i><span
                                class="aboutAuthor-counters-one-number">41</span>
                        <p class="text-p">Закладок</p></a><a class="aboutAuthor-counters-one red"
                                                             href="blog-author.html#author-articles"><i
                                class="aboutAuthor-counters-one-icon icon-newspaper"></i><span
                                class="aboutAuthor-counters-one-number">241</span>
                        <p class="text-p">Статьи</p></a></div>
            </div>
        </div>
    </section>
    <div class="mainWrap mainWrap-medium">
        <section class="l-articles row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <h2 class="title-4">История публикаций</h2><a class="sortArticles"><i class="icon-sort"></i><span
                                class="sortArticles-text">Последние публикации</span></a>
                </div>
                <ul class="articlesList-compact row">
                    <li class="columns column-block large-3 medium-4 small-12 edit label-on-moderate"><a
                                class="articlesList-item-text dark" href="authors-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="img/articles-list-item-img-4.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Анизотропию реликтового излучения распечатали на
                                    3D-принтере</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 edit label-rejected"><a
                                class="articlesList-item-text dark" href="authors-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="img/articles-list-item-img-5.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Глобальное потепление превратит Испанию и Португалию в
                                    пустыню</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 edit label-posted"><a
                                class="articlesList-item-text dark" href="authors-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="img/articles-list-item-img-6.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Комплекс молекулярных облаков Ореол Цефея скрывает в себе
                                    туманность Призрак</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 edit"><a
                                class="articlesList-item-text dark" href="authors-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="img/articles-list-item-img-7.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Главное за неделю: о флирте и насилии, замедлении старения и
                                    «звезде инопланетян»</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 edit"><a
                                class="articlesList-item-text dark" href="authors-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="img/articles-list-item-img-8.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Футуристический Лотос C-01 мотоциклов продано на аукционе</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 edit"><a
                                class="articlesList-item-text dark" href="authors-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="img/articles-list-item-img-9.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Фантастические световые установки по шкале Collectif</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 edit"><a
                                class="articlesList-item-text dark" href="authors-article.html">
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
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 edit"><a
                                class="articlesList-item-text dark" href="authors-article.html">
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
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 show-for-medium-only"><a
                                class="articlesList-item-text dark" href="authors-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="img/articles-list-item-img-5.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Глобальное потепление превратит Испанию и Португалию в
                                    пустыню</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                        <div class="articlesList-item-edit"><a class="articlesList-item-edit-edit" href="#"><i
                                        class="icon-pencil"></i></a>
                            <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>
                        </div>
                    </li>
                </ul>
                <button class="button-more-light">СМОТРЕТЬ БОЛЬШЕ</button>
            </div>
        </section>
    </div>
<style>
    .aboutAuthor-person-photo .avatar-default {
        width: 100%;
        height: 100%;
    }
</style>
<?php get_footer(); ?>