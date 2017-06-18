<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package science-of-everything
 */

?>

<div class="l-footerSubscibe">
    <h2 class="footerSubscribe-title"><?php the_field('newsletter_subscription_title', 'option'); ?></h2>
    <?php echo do_shortcode('[contact-form-7 id="9" title="Подписка на рассылку" html_class="footerSubscribe-form"]'); ?>
    <script>
        jQuery('form.footerSubscribe-form input[type="submit"]').replaceWith('<button type="submit"><i class="icon-angle-right"></i></button>');
        jQuery('<span class="ajax-loader"></span>').insertAfter('button[type="submit"]');
    </script>
</div>
<footer class="l-footer"><a class="footer-logo" href="<?php echo home_url(); ?>"><img
                src="<?php the_field('footer_logo', 'option'); ?>"></a>
    <?php
    echo wp_nav_menu(array(
        'echo' => false,
        'theme_location' => 'menu-3-footer',
        'items_wrap' => '<ul class="footer-links">%3$s</ul>',
        'container' => 'false'
    ));
    ?>
    <script>
        jQuery(".footer-links > li a").addClass("header-link").wrapInner("<span></span>");
    </script>
    <style>
        .footerSubscribe-form button {
            height: 52px;
        }

        span.wpcf7-not-valid-tip,
        div.wpcf7-mail-sent-ok{
            margin-top: 10px;
        }

        div.wpcf7-validation-errors {
            margin-top: -20px;
        }
    </style>
    <ul class="footer-social">
        <?php
        $footer_socials = get_field('footer_socials', 'option');
        if ($footer_socials) {
            foreach ($footer_socials as $footer_social) {
                ?>
                <li>
                    <a target="_blank" href="<?= $footer_social['footer_socials_item_link'] ?>">
                        <i class="fa <?= $footer_social['footer_socials_item_image'] ?>" aria-hidden="true"></i>
                    </a>
                </li>
                <?php
            }
        }
        ?>
    </ul>
    <div class="footer-copyright">
        <p class="nowrap"><?php the_field('footer_copyright', 'option'); ?></p>
        <p>Сделано в <a href="http://dizz.in.ua/ru">Dizz Agency</a></p>
    </div>
    <button class="up-button"><i class="icon-angle-up"></i></button>
</footer>
<style>
    /*div.l-footerSubscibe {
        position: fixed;
        width: 100%;
        bottom: 0;
        z-index: 9999;
    }*/
    .the_champ_sharing_container ul.the_champ_sharing_ul li:last-child i {
        width: 60px !important;
        background-image: linear-gradient(127deg, #5b529c 0%, #5b529c 100%);
    }

    .the_champ_square_count {
        font-size: 14px;
        font-weight: 300;
        line-height: 40px;
        font-family: "Gotham Pro", sans-serif;
        outline: none;
    }
</style>
<?php wp_footer(); ?>
</body>
</html>
