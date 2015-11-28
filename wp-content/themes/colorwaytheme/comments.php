<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');
if (post_password_required()) {
    ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'colorway'); ?></p>
    <?php
    return;
}
?>
<!-- You can start editing here. -->
<div id="commentsbox">
    <?php if (have_comments()) : ?>
        <h3 id="comments">
            <?php
            comments_number(__('No Responses', 'colorway'), __('One Response', 'colorway'), __('% Responses', 'colorway'));
            _e('so far.', 'colorway');
            ?>
        </h3>
        <ol class = "commentlist">
            <?php wp_list_comments();
            ?>
        </ol>
        <div class="comment-nav">
            <div class="alignleft">
                <?php previous_comments_link() ?>
            </div>
            <div class="alignright">
                <?php next_comments_link() ?>
            </div>
        </div>
        <?php
    else : /* this is displayed if there are no comments so far   */
        if (comments_open()) :
        /* If comments are open, but there are no comments. */
        else : /* comments are closed */
            /* If comments are closed. */
            ?>
            <p class = "nocomments"><?php _e('Comments are closed.', 'colorway'); ?></p>
        <?php
        endif;
    endif;
    if (comments_open()) :
        ?>
        <div id="comment-form">
            <div id="respond" class="rounded">
                <div class="cancel-comment-reply"> <small>
                        <?php cancel_comment_reply_link(); ?>
                    </small> </div>
                <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                    <p><?php _e('You must be ', 'colorway'); ?><a href="<?php echo wp_login_url(get_permalink()); ?>"><?php _e('logged in', 'colorway'); ?></a> <?php _e('to post a comment.', 'colorway'); ?></p>
                <?php else : ?>
                    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                        <?php if (is_user_logged_in()) : ?>
                            <p><?php _e('Logged in as ', 'colorway'); ?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out &raquo;', 'colorway'); ?></a></p>
                        <?php else : ?>
                            <label for="author"><?php _e('Name ', 'colorway'); ?><small>
                                    <?php if ($req) _e("(required)", 'colorway'); ?>
                                </small></label>
                            <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                            <label for="email"><?php _e('Mail ', 'colorway'); ?><small>
                                    <?php if ($req) _e("(required)", 'colorway'); ?>
                                </small></label>
                            <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                            <label for="url"><?php _e('Website', 'colorway'); ?></label>
                            <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                        <?php endif; ?>
                        <label for="message"><?php _e('Comment', 'colorway'); ?></label>
                        <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
                        <br />
                        <input name="submit" type="submit" id="commentSubmit" tabindex="5" value="<?php _e('Submit', 'colorway'); ?>" />
                        <?php
                        comment_id_fields();
                        do_action('comment_form', $post->ID);
                        ?>
                    </form>
                <?php endif; // If registration required and not logged in          ?>
            </div>
        </div>
    <?php endif; // if you delete this the sky will fall on your head          ?>
</div>