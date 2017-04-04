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
    <form class="footerSubscribe-form">
        <input type="email" name="email" placeholder="<?php the_field('newsletter_subscription_placeholder', 'option'); ?>">
        <button type="submit"><i class="icon-angle-right"></i></button>
    </form>
</div>
<footer class="l-footer"><a class="footer-logo" href="<?php echo home_url(); ?>"><img
                src="<?php the_field('footer_logo', 'option'); ?>"></a>
    <ul class="footer-links">
        <li><a class="header-link" href="about.html"><span>О проекте</span></a></li>
        <li><a class="header-link" href="partners.html"><span>Партнерам</span></a></li>
        <li><a class="header-link" href="advertising.html"><span>Реклама</span></a></li>
        <li><a class="header-link" href="contacts.html"><span>Контакты</span></a></li>
    </ul>
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
        <p class="nowrap"><?php the_field('footer_copyright', 'option');?></p>
        <p>Сделано в <a href="http://dizz.in.ua/ru">Dizz Agency</a></p>
    </div>
    <button class="up-button"><i class="icon-angle-up"></i></button>
</footer>
<?php wp_footer(); ?>
</body>
</html>
