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
session_start();
$_SESSION['ix_past'] = false;
$_SESSION['ix_upcoming'] = false;
$_SESSION['upcoming_ev'] = false;
$_SESSION['past_ev'] = false;
$_SESSION['is_front_page'] = true;
$_SESSION['category'] = false;
$_SESSION['blog'] = false;
get_header(); ?>
<?php //the_field('top_slider_category');?>
<div class="mainWrap mainWrap-medium">
    <div class="l-banners row">
        <div class="banners-slider columns large-8 owl-carousel">
            <?php
            $top_slider_cats_args = array(
                'cat' => get_field('top_slider_category'),
                'post_type' => 'topics',
                'posts_per_page' => 4,
            );

            $top_slider_cats = new WP_Query($top_slider_cats_args);
            $cat_name = get_cat_name(get_field('top_slider_category'));
            if ($top_slider_cats->have_posts()) {
                while ($top_slider_cats->have_posts()) {
                    $top_slider_cats->the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="banners-slideOne">
                            <img width="730" height="432" src="<?php the_field('730x432_image'); ?>">
                            <div class="banners-slideOne-content">
                                <div class="category category-technology"><?= $cat_name ?></div>
                                <h1 class="title-1 white"><?php the_title(); ?></h1>
                                <div class="counters">
                                    <div class="counters-item">
                                        <i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                    </div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            }
            wp_reset_postdata();
            ?>
        </div>
        <div class="banners-aside columns large-4">
            <div class="banners-aside-advertising">
                <a target="_blank" href="<?php the_field('ads1_link'); ?>">
                    <img src="<?php the_field('ads1_image'); ?>">
                </a>
            </div>
            <div class="banners-aside-social">
                <a class="banners-aside-social-button fb" target="_blank"
                   href="<?php the_field('ads1_soclial1_link'); ?>">
                    <i class="fa <?php the_field('ads1_soclial1_image'); ?>" aria-hidden="true"></i>
                </a>
                <a class="banners-aside-social-button vk" target="_blank"
                   href="<?php the_field('ads1_soclial2_link'); ?>">
                    <i class="fa <?php the_field('ads1_soclial2_image'); ?>" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <section class="l-mainArticles row">
        <div class="articlesList-wrap columns large-8">
            <div class="section-title section-title-news">
                <h2 class="title-2">
                    <img src="<?php bloginfo('template_url'); ?>/app/img/icon-book-open.png">
                    <?php the_field('section_header_1'); ?>
                </h2>
            </div>
            <ul class="articlesList row">
                <?php
                $mainArticles_args = array(
                    'post_type' => 'topics',
                    'posts_per_page' => 6,
                );

                $mainArticles = new WP_Query($mainArticles_args);
                $mainArticles_counter = 1;
                if ($mainArticles->have_posts()) {
                    while ($mainArticles->have_posts()) {
                        $mainArticles->the_post();
                        if (($mainArticles_counter == 1) || ($mainArticles_counter == 4) || ($mainArticles_counter == 5)) { ?>
                            <li class="columns column-block medium-6 small-12">
                                <a class="articlesList-item-banner" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg">
                                        <img src="<?= get_the_post_thumbnail_url(); ?>">
                                    </div>
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories) {
                                        foreach ($categories as $category) {
                                            echo '<div class="category category-technology">' . $category->name . '</div>';
                                        }
                                    }
                                    ?>
                                    <p class="title-3 white"><?php the_title(); ?></p>
                                    <div class="counters">
                                        <div class="counters-item">
                                            <i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                        </div>
                                        <div class="counters-item"><i class="icon-comment"></i>113</div>
                                    </div>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="articlesList-item-text columns column-block medium-6 small-12">
                                <a class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>">
                                    <img width="350" height="230" class="articlesList-item-img"
                                         src="<?= get_the_post_thumbnail_url(); ?>">
                                </a>
                                <?php
                                $categories = get_the_category();
                                if ($categories) {
                                    foreach ($categories as $category) {
                                        echo '<p class="category-text category-text-technology">' . $category->name . '</p>';
                                    }
                                }
                                ?>
                                <a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <p class="text-p"><?= get_the_excerpt(); ?></p>
                            </li>
                        <?php }
                        $mainArticles_counter++;
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
        <aside class="sidebar-wrap columns large-4">
            <div class="section-title section-title-popular">
                <h2 class="title-2">
                    <img src="<?php bloginfo('template_url'); ?>/app/img/icon-newspaper.png">
                    <?php the_field('section_header_2'); ?>
                </h2>
            </div>
            <ul class="sidebar-list">
                <?php
                $sidebar_populars_args = array(
                    'post_type' => 'topics',
                    'posts_per_page' => 5,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'views',
                    'order' => 'DESC'
                );

                $sidebar_populars = new WP_Query($sidebar_populars_args);
                if ($sidebar_populars->have_posts()) {
                    while ($sidebar_populars->have_posts()) {
                        $sidebar_populars->the_post(); ?>
                        <li><a class="sidebar-list-img" href="<?php the_permalink(); ?>">
                                <img width="130" height="100" src="<?= get_the_post_thumbnail_url(); ?>"></a>
                            <div class="sidebar-item-content">
                                <?php
                                $categories = get_the_category();
                                if ($categories) {
                                    foreach ($categories as $category) {
                                        echo '<p class="category-text category-text-sm category-text-technology">' . $category->name . '</p>';
                                    }
                                }
                                ?>
                                <a class="title-sm"
                                   href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 4); ?></a>
                                <div class="counters">
                                    <div class="counters-item"><i
                                                class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i>113</div>
                                </div>
                            </div>
                        </li>
                    <?php }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <div class="sidebar-advertising">
                <a target="_blank" href="<?php the_field('ads2_link'); ?>">
                    <img src="<?php the_field('ads2_image'); ?>">
                </a>
            </div>
        </aside>
    </section>
</div>
<section class="l-sectionAstro dark-section-bg">
    <div class="mainWrap mainWrap-medium row">
        <div class="articlesList-wrap columns large-12">
            <div class="section-title section-title-astro">
                <h2 class="title-2 white"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-planet.png">
                    <?= get_cat_name(get_field('taxonomy_1')); ?>
                </h2>
                <a class="sortArticles white" href="<?= get_category_link(get_field('taxonomy_1')); ?>"><i
                            class="icon-sort"></i>
                    <span class="sortArticles-text">Последние статьи</span>
                </a>
            </div>
            <ul class="articlesList-compact row">
                <?php
                $first_cat_args = array(
                    'post_type' => 'topics',
                    'cat' => get_field('taxonomy_1'),
                    'posts_per_page' => 6,
                );

                $first_cat = new WP_Query($first_cat_args);
                $first_cat_counter = 1;
                if ($first_cat->have_posts()) {
                    while ($first_cat->have_posts()) {
                        $first_cat->the_post();
                        if (($first_cat_counter == 1) || ($first_cat_counter == 2)) { ?>
                            <li class="columns column-block large-6 medium-12 small-12">
                                <a class="articlesList-item-banner center" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg">
                                        <img src="<?= get_the_post_thumbnail_url(); ?>">
                                    </div>
                                    <p class="title-3 white"><?php the_title(); ?></p>
                                    <div class="counters">
                                        <div class="counters-item"><i
                                                    class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                        </div>
                                        <div class="counters-item"><i class="icon-comment"></i>113</div>
                                    </div>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="columns column-block large-3 medium-4 small-12">
                                <a class="articlesList-item-text dark" href="<?php the_permalink(); ?>">
                                    <figure class="articlesList-item-img-wrap">
                                        <img class="articlesList-item-img"
                                             src="<?= get_the_post_thumbnail_url(); ?>">
                                    </figure>
                                    <div class="articlesList-item-text-content">
                                        <p class="title-5 white"><?php the_title(); ?></p>
                                        <div class="counters">
                                            <div class="counters-item"><i
                                                        class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                            </div>
                                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php }
                        $first_cat_counter++;
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>
</section>
<div class="grey-section-bg2">
    <div class="mainWrap">
        <div class="sectionPsycho-banner row">
            <div class="columns">
                <a target="_blank" href="<?php the_field('ads3_link'); ?>">
                    <img src="<?php the_field('ads3_image'); ?>">
                </a>
            </div>
        </div>
        <div class="mainWrap-medium">
            <section class="l-sectionTechno row">
                <div class="columns large-12">
                    <div class="section-title section-title-technology">
                        <h2 class="title-2"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-techno.png">
                            <?= get_cat_name(get_field('taxonomy_2')); ?>
                        </h2>
                        <a class="sortArticles" href="<?= get_category_link(get_field('taxonomy_2')); ?>">
                            <i class="icon-sort"></i>
                            <span class="sortArticles-text">Последние статьи</span>
                        </a>
                    </div>
                    <ul class="articlesList articlesList-detail articlesList-techno row">
                        <?php
                        $second_cat_args = array(
                            'post_type' => 'topics',
                            'cat' => get_field('taxonomy_2'),
                            'posts_per_page' => 6,
                        );

                        $second_cat = new WP_Query($second_cat_args);
                        $second_cat_counter = 1;
                        if ($second_cat->have_posts()) {
                            while ($second_cat->have_posts()) {
                                $second_cat->the_post();
                                if ($second_cat_counter == 2) { ?>
                                    <li class="columns column-block medium-6 small-12 large-4">
                                        <a class="articlesList-item-banner" href="<?php the_permalink(); ?>">
                                            <div class="articlesList-item-bg">
                                                <img src="<?= get_the_post_thumbnail_url(); ?>">
                                            </div>
                                            <p class="title-3 white"><?php the_title(); ?></p>
                                            <div class="counters">
                                                <div class="counters-item"><i
                                                            class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                                </div>
                                                <div class="counters-item"><i class="icon-comment"></i>113</div>
                                            </div>
                                        </a>
                                    </li>
                                <?php } else { ?>
                                    <li class="articlesList-item-text columns column-block medium-6 small-12 large-4">
                                        <a class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>">
                                            <img width="350" height="230" class="articlesList-item-img"
                                                 src="<?= get_the_post_thumbnail_url(); ?>">
                                        </a>
                                        <a class="title-3"
                                           href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <div class="counters">
                                            <div class="counters-item"><i
                                                        class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                            </div>
                                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                                        </div>
                                        <p class="text-p"><?= get_the_excerpt(); ?></p>
                                    </li>
                                <?php }
                                $second_cat_counter++;
                            }
                        }
                        wp_reset_postdata();
                        ?>
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
                <h2 class="title-2 white"><img src="<?php bloginfo('template_url'); ?>/app/img/icon-brain.png">
                    <?= get_cat_name(get_field('taxonomy_3')); ?>
                </h2>
                <a class="sortArticles white" href="<?= get_category_link(get_field('taxonomy_3')); ?>">
                    <i class="icon-sort"></i><span class="sortArticles-text">Последние статьи</span>
                </a>
            </div>
            <ul class="articlesList-compact articlesList-psycho row">
                <?php
                $third_cat_args = array(
                    'post_type' => 'topics',
                    'cat' => get_field('taxonomy_3'),
                    'posts_per_page' => 6,
                );

                $third_cat = new WP_Query($third_cat_args);
                $third_cat_counter = 1;
                if ($third_cat->have_posts()) {
                    while ($third_cat->have_posts()) {
                        $third_cat->the_post();
                        if (($third_cat_counter == 1) || ($third_cat_counter == 6)) { ?>
                            <li class="columns column-block large-6 medium-12 small-12">
                                <a class="articlesList-item-banner center" href="<?php the_permalink(); ?>">
                                    <div class="articlesList-item-bg">
                                        <img src="<?= get_the_post_thumbnail_url(); ?>">
                                    </div>
                                    <p class="title-3 white"><?php the_title(); ?></p>
                                    <div class="counters">
                                        <div class="counters-item"><i
                                                    class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                        </div>
                                        <div class="counters-item"><i class="icon-comment"></i>113</div>
                                    </div>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="columns column-block large-3 medium-4 small-12">
                                <a class="articlesList-item-text" href="<?php the_permalink(); ?>">
                                    <figure class="articlesList-item-img-wrap">
                                        <img class="articlesList-item-img"
                                             src="<?= get_the_post_thumbnail_url(); ?>">
                                    </figure>
                                    <div class="articlesList-item-text-content">
                                        <p class="title-4 white"><?php the_title(); ?></p>
                                        <div class="counters">
                                            <div class="counters-item"><i
                                                        class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?>
                                            </div>
                                            <div class="counters-item"><i class="icon-comment"></i>113</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php }
                        $third_cat_counter++;
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>
</section>
<section class="l-sectionBooks grey-section-bg">
    <div class="mainWrap mainWrap-medium row">
        <div class="columns large-12">
            <div class="section-title section-title-books">
                <h2 class="title-2">
                    <img src="<?php bloginfo('template_url'); ?>/app/img/icon-book.png">
                    <?php the_field('section_header_3'); ?>
                </h2>
                <div class="sortArticles"><?php icl_link_to_element(379, 'page', 'Все книги'); ?></div>
            </div>
            <ul class="articlesList-books row">
                <?php
                $books_args = array(
                    'post_type' => 'book',
                    'posts_per_page' => 3,
                );

                $books = new WP_Query($books_args);
                if ($books->have_posts()) {
                    while ($books->have_posts()) {
                        $books->the_post(); ?>
                        <li class="articlesList-item-book columns medium-6 small-12 large-4">
                            <a class="articlesList-item-book-img" href="<?php the_permalink(); ?>">
                                <img src="<?php the_field('book_mini') ?>">
                            </a>
                            <a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <p class="text-p"><?= wp_trim_words(get_the_excerpt(), 10); ?></p>
                        </li>
                    <?php }
                }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>
</section>
<div class="mainWrap mainWrap-medium">
    <section class="l-sectionEvents row">
        <div class="sectionEvents-item column large-6 small-12">
            <div class="section-title section-title-events">
                <h2 class="title-2">
                    <img src="<?php bloginfo('template_url'); ?>/app/img/icon-calendar-blue.png">
                    <?php the_field('section_header_4'); ?></h2>
            </div>
            <ul class="articlesList-events">
                <?php
                $today = getdate();
                $events_args = array(
                    'post_type' => 'event',
                    'meta_key' => '_event_start_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC'
                );

                $events = new WP_Query($events_args);
                $event_counter = 0;
                if ($events->have_posts()) {
                    while ($events->have_posts()) {
                        $events->the_post();
                        if (strtotime(get_post_meta($id, '_event_start_date', true)) > time() && $event_counter < 3) { ?>
                            <li><a class="articlesList-events-img" href="<?php the_permalink(); ?>">
                                    <img style="width: 160px; height: 160px;"
                                         src="<?= get_the_post_thumbnail_url(); ?>"></a>
                                <div class="articlesList-events-content">
                                    <div class="counters counters-item"><i class="icon-date"></i>
                                        <span class="nowrap">
                                                <?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]'); ?>
                                            </span>
                                    </div>
                                    <a class="title-4" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </li>
                            <?php $event_counter++;
                        } elseif (strtotime(get_post_meta($id, '_event_start_date', true)) > time() && $event_counter == 3) { ?>
                            <li class="show-for-medium-only"><a class="articlesList-events-img"
                                                                href="<?php the_permalink(); ?>">
                                    <img style="width: 160px; height: 160px;"
                                         src="<?= get_the_post_thumbnail_url(); ?>"></a>
                                <div class="articlesList-events-content">
                                    <div class="counters counters-item"><i class="icon-date"></i>
                                        <span class="nowrap">
                                                <?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]'); ?>
                                            </span>
                                    </div>
                                    <a class="title-4" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </li>
                            <?php $event_counter++;
                        }
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <?php echo do_shortcode('[ajax_load_more post_type="event" meta_key="_event_start_date" orderby="meta_value" order="ASC" posts_per_page="-1" pause="true" scroll="false" button_label="' . __('Смотреть больше', 'science-of-everything') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]'); ?>
        </div>
        <div class="sectionEvents-item column large-6 small-12">
            <div class="section-title section-title-past">
                <h2 class="title-2">
                    <img src="<?php bloginfo('template_url'); ?>/app/img/icon-calendar-grey.png">
                    <?php the_field('section_header_5'); ?>
                </h2>
            </div>
            <ul class="articlesList-events">
                <?php
                $events_args_past = array(
                    'post_type' => 'event',
                    'meta_key' => '_event_start_date',
                    'orderby' => 'meta_value',
                    'order' => 'DESC'
                );
                $events = new WP_Query($events_args_past);
                $event_counter = 0;
                if ($events->have_posts()) {
                    while ($events->have_posts()) {
                        $events->the_post();
                        if (!(strtotime(get_post_meta($id, '_event_start_date', true)) > time()) && $event_counter < 3) { ?>
                            <li><a class="articlesList-events-img" href="<?php the_permalink(); ?>">
                                    <img style="width: 160px; height: 160px;"
                                         src="<?= get_the_post_thumbnail_url(); ?>"></a>
                                <div class="articlesList-events-content">
                                    <div class="counters counters-item"><i class="icon-date"></i>
                                        <span class="nowrap">
                                                <?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]'); ?>
                                            </span>
                                    </div>
                                    <a class="title-4" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </li>
                            <?php $event_counter++;
                        } elseif (!(strtotime(get_post_meta($id, '_event_start_date', true)) > time()) && $event_counter == 3) { ?>
                            <li class="show-for-medium-only"><a class="articlesList-events-img"
                                                                href="<?php the_permalink(); ?>">
                                    <img style="width: 160px; height: 160px;"
                                         src="<?= get_the_post_thumbnail_url(); ?>"></a>
                                <div class="articlesList-events-content">
                                    <div class="counters counters-item"><i class="icon-date"></i>
                                        <span class="nowrap">
                                                <?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]'); ?>
                                            </span>
                                    </div>
                                    <a class="title-4" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </li>
                            <?php $event_counter++;
                        }
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <?php echo do_shortcode('[ajax_load_more post_type="event" meta_key="_event_start_date" orderby="meta_value" order="DESC" posts_per_page="-1" pause="true" scroll="false" button_label="' . __('Показать архив', 'science-of-everything') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]'); ?>
        </div>
    </section>
</div>
<section class="l-sectionPhoto dark-section-bg3">
    <div class="mainWrap sliderWrap-small">
        <div class="section-title-photo">
            <h2 class="title-2 white">
                <img src="<?php bloginfo('template_url'); ?>/app/img/icon-photo.png">
                <?php the_field('section_header_6'); ?>
            </h2>
        </div>
        <div class="row">
            <?php
            $photos_args = array(
                'post_type' => 'photos',
                'posts_per_page' => 5,
            );


            $photos = new WP_Query($photos_args);
            $photos_counter = 0;
            if ($photos->have_posts()) {
                while ($photos->have_posts()) {
                    $photos->the_post();
                    if ($photos_counter != 2) {
                        if (($photos_counter == 0) || $photos_counter == 3) { ?>
                            <div class="column large-3 photo-small-wrap">
                            <a class="photo-small" href="<?php the_permalink(); ?>">
                                <figure><img style="width: 255px; height: 165px;"
                                             src="<?php the_field('post_image'); ?>">
                                    <figcaption><?php the_title(); ?></figcaption>
                                </figure>
                            </a>
                        <?php } else { ?>
                            <a class="photo-small" href="<?php the_permalink(); ?>">
                                <figure><img style="width: 255px; height: 165px;"
                                             src="<?php the_field('post_image'); ?>">
                                    <figcaption><?php the_title(); ?></figcaption>
                                </figure>
                            </a>
                            </div>
                        <?php }
                        $photos_counter++;
                    } else { ?>
                        <div class="column large-6 photo-big-wrap">
                            <a class="photo-big" href="<?php the_permalink(); ?>">
                                <figure>
                                    <img style="width: 540px; height: 490px;" src="<?php the_field('post_image'); ?>">
                                    <figcaption class="title-1 white"><?php the_title(); ?></figcaption>
                                </figure>
                            </a>
                        </div>
                        <?php $photos_counter++;
                    }
                }
            }
            wp_reset_postdata();
            ?>
        </div>
        <div class="sectionPhoto-footer"><a class="button-dark-bg" href="<?php the_permalink(icl_object_id(2, 'page', true, ICL_LANGUAGE_CODE)); ?>"><?php _e('Посмотреть больше', 'science-of-everything')?></a></div>
    </div>
</section>
<div class="subscribePopUp-bg" style="display: none !important;">
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
<script>
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

    jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
        jQuery('div.alm-reveal').addClass("articlesList-events");
    });

    jQuery( document ).ready(function() {
        jQuery('div.alm-btn-wrap button').addClass("button-light-outline-big");
    });
</script>
<?php get_footer(); ?>
