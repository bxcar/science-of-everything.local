<?php
/**
 * Template Name: events
 */
session_start();
$_SESSION['ix_past'] = false;
$_SESSION['ix_upcoming'] = false;
$_SESSION['upcoming_ev'] = false;
$_SESSION['past_ev'] = false;
$_SESSION['is_front_page'] = false;
$_SESSION['category'] = false;
$_SESSION['blog'] = false;
get_header(); ?>

<div class="mainWrap mainWrap-medium row">
    <div class="l-articles column large-8">
        <section class="articles-events-item upcoming-events">
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
                    /*'meta_query' => array(
                        array(
                            'posts_per_page' => -1,
                            'meta_key' => '_event_start_date',
                            'meta_query' => array(array('meta_key' => '_event_start_date', 'meta_value' => $today, 'compare' => '>=', 'type' => 'date')),
                            'orderby' => 'meta_value',
                        ),
                    ),*/
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
                          --><a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
            <?php echo do_shortcode('[ajax_load_more post_type="event" meta_key="_event_start_date" orderby="meta_value" order="ASC" posts_per_page="-1" pause="true" scroll="false" button_label="' . get_field('load_more_posts_button_title') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]'); ?>
        </section>
        <section class="articles-events-item past-events">
            <div class="section-title-inner">
                <h2 class="title-2"><?php the_field('past_events'); ?></h2>
            </div>
            <ul class="articlesList articlesList-detail row">
                <?php
                $i = true;
                $today = getdate();
                $args = array(
                    'post_type' => 'event',
                    /*'tax_query' => array(
                        array(
                            'posts_per_page' => -1,
                            'meta_key' => '_event_start_date',
                            'meta_query' => array(array('meta_key' => '_event_start_date', 'meta_value' => $today, 'compare' => '>=', 'type' => 'date')),
                            'orderby' => 'meta_value',
                        ),
                    ),*/
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
                          --><a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
            <?php echo do_shortcode('[ajax_load_more post_type="event" meta_key="_event_start_date" orderby="meta_value" order="DESC" posts_per_page="-1" pause="true" scroll="false" button_label="' . get_field('load_more_posts_button_title') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]'); ?>
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
            <a href="<?php the_field('adv_link'); ?>" target="_blank"><img
                        src="<?php the_field('adv_image'); ?>"></a>
        </div>
    </aside>
</div>
<script>
    jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
        jQuery('div.alm-reveal').addClass("articlesList articlesList-detail row");
    });

    jQuery(document).ready(function () {
        jQuery('table.em-calendar tbody').prepend('<tr class="days-names"> <th>П</th> <th>В</th> <th>С</th> <th>Ч</th> <th>П</th> <th>С</th> <th>В</th> </tr>');
    });
    jQuery("#ajax-load-more").click(function (e) {
        var jqxhr = jQuery.get('<?= get_template_directory_uri(); ?>/event-set-session-vars.php?data=upcoming');
        jqxhr.success(function (data) {
            console.log("upcoming: <?= $_SESSION['upcoming_ev'] ?>");
            console.log("past: <?= $_SESSION['past_ev'] ?>");
        });
        jqxhr.error(function () {
            console.log("Ошибка выполнения");
        })
    });
    jQuery("#ajax-load-more-2").click(function (e) {
        var jqxhr_2 = jQuery.get('<?= get_template_directory_uri(); ?>/event-set-session-vars.php?data=past');
        jqxhr_2.success(function (data) {
            console.log("upcoming: <?= $_SESSION['upcoming_ev'] ?>");
            console.log("past: <?= $_SESSION['past_ev'] ?>");
        });
        jqxhr_2.error(function () {
            console.log("Ошибка выполнения");
        })
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
        text-align: center;
        padding: 5px;
    }

    tr.days-names th {
        font-weight: 700;
    }

    .alm-reveal .articlesList-medium.articlesList-item-text {
        float: left;
    }
</style>
<?php get_footer(); ?>
