<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package science-of-everything
 */

get_header(); ?>
    <div class="mainWrap mainWrap-medium">
        <div class="l-banners row">
            <div class="banners-slider columns large-8 owl-carousel">
                <div class="banners-slideOne"><img src="<?php bloginfo('template_url'); ?>/app/img/slider-img-1.png">
                    <div class="banners-slideOne-content">
                        <div class="category category-technology">ТЕХНОЛОГИИ</div>
                        <h1 class="title-1 white">Ученые объяснили причины похолоданий, наступающих раз в 100 000
                            лет</h1>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </div>
                <div class="banners-slideOne"><img src="<?php bloginfo('template_url'); ?>/app/img/slider-img-1.png">
                    <div class="banners-slideOne-content">
                        <div class="category category-technology">ТЕХНОЛОГИИ</div>
                        <h1 class="title-1 white">Ученые объяснили причины похолоданий, наступающих раз в 100 000
                            лет</h1>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </div>
                <div class="banners-slideOne"><img src="<?php bloginfo('template_url'); ?>/app/img/slider-img-1.png">
                    <div class="banners-slideOne-content">
                        <div class="category category-technology">ТЕХНОЛОГИИ</div>
                        <h1 class="title-1 white">Ученые объяснили причины похолоданий, наступающих раз в 100 000
                            лет</h1>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </div>
                <div class="banners-slideOne"><img src="<?php bloginfo('template_url'); ?>/app/img/slider-img-1.png">
                    <div class="banners-slideOne-content">
                        <div class="category category-technology">ТЕХНОЛОГИИ</div>
                        <h1 class="title-1 white">Ученые объяснили причины похолоданий, наступающих раз в 100 000
                            лет</h1>
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banners-aside columns large-4">
                <div class="banners-aside-advertising"><img
                            src="<?php bloginfo('template_url'); ?>/app/img/special-banner-1.png"></div>
                <div class="banners-aside-social">
                    <button class="banners-aside-social-button fb"><i class="icon-fb"></i></button>
                    <button class="banners-aside-social-button vk"><i class="icon-vk"></i></button>
                </div>
            </div>
        </div>
        <section class="l-mainArticles row">
            <div class="articlesList-wrap columns large-8">
                <div class="section-title section-title-news">
                    <h2 class="title-2"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-book-open.png">ПОСЛЕДНИЕ
                        НОВОСТИ</h2>
                </div>
                <ul class="articlesList row">
                    <li class="columns column-block medium-6 small-12"><a class="articlesList-item-banner"
                                                                          href="rubric-article.html">
                            <div class="articlesList-item-bg"><img
                                        src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-bg-1.png">
                            </div>
                            <div class="category category-technology">ТЕХНОЛОГИИ</div>
                            <p class="title-3 white">Илон Маск представил новые разработки</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </a>
                    </li>
                    <li class="articlesList-item-text columns column-block medium-6 small-12"><a
                                class="articlesList-item-img-wrap" href="rubric-article.html"><img
                                    class="articlesList-item-img"
                                    src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-1.png"></a>
                        <p class="category-text category-text-technology">ТЕХНОЛОГИИ</p><a class="title-3"
                                                                                           href="rubric-article.html">Google
                            Glass превратили в тренажер кода Морзе</a>
                        <p class="text-p">Инженеры из Технологического института Джорджии разработали методику
                            пассивного освоения кода Морзе с помощью тактильных сигналов гарнитуры Google Glass.
                            Обучение, которое длится около четырех часов, происходит в игровой форме.
                        </p>
                    </li>
                    <li class="articlesList-item-text columns column-block medium-6 small-12"><a
                                class="articlesList-item-img-wrap" href="rubric-article.html"><img
                                    class="articlesList-item-img"
                                    src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-2.png"></a>
                        <p class="category-text category-text-astro">АСТРОФИЗИКА</p><a class="title-3"
                                                                                       href="rubric-article.html">«Стартест»
                            от NASA</a>
                        <p class="text-p">Инженеры из Технологического института Джорджии разработали методику
                            пассивного освоения кода Морзе с помощью тактильных сигналов гарнитуры Google Glass.
                            Обучение, которое длится около четырех часов, происходит в игровой форме.
                        </p>
                    </li>
                    <li class="columns column-block medium-6 small-12"><a class="articlesList-item-banner"
                                                                          href="rubric-article.html">
                            <div class="articlesList-item-bg"><img
                                        src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-bg-2.png">
                            </div>
                            <div class="category category-psycho">Психология</div>
                            <p class="title-3 white">Апофения: увидеть незримое и поверить в заговор</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </a>
                    </li>
                    <li class="columns column-block medium-6 small-12"><a class="articlesList-item-banner"
                                                                          href="rubric-article.html">
                            <div class="articlesList-item-bg"><img
                                        src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-bg-3.png">
                            </div>
                            <div class="category category-medtech">Медтех</div>
                            <p class="title-3 white">Апофения: увидеть незримое и поверить в заговор</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </a>
                    </li>
                    <li class="articlesList-item-text columns column-block medium-6 small-12"><a
                                class="articlesList-item-img-wrap" href="rubric-article.html"><img
                                    class="articlesList-item-img"
                                    src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-3.png"></a>
                        <p class="category-text category-text-technology">ТЕХНОЛОГИИ</p><a class="title-3"
                                                                                           href="rubric-article.html">Google
                            Glass превратили в тренажер кода Морзе</a>
                        <p class="text-p">Инженеры из Технологического института Джорджии разработали методику
                            пассивного освоения кода Морзе с помощью тактильных сигналов гарнитуры Google Glass.
                            Обучение, которое длится около четырех часов, происходит в игровой форме.
                        </p>
                    </li>
                </ul>
            </div>
            <aside class="sidebar-wrap columns large-4">
                <div class="section-title section-title-popular">
                    <h2 class="title-2"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-newspaper.png">ПОПУЛЯРНЫЕ
                        СТАТЬИ</h2>
                </div>
                <ul class="sidebar-list">
                    <li><a class="sidebar-list-img" href="rubric-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/sidebar-img-1.png"></a>
                        <div class="sidebar-item-content">
                            <p class="category-text category-text-sm category-text-technology">ТЕХНОЛОГИИ</p><a
                                    class="title-sm" href="rubric-article.html">«Легкие-на-чипе» научили курению в
                                затяг</a>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </li>
                    <li><a class="sidebar-list-img" href="rubric-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/sidebar-img-2.png"></a>
                        <div class="sidebar-item-content">
                            <p class="category-text category-text-sm category-text-astro">АСТРОФИЗИКА</p><a
                                    class="title-sm" href="rubric-article.html">Идентифицированы области мозга,
                                связанны...</a>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </li>
                    <li><a class="sidebar-list-img" href="rubric-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/sidebar-img-3.png"></a>
                        <div class="sidebar-item-content">
                            <p class="category-text category-text-sm category-text-psycho">ПСИХОЛОГИЯ</p><a
                                    class="title-sm" href="rubric-article.html">Идентифицированы области мозга,
                                связанны...</a>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </li>
                    <li><a class="sidebar-list-img" href="rubric-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/sidebar-img-4.png"></a>
                        <div class="sidebar-item-content">
                            <p class="category-text category-text-sm category-text-medtech">МедТех</p><a
                                    class="title-sm" href="rubric-article.html">Идентифицированы области мозга,
                                связанны...</a>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </li>
                    <li><a class="sidebar-list-img" href="rubric-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/sidebar-img-5.png"></a>
                        <div class="sidebar-item-content">
                            <p class="category-text category-text-sm category-text-future">БУДУЩЕЕ</p><a
                                    class="title-sm" href="rubric-article.html">Идентифицированы области мозга,
                                связанны...</a>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="sidebar-advertising"><img
                            src="<?php bloginfo('template_url'); ?>/app/img/special-banner-2.png"></div>
            </aside>
        </section>
    </div>
    <section class="l-sectionAstro dark-section-bg">
        <div class="mainWrap mainWrap-medium row">
            <div class="articlesList-wrap columns large-12">
                <div class="section-title section-title-astro">
                    <h2 class="title-2 white"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-planet.png">АСТРОФИЗИКА
                    </h2><a
                            class="sortArticles white" href="rubric.html"><i class="icon-sort"></i><span
                                class="sortArticles-text">Последнии статьи</span></a>
                </div>
                <ul class="articlesList-compact row">
                    <li class="columns column-block large-6 medium-12 small-12"><a
                                class="articlesList-item-banner center" href="rubric-article.html">
                            <div class="articlesList-item-bg"><img
                                        src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-bg-4.png">
                            </div>
                            <p class="title-3 white">Астрофизика мироздания. Цепочки шаров</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </a>
                    </li>
                    <li class="columns column-block large-6 medium-12 small-12 hide-for-medium-only hide-for-small-only">
                        <a class="articlesList-item-banner center" href="rubric-article.html">
                            <div class="articlesList-item-bg"><img
                                        src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-bg-5.png">
                            </div>
                            <p class="title-3 white">Американцы показали уникальное складное крыло</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </a>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                                  href="rubric-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-4.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Анизотропию реликтового излучения распечатали на 3D-принтере
                                    Анизотропию реликтового излучения распечатали на 3D-принтере</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                                  href="rubric-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-5.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-5 white">Глобальное потепление превратит Испанию и Португалию в пустыню
                                    Глобальное потепление превратит Испанию и Португалию в пустыню</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text dark"
                                                                                  href="rubric-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-6.png">
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
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12 hide-for-medium-only hide-for-small-only">
                        <a class="articlesList-item-text dark" href="rubric-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-7.png">
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
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="grey-section-bg2">
        <div class="mainWrap">
            <div class="sectionPsycho-banner row">
                <div class="columns"><img src="<?php bloginfo('template_url'); ?>/app/img/special-banner-3.png"></div>
            </div>
            <div class="mainWrap-medium">
                <section class="l-sectionTechno row">
                    <div class="columns large-12">
                        <div class="section-title section-title-technology">
                            <h2 class="title-2"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-techno.png">технологии
                            </h2><a class="sortArticles"
                                    href="rubric.html"><i
                                        class="icon-sort"></i><span
                                        class="sortArticles-text">Последнии статьи</span></a>
                        </div>
                        <ul class="articlesList articlesList-detail articlesList-techno row">
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4"><a
                                        class="articlesList-item-img-wrap" href="rubric-article.html"><img
                                            class="articlesList-item-img"
                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-12.png"></a><a
                                        class="title-3" href="rubric-article.html">Концептуальная High Standard
                                    Watch</a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                                <p class="text-p">В конце июля в прокат вышел тринадцатый по счету научно-фантастический
                                    фильм о Вселенной «Звездный путь», получивший название «Стартрек: Бесконечность».
                                    Представители американского космического ведомства в доказательство своей
                                    многолетней связи с этой медиафраншизой...
                                </p>
                            </li>
                            <li class="columns column-block medium-6 small-12 large-4"><a
                                        class="articlesList-item-banner" href="rubric-article.html">
                                    <div class="articlesList-item-bg"><img
                                                src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-bg-8.png">
                                    </div>
                                    <p class="title-3 white">Органические цифровые Скульптуры Jon Noorlander</p>
                                    <div class="counters">
                                        <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                        <div class="counters-item"><i class="icon-comment"></i>113</div>
                                    </div>
                                </a>
                            </li>
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4"><a
                                        class="articlesList-item-img-wrap" href="rubric-article.html"><img
                                            class="articlesList-item-img"
                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-13.png"></a><a
                                        class="title-3" href="rubric-article.html">На солнечных батареях Концепция Труба
                                    опресняет соленой воды в чистую питьевую воду</a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                                <p class="text-p">В конце июля в прокат вышел тринадцатый по счету научно-фантастический
                                    фильм о Вселенной «Звездный путь», получивший название «Стартрек: Бесконечность».
                                    Представители американского космического ведомства в доказательство своей
                                    многолетней связи с этой медиафраншизой...
                                </p>
                            </li>
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4 show-for-medium">
                                <a class="articlesList-item-img-wrap" href="rubric-article.html"><img
                                            class="articlesList-item-img"
                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-14.png"></a><a
                                        class="title-3" href="rubric-article.html">Футуристический Лотос C-01 мотоциклов
                                    продано на аукционе</a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                                <p class="text-p">В конце июля в прокат вышел тринадцатый по счету научно-фантастический
                                    фильм о Вселенной «Звездный путь», получивший название «Стартрек: Бесконечность».
                                    Представители американского космического ведомства в доказательство своей
                                    многолетней связи с этой медиафраншизой...
                                </p>
                            </li>
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4 show-for-large">
                                <a class="articlesList-item-img-wrap" href="rubric-article.html"><img
                                            class="articlesList-item-img"
                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-15.png"></a><a
                                        class="title-3" href="rubric-article.html">Фантастические световые установки по
                                    шкале Collectif</a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                                <p class="text-p">В конце июля в прокат вышел тринадцатый по счету научно-фантастический
                                    фильм о Вселенной «Звездный путь», получивший название «Стартрек: Бесконечность».
                                    Представители американского космического ведомства в доказательство своей
                                    многолетней связи с этой медиафраншизой...
                                </p>
                            </li>
                            <li class="articlesList-item-text columns column-block medium-6 small-12 large-4 show-for-large">
                                <a class="articlesList-item-img-wrap" href="rubric-article.html"><img
                                            class="articlesList-item-img"
                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-16.png"></a><a
                                        class="title-3" href="rubric-article.html">Brand New BMW Concept Titan
                                    Мотоциклетн</a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                                <p class="text-p">В конце июля в прокат вышел тринадцатый по счету научно-фантастический
                                    фильм о Вселенной «Звездный путь», получивший название «Стартрек: Бесконечность».
                                    Представители американского космического ведомства в доказательство своей
                                    многолетней связи с этой медиафраншизой...
                                </p>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="l-sectionPsycho dark-section-bg2">
        <div class="mainWrap mainWrap-medium row">
            <div class="columns large-12">
                <div class="section-title section-title-psycho">
                    <h2 class="title-2 white"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-brain.png">ПСИХОЛОГИЯ
                    </h2><a class="sortArticles white"
                            href="rubric.html"><i
                                class="icon-sort"></i><span class="sortArticles-text">Последнии статьи</span></a>
                </div>
                <ul class="articlesList-compact articlesList-psycho row">
                    <li class="columns column-block large-6 medium-12 small-12"><a
                                class="articlesList-item-banner center" href="rubric-article.html">
                            <div class="articlesList-item-bg"><img
                                        src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-bg-6.png">
                            </div>
                            <p class="title-3 white">Американцы показали уникальное складное крыло</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </a>
                    </li>
                    <li class="columns column-block large-3 medium-4 small-12"><a class="articlesList-item-text"
                                                                                  href="rubric-article.html">
                            <figure class="articlesList-item-img-wrap"><img class="articlesList-item-img"
                                                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-8.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-4 white">Антропоморфизм связали с «тревожным» бегством от близости</p>
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
                                                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-9.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-4 white">Ученые объяснили, почему человек испытывает дежавю</p>
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
                                                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-10.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-4 white">Компетентность футбольных рефери связали с ориентацией
                                    внимания</p>
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
                                                                            src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-img-11.png">
                            </figure>
                            <div class="articlesList-item-text-content">
                                <p class="title-4 white">Поверхностную оценку сексуальности связали с одобрением
                                    насилия</p>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="columns column-block large-6 medium-12 small-12 hide-for-medium-only"><a
                                class="articlesList-item-banner center" href="rubric-article.html">
                            <div class="articlesList-item-bg"><img
                                        src="<?php bloginfo('template_url'); ?>/app/img/articles-list-item-bg-7.png">
                            </div>
                            <p class="title-3 white">Американцы показали уникальное складное крыло</p>
                            <div class="counters">
                                <div class="counters-item"><i class="icon-time"></i>2 часа</div>
                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="l-sectionBooks grey-section-bg">
        <div class="mainWrap mainWrap-medium row">
            <div class="columns large-12">
                <div class="section-title section-title-books">
                    <h2 class="title-2"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-book.png">КНИГИ</h2>
                    <div class="sortArticles"><a href="books.html">Все книги</a></div>
                </div>
                <ul class="articlesList-books row">
                    <li class="articlesList-item-book columns medium-6 small-12 large-4"><a
                                class="articlesList-item-book-img" href="book-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/book-1.png"></a><a class="title-3"
                                                                                                       href="book-article.html">Под
                            давлением</a>
                        <p class="text-p">Как добиваться результатов в условиях жестких дедлайнов и неопределенности</p>
                    </li>
                    <li class="articlesList-item-book columns medium-6 small-12 large-4"><a
                                class="articlesList-item-book-img" href="book-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/book-2.png"></a><a class="title-3"
                                                                                                       href="book-article.html">Вилки
                            вместо
                            ножей на практике</a>
                        <p class="text-p">4-недельный пошаговый план перехода на здоровое питание</p>
                    </li>
                    <li class="articlesList-item-book columns medium-6 small-12 large-4"><a
                                class="articlesList-item-book-img" href="book-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/book-3.png"></a><a class="title-3"
                                                                                                       href="book-article.html">Восходящая
                            спираль</a>
                        <p class="text-p">Как нейрофизиология помогает справиться с негативом и депрессией — шаг за
                            шагом</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="mainWrap mainWrap-medium">
        <section class="l-sectionEvents row">
            <div class="sectionEvents-item column large-6 small-12">
                <div class="section-title section-title-events">
                    <h2 class="title-2"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-calendar-blue.png">АНОНС
                        СОБЫТИЙ</h2>
                </div>
                <ul class="articlesList-events">
                    <li><a class="articlesList-events-img" href="event-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/events-img-1.png"></a>
                        <div class="articlesList-events-content">
                            <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">5 ноября
                    <wbr><span class="articlesList-events-time">с 11:00 до 16:30</span></span></div>
                            <a class="title-4" href="event-article.html">Основы продуктовой аналитики для дизайнера</a>
                        </div>
                    </li>
                    <li><a class="articlesList-events-img" href="event-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/events-img-2.png"></a>
                        <div class="articlesList-events-content">
                            <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">5 ноября
                    <wbr><span class="articlesList-events-time">с 11:00 до 16:30</span></span></div>
                            <a class="title-4" href="event-article.html">Основы продуктовой аналитики для дизайнера</a>
                        </div>
                    </li>
                    <li><a class="articlesList-events-img" href="event-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/events-img-3.png"></a>
                        <div class="articlesList-events-content">
                            <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">5 ноября
                    <wbr><span class="articlesList-events-time">с 11:00 до 16:30</span></span></div>
                            <a class="title-4" href="event-article.html">Основы продуктовой аналитики для дизайнера</a>
                        </div>
                    </li>
                    <li class="show-for-medium-only"><a class="articlesList-events-img" href="event-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/events-img-7.png"></a>
                        <div class="articlesList-events-content">
                            <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">29 отября
                    <wbr>с 11:00 до 16:30</span></div>
                            <a class="title-4" href="event-article.html">Алгоритмическое программирование на
                                практике</a>
                        </div>
                    </li>
                </ul>
                <a class="button-light-outline-big" href="events.html">СМОТРЕТЬ БОЛЬШЕ</a>
            </div>
            <div class="sectionEvents-item column large-6 small-12">
                <div class="section-title section-title-past">
                    <h2 class="title-2"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-calendar-grey.png">ПРОШЕДШИЕ
                        СОБЫТИЯ</h2>
                </div>
                <ul class="articlesList-events">
                    <li><a class="articlesList-events-img" href="event-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/events-img-4.png"></a>
                        <div class="articlesList-events-content">
                            <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">5 ноября
                    <wbr><span class="articlesList-events-time">с 11:00 до 16:30</span></span></div>
                            <a class="title-4" href="event-article.html">Основы продуктовой аналитики для дизайнера</a>
                        </div>
                    </li>
                    <li><a class="articlesList-events-img" href="event-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/events-img-5.png"></a>
                        <div class="articlesList-events-content">
                            <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">5 ноября
                    <wbr><span class="articlesList-events-time">с 11:00 до 16:30</span></span></div>
                            <a class="title-4" href="event-article.html">Основы продуктовой аналитики для дизайнера</a>
                        </div>
                    </li>
                    <li><a class="articlesList-events-img" href="event-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/events-img-6.png"></a>
                        <div class="articlesList-events-content">
                            <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">5 ноября
                    <wbr><span class="articlesList-events-time">с 11:00 до 16:30</span></span></div>
                            <a class="title-4" href="event-article.html">Основы продуктовой аналитики для дизайнера</a>
                        </div>
                    </li>
                    <li class="show-for-medium-only"><a class="articlesList-events-img" href="event-article.html"><img
                                    src="<?php bloginfo('template_url'); ?>/app/img/events-img-7.png"></a>
                        <div class="articlesList-events-content">
                            <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">29 отября
                    <wbr>с 11:00 до 16:30</span></div>
                            <a class="title-4" href="event-article.html">Алгоритмическое программирование на
                                практике</a>
                        </div>
                    </li>
                </ul>
                <a class="button-light-outline-big" href="events.html">ПОКАЗАТЬ АРХИВ</a>
            </div>
        </section>
    </div>
    <section class="l-sectionPhoto dark-section-bg3">
        <div class="mainWrap sliderWrap-small">
            <div class="section-title-photo">
                <h2 class="title-2 white"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-photo.png">ФОТО</h2>
            </div>
            <div class="row">
                <div class="column large-3 photo-small-wrap"><a class="photo-small" href="photo-article.html">
                        <figure><img src="<?php bloginfo('template_url'); ?>/app/img/photo-1.png">
                            <figcaption>Куб цвета: суровые пейзажи французских пригородов</figcaption>
                        </figure>
                    </a><a class="photo-small" href="photo-article.html">
                        <figure><img src="<?php bloginfo('template_url'); ?>/app/img/photo-2.png">
                            <figcaption>Винтажная Америка</figcaption>
                        </figure>
                    </a></div>
                <div class="column large-6 photo-big-wrap"><a class="photo-big" href="photo-article.html">
                        <figure><img src="<?php bloginfo('template_url'); ?>/app/img/photo-3.png">
                            <figcaption class="title-1 white">Регион на вырост: мрачные пейзажи Ланьчжоу</figcaption>
                        </figure>
                    </a></div>
                <div class="column large-3 photo-small-wrap"><a class="photo-small" href="photo-article.html">
                        <figure><img src="<?php bloginfo('template_url'); ?>/app/img/photo-4.png">
                            <figcaption>Салонные фильтры</figcaption>
                        </figure>
                    </a><a class="photo-small" href="photo-article.html">
                        <figure><img src="<?php bloginfo('template_url'); ?>/app/img/photo-5.png">
                            <figcaption>Куда смотрит Статуя Свободы: окрестности глазами</figcaption>
                        </figure>
                    </a></div>
            </div>
            <div class="sectionPhoto-footer"><a class="button-dark-bg" href="photo.html">ПОСМОТРЕТЬ БОЛЬШЕ</a></div>
        </div>
    </section>
    <div class="subscribePopUp-bg">
        <div class="subscribePopUp-wrap">
            <div class="subscribePopUp-content">
                <button class="subscribePopUp-close"><i class="icon-close"></i></button>
                <img class="subscribePopUp-img" src="<?php bloginfo('template_url'); ?>/app/img/colored-logo.png">
                <p class="subscribePopUp-description">Science of everything - Используется он веб-дизайнерами для
                    вставки на руку при запуске проекта кириллице.</p>
                <div class="subscribePopUp-social">
                    <button class="subscribePopUp-social-button fb"><i class="icon-fb"></i></button>
                    <button class="subscribePopUp-social-button tw"><i class="icon-twitter"></i></button>
                    <button class="subscribePopUp-social-button vk"><i class="icon-vk"></i></button>
                    <button class="subscribePopUp-social-button gp"><i class="icon-google-plus"></i></button>
                </div>
                <p class="subscribePopUp-otherInfo">Вход через Соц. сети вы принимаете <a href="therm-of-use.html">Пользовательское
                        Соглашения</a>.</p>
            </div>
        </div>
    </div>
<?php get_footer(); ?>