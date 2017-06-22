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
                    <span><?php global $wp_query;
                        echo $wp_query->found_posts; ?></span>
                    <span class="hide-for-small-only">Результаты поиска</span>
                </p>
            </div>
            <p class="search-hint">Введите для повторного поиска</p>
            <?php
            if (have_posts()) { ?>
                <ul class="articlesList-compact row">
                    <?php while (have_posts()) {
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
                                        <?php } elseif (get_field('special_main_page_image')) { ?>
                                            src="<?php the_field('special_main_page_image'); ?>"
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
                                        <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else {
                ?>
                <p class="title-2">Извините, результатов не найдено.</p>
                <?php
            } ?>
            <?php
            //                $term = (isset($_GET['s'])) ? $_GET['s'] : '';
            //                echo do_shortcode('[ajax_load_more id="relevanssi" search="'. $term .'" post_type="post, page, book, event, photos, topics, video-collections, videos" posts_per_page="-1" offset="10" pause="true" scroll="false" button_label="' . __('Загрузить больше результатов поиска','science-of-everything') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]');
            ?>
            <!--            <button class="button-more-light">Загрузить больше результатов поиска</button>-->
        </div>
    </div>
<?php get_footer(); ?>