<?php
session_start();
if(get_post_type() == 'photos') {?>
    <li class="articlesList-item-text articlesList-item-hover columns column-block medium-6 small-12 large-4 articlesList-medium">
        <a
                class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>"><img
                    class="articlesList-item-img" src="<?php the_field('post_image'); ?>"></a><a
                class="title-3"
                href="<?php the_field('post_image'); ?>"><?php the_field('post_title'); ?></a>
        <div class="counters">
            <div class="counters-item"><i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
            <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
        </div>
        <p class="text-p"><?php echo mbCutString(strip_tags(get_field('post_description')), 155); ?>
        </p>
    </li>
<?php } elseif ((get_post_type() == 'videos') || (get_post_type() == 'video-collections')) { ?>
    <li class="articlesList-item-text articlesList-item-hover columns column-block medium-6 small-12 large-4 articlesList-medium-plus">
        <a class="articlesList-item-img-wrap articlesList-item-video"
           href="<?php the_permalink(); ?>"><!--
                                --><img class="articlesList-item-img" src="https://img.youtube.com/vi/<?php
            the_field('video_id'); ?>/maxresdefault.jpg""></a><!--
                                    --><a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <div class="counters">
            <div class="counters-item"><i
                        class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
            <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
        </div>
        <p class="text-p"><?= wp_trim_words(strip_tags(get_field('description')), 25); ?>
        </p>
    </li>
<?php } elseif (get_post_type() == 'book') { ?>
    <li class="articlesList-item-book articlesList-item-hover columns medium-6 small-12 large-3">
        <a class="articlesList-item-book-img" href="<?php the_permalink(); ?>">
            <img src="<?php the_field('book_mini'); ?>"></a>
        <a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <p class="text-p"><?php the_field('short description'); ?></p>
    </li>
<?php } elseif ((get_post_type() == 'event') && ($_SESSION['upcoming_ev'] == true) && ($_SESSION['past_ev'] == false)) {
    if (($alm_item == 1) && !$_SESSION['ix_upcoming']) {
        $_SESSION['ix_upcoming'] = 0;
    }

    if ((strtotime(get_post_meta(get_the_ID(), '_event_start_date', true)) > time())) {
        if ($_SESSION['ix_upcoming'] >= 3) {
            if (!$_SESSION['is_front_page']) { ?>
                <li class="articlesList-item-text columns column-block medium-6 small-12 articlesList-medium">
                    <a class="articlesList-item-img-wrap" href="<?= get_the_permalink() ?>">
                        <img class="articlesList-item-img" src="<?= get_the_post_thumbnail_url() ?>">
                    </a>
                    <a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="counters counters-item"><i class="icon-date"></i>
                        <span class="nowrap"><?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]') ?></span>
                    </div>
                    <p class="text-p"><?= wp_trim_words(get_the_excerpt(), 18) ?></p>
                    <script>
                        jQuery('.articlesList-item-text.columns.column-block.medium-6.small-12.articlesList-medium p').addClass('text-p');
                        console.log("upcoming: <?= $_SESSION['upcoming_ev'] ?>");
                        console.log("past: <?= $_SESSION['past_ev'] ?>");
                    </script>
                </li>
                <?php
            } else { ?>
                <li class="articlesList-item-hover"><a class="articlesList-events-img" href="<?php the_permalink(); ?>">
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
                    <script>
                        jQuery('.articlesList-item-text.columns.column-block.medium-6.small-12.articlesList-medium p').addClass('text-p');
                        console.log("upcoming: <?= $_SESSION['upcoming_ev'] ?>");
                        console.log("past: <?= $_SESSION['past_ev'] ?>");
                    </script>
                </li>
            <?php }
        } else {
            $_SESSION['ix_upcoming']++;
        }
    }
} elseif ((get_post_type() == 'event') && ($_SESSION['upcoming_ev'] == false) && ($_SESSION['past_ev'] == true)) {
    if (($alm_item == 1) && !$_SESSION['ix_past']) {
        $_SESSION['ix_past'] = 0;
    }

    if (!(strtotime(get_post_meta(get_the_ID(), '_event_start_date', true)) > time())) {
        if ($_SESSION['ix_past'] >= 3) {
            if (!$_SESSION['is_front_page']) { ?>
                <li class="articlesList-item-text columns column-block medium-6 small-12 articlesList-medium">
                    <a class="articlesList-item-img-wrap" href="<?= get_the_permalink() ?>">
                        <img class="articlesList-item-img" src="<?= get_the_post_thumbnail_url() ?>">
                    </a>
                    <a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="counters counters-item"><i class="icon-date"></i>
                        <span class="nowrap"><?= do_shortcode('[event]#_EVENTDATES @ #_EVENTTIMES[/event]') ?></span>
                    </div>
                    <p class="text-p"><?= wp_trim_words(get_the_excerpt(), 18) ?></p>
                    <script>
                        jQuery('.articlesList-item-text.columns.column-block.medium-6.small-12.articlesList-medium p').addClass('text-p');
                        console.log("upcoming: <?= $_SESSION['upcoming_ev'] ?>");
                        console.log("past: <?= $_SESSION['past_ev'] ?>");
                    </script>
                </li>
                <?php
            } else { ?>
                <li class="articlesList-item-hover"><a class="articlesList-events-img" href="<?php the_permalink(); ?>">
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
                    <script>
                        jQuery('.articlesList-item-text.columns.column-block.medium-6.small-12.articlesList-medium p').addClass('text-p');
                        console.log("upcoming: <?= $_SESSION['upcoming_ev'] ?>");
                        console.log("past: <?= $_SESSION['past_ev'] ?>");
                    </script>
                </li>
            <?php }
        } else {
            $_SESSION['ix_past']++;
        }
    }
} elseif ((get_post_type() == 'topics') && $_SESSION['category']) { ?>
    <li class="articlesList-item-text articlesList-item-hover columns column-block medium-6 small-12 large-4">
        <a class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>">
            <img class="articlesList-item-img" src="<?= get_the_post_thumbnail_url(); ?>">
        </a>
        <p class="category-text category-text-technology"><?php single_cat_title(); ?></p>
        <a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <p class="text-p"><?= wp_trim_words(get_the_excerpt(), 35); ?></p>
    </li>
<?php } elseif(get_post_type() == 'topics') { ?>
    <li class="columns column-block large-3 medium-4 small-12">
        <a class="articlesList-item-text" href="<?php the_permalink(); ?>">
            <figure class="articlesList-item-img-wrap">
                <img style="width: 255px; height: 165px;" class="articlesList-item-img" src="<?= get_the_post_thumbnail_url(); ?>">
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
                    <div class="counters-item"><i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                    <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                </div>
            </div>
        </a>
    </li>
<?php } elseif((get_post_type() == 'post') && ($_SESSION['blog'] == true)) { ?>
    <li class="articlesList-item-text articlesList-item-hover columns column-block medium-6 small-12 large-4<?php if ($i == 1) {
        echo ' articlesList-medium';
    } ?>">
        <a class="articlesList-item-img-wrap" href="<?php the_permalink(); ?>">
            <img class="articlesList-item-img" style="width: 350px; height: 230px;" src="<?php the_post_thumbnail_url(); ?>"></a><a
                class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <div class="counters">
            <div class="counters-item"><i class="icon-user"></i><?php the_author(); ?></div>
            <div class="counters-item"><i
                        class="icon-time"></i><?php wp_days_ago_v3(0, 86400); ?></div>
            <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
        </div>
        <p class="text-p"><?= get_the_excerpt(); ?></p>
    </li>
