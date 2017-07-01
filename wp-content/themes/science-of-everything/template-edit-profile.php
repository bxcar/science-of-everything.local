<?php
/**
 * Template Name: edit-profile
 */
/* Get user info. */
global $current_user, $wp_roles;
//get_currentuserinfo(); //deprecated since 3.1

/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();
/* If profile was saved, update profile. */
if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action']) && $_POST['action'] == 'update-user') {

    /* Update user password. */
    if (!empty($_POST['pass1']) && !empty($_POST['pass2'])) {
        if ($_POST['pass1'] == $_POST['pass2'])
            wp_update_user(array('ID' => $current_user->ID, 'user_pass' => esc_attr($_POST['pass1'])));
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if (!empty($_POST['url']))
        wp_update_user(array('ID' => $current_user->ID, 'user_url' => esc_url($_POST['url'])));
    if (!empty($_POST['email'])) {
        if (!is_email(esc_attr($_POST['email'])))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif (email_exists(esc_attr($_POST['email'])) != $current_user->id)
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else {
            wp_update_user(array('ID' => $current_user->ID, 'user_email' => esc_attr($_POST['email'])));
        }
    }

    if (!empty($_POST['first-name']))
        update_user_meta($current_user->ID, 'first_name', esc_attr($_POST['first-name']));
    if (!empty($_POST['last-name']))
        update_user_meta($current_user->ID, 'last_name', esc_attr($_POST['last-name']));
    if (!empty($_POST['description']))
        update_user_meta($current_user->ID, 'description', esc_attr($_POST['description']));
    if (!empty($_POST['activity']))
        update_user_meta($current_user->ID, 'activity', esc_attr($_POST['activity']));
    if (!empty($_POST['city']))
        update_user_meta($current_user->ID, 'city', esc_attr($_POST['city']));
    if (!empty($_POST['birthday-day']))
        update_user_meta($current_user->ID, 'birthday-day', esc_attr($_POST['birthday-day']));
    if (!empty($_POST['birthday-month']))
        update_user_meta($current_user->ID, 'birthday-month', esc_attr($_POST['birthday-month']));
    if (!empty($_POST['birthday-year']))
        update_user_meta($current_user->ID, 'birthday-year', esc_attr($_POST['birthday-year']));

    /* Redirect so the page will show updated info.*/
    /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if (count($error) == 0) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect(get_permalink());
        exit;
    }
}

get_header(); ?>

    <section class="l-changeProfile">
        <div class="mainWrap mainWrap-medium row">
            <div class="changeProfile-portrait column small-12">
<!--                <button class="changeProfile-portrait-delete"><i class="icon-close3"></i></button>-->
                <figure class="changeProfile-portrait-avatar"><?= get_wp_user_avatar($current_user->ID) ?></figure>
                <label class="changeProfile-portrait-upload"><span
                            class="changeProfile-portrait-upload-button button button-primary">Загрузить фото</span>
<!--                    <input type="file">-->
                    <?= do_shortcode('[avatar_upload] '); ?>
                </label>
            </div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if (!is_user_logged_in()) : ?>
                    <p class="warning">
                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                    </p><!-- .warning -->
                <?php else : ?>
                    <?php if (count($error) > 0) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                    <form method="post" id="adduser" class="generalForm changeProfile-form column small-12 medium-9 row"
                          action="<?php the_permalink(); ?>">
                        <?php
                        //action hook for plugin and extra fields
                        do_action('edit_user_profile', $current_user);
                        ?>
                        <!--<p class="generalForm-sub column small-12">Социальные сети</p>
                        <p class="generalForm-hint column small-12">Нажмите на соответствующую иконку соц. сети, чтобы
                            связать
                            ее с
                            вашим аккаунтом</p>
                        <div class="changeProfile-form-social vk column small-12 medium-6 large-4 column-block">
                            <input type="text" placeholder="Вконтакте" readonly>
                            <button class="changeProfile-form-social-button"><i class="icon-vk"></i></button>
                        </div>
                        <div class="changeProfile-form-social fb column small-12 medium-6 large-4 column-block">
                            <input type="text" placeholder="Facebook" readonly>
                            <button class="changeProfile-form-social-button"><i class="icon-fb"></i></button>
                        </div>
                        <div class="changeProfile-form-social gp column small-12 medium-6 large-4 column-block">
                            <input type="text" placeholder="Google Plus" readonly>
                            <button class="changeProfile-form-social-button"><i class="icon-google-plus"></i></button>
                        </div>
                        <div class="changeProfile-form-social tw column small-12 medium-6 large-4 column-block">
                            <input type="text" placeholder="Twitter" readonly>
                            <button class="changeProfile-form-social-button"><i class="icon-twitter"></i></button>
                        </div>
                        <div class="changeProfile-form-social skype column small-12 medium-6 large-4 column-block">
                            <input type="text" placeholder="Skype" readonly>
                            <button class="changeProfile-form-social-button"><i class="icon-skype"></i></button>
                        </div>
                        <div class="changeProfile-form-social inst column small-12 medium-6 large-4 column-block">
                            <input type="text" placeholder="Instagram" readonly>
                            <button class="changeProfile-form-social-button"><i class="icon-instagram"></i></button>
                        </div>-->
                        <!-- Display when change profile was success-->
                        <div class="changeProfile-form-complete column small-12 large-5"><i class="icon-check"></i>
                            <p><b>Изменения сохранены</b>. <br> Ваш профиль был успешно обновлен.</p>
                        </div>
                        <!-- End of success message-->

                        <div class="changeProfile-form-buttons column small-12 large-7">
                            <?php echo $referer; ?>
                            <button name="updateuser" type="submit" id="updateuser"
                                    class="submit button button button-primary">
                                <?php _e('Обновить', 'profile'); ?>
                            </button>
<!--                            <a class="button button-alert" href="user-account.html">Отменить</a>-->
                            <?php wp_nonce_field('update-user') ?>
                            <input name="action" type="hidden" id="action" value="update-user"/>
                        </div><!-- .form-submit -->
                    </form><!-- #adduser -->
                <?php endif; ?>
            <?php endwhile; ?>
            <?php else: ?>
                <p class="no-data">
                    <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
                </p><!-- .no-data -->
            <?php endif; ?>
        </div>
    </section>
    <style>
        .changeProfile-portrait-avatar img {
            width: 100% !important;
            height: auto !important;
        }

        .wpua-edit-container,
        div.updated {
            display: none;
        }

        span.changeProfile-portrait-upload-button {
            cursor: pointer;
        }
    </style>
<script>
    jQuery('.wpua-edit p.submit').addClass('changeProfile-portrait-upload-button button button-primary').css('margin-top', '10px');
    jQuery('.wpua-edit p.submit input').val('Обновить фото');
</script>
<?php get_footer(); ?>