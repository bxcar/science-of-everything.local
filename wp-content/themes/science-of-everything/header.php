<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package science-of-everything
 */

?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-rim-auto-match" content="none">
    <title>Наука всего</title>
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/app/img/favicon.png" type="image/png">
    <?php wp_head(); ?>
    <style>
        .header-bg {
            background-image: url('<?php the_field('header_background2_image', 'option'); ?>');
        }

        .home-page .header-bg {
            background-image: url('<?php the_field('header_background_image', 'option'); ?>');
        }

        .contact-page .header-bg {
            background-image: url('<?php the_field('header_background3_image', 'option'); ?>');
        }
    </style>
    <?php include_once "app/js/register-ajax.php" ?>
    <?php include_once "app/js/sign-in-ajax.php" ?>
</head>
<body class="<?php if (is_front_page()) { ?>home-page<?php }
if (get_the_ID() == '123') { ?>contact-page<?php }
if (get_the_ID() == '141') { ?>about-page<?php }
if (get_the_ID() == '379') { ?>books-page<?php } ?>">
<div class="l-preloader"><img src="<?php bloginfo('template_url'); ?>/app/img/preloader.gif"></div>
<div class="l-header">
    <div class="header-bg"></div>
    <div class="header-menu">
        <button class="header-hamburger"><i class="icon-menu"></i></button>
        <ul class="header-navTop">
            <li><a class="header-link" href="rubric.html"><span>Астрофизика</span></a></li>
            <li><a class="header-link" href="rubrbooksic.html"><span>Технологии</span></a></li>
            <li><a class="header-link" href="rubric.html"><span>Психология</span></a></li>
            <li><a class="header-link" href=".html"><span>Книги</span></a></li>
            <li><a class="header-link" href="rubric.html"><span>Медтех</span></a></li>
            <li><a class="header-link" href="rubric.html"><span>Будущее</span></a></li>
            <li><a class="header-link" href="events.html"><span>События</span></a></li>
            <li><a class="header-link" href="blog.html"><span>Блог</span></a></li>
            <li>
                <div class="header-dropdown header-link"><span>Спецпроект</span></div>
                <ul class="header-dropdown-list">
                    <li><a class="header-link" href="special.html">Классика в моде</a></li>
                    <li><a class="header-link" href="special.html">25 шедевров в украине</a></li>
                    <li><a class="header-link" href="special.html">Научный подход</a></li>
                    <li><a class="header-link" href="special.html">Culture matters</a></li>
                </ul>
            </li>
        </ul>
        <div class="header-login"><i class="icon-user"></i>
            <!-- Title when user is guest-->
            <span class="<?php if(is_user_logged_in()) { ?>is-hidden<?php } ?>"><?php the_field('signature_unauthorized_user', 'option'); ?></span>
            <!-- Title when user is login-->
            <a href="<?= get_permalink(icl_object_id(429, 'page', true, ICL_LANGUAGE_CODE)); ?>" class="<?php if(!is_user_logged_in()) { ?>is-hidden<?php } ?>"><?php the_field('signature_authorized_user', 'option'); ?></a>
        </div>
        <button class="header-search button-round-outline"><i class="icon-search"></i></button>
        <form class="header-searchForm is-hidden">
            <input type="text" placeholder="Поиск">
            <button class="header-searchForm-button" type="submit"><i class="icon-search"></i></button>
        </form>
    </div>
    <div class="header-nav-wrap is-hidden">
        <nav class="header-nav">
            <button class="header-nav-close"><i class="icon-close"></i></button>
            <a class="header-nav-logo" href="<?php echo home_url(); ?>"><img
                        src="<?php the_field('header_menu_logo', 'option'); ?>"></a>
            <ul class="header-nav-list">
                <li><a class="header-link" href="<?php echo home_url(); ?>"><span>Главная</span></a></li>
                <li><span class="header-nav-dropdown header-link">Темы</span>
                    <ul class="header-nav-dropdown-list">
                        <li><a class="header-link" href="rubric.html"><span>Астрофизика</span></a></li>
                        <li><a class="header-link" href="rubric.html"><span>Технологии</span></a></li>
                        <li><a class="header-link" href="rubric.html"><span>Психология</span></a></li>
                        <li><a class="header-link" href="rubric.html"><span>Искусство</span></a></li>
                        <li><a class="header-link" href="rubric.html"><span>Будущее</span></a></li>
                        <li><a class="header-link" href="books.html"><span>Книги</span></a></li>
                        <li><a class="header-link" href="special.html"><span>Спецпроект</span></a></li>
                    </ul>
                </li>
                <li><a class="header-link" href="events.html"><span>События</span></a></li>
                <li><a class="header-link" href="photo.html"><span>Фотогалерея</span></a></li>
                <li><a class="header-link" href="video.html"><span>Видео</span></a></li>
                <li><a class="header-link" href="blog.html"><span>Блог</span></a></li>
                <li><a class="header-link" href="videolections.html"><span>Видеолекции</span></a></li>
            </ul>
            <ul class="header-nav-list header-nav-list-secondary">
                <li><a class="header-link" href="advertising.html"><span>Размещение рекламы</span></a></li>
                <li><a class="header-link" href="therms-of-use.html"><span>Пользовательское соглашение</span></a>
                </li>
                <li><a class="header-link" href="partners.html"><span>Партнерам</span></a></li>
                <li><a class="header-link" href="contacts.html"><span>Контакты</span></a></li>
                <li><a class="header-link" href="about.html"><span>О проекте</span></a></li>
            </ul>
            <ul class="header-nav-list lang">
                <li class="is-active"><a class="header-link" href="#"><span>Рус</span></a></li>
                <li><a class="header-link" href="#"><span>Англ</span></a></li>
            </ul>
            <ul class="header-nav-list modile">
                <li>
                    <button class="header-nav-login"><i
                                class="icon-user"></i><span><?php the_field('signature_unauthorized_user', 'option'); ?></span>
                    </button>
                </li>
                <li>
                    <form class="header-nav-search">
                        <input type="text" name="search" placeholder="Поиск">
                        <button type="submit"><i class="icon-search"></i></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
    <div class="header-loginForm-wrap is-hidden">
        <button class="header-loginForm-close button-round-outline"><i class="icon-close"></i></button>
        <div class="header-loginForm">
            <h2 class="header-loginForm-title"><?php the_field('registration_form_title', 'option'); ?></h2>
            <ul class="header-loginForm-method">
                <li><a href="#login-form">Войти</a></li>
                <li><a href="#register-form">Регистрация</a></li>
            </ul>
            <div class="header-loginForm-form" id="login-form">
                <p class="header-loginForm-text">с помощью аккаунта в соц. сетях</p>
                <div class="header-loginForm-social">
                    <button class="header-loginForm-social-button fb"><i class="icon-fb"></i></button>
                    <button class="header-loginForm-social-button twitter"><i class="icon-twitter"></i></button>
                    <button class="header-loginForm-social-button vk"><i class="icon-vk"></i></button>
                    <button class="header-loginForm-social-button gp"><i class="icon-google-plus"></i></button>
                </div>
                <p class="header-loginForm-text decoration">или</p>
                <form class="header-loginForm-email" method="post" id="sign-in-popup-form">
                    <p><i class="icon-user"></i>
                        <input type="text" name="login" placeholder="Логин">
                    </p>
                    <p><i class="icon-key"></i>
                        <input type="password" name="password" placeholder="Пароль">
                    </p>
                    <button id="submit-sign-in-popup-form" class="button button-primary" type="submit">Войти</button>
                </form>
                <button class="header-loginForm-text header-loginForm-restorePassword">Восстановить пароль</button>
            </div>
            <div class="header-loginForm-form" id="register-form">
                <p class="header-loginForm-text">с помощью аккаунта в соц. сетях</p>
                <div class="header-loginForm-social">
                    <button class="header-loginForm-social-button fb"><i class="icon-fb"></i></button>
                    <button class="header-loginForm-social-button twitter"><i class="icon-twitter"></i></button>
                    <button class="header-loginForm-social-button vk"><i class="icon-vk"></i></button>
                    <button class="header-loginForm-social-button gp"><i class="icon-google-plus"></i></button>
                </div>
                <p class="header-loginForm-text decoration">или</p>
                <form class="header-loginForm-email" id="register-popup-form"  method="post"> <!--action="<?/*= get_template_directory_uri()*/?>/user-ajax-register.php"-->
                    <p><i class="icon-user"></i>
                        <input type="text" name="login" placeholder="Логин" required>
                    </p>
                    <p><i class="icon-mail"></i>
                        <input type="email" name="email" placeholder="Эл.почта" required>
                    </p>
                    <p><i class="icon-key"></i>
                        <input type="password" name="password" placeholder="Пароль" required>
                    </p>
