<?php
/**
 * Template Name: terms-of-use
 */
get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-info column small-12 large-10">
            <?php the_content(); ?>
        </article>
    </div>
    <script>
        jQuery('article.l-info.column.small-12.large-10 h1').addClass("title-0");
        jQuery('article.l-info.column.small-12.large-10 h2').addClass("title-3 info-title-numeric");
        jQuery('article.l-info.column.small-12.large-10 p').addClass("text-p");
        jQuery('article.l-info.column.small-12.large-10 blockquote').addClass("info-quote");
        jQuery('article.l-info.column.small-12.large-10 ol').addClass("text-p info-list-numeric");
        jQuery('article.l-info.column.small-12.large-10 ul').addClass("info-list-marker");
        jQuery("article.l-info.column.small-12.large-10 blockquote p").each(function () {
            jQuery(this).replaceWith(this.childNodes);
        });
        jQuery("article.l-info.column.small-12.large-10 ul li").wrapInner("<span></span>");
        jQuery("article.l-info.column.small-12.large-10 p:nth-child(2)").removeClass('text-p').addClass("text-sub");
    </script>
    <style>
        article.l-info.column.small-12.large-10 h2 {
            margin-top: 50px;
        }

        article.l-info.column.small-12.large-10 h1 + h2 {
            margin-top: 0;
        }
    </style>
<?php get_footer(); ?>