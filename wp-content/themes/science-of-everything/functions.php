<?php
/**
 * science-of-everything functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package science-of-everything
 */

if (!function_exists('science_of_everything_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function science_of_everything_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on science-of-everything, use a find and replace
         * to change 'science-of-everything' to the name of your theme in all the template files.
         */
        load_theme_textdomain('science-of-everything', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary-sidebar', 'science-of-everything'),
            'menu-2-sidebar' => esc_html__('sidebar-2', 'science-of-everything'),
            'menu-3-footer' => esc_html__('footer', 'science-of-everything'),
            'menu-4-top' => esc_html__('top', 'science-of-everything'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('science_of_everything_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'science_of_everything_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function science_of_everything_content_width()
{
    $GLOBALS['content_width'] = apply_filters('science_of_everything_content_width', 640);
}

add_action('after_setup_theme', 'science_of_everything_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function science_of_everything_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'science-of-everything'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'science-of-everything'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'science_of_everything_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function science_of_everything_scripts()
{
    wp_enqueue_style('libs.min', get_template_directory_uri() . '/app/css/libs.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/app/css/main.css');
    wp_enqueue_style('science-of-everything-style', get_stylesheet_uri());

    //wp_enqueue_script( 'science-of-everything-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    //wp_enqueue_script( 'science-of-everything-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script('libs.min', get_template_directory_uri() . '/app/js/libs.min.js');
    wp_enqueue_script('script', get_template_directory_uri() . '/app/js/script.js');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'science_of_everything_scripts');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Общие настройки сайта',
        'menu_title' => 'Общие настройки',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'manage_options',
        'redirect' => true
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Хедер',
        'menu_title' => 'Хедер',
        'menu_slug' => 'header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Футер',
        'menu_title' => 'Футер',
        'menu_slug' => 'footer',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Темы',
        'menu_title' => 'Темы',
        'menu_slug' => 'categories',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Страница 404_',
        'menu_title' => 'Страница 404',
        'menu_slug' => 'page_404',
        'parent_slug' => 'theme-general-settings',
    ));
}

add_action('admin_menu', 'register_my_custom_menu_page');
function register_my_custom_menu_page()
{
    add_menu_page(
        'custom menu title', 'Контентные разделы', 'manage_options', 'custompage', 'my_custom_menu_page', 'dashicons-format-aside', 21.3
    );
    // Add a second submenu to the custom top-level menu:
    add_submenu_page('custompage', 'Фотогалерея', 'Фотогалерея', 8, '/edit.php?post_type=photos');
    add_submenu_page('custompage', 'Видео', 'Видео', 8, '/edit.php?post_type=videos');
    add_submenu_page('custompage', 'Видеоколлекции', 'Видеоколлекции', 8, '/edit.php?post_type=video-collections');
    add_submenu_page('custompage', 'Темы', 'Темы', 8, '/edit.php?post_type=topics');
    add_submenu_page('custompage', 'Книги', 'Книги', 8, '/edit.php?post_type=book');
    remove_submenu_page('custompage', 'custompage');
}

function my_custom_menu_page()
{
    echo "<h3>Выберите нужный вам раздел для редактирования, которые отображены слева в подменю данного раздела.</h3>";
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_action('after_setup_theme', 'mytheme_custom_thumbnail_size');
function mytheme_custom_thumbnail_size()
{
    add_image_size('thumb-gallery', 111, 62, true); // Hard crop to exact dimensions (crops sides or top and bottom)
    add_image_size('thumb-gallery-slider', 605, 335, true); // Hard crop to exact dimensions (crops sides or top and bottom)
}

/**
 * Обрезает строку до определённого количества символов не разбивая слова.
 * Поддерживает многобайтовые кодировки.
 * @param string $str строка
 * @param int $length длина, до скольки символов обрезать
 * @param string $postfix постфикс, который добавляется к строке
 * @param string $encoding кодировка, по-умолчанию 'UTF-8'
 * @return string обрезанная строка
 */
function mbCutString($str, $length, $postfix = '...', $encoding = 'UTF-8')
{
    if (mb_strlen($str, $encoding) <= $length) {
        return $str;
    }

    $tmp = mb_substr($str, 0, $length, $encoding);
    return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
}


/*function sortFunction( $a, $b ) {
    return strtotime($a["date"]) - strtotime($b["date"]);
}*/

function themes_post_gallery()
{
    $gallery = get_field('gallery');
    $return = '<div class="article-img-list">';
    foreach ($gallery as $photo) {
        $return .= '<figure>
                        <img src="' . $photo['sizes']['thumb-gallery-slider'] . '" alt="' . $photo['alt'] . '">
                    </figure>';
    }
    $return .= '</div>';
    return $return;
}

add_shortcode('th_gallery', 'themes_post_gallery');


function login_wordpress($username, $password)
{
    $creds = array();
    $creds['user_login'] = $username;
    $creds['user_password'] = $password;
    $creds['remember'] = true;
    $user = wp_signon($creds, false);
    if (is_wp_error($user)) {
//        echo $user->get_error_message();
//        die();
        return 0;
    } else {
        wp_set_auth_cookie($user->ID, 0, 0);
        return 1;
    }
}


/*function past_events_list($args)
{

    // ALM Shortcode
    // [ajax_load_more id="popular_photos" posts_per_page="6" button_label="More Photos"]
    // 'popular_photos' is the value of the 'id' parameter in the shortcode.

    $args['post_type'] = 'event';
//    $args['meta_key'] = strtotime('_event_start_date');
//    $args['meta_value'] =  time();
//    $args['meta_compare'] = '<=';
    $args['orderby'] = 'meta_value';
    $args['order'] = 'ASC';

    return $args;

}

add_filter('alm_query_args_past_events', 'past_events_list');*/

function change_wp_search_size($query)
{
    if ($query->is_search) // Make sure it is a search page
        $query->query_vars['posts_per_page'] = -1; // Change 10 to the number of posts you would like to show

    if ($query->is_category && !is_front_page()) {
        $query->query_vars['posts_per_page'] = 9;
        if (($_GET['sort'] == 'popular')) {
            $query->set('meta_key', 'views');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'DESC');
        }
    }


    return $query; // Return our modified query variables
}

add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter

/*
   functions.php
   Use alm_query_args filter to pass data to relevanssi_do_query() then back to ALM.
   https://connekthq.com/plugins/ajax-load-more/docs/filter-hooks/#alm_query_args
*/
/*function my_alm_query_args_relevanssi($args) {
    $args = apply_filters('alm_relevanssi', $args);
    return $args;
}
add_filter( 'alm_query_args_relevanssi', 'my_alm_query_args_relevanssi');*/

function get_cat_slug($cat_id)
{
    $cat_id = (int)$cat_id;
    $category = &get_category($cat_id);
    return $category->slug;
}

/* Отключаем админ панель для всех, кроме администраторов. */
if (!current_user_can('administrator')):
    show_admin_bar(false);
endif;

//extra user info in wp-admin
add_action('show_user_profile', 'yoursite_extra_user_profile_fields');
add_action('edit_user_profile', 'yoursite_extra_user_profile_fields');
function yoursite_extra_user_profile_fields($user)
{
    ?>
    <label class="generalForm-sub column small-12 medium-6 column-block"><span
                class="generalForm-required"><?php _e('Имя', 'profile'); ?></span>
        <input name="first-name" id="first-name" type="text" required
               value="<?php the_author_meta('first_name', $current_user->ID); ?>">
    </label>
    <label class="generalForm-sub column small-12 medium-6 column-block">
        <span class="generalForm-required"><?php _e('Фамилия', 'profile'); ?></span>
        <input name="last-name" id="last-name" type="text" required
               value="<?php the_author_meta('last_name', $current_user->ID); ?>">
    </label>
    <label class="generalForm-sub column small-12 medium-6 large-8 column-block">Вид деятельности
        <input name="activity" id="activity" type="text" value="<?php echo esc_attr(get_the_author_meta('activity', $user->ID)); ?>">
    </label>
    <label class="generalForm-sub column small-12 medium-6 large-4 column-block">Город
        <input name="city" id="city" type="text" value="<?php echo esc_attr(get_the_author_meta('city', $user->ID)); ?>">
    </label>
    <label class="generalForm-sub column small-12 column-block"><?php _e('Дополнительная информация', 'profile') ?>
        <textarea name="description"
                  id="description"><?php the_author_meta('description', $current_user->ID); ?></textarea>
    </label>
    <p class="generalForm-sub column small-12">Дата рождения</p>
    <div class="column small-12 medium-4 column-block">
        <select class="generalForm-select" name="birthday-day" id="birthday-day">
            <?php if(empty(get_the_author_meta('birthday-day', $user->ID))) { ?>
                <option selected="selected" disabled>День</option>
                <?php for($iday = 1; $iday <= 31; $iday++) { ?>
                    <option><?= $iday ?></option>
                <?php } ?>
            <?php } else {
                for($iday = 1; $iday <= 31; $iday++) { ?>
                    <option <?= get_the_author_meta('birthday-day', $user->ID) == $iday ? ' selected="selected"' : '';?>><?= $iday ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="column small-12 medium-4 column-block">
        <select class="generalForm-select" name="birthday-month" id="birthday-month">
            <option <?= get_the_author_meta('birthday-month', $user->ID) == '' ? ' selected="selected"' : '';?> disabled>Месяц</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Январь' ? ' selected="selected"' : '';?>>Январь</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Февраль' ? ' selected="selected"' : '';?>>Февраль</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Март' ? ' selected="selected"' : '';?>>Март</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Апрель' ? ' selected="selected"' : '';?>>Апрель</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Май' ? ' selected="selected"' : '';?>>Май</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Июнь' ? ' selected="selected"' : '';?>>Июнь</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Июль' ? ' selected="selected"' : '';?>>Июль</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Август' ? ' selected="selected"' : '';?>>Август</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Сентябрь' ? ' selected="selected"' : '';?>>Сентябрь</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Октябрь' ? ' selected="selected"' : '';?>>Октябрь</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Ноябрь' ? ' selected="selected"' : '';?>>Ноябрь</option>
            <option <?= get_the_author_meta('birthday-month', $user->ID) == 'Декабрь' ? ' selected="selected"' : '';?>>Декабрь</option>
        </select>
    </div>
    <div class="column small-12 medium-4 column-block">
        <select class="generalForm-select" name="birthday-year" id="birthday-year">
            <?php if(empty(get_the_author_meta('birthday-year', $user->ID))) { ?>
                    <option selected="selected" disabled>Год</option>
                <?php for($iy = 1960; $iy <= 2010; $iy++) { ?>
                    <option><?= $iy ?></option>
                <?php } ?>
            <?php } else {
                for($iy = 1960; $iy <= 2010; $iy++) { ?>
                    <option <?= get_the_author_meta('birthday-year', $user->ID) == $iy ? ' selected="selected"' : '';?>><?= $iy ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <?php
}

//Save our extra registration user meta.
add_action('profile_update', 'my_profile_update', 10, 2);
function my_profile_update($user_id, $old_user_data)
{
    if (isset($_POST['activity']))
        update_user_meta($user_id, 'activity', $_POST['activity']);

    if (isset($_POST['city']))
        update_user_meta($user_id, 'city', $_POST['city']);

    if (isset($_POST['birthday-day']))
        update_user_meta($user_id, 'birthday-day', $_POST['birthday-day']);

    if (isset($_POST['birthday-month']))
        update_user_meta($user_id, 'birthday-month', $_POST['birthday-month']);

    if (isset($_POST['birthday-year']))
        update_user_meta($user_id, 'birthday-year', $_POST['birthday-year']);
}