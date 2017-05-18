<?php
/**
 * Template Name: events
 */
get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
      <div class="l-articles column large-8">
        <section class="articles-events-item">
          <div class="section-title-inner">
            <h2 class="title-2"><?php the_field('upcoming_events'); ?></h2>
          </div>
          <ul class="articlesList articlesList-detail row">
            <li class="articlesList-medium columns column-block small-12"><a class="articlesList-item-banner twoThirds" href="event-article.html">
                <div class="articlesList-item-bg"><img src="img/articles-list-item-bg-10.png"></div>
                <p class="title-1 white">Future Foundation Technology Ethics Conference</p>
                <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">29 отября 
                    <wbr>с 11:00 до 16:30</span></div></a></li>
            <li class="articlesList-item-text columns column-block medium-6 small-12 articlesList-medium"><a class="articlesList-item-img-wrap" href="event-article.html"><img class="articlesList-item-img" src="img/articles-list-item-img-13.png"></a><a class="title-3" href="event-article.html">Future Foundation Technology Ethics Conference</a>
              <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">29 отября 
                  <wbr>с 11:00 до 16:30</span></div>
              <p class="text-p">Инженеры из Технологического института Джорджии разработали методику пассивного освоения кода Морзе с помощью тактильных сигналов гарнитуры Google Glass. Обучение.
              </p>
            </li>
            <li class="articlesList-item-text columns column-block medium-6 small-12 articlesList-medium"><a class="articlesList-item-img-wrap" href="event-article.html"><img class="articlesList-item-img" src="img/articles-list-item-img-14.png"></a><a class="title-3" href="event-article.html">Future Foundation</a>
              <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">29 отября 
                  <wbr>с 11:00 до 16:30</span></div>
              <p class="text-p">Инженеры из Технологического института Джорджии разработали методику пассивного освоения кода Морзе с помощью тактильных сигналов гарнитуры Google Glass. Обучение.
              </p>
            </li>
          </ul>
          <div class="button-more"><span><?php the_field('load_more_posts_button_title'); ?></span><i class="icon-squares"></i></div>
        </section>
        <section class="articles-events-item">
          <div class="section-title-inner">
            <h2 class="title-2"><?php the_field('past_events'); ?></h2>
          </div>
          <ul class="articlesList articlesList-detail row">
            <li class="articlesList-medium columns column-block small-12"><a class="articlesList-item-banner twoThirds" href="event-article.html">
                <div class="articlesList-item-bg"><img src="img/slider-img-1.png"></div>
                <p class="title-1 white">Ученые объяснили причины похолоданий, наступающих раз в 100 000 лет</p>
                <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">29 отября 
                    <wbr>с 11:00 до 16:30</span></div></a></li>
            <li class="articlesList-item-text columns column-block medium-6 small-12 articlesList-medium"><a class="articlesList-item-img-wrap" href="event-article.html"><img class="articlesList-item-img" src="img/articles-list-item-img-1.png"></a><a class="title-3" href="event-article.html">Google Glass превратили в тренажер кода Морзе</a>
              <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">29 отября 
                  <wbr>с 11:00 до 16:30</span></div>
              <p class="text-p">Инженеры из Технологического института Джорджии разработали методику пассивного освоения кода Морзе с помощью тактильных сигналов гарнитуры Google Glass. Обучение.
              </p>
            </li>
            <li class="articlesList-item-text columns column-block medium-6 small-12 articlesList-medium"><a class="articlesList-item-img-wrap" href="event-article.html"><img class="articlesList-item-img" src="img/articles-list-item-img-2.png"></a><a class="title-3" href="event-article.html">«Стартест» от NASA</a>
              <div class="counters counters-item"><i class="icon-date"></i><span class="nowrap">29 отября 
                  <wbr>с 11:00 до 16:30</span></div>
              <p class="text-p">Инженеры из Технологического института Джорджии разработали методику пассивного освоения кода Морзе с помощью тактильных сигналов гарнитуры Google Glass. Обучение.
              </p>
            </li>
          </ul>
          <div class="button-more"><span><?php the_field('load_more_posts_button_title'); ?></span><i class="icon-squares"></i></div>
        </section>
      </div>
      <aside class="sidebar-wrap inner column large-4">
        <div class="calendar-wrap">
          <div class="calendar-title">
            <h4 class="calendar-title-text"><?php the_field('calendar_title'); ?></h4>
          </div>
          <div class="calendar-content" id="event-calendar">
            <div class="calendar-content-title"></div>
            <table class="calendar-content-table">
              <thead>
                <tr>
                  <th>Пн</th>
                  <th>Вт</th>
                  <th>Ср</th>
                  <th>Чт</th>
                  <th>Пт</th>
                  <th>Сб</th>
                  <th>Вс</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
            <div class="calendar-content-buttons">
              <button class="calendar-content-buttons-prev"><i class="icon-angle-left"></i><span class="calendar-prev-date"></span></button>
              <button class="calendar-content-buttons-next"><span class="calendar-next-date"></span><i class="icon-angle-right"></i></button>
            </div>
          </div>
        </div>
        <div class="sidebar-advertising"><img src="img/special-banner-2.png"></div>
      </aside>
    </div>
    <?php get_footer(); ?>