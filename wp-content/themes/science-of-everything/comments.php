<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tax
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<section class="comments">

    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) : ?>

        <div class="section-title"><h2 class="title-4"><i class="icon-comment"></i>комментарии</h2></div>
        <!-- .comments-title -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'tax'); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'tax')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'tax')); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <?php
        wp_list_comments(array(
//                'style' => 'ol',
            'short_ping' => true,
            'avatar_size' => 75,
            'reply_text' => __('Ответить', 'science-of-everything'),
            'callback' => 'mytheme_comment',
        ));
        ?>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'tax'); ?></h2>
                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'tax')); ?></div>
                    <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'tax')); ?></div>
                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
            <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().


    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>

        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'tax'); ?></p>
        <?php
    endif;


    $fields = array(
        'author' => '
                
        <input required placeholder="' . __('Имя', 'science-of-everything') . '" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />',
        'email' => '<input required placeholder="Email" id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></div></div>',
//        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label> <textarea placeholder="Текст" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p></div></div></div>'
    );

    /*$comments_args = array(
        'fields' => $fields,
        'comment_notes_before' => '<div class="leave-comment">
        <div class="comment-title">' . get_field('comments_form_title') . ' </div>
        <div class="form-wrap">',
        'title_reply' => '',
        'comment_notes_after' => '',
    );*/
    $comments_args = array(
        'fields' => $fields,
//        'comment_notes_before' => '<div class="comments-write"><figure class="comments-posts-avatar">' . get_wp_user_avatar(get_current_user_id()) . '</figure>',
        'title_reply' => '',
//        'comment_notes_after' => '</div>',
        'class_form' => 'comments-write-form'
    );
//    echo '<div class="comments-write">';
//    echo '<figure class="comments-posts-avatar">' . get_wp_user_avatar(get_current_user_id()) . '</figure>';
    comment_form($comments_args);
//    echo '</div>';
    ?>
    <style>
        .comment .answer-link {
            position: absolute;
            right: 0;
            top: 0;
        }

        #reply-title {
            text-align: right;
            margin-bottom: 10px;
        }

        .logged-in-as,
        .comment-form-comment label:first-child{
            display: none;
        }

        .comments-write {
            position: relative;
        }

        #reply-title {
            margin-top: -25px;
            position: absolute;
            right: 0;
        }

        .comment.depth-3{
            padding-left: 95px;
        }

        #reply-title {
            color: #9087ac;
            font-weight: normal;
        }

        /*.comment.depth-4 {
            padding-left: 190px;
        }*/
    </style>
    <script>
        jQuery('#respond').prepend('<figure class="comments-posts-avatar"><?= get_wp_user_avatar(get_current_user_id()) ?></figure>').wrapInner('<div class="comments-write"></div>');
        jQuery('textarea#comment').attr('placeholder', 'Комментарий');
        if ( jQuery( "p.must-log-in" ).length ) {
            jQuery('#respond').replaceWith('<div class="comments-alert"><span class="comments-alert-icon">!</span><span><b>Внимания!</b> <br> Чтобы оставить комментарий <button class="comments-alert-login">войдите</button> в систему или <button class="comments-alert-register">зарегистрируйтесь</button>.</span></div>');
        }
    </script>
</section><!-- #comments -->
