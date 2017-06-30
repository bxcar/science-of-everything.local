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
<!--    <span class="close"></span>-->
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

    <?php
    echo wp_nav_menu(array(
        'echo' => false,
        'theme_location' => 'menu-3-footer-2',
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
        div.wpcf7-mail-sent-ok {
            margin-top: 10px;
        }

        /*div.wpcf7-validation-errors {
            margin-top: -20px;
        }*/
        .ajax-loader {
            position: absolute;
        }

        .wpcf7-form.article-subscribe-form p {
            height: 50px;
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
    <div class="footer-mistake"><img src="<?= get_template_directory_uri(); ?>/app/img/icon-keyboard.svg"><b>Ctrl + Enter</b> - если нашли ошибку</div>
    <div class="footer-copyright">
        <p class="nowrap"><?php the_field('footer_copyright', 'option'); ?></p>
        <p><?php the_field('footer_copyright-2', 'option'); ?></p>
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

    <?php
    $user = wp_get_current_user();
    if ( in_array( 'administrator', (array) $user->roles ) ) { ?>
    .mainWrap,
    .grey-section-bg,
    .l-specialTitle,
    .l-changeProfile {
        margin-top: -32px;
    }
    <?php } ?>

    .l-footerSubscibe .close {
        position: absolute;
        right: 10px;
        top: 10px;
        width: 32px;
        height: 32px;
        opacity: 0.3;
    }
    .l-footerSubscibe .close:hover {
        opacity: 1;
        cursor: pointer;
    }
    .l-footerSubscibe .close:before, .l-footerSubscibe .close:after {
        position: absolute;
        left: 15px;
        content: ' ';
        height: 23px;
        width: 2px;
        background-color: #fff;
    }
    .l-footerSubscibe .close:before {
        transform: rotate(45deg);
    }
    .l-footerSubscibe .close:after {
        transform: rotate(-45deg);
    }

    form#adduser .form-table,
    form#adduser h3:first-child {
        display: none;
    }

    div.wpcf7-validation-errors {
        margin: 0;
    }
    .obj-fit {
        object-fit: cover;
    }

    .height-inh {
        height: inherit;
    }
</style>
<script>
    if (document.cookie.indexOf("subscribe=") >= 0) {
        jQuery(".l-footerSubscibe").css({"display": "none"});
    }
    function subscribeCloseCF7() {
        setTimeout(subscribeClose, 12000);
    }
    function subscribeClose() {
        jQuery(".l-footerSubscibe").css({
            "-webkit-transition": "opacity 3s ease-in-out",
            "-moz-transition": "opacity 3s ease-in-out",
            "-ms-transition": "opacity 3s ease-in-out",
            "-o-transition": "opacity 3s ease-in-out",
            "opacity": "0"
        });
    }
    function subscribeDisplayNoneCF7() {
        setTimeout(subscribeDisplayNone, 15000);
    }
    function subscribeDisplayNone() {
        jQuery(".l-footerSubscibe").css({"display": "none"});
    }

    jQuery( ".l-footerSubscibe .close" ).click(function() {
        subscribeDisplayNone();
    });
</script>
<?php wp_footer(); ?>
</body>
</html>
