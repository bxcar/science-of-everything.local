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
                        <a class="aboutAuthor-detail-item" href="<?php the_permalink(); ?>">История публикаций</a>
                        <a class="aboutAuthor-detail-item" href="<?= get_site_url(); ?>/wp-admin/post-new.php?lang=ru">Подать
                            материал</a>
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
                    <p class="aboutAuthor-person-name"><?php the_author_meta('first_name', get_current_user_id());
                        echo ' ';
                        the_author_meta('last_name', get_current_user_id()); ?></p>
                    <p class="aboutAuthor-person-status"><?php
                        $user_meta = get_userdata(get_current_user_id());
                        if ($user_roles = $user_meta->roles[0] == 'administrator') {
                            echo 'Администратор';
                        } elseif ($user_roles = $user_meta->roles[0] == 'subscriber') {
                            echo 'Пользователь';
                        } elseif ($user_roles = $user_meta->roles[0] == 'author') {
                            echo 'Автор';
                        } elseif ($user_roles = $user_meta->roles[0] == 'contributor') {
                            echo 'Участник';
                        } else {
                            echo $user_roles = $user_meta->roles[0];
                        }//array of roles the user is part of.?></p>
                </div>
                <div class="aboutAuthor-counters"><a class="aboutAuthor-counters-one purple"
                                                     href="blog-author.html#author-share"><i
                                class="aboutAuthor-counters-one-icon icon-earth"></i><span
                                class="aboutAuthor-counters-one-number">147</span>
                        <p class="text-p">Поделились</p></a><a class="aboutAuthor-counters-one blue"
                                                               href="<?= get_permalink(); ?>?parm=bookmarks"><i
                                class="aboutAuthor-counters-one-icon icon-bookmark-o"></i><span
                                class="aboutAuthor-counters-one-number"><?php the_user_favorites_count(); ?></span>
                        <p class="text-p">Закладок</p></a><a class="aboutAuthor-counters-one red"
                                                             href="<?= get_site_url(); ?>/wp-admin/edit.php"><i
                                class="aboutAuthor-counters-one-icon icon-newspaper"></i><span
                                class="aboutAuthor-counters-one-number"><?= count_user_posts(get_current_user_id(), 'post'); ?></span>
                        <p class="text-p">Статьи</p></a>
                </div>
            </div>
        </div>
    </section>
    <div class="mainWrap mainWrap-medium">
        <section class="l-articles row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <h2 class="title-4"><?php if (!isset($_GET['parm'])) { echo 'История публикаций'; } else { echo 'Закладки'; }?></h2><a class="sortArticles"><i class="icon-sort"></i><span
                                class="sortArticles-text"><?php if (!isset($_GET['parm'])) { echo 'Последние публикации'; } else { echo 'Мои закладки'; }?></span></a>
                </div>
                <ul class="articlesList-compact row">
                    <?php
                    if (!isset($_GET['parm'])) {
                        $author_args = array(
                            'post_type' => 'post',
                            'author' => get_current_user_id(),
                            'posts_per_page' => 8,
                            'post_status' => array('publish', 'pending', 'trash')
                        );

                        $author = new WP_Query($author_args);
                        if ($author->have_posts()) {
                            while ($author->have_posts()) {
                                $author->the_post(); ?>
                                <li class="columns column-block large-3 medium-4 small-12 edit <?php if (get_post_status() == 'pending') { ?>
                                label-on-moderate
                            <?php } elseif (get_post_status() == 'trash') { ?>
                                label-rejected
                            <?php } else { ?>
                                label-posted
                            <?php } ?>">
                                    <a class="<?php if(get_post_status() == 'trash') { echo 'trash '; }?>articlesList-item-text dark" href="<?php the_permalink(); ?>">
                                        <figure class="articlesList-item-img-wrap">
                                            <img style="width: 255px; height: 165px;" class="articlesList-item-img" src="<?= get_the_post_thumbnail_url(); ?>">
                                        </figure>
                                        <div class="articlesList-item-text-content">
                                            <p class="title-5 white"><?php the_title(); ?></p>
                                            <div class="counters">
                                                <div class="counters-item"><i
                                                            class="icon-time"></i><?php wp_days_ago_v3(0, 86400); ?></div>
                                                <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php if (get_post_status() == 'trash') { ?>
                                        <script>
                                            jQuery("a.articlesList-item-text.dark.trash").click(function( event ) {
                                                event.preventDefault();
                                            }).css('cursor', 'default');
                                        </script>
                                    <?php } ?>
                                    <div class="articlesList-item-edit">
                                        <?php if (get_post_status() == 'pending') { ?>
                                            <a class="articlesList-item-edit-edit" href="<?= get_edit_post_link(); ?>">
                                                <i class="icon-pencil"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </li>
                            <?php }
                        }
                        wp_reset_postdata();
                    } else {
                        $author_args = array(
                            'post_type' => array('post','book','event', 'photos', 'topics', 'video-collections', 'videos', 'special'),
                            'post__in' => get_user_favorites(),
                            'posts_per_page' => -1,
                            'post_status' => array('publish', 'pending', 'trash')
                        );

                        $author = new WP_Query($author_args);
                        if ($author->have_posts()) {
                            while ($author->have_posts()) {
                                $author->the_post(); ?>
                                <li class="columns column-block large-3 medium-4 small-12 edit">
                                    <a class="articlesList-item-text dark" href="<?php the_permalink(); ?>">
                                        <figure class="articlesList-item-img-wrap">
                                            <img class="articlesList-item-img" <?php if (get_field('book_mini')) { ?>
                                                style="width: auto; height: 165px; margin-left: auto; margin-right: auto;"
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
                                                <?php } elseif (get_field('special_main_page_image')) { ?>
                                                    src="<?php the_field('special_main_page_image'); ?>"
                                                <?php } else { ?>
                                                    src="<?php the_post_thumbnail_url(); ?>"
                                                <?php } ?> >
                                        </figure>
                                        <div class="articlesList-item-text-content">
                                            <p class="title-5 white"><?php the_title(); ?></p>
                                            <div class="counters">
                                                <div class="counters-item">
                                                    <i class="icon-time"></i><?php wp_days_ago_v3(0, 86400); ?></div>
                                                <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php }
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </ul>
                <?php if(!isset($_GET['parm'])) { echo do_shortcode('[ajax_load_more id="author_posts" post_type="post" author="' . get_current_user_id() . '" posts_per_page="8" offset="8" pause="true" scroll="false" button_label="' . __('Смотреть больше', 'science-of-everything') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]'); }?>
            </div>
        </section>
    </div>
    <style>
        .aboutAuthor-person-photo .avatar-default {
            width: 100%;
            height: 100%;
        }

        .mainWrap-medium > .l-article:first-child {
            padding-top: 0;
        }

        .siblingsArticle-one-bg {
            top: -85px;
        }

        #ajax-load-more {
            width: 100%;
        }
    </style>
    <script>
        jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
            jQuery('div.alm-reveal').addClass("articlesList-compact column small-12 row");
        });
        jQuery(document).ready(function () {
            jQuery('div.alm-btn-wrap button').addClass("button-more-light").wrap("<div class='column small-12'></div>");
            jQuery('div.alm-btn-wrap button.button-more-light').append("<i class='icon-squares'></i>");
        });
    </script>
<?php get_footer();
//Since you are using WPML, we have automatically disabled recurring events, your recurrences already created will act as normal single events. This is because recurrences are not compatible with WPML at the moment. If you really still want recurrences enabled, then you should add define('EM_WMPL_FORCE_RECURRENCES',true); to your wp-config.php file. Dismiss ?>