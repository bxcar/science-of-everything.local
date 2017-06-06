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
                <?php
                $i = true;
                /*$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                $termst = $term->slug;*/
                $today = getdate();
                $args = array(
                    'post_type' => 'event',
                    'tax_query' => array(
                        array(
                            'posts_per_page' => -1,
                            'meta_key' => '_event_start_date',
                            'meta_query' => array(array('meta_key' => '_event_start_date', 'meta_value' => $today, 'compare' => '>=', 'type' => 'date')),
                            'orderby' => 'meta_value',
                        ),
                    ),
                    'meta_key' => '_event_start_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC'
                );

                //              echo EM_Events::output(array('scope'=>'future', 'limit'=>10, 'pagination'=>1));

                $photos = new WP_Query($args);
                $ix = 0;
                if ($photos->have_posts()) {
                    while ($photos->have_posts()) {
                        $photos->the_post(); ?>
                        <?php
                        if ((strtotime(get_post_meta($id, '_event_start_date', true)) > time()) && $ix < 3) {
                            // upcoming event
                            if ($i) {
                                $i = false; ?>
                                <li class="articlesList-medium columns column-block small-12">
                                    <a class="articlesList-item-banner twoThirds" href="<?php the_permalink(); ?>">
                                        <div class="articlesList-item-bg">
                                            <img src="<?php the_post_thumbnail_url(); ?>">
                                        </div>
                                        <p class="title-1 white"><?php the_title(); ?></p>
                                        <div class="counters counters-item"><i class="icon-date"></i><!--
                                  --><span class="nowrap"><?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]'); ?></span>
                                        </div>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="articlesList-item-text columns column-block medium-6 small-12 articlesList-medium"><!--
                          --><a class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>"><!--
                            --><img class="articlesList-item-img" src="<?php the_post_thumbnail_url(); ?>"><!--
                          --></a><!--
                          --><a class="title-3" href="event-article.html"><?php the_title(); ?></a>
                                    <div class="counters counters-item"><i class="icon-date"></i><!--
                              --><span class="nowrap"><?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]'); ?></span>
                                    </div>
                                    <p class="text-p"><?php the_excerpt(); ?></p>
                                    <script>
                                        jQuery('.articlesList-item-text.columns.column-block.medium-6.small-12.articlesList-medium p').addClass('text-p');
                                    </script>
                                    <!--#_EVENTDATES @ #_EVENTTIMES - #_EVENTEXCERPT{55}-->
                                </li>
                            <?php }
                            $ix++;
                        } /*else {
                          // past event
                      }*/
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <!--<div class="button-more"><span><?php /*the_field('load_more_posts_button_title'); */?></span><i
                        class="icon-squares"></i></div>-->
            <?php echo do_shortcode('[ajax_load_more post_type="event" posts_per_page="-1" offset="1" pause="true" scroll="false" button_label="' . get_field('load_more_posts_button_title') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]'); ?>
        </section>
        <section class="articles-events-item">
            <div class="section-title-inner">
                <h2 class="title-2"><?php the_field('past_events'); ?></h2>
            </div>
            <ul class="articlesList articlesList-detail row">
                <?php
                $i = true;
                $today = getdate();
                $args = array(
                    'post_type' => 'event',
                    'tax_query' => array(
                        array(
                            'posts_per_page' => -1,
                            'meta_key' => '_event_start_date',
                            'meta_query' => array(array('meta_key' => '_event_start_date', 'meta_value' => $today, 'compare' => '>=', 'type' => 'date')),
                            'orderby' => 'meta_value',
                        ),
                    ),
                    'meta_key' => '_event_start_date',
                    'orderby' => 'meta_value',
                    'order' => 'DESC'
                );

                $photos = new WP_Query($args);
                $ix = 0;
                if ($photos->have_posts()) {
                    while ($photos->have_posts()) {
                        $photos->the_post(); ?>
                        <?php
                        if (!(strtotime(get_post_meta($id, '_event_start_date', true)) > time()) && $ix < 3) {
                            // past event
                            if ($i) {
                                $i = false; ?>
                                <li class="articlesList-medium columns column-block small-12">
                                    <a class="articlesList-item-banner twoThirds" href="<?php the_permalink(); ?>">
                                        <div class="articlesList-item-bg">
                                            <img src="<?php the_post_thumbnail_url(); ?>">
                                        </div>
                                        <p class="title-1 white"><?php the_title(); ?></p>
                                        <div class="counters counters-item"><i class="icon-date"></i><!--
                                  --><span class="nowrap"><?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]'); ?></span>
                                        </div>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="articlesList-item-text columns column-block medium-6 small-12 articlesList-medium"><!--
                          --><a class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>"><!--
                            --><img class="articlesList-item-img" src="<?php the_post_thumbnail_url(); ?>"><!--
                          --></a><!--
                          --><a class="title-3" href="event-article.html"><?php the_title(); ?></a>
                                    <div class="counters counters-item"><i class="icon-date"></i><!--
                              --><span class="nowrap"><?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]'); ?></span>
                                    </div>
                                    <p class="text-p"><?php the_excerpt(); ?></p>
                                    <script>
                                        jQuery('.articlesList-item-text.columns.column-block.medium-6.small-12.articlesList-medium p').addClass('text-p');
                                    </script>
                                </li>
                            <?php }
                            $ix++;
                        }
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <div class="button-more"><span><?php the_field('load_more_posts_button_title'); ?></span><i
                        class="icon-squares"></i></div>
        </section>
    </div>
    <aside class="sidebar-wrap inner column large-4">
        <div class="calendar-wrap">
            <div class="calendar-title">
                <h4 class="calendar-title-text"><?php the_field('calendar_title'); ?></h4>
            </div>
            <!--            --><? //= do_shortcode('[events_calendar long_events=1 full=0]'); ?>
            <div class="calendar-content" id="event-calendar">
                <?= do_shortcode('[events_calendar long_events=1 full=0]'); ?>
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
                  <tbody>
                  </tbody>
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
            <a href="<?php the_field('adv_link'); ?>" target="_blank"><img src="<?php the_field('adv_image'); ?>"></a>
        </div>
    </aside>
</div>
<script>
    jQuery(document).ready(function () {
        jQuery('table.em-calendar tbody').append('<tr> <th>Пн</th> <th>Вт</th> <th>Ср</th> <th>Чт</th> <th>Пт</th> <th>Сб</th> <th>Вс</th> </tr>');
    });
</script>
<style>
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
</style>
<?php get_footer(); ?>