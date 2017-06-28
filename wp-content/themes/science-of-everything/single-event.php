<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-article column large-8 small-12">
            <section class="article-visualContent">
                <figure class="article-visualContent-img"><img src="<?php the_post_thumbnail_url(); ?>"></figure>
                <div class="article-visualContent-text">
                    <div class="article-visualContent-details">
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i><span><?= gmdate("d.m.Y", strtotime(get_post_meta($id, '_event_start_date', true))); ?></span></div>
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
                    <?php echo do_shortcode('[event]#_EVENTNOTES[/event]'); ?>
                </div>
            </section>
<!--            -->
            <div class="shareSocial">
                <?php the_favorites_button(); ?>
                <?php echo do_shortcode('[TheChamp-Sharing count="1"]') ?>
                <div class="shareSocial-counters"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
            </div>
            <div class="tags">
                <p class="text-sub">Теги:</p>
                <div class="tags-list">
                    <?php echo do_shortcode('[event]#_EVENTTAGS[/event]'); ?>
                </div>
            </div>
            <script>
                jQuery(".tags-list a").click(function () {
                    jQuery(this).replaceWith(
                        jQuery('<span class="tags-one">' + this.innerHTML + '</span>')
                    );
                }).trigger("click");
            </script>
            <section class="article-subscribe">
                <div class="section-title">
                    <h2 class="title-4"><img src="<?= get_template_directory_uri(); ?>/app/img/icon-plane.svg">Подписаться на рассылку</h2>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="9" title="Подписка на рассылку" html_class="article-subscribe-form"]'); ?>
                <script>
                    jQuery('form.article-subscribe-form input[type="submit"]').replaceWith('<button class="button button-primary" type="submit">Подписаться</button>');
                </script>
            </section>
            <?php comments_template('/comments.php', true); ?>
        </article>
        <aside class="sidebar-wrap inner column large-4">
            <div class="calendar-wrap">
                <div class="calendar-title">
                    <h4 class="calendar-title-text">Календарь ближайших событий</h4>
                </div>
                <div class="calendar-content" id="event-calendar">
                    <?= do_shortcode('[events_calendar long_events=1 full=0]'); ?>
<!--                    <div class="calendar-content-title"></div>-->
                    <!--<table class="calendar-content-table">
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
                    </table>-->
                    <div class="calendar-content-buttons">
                        <button class="calendar-content-buttons-prev"><i class="icon-angle-left"></i><span
                                    class="calendar-prev-date"></span></button>
                        <button class="calendar-content-buttons-next"><span class="calendar-next-date"></span><i
                                    class="icon-angle-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="sidebar-advertising">
                <a href="<?php the_field('adv_link', '306'); ?>" target="_blank"><img src="<?php the_field('adv_image', '306'); ?>"></a>
            </div>
        </aside>
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
                                                    class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
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
        jQuery('.tags-list a').addClass('tags-one');
        jQuery('.article-content-text p').addClass('text-p');
        jQuery(document).ready(function () {
            jQuery('table.em-calendar tbody').prepend('<tr class="calendar-days"> <th>П</th> <th>В</th> <th>С</th> <th>Ч</th> <th>П</th> <th>С</th> <th>В</th> </tr>');
        });
        jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
            jQuery('div.alm-reveal').addClass("articlesList-compact column small-12 row");
        });
        jQuery( document ).ready(function() {
            jQuery('div.alm-btn-wrap button').addClass("button-more-light").wrap("<div class='column small-12'></div>");
            jQuery('div.alm-btn-wrap button.button-more-light').append("<i class='icon-squares'></i>");
        });
    </script>

    <style>
        div.tags-list {
            font-size: 0;
        }

        /*div.tags-list a {
            font-size: 12px;
        }*/

        .em-calendar-wrapper {
            width: 80%;
        }

        .calendar-content-buttons {
            display: none;
        }

        .calendar-content {
            height: 250px;
        }

        table.em-calendar .month_name {
            font-size: 24px;
            line-height: 1.3;
            font-weight: 700;
            color: #656565;
            margin-bottom: 15px;
        }

        table.em-calendar {
            width: 100%;
            height: 190px;
            font-size: 13px;
            color: #656565;
            vertical-align: middle;
        }

        table.em-calendar th,
        table.em-calendar td {
            vertical-align: middle;
        }

        tr.days-names td {
            font-weight: 700;
        }

        #ajax-load-more {
            width: 100%;
        }

        table.em-calendar .calendar-days th {
            text-align: center;
            font-weight: 700;
        }
    </style>
<?php get_footer(); ?>