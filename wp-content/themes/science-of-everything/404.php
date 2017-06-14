<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package science-of-everything
 */

?>
<!DOCTYPE html>
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
        .l-errorContent {
            background: url("<?php the_field('background_image', 'option'); ?>") no-repeat center;
        }
    </style>
</head>
<body>
<div class="l-errorContent">
    <div class="errorContent-titleComplete">
        <h1 class="errorContent-title"><?php the_field('large_text', 'option'); ?></h1>
        <p class="errorContent-description"><?php the_field('small_text', 'option'); ?></p>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
