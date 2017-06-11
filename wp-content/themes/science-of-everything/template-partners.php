<?php
/**
 * Template Name: partners
 */
get_header(); ?>
    <div class="mainWrap mainWrap-medium row">
        <article class="l-info column small-12 large-10">
            <?php the_content(); ?>
        </article>
    </div>
    <script>
        jQuery('article.l-info.column.small-12.large-10 h1').addClass("title-0");
        jQuery('article.l-info.column.small-12.large-10 h2').addClass("title-3");
        jQuery('article.l-info.column.small-12.large-10 p').addClass("text-p");
        jQuery('article.l-info.column.small-12.large-10 blockquote').addClass("info-quote");
        jQuery("article.l-info.column.small-12.large-10 blockquote p").each(function () {
            jQuery(this).replaceWith(this.childNodes);
        });
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