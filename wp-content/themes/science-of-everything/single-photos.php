<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-article column large-8 small-12">
            <section class="article-visualContent">
                <figure class="article-visualContent-img"><img src="<?php the_field('post_image') ?>">
                </figure>
                <div class="article-visualContent-text">
                    <div class="article-visualContent-details">
                        <div class="counters">
                            <div class="counters-item"><i class="icon-time"></i><span><?= get_the_date(); ?></span>
                            </div>
                            <div class="counters-item"><i
                                        class="icon-comment"></i><span><?= get_comments_number(); ?></span></div>
                            <div class="counters-item"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
                            <!--                        <div class="counters-item"><i class="icon-pencil"></i><span>Оксана Рыбина</span></div>-->
                        </div>
                    </div>
                    <div class="article-visualContent-title">
                        <h1 class="title-0 white"><?php the_field('post_title') ?></h1>
                    </div>
                </div>
            </section>
            <section class="article-content">
                <div class="article-content-text">
                    <?php the_field('post_description') ?>
                    <script>
                        jQuery('.mainWrap.mainWrap-medium.row .l-article.column.large-8.small-12 .article-content .article-content-text p').addClass("text-p");
                    </script>
                    <div class="article-gallary">
                        <div class="article-gallary-labels">
                            <div class="article-gallary-counters"><span class="current"></span><span
                                        class="number"></span></div>
                            <!--<div class="article-gallary-social">
                                <button class="social-button fb"><i class="icon-fb"></i></button>
                                <button class="social-button tw"><i class="icon-twitter"></i></button>
                                <button class="social-button vk"><i class="icon-vk"></i></button>
                                <button class="social-button gp"><i class="icon-google-plus"></i></button>
                            </div>-->
                        </div>
                        <div class="article-gallary-slider owl-carousel">
                            <?php
                            $gallery = get_field('post_photo_gallery');
                            foreach ($gallery as $photo) { ?>
                                <figure class="article-gallary-photo" data-mfp-src="<?= $photo['url']; ?>"><img
                                            src="<?= $photo['sizes']['thumb-gallery-slider']; ?>"
                                            alt="<?= $photo['alt']; ?>"></figure>
                            <?php } ?>
                        </div>
                        <div class="article-gallary-previews-wrap">
                            <div class="article-gallary-previews owl-carousel">
                                <?php
                                $gallery = get_field('post_photo_gallery');
                                foreach ($gallery as $photo) { ?>
                                    <figure class="article-gallary-previews-one is-current"><img
                                                src="<?= $photo['sizes']['thumb-gallery']; ?>"
                                                alt="<?= $photo['alt']; ?>"></figure>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="shareSocial">
                <?php the_favorites_button(); ?>
                <?php echo do_shortcode('[TheChamp-Sharing count="1"]') ?>
                <!--<button class="shareSocial-social fb"><i class="icon-fb"></i><span>35</span></button>
                <button class="shareSocial-social tw"><i class="icon-twitter"></i><span>35</span></button>
                <button class="shareSocial-social vk"><i class="icon-vk"></i><span>18</span></button>
                <button class="shareSocial-social gp"><i class="icon-google-plus"></i><span>25</span></button>
                <button class="shareSocial-more"><i class="icon-plus"></i></button>-->
                <div class="shareSocial-counters"><i class="icon-view"></i><span><?php the_views() ?></span></div>
            </div>
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
        <aside class="sidebar-wrap columns large-4">
            <div class="section-title section-title-popular">
                <h2 class="title-2"><img
                            src="<?= get_template_directory_uri(); ?>/app/img/icon-newspaper.png"><?php _e('Популярные статьи', 'science-of-everything'); ?>
                </h2>
            </div>
            <ul class="sidebar-list">
                <?php
                $popular_posts_args = array(
                    'post_type' => 'topics',
                    'posts_per_page' => 5,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'views',
                    'order' => 'DESC',
                );

                $popular_posts = new WP_Query($popular_posts_args);
                if ($popular_posts->have_posts()) {
                    while ($popular_posts->have_posts()) {
                        $popular_posts->the_post(); ?>
                        <li>
                            <a class="sidebar-list-img" href="<?php the_permalink(); ?>">
                                <img style="width: 130px; height: 100px;" src="<?= get_the_post_thumbnail_url(); ?>">
                            </a>
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
                                   href="<?php the_permalink(); ?>"><?= wp_trim_words(get_the_title(), 4); ?></a>
                                <div class="counters">
                                    <div class="counters-item">
                                        <i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php $i++;
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <div class="sidebar-advertising"><a target="_blank" href="<?php the_field('adv_link'); ?>"><img
                            src="<?php the_field('adv_image'); ?>"></a></div>
        </aside>
    </div>
<?php get_footer(); ?>