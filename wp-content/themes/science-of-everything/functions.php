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
    add_submenu_page('custompage', 'Спецпроекты', 'Спецпроекты', 8, '/edit.php?post_type=special');
    add_submenu_page('custompage', 'Интервью', 'Интервью', 8, '/edit.php?post_type=interview');
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


function author_posts_list($args)
{

    // ALM Shortcode
    // [ajax_load_more id="popular_photos" posts_per_page="6" button_label="More Photos"]
    // 'popular_photos' is the value of the 'id' parameter in the shortcode.

//    $args['post_type'] = 'post';
//    $args['meta_value'] =  time();
//    $args['meta_compare'] = '<=';
//    $args['orderby'] = 'meta_value';
//    $args['order'] = 'ASC';
    $args['post_status'] = array('publish', 'pending', 'trash');

    return $args;

}

add_filter('alm_query_args_author_posts', 'author_posts_list');

function change_wp_search_size($query)
{
    if ($query->is_search) // Make sure it is a search page
        $query->query_vars['posts_per_page'] = -1; // Change 10 to the number of posts you would like to show

    if (($query->is_category && !is_front_page()) || ($query->is_tag && !is_front_page())) {
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
               value="<?php the_author_meta('first_name', get_current_user_id()); ?>">
    </label>
    <label class="generalForm-sub column small-12 medium-6 column-block">
        <span class="generalForm-required"><?php _e('Фамилия', 'profile'); ?></span>
        <input name="last-name" id="last-name" type="text" required
               value="<?php the_author_meta('last_name', get_current_user_id()); ?>">
    </label>
    <label class="generalForm-sub column small-12 medium-6 large-8 column-block">Вид деятельности
        <input name="activity" id="activity" type="text"
               value="<?php echo esc_attr(get_the_author_meta('activity', get_current_user_id())); ?>">
    </label>
    <label class="generalForm-sub column small-12 medium-6 large-4 column-block">Город
        <input name="city" id="city" type="text"
               value="<?php echo esc_attr(get_the_author_meta('city', get_current_user_id())); ?>">
    </label>
    <label class="generalForm-sub column small-12 column-block"><?php _e('Дополнительная информация', 'profile') ?>
        <textarea name="description"
                  id="description"><?php the_author_meta('description', get_current_user_id()); ?></textarea>
    </label>
    <p class="generalForm-sub column small-12">Дата рождения</p>
    <div class="column small-12 medium-4 column-block">
        <select class="generalForm-select" name="birthday-day" id="birthday-day">
            <?php if (empty(get_the_author_meta('birthday-day', get_current_user_id()))) { ?>
                <option selected="selected" disabled>День</option>
                <?php for ($iday = 1; $iday <= 31; $iday++) { ?>
                    <option><?= $iday ?></option>
                <?php } ?>
            <?php } else {
                for ($iday = 1; $iday <= 31; $iday++) { ?>
                    <option <?= get_the_author_meta('birthday-day', get_current_user_id()) == $iday ? ' selected="selected"' : ''; ?>><?= $iday ?></option>
                <?php }
            } ?>
        </select>
    </div>
    <div class="column small-12 medium-4 column-block">
        <select class="generalForm-select" name="birthday-month" id="birthday-month">
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == '' ? ' selected="selected"' : ''; ?>
                    disabled>Месяц
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Январь' ? ' selected="selected"' : ''; ?>>
                Январь
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Февраль' ? ' selected="selected"' : ''; ?>>
                Февраль
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Март' ? ' selected="selected"' : ''; ?>>
                Март
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Апрель' ? ' selected="selected"' : ''; ?>>
                Апрель
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Май' ? ' selected="selected"' : ''; ?>>
                Май
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Июнь' ? ' selected="selected"' : ''; ?>>
                Июнь
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Июль' ? ' selected="selected"' : ''; ?>>
                Июль
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Август' ? ' selected="selected"' : ''; ?>>
                Август
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Сентябрь' ? ' selected="selected"' : ''; ?>>
                Сентябрь
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Октябрь' ? ' selected="selected"' : ''; ?>>
                Октябрь
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Ноябрь' ? ' selected="selected"' : ''; ?>>
                Ноябрь
            </option>
            <option <?= get_the_author_meta('birthday-month', get_current_user_id()) == 'Декабрь' ? ' selected="selected"' : ''; ?>>
                Декабрь
            </option>
        </select>
    </div>
    <div class="column small-12 medium-4 column-block">
        <select class="generalForm-select" name="birthday-year" id="birthday-year">
            <?php if (empty(get_the_author_meta('birthday-year', get_current_user_id()))) { ?>
                <option selected="selected" disabled>Год</option>
                <?php for ($iy = 1960; $iy <= 2010; $iy++) { ?>
                    <option><?= $iy ?></option>
                <?php } ?>
            <?php } else {
                for ($iy = 1960; $iy <= 2010; $iy++) { ?>
                    <option <?= get_the_author_meta('birthday-year', get_current_user_id()) == $iy ? ' selected="selected"' : ''; ?>><?= $iy ?></option>
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

/*function my_before_avatar() {
  echo '<div id="my-avatar">';
}
add_action('wpua_before_avatar', 'my_before_avatar');

function my_after_avatar() {
    echo '</div>';
}
add_action('wpua_after_avatar', 'my_after_avatar');*/


//date in mm/dd/yyyy format; or it can be in other formats as well
function calculateAge($day, $month, $year)
{
    if ($month == 'Январь') {
        $month = 1;
    } elseif ($month == 'Февраль') {
        $month = 2;
    } elseif ($month == 'Март') {
        $month = 3;
    } elseif ($month == 'Апрель') {
        $month = 4;
    } elseif ($month == 'Май') {
        $month = 5;
    } elseif ($month == 'Июнь') {
        $month = 6;
    } elseif ($month == 'Июль') {
        $month = 7;
    } elseif ($month == 'Август') {
        $month = 8;
    } elseif ($month == 'Сентябрь') {
        $month = 9;
    } elseif ($month == 'Октябрь') {
        $month = 10;
    } elseif ($month == 'Ноябрь') {
        $month = 11;
    } elseif ($month == 'Декабрь') {
        $month = 12;
    } else {
        $month = '';
    }

    if (($day == '') || ($month == '') || ($year == '')) {
        return 'Не указан';
    }

    $birthDate = "$month/$day/$year";
//explode the date to get month, day and year
    $birthDate = explode("/", $birthDate);
//get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
    return $age . ' ' . get_num_ending($age, array('год', 'года', 'лет'));
}

/**
 * Функция возвращает окончание для множественного числа слова на основании числа и массива окончаний
 * @param  $number int Число на основе которого нужно сформировать окончание
 * @param  $ending_arr  array Массив слов с правильными окончаниями для чисел (1, 2, 5),
 *         например array('комментарий', 'комментария', 'комментариев')
 * @return string
 */
function get_num_ending($number, $ending_arr)
{
    $number = $number % 100;
    if ($number >= 11 && $number <= 19) {
        $ending = $ending_arr[2];
    } else {
        $i = $number % 10;
        switch ($i) {
            case (1):
                $ending = $ending_arr[0];
                break;
            case (2):
            case (3):
            case (4):
                $ending = $ending_arr[1];
                break;
            default:
                $ending = $ending_arr[2];
        }
    }
    return $ending;
}

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts()
{
    $user = wp_get_current_user();
    if (in_array('contributor', (array)$user->roles)) {
        echo '<style>
                #wpadminbar #wp-admin-bar-root-default li:nth-child(2), 
                #wpadminbar #wp-admin-bar-root-default li:nth-child(4), 
                #wpadminbar #wp-admin-bar-root-default li:nth-child(5), 
                #wpadminbar #wp-admin-bar-root-default li:nth-child(6), 
                #wpadminbar #wp-admin-bar-root-default li:nth-child(7),
                #wp-admin-bar-edit-profile,
                #wp-admin-bar-user-info,
                #dashboard_right_now .main .comment-count,
                #dashboard_right_now .main .page-count,
                #wp-version-message,
                #advanced-sortables,
                #postbox-container-2,
                #content-score,
                #keyword-score,
                #mceu_14,
                #mceu_15 {
                  display: none !important;
                } 
                
                #wp-admin-bar-logout {
                    width: 50px !important;
                    margin-left: 0 !important;
                }
              </style>';
    }
}

function allow_contributor_uploads()
{
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
}

if (current_user_can('contributor') && !current_user_can('upload_files')) {
    add_action('admin_init', 'allow_contributor_uploads');
}

/**
 * Фильтр к стандартной функции WordPress comments_number()
 * Возвращает строку с количеством комментариев к статье
 * с правильными окончаниями слова "комментарий" (1 комментарий, 2 комментария, 5 комментариев)
 */
function comments_number_ru()
{
    global $id;
    $number = get_comments_number($id);

    if ($number == 0) {
        $output = __('комментариев нет', 'junona');
    } else if (($number == 1) && (ICL_LANGUAGE_CODE == 'en')) {
        $output = '' . $number . ' ' . get_num_ending($number, array('comment'));
    } else {
        $output = '' . $number . ' ' . get_num_ending($number, array(__('комментарий', 'junona'), __('комментария', 'junona'), __('комментариев', 'junona')));
    }
    echo $output;
}

add_filter('comments_number', 'comments_number_ru');


function get_current_template($echo = false)
{
    if (!isset($GLOBALS['current_theme_template']))
        return false;
    if ($echo)
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}


//c
function mytheme_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    //var_dump($comment);
    if ($comment->comment_parent) {
        switch ($comment->comment_type) :
            case '' :
//                echo $comment->comment_parent;
                ?>
                <li <?php comment_class('comment answer'); ?> id="li-comment-<?php comment_ID() ?>">
                    <div class="comments-posts-one reply" id="comment-<?php comment_ID(); ?>">
                        <figure class="comments-posts-avatar">
                            <?php echo get_avatar($comment->comment_author_email, $args['avatar_size']); ?>
                        </figure>
                        <div class="comments-posts-content">
                            <?php printf(__('<p class="title-4">%s</p>'), get_comment_author_link()) ?>

                            <div class="counters counters-item"><i class="icon-time"></i><span><?php printf(__('%1$s'), get_comment_date('d F Y'), '') ?></span></div>

                            <p class="text-p"><?= get_comment_text() ?></p>
                            <?php //edit_comment_link(__('Редактировать'), ' ');
                            ?>

                            <?php if(get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))) { ?><button class="button-reply"><i class="icon-reply"></i><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></button><?php } ?>

                            <?php if ($comment->comment_approved == '0') : ?>
                                <div
                                        class="comment-awaiting-verification"><?php _e('Your comment is awaiting moderation.') ?></div>
                                <br/>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <?php
                break;
            case 'pingback'  :
            case 'trackback' :
                ?>
                <li class="post pingback">
                <?php comment_author_link(); ?>
                <?php edit_comment_link(__('Редактировать'), ' '); ?>
                <?php
                break;
        endswitch;
    } else {
        switch ($comment->comment_type) :
            case '' :
                ?>
                <div class="comments-posts-one" id="comment-<?php comment_ID(); ?>">
                    <figure class="comments-posts-avatar">
                        <?php echo get_avatar($comment->comment_author_email, $args['avatar_size']); ?>
                    </figure>
                    <div class="comments-posts-content">
                        <?php printf(__('<p class="title-4">%s</p>'), get_comment_author_link()) ?>

                        <div class="counters counters-item"><i class="icon-time"></i><span><?php printf(__('%1$s'), get_comment_date('d F Y'), '') ?></span></div>

                        <p class="text-p"><?= get_comment_text() ?></p>
                        <?php //edit_comment_link(__('Редактировать'), ' ');
                        ?>

                <?php if(get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))) { ?><button class="button-reply"><i class="icon-reply"></i><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></button><?php } ?>

                        <?php if ($comment->comment_approved == '0') : ?>
                            <div
                                    class="comment-awaiting-verification"><?php _e('Your comment is awaiting moderation.') ?></div>
                            <br/>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                break;
            case 'pingback'  :
            case 'trackback' :
                ?>
                <li class="post pingback">
                <?php comment_author_link(); ?>
                <?php edit_comment_link(__('Редактировать'), ' '); ?>
                <?php
                break;
        endswitch;
    }
}

add_filter('comment_reply_link', 'replace_reply_link_class');


//comment form button
function awesome_comment_form_submit_button($button)
{
    $button = "<button name='submit' type='submit' class='button button-primary' id='submit'>" . __('Отправить', 'junona') . "</button>";
    return $button;
}

add_filter('comment_form_submit_button', 'awesome_comment_form_submit_button');


//move comment textarea to bottom
function wpb_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'wpb_move_comment_field_to_bottom');

function replace_reply_link_class($class)
{
    $class = str_replace("class='comment-reply-link", "class='answer - link", $class);
    return $class;
}

add_filter('comment_text', 'stefan_wrap_comment_text', 1000);

function stefan_wrap_comment_text($class)
{
    $class = str_replace(" < p>", " < div class='text' > ", $class);
    $class = str_replace("</p > ", "</div > ", $class);
    return $class;
}