<?php
/*
  Template Name: Contact
 */
$nameError = '';
$commentError = '';
$emailError = '';
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = __('Please enter your name.', 'colorway');
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = __('Please enter your email address.', 'colorway');
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $emailError = __('You entered an invalid email address.', 'colorway');
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['comments']) === '') {
        $commentError = __('Please enter a message.', 'colorway');
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }
    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = '[PHP Snippets] From ' . $name;
        $body = __('Name: ', 'colorway') . $name . __('\n\nEmail: ', 'colorway') . $email . __('\n\nComments: ', 'colorway') . $comments;
        $headers = __('From: ', 'colorway') . $name . ' <' . $emailTo . '>' . "\r\n" . __('Reply-To: ', 'colorway') . $email;
        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
get_header();
?>
<!--Start Content Grid-->
<div class="grid_24 content contact">
    <div  class="grid_16 alpha">
        <div class="content-wrap">
            <div class="content-info">
                <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
            </div>
            <!--Start Blog Post-->
            <div class="contact">
                <h2>
                    <?php the_title(); ?>
                </h2>
                <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                        <?php if (isset($emailSent) && $emailSent == true) { ?>
                            <div class="thanks">
                                <p><?php _e('Thanks, your email was sent successfully.', 'colorway'); ?></p>
                            </div>
                        <?php } else { ?>
                            <?php the_content(); ?>
                            <?php if (isset($hasError) || isset($captchaError)) { ?>
                                <p class="error"><?php _e('Sorry, an error occured.', 'colorway'); ?>
                                <p>
                                <?php } ?>
                            <form action="<?php the_permalink();
                                ?>" id="contactForm" method="post">
                                <ul class="contactform">
                                    <li>
                                        <label for="contactName"><?php _e('Name:', 'colorway'); ?></label>
                                        <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName'])) echo $_POST['contactName']; ?>" class="required requiredField" required/>
                                        <?php if ($nameError != '') { ?>
                                            <span class="error">
                                                <?= $nameError; ?>
                                            </span>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <label for="email"><?php _e('Email', 'colorway'); ?></label>
                                        <input type="text" name="email" id="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" class="required requiredField email" required/>
                                        <?php if ($emailError != '') { ?>
                                            <span class="error">
                                                <?= $emailError; ?>
                                            </span>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <label for="commentsText"><?php _e('Message:', 'colorway'); ?></label>
                                        <textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField" required><?php
                                            if (isset($_POST['comments'])) {
                                                if (function_exists('stripslashes')) {
                                                    echo stripslashes($_POST['comments']);
                                                } else {
                                                    echo $_POST['comments'];
                                                }
                                            }
                                            ?></textarea>
                                        <?php if ($commentError != '') { ?>
                                            <span class="error">
                                                <?= $commentError; ?>
                                            </span>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <input type="submit" value="<?php _e('Submit', 'colorway'); ?>"/>
                                    </li>
                                </ul>
                                <input type="hidden" name="submitted" id="submitted" value="true" />
                            </form>
                        <?php } ?>
                        <!-- End the Loop. -->
                    <?php endwhile; ?>
            </div>
            <div class="hrline"></div>
            <!--End Blog Post-->
            <div class="clear"></div>             
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<div class="clear"></div>
<!--End Content Grid-->
</div>
<!--End Container Div-->
<?php get_footer(); ?>