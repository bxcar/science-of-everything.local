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
    <h2 class="footerSubscribe-title">Подписаться на рассылку</h2>
    <form class="footerSubscribe-form">
        <input type="email" name="email" placeholder="Ваш Email">
        <button type="submit"><i class="icon-angle-right"></i></button>
    </form>
</div>
<footer class="l-footer"><a class="footer-logo" href="index.html"><img src="<?php bloginfo('template_url'); ?>/app/img/colored-logo.png"></a>
    <ul class="footer-links">
        <li><a class="header-link" href="about.html"><span>О проекте</span></a></li>
        <li><a class="header-link" href="partners.html"><span>Партнерам</span></a></li>
        <li><a class="header-link" href="advertising.html"><span>Реклама</span></a></li>
        <li><a class="header-link" href="contacts.html"><span>Контакты</span></a></li>
    </ul>
    <ul class="footer-social">
        <li><a href="#"><i class="icon-fb"></i></a></li>
        <li><a href="#"><i class="icon-twitter"></i></a></li>
        <li><a href="#"><i class="icon-vk"></i></a></li>
        <li><a href="#"><i class="icon-google-plus"></i></a></li>
    </ul>
    <div class="footer-copyright">
        <p class="nowrap">© 2016, Science of everything.
            <wbr>Все права защищены.
        </p>
        <p>Сделано в <a href="http://dizz.in.ua/ru">Dizz Agency</a></p>
    </div>
    <button class="up-button"><i class="icon-angle-up"></i></button>
</footer>
<?php wp_footer(); ?>
</body>
</html>