<?php } elseif(get_post_type() == 'post') { ?>
    <li class="columns column-block large-3 medium-4 small-12 edit <?php if (get_post_status() == 'pending') { ?>
                                label-on-moderate
                            <?php } elseif (get_post_status() == 'trash') { ?>
                                label-rejected
                            <?php } else { ?>
                                label-posted
                            <?php } ?>">
        <a class="<?php if(get_post_status() == 'trash') { echo 'trash '; }?>articlesList-item-text dark" href="<?php the_permalink(); ?>">
            <figure class="articlesList-item-img-wrap">
                <img class="articlesList-item-img" src="<?= get_the_post_thumbnail_url(); ?>">
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
            <!--                                    <button class="articlesList-item-edit-delete"><i class="icon-close2"></i></button>-->
        </div>
    </li>
<?php } elseif(get_post_type() == 'special') { ?>
    <li class="articlesList-special-item articlesList-item-hover">
        <a class="articlesList-special-item-img" href="<?php the_permalink(); ?>">
            <img src="<?php the_field('special_main_page_image'); ?>">
        </a>
        <div class="articlesList-special-item-text">
            <div class="counters counters-item"><i class="icon-date"></i>
                <span class="nowrap"><?php the_field('special_date'); ?></span>
            </div>
            <h3 class="title-3">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="text-p"><?php the_field('special_main_page_description'); ?></p>
        </div>
    </li>
<?php } ?>