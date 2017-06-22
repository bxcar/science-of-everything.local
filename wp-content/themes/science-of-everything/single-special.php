<?php get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-article column small-12">
            <div class="cont">
                <?php the_content(); ?>
            </div>
            <div class="shareSocial">
                <?php the_favorites_button(); ?>
                <?php echo do_shortcode('[TheChamp-Sharing count="1"]') ?>
                <div class="shareSocial-counters"><i class="icon-view"></i><span><?php the_views() ?></span></div>
            </div>
            <?php comments_template('/comments.php', true); ?>
        </article>
    </div>
    <script>
        jQuery('.l-article.column.small-12 .cont h1').addClass('title-0');
        jQuery('.l-article.column.small-12 .cont h2').addClass('title-2');
        jQuery('.l-article.column.small-12 .cont h3').addClass('title-3');
        jQuery('.l-article.column.small-12 .cont p').addClass('text-p');
        jQuery('.l-article.column.small-12 .cont *').wrap('<div class="article-content-text"></div>');
        jQuery('.l-article.column.small-12 .cont figure').addClass('article-visualContent').unwrap();
        jQuery('.l-article.column.small-12 .cont figure div img').addClass('article-visualContent').unwrap();
        jQuery(".cont .article-content-text").filter(function () {
            return (jQuery(this).next('.cont .article-content-text').length > 0)
        }).css('margin-bottom', '0');

        jQuery(".cont .article-content-text").filter(function () {
            return (jQuery(this).prev('.cont .article-content-text').length > 0)
        }).css('margin-top', '0');
    </script>
<?php get_footer(); ?>