<?php
/**
 * Template Name: books
 */
get_header(); ?>
    <div class="mainWrap mainWrap-medium">
        <section class="l-articles row">
            <div class="column small-12">
                <div class="section-title-inner">
                    <h2 class="title-4"><?php the_field('page_title'); ?></h2>
                    <select class="sortArticles-select">
                        <?php
                        if (!isset($_GET['sort']) || ($_GET['sort'] == 'date')) { ?>
                            <option selected
                                    value="<?= get_permalink(); ?>?sort=date"><?php the_field('sort_last'); ?></option>
                            <option value="<?= get_permalink(); ?>?sort=popular"><?php the_field('sort_popular'); ?></option>
                        <?php } else { ?>
                            <option value="<?= get_permalink(); ?>?sort=date"><?php the_field('sort_last'); ?></option>
                            <option selected
                                    value="<?= get_permalink(); ?>?sort=popular"><?php the_field('sort_popular'); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <ul class="articlesList-books column small-12 row">
                <?php
                $sort = '';
                if (!isset($_GET['sort']) || ($_GET['sort'] == 'date')) {
                    $orderby = 'date';
                } else {
                    $orderby = 'meta_value_num';
                }

                $photos = array(
                    'post_type' => 'book',
                    'posts_per_page' => 12,
                    'orderby' => $orderby,
                    'meta_key' => 'views',
                    'order' => 'DESC'
                );

                $photos = new WP_Query($photos);
                if ($photos->have_posts()) {
                    while ($photos->have_posts()) {
                        $photos->the_post(); ?>
                        <li class="articlesList-item-book columns medium-6 small-12 large-3">
                            <a class="articlesList-item-book-img" href="<?php the_permalink(); ?>">
                                <img src="<?php the_field('book_mini'); ?>"></a>
                            <a class="title-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <p class="text-p"><?php the_field('short description'); ?></p>
                        </li>
                    <?php }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <div class="column small-12">
                <div class="button-more"><span>СМОТРЕТЬ БОЛЬШЕ</span><i class="icon-squares"></i></div>
            </div>
        </section>
    </div>
    <script>
        jQuery(document).ready(function () {
            jQuery('div.alm-btn-wrap').addClass('button-more');
            jQuery('div.alm-btn-wrap button').html('<span>Смотреть больше</span><i class=\'icon-squares\'></i>');
            jQuery('.ui-selectmenu-menu.sortArticles-select-menu ul li div').wrapInner("<a href='http://google.com'></a>");
        });

        window.onload = function () {
            jQuery('.ui-selectmenu-menu.sortArticles-select-menu ul').remove();
            jQuery('.ui-selectmenu-menu.sortArticles-select-menu').html('<ul aria-hidden="false" aria-labelledby="ui-id-3-button" id="ui-id-3-menu" role="listbox" tabindex="0" class="ui-menu ui-corner-bottom ui-widget ui-widget-content" aria-activedescendant="ui-id-4" aria-disabled="false" style="width: 194px;"><a href="<?= get_permalink(); ?>?sort=date"><li class="ui-menu-item"><div id="ui-id-4" tabindex="-1" role="option" class="ui-menu-item-wrapper ui-state-active"><?php the_field('sort_last'); ?></div></li></a><a href="<?= get_permalink(); ?>?sort=popular"><li class="ui-menu-item"><div id="ui-id-5" tabindex="-1" role="option" class="ui-menu-item-wrapper"><?php the_field('sort_popular'); ?></div></li></a></ul>');
        }
    </script>
<?php get_footer(); ?>