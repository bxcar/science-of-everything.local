<?php
/**
 * Template Name: special
 */
get_header(); ?>
<div class="l-specialTitle">
    <h2><?= get_the_title(icl_object_id(565, 'page', true, ICL_LANGUAGE_CODE)); ?></h2>
</div>
<div class="mainWrap mainWrap-medium">
    <section class="l-articles row">
        <ul class="articlesList-special column small-12">
            <?php
            $special_args = array(
                'post_type' => 'special',
                'posts_per_page' => 4,
            );

            $special = new WP_Query($special_args);
            if ($special->have_posts()) {
                while ($special->have_posts()) {
                    $special->the_post(); ?>
                    <li class="articlesList-special-item articlesList-item-hover">
                        <a class="articlesList-special-item-img" href="<?php the_permalink(); ?>">
                            <img class="obj-fit height-inh" src="<?php the_field('special_main_page_image'); ?>">
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
                    <?php
                }
            }
            wp_reset_postdata();
            ?>
        </ul>
        <?php echo do_shortcode('[ajax_load_more post_type="special" offset="4" posts_per_page="8" pause="true" scroll="false" button_label="' . __('Смотреть больше', 'science-of-everything') . '" button_loading_label="' . __('Загрузка', 'science-of-everything') . '"]'); ?>
    </section>
</div>
<style>
    #ajax-load-more {
        width: 100%;
    }
</style>
<script>
    jQuery('.ajax-load-more-wrap').bind("DOMNodeInserted", function (e) {
        jQuery('div.alm-reveal').addClass("articlesList-special column small-12");
    });

    jQuery(document).ready(function () {
        jQuery('div.alm-btn-wrap button').addClass("button-more-icon").wrap("<div class='column small-12'></div>").removeClass('button-more');
//            jQuery('div.alm-btn-wrap button.button-more-icon').append("<i class='icon-squares'></i>");
    });
</script>
<?php get_footer(); ?>