<!--                    <input value="Зарегистрироваться" id="submit-register-popup-form" class="button button-primary" type="submit">-->
                    <button id="submit-register-popup-form" class="button button-primary" type="submit">Зарегистрироваться</button>
                    <p class="header-loginForm-text small"><?php the_field('signature_terms_of_use', 'option'); ?> (<a
                                href="therms-of-use.html">пользовательское
                            соглашение</a>)</p>
                </form>
            </div>
        </div>
        <div class="header-restorePassword">
            <h2 class="header-loginForm-title">Забыли пароль?</h2>
            <p class="header-loginForm-text">Введите свой E-mail, чтобы помочь нам идентифицировать вашу
                личность.</p>
            <form class="header-loginForm-email">
                <p><i class="icon-mail"></i>
                    <input type="email" name="email" placeholder="Адрес эл. почты для восстановления">
                </p>
                <button class="button button-primary" type="submit">Войти</button>
            </form>
            <button class="header-loginForm-text header-loginForm-restorePassword-back">Назад</button>
        </div>
    </div>
    <a class="header-logo" href="<?php echo home_url(); ?>"><img src="<?php the_field('header_logo', 'option'); ?>"></a>
    <?php
    if (!is_front_page() && get_the_ID() != '123') { //&& is_paged()?>
        <ul class="breadcrumbs">
            <li><a href="<?= home_url(); ?>">Главная</a></li>
            <li>Размещение рекламы</li>
        </ul>
        <?php
    } ?>
</div>