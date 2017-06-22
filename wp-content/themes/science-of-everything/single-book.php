<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-article column large-8 small-12">
            <section class="article-content-text">
                <figure class="article-float-left"><?= get_the_post_thumbnail(); ?></figure>
                <h1 class="title-0"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </section>
            <div class="shareSocial">
                <?php the_favorites_button(); ?>
                <?php echo do_shortcode('[TheChamp-Sharing count="1"]') ?>
                <div class="shareSocial-counters"><i class="icon-view"></i><span><?php the_views(); ?></span></div>
            </div>
            <?php comments_template('/comments.php', true); ?>
        </article>
        <aside class="sidebar-wrap columns large-4">
            <div class="section-title section-title-books">
                <h2 class="title-2"><img src="<?= get_template_directory_uri(); ?>/app/img/icon-book.png"><?php _e('Книги', 'science-of-everything'); ?></h2>
            </div>
            <ul class="sidebar-list">
                <?php
                $books_args = array(
                    'post_type' => 'book',
                    'posts_per_page' => 5
                );

                $books = new WP_Query($books_args);
                if ($books->have_posts()) {
                    while ($books->have_posts()) {
                        $books->the_post(); ?>
                        <li><a class="sidebar-img-books" href="<?php the_permalink(); ?>"><img style="width: 77px; height: 100px;" src="<?php the_field('book_mini'); ?>"></a>
                            <div class="sidebar-item-content books">
                                <a class="title-sm" href="<?php the_permalink(); ?>"><?= wp_trim_words(get_the_title(), 8); ?></a>
                                <div class="counters">
                                    <div class="counters-item"><i class="icon-time"></i><?php wp_days_ago_v3(0, 31536000); ?></div>
                                    <div class="counters-item"><i class="icon-comment"></i><?= get_comments_number(); ?></div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
            <a href="<?php the_field('adv_link'); ?>" target="_blank" class="sidebar-advertising"><img src="<?php the_field('adv_image'); ?>"></a>
        </aside>
    </div>
<script>
    jQuery('.article-content-text p').addClass('text-p');
    jQuery('.article-content-text blockquote').addClass('article-quote');
    jQuery('.article-content-text ul').addClass('article-inner-list');
    jQuery('.article-content-text ul li').wrapInner('<span></span>');
</script>
<style>
    .article-content-text {
        width: 100% !important;
        margin-bottom: 55px;
    }

    .article-content-text strong {
        font-size: 16px;
        line-height: 1.5;
        font-weight: 500;
        color: #333333;
    }

    .article-content-text h3 {
        color: black;
        font-weight: 400;
        line-height: normal;
        font-size: 100%;
    }
</style>
<?php get_footer(); ?>