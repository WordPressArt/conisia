<?php
/**
 *
  Contact
 *
 */
?>
<?php
$nameError = '';
$emailError = '';
$commentError = '';
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
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
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>
<!-- blog title -->
<!-- blog title ends -->
<?php if (isset($emailSent) && $emailSent == true) { ?>
            <div class="thanks">
                <h6 style="color:#fff;">Thanks, your email was sent successfully.</h6>
            </div>
        <?php } else { ?>
    <?php if (isset($hasError) || isset($captchaError)) { ?>
                <p class="error common">Sorry, an error occured. </p>
            <?php } ?>
            <form class="contactform animated" id="contactForm_footer" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <input type="text" name="contactName" id="contactName" placeholder="<?php echo "Name"; ?>" value="<?php if (isset($_POST['contactName']))
            echo $_POST['contactName'];
            ?>" class="text required requiredField" required/>
    <?php if ($nameError != '') { ?>
                    <span class="error name"> <?php echo $nameError; ?> </span>                           
                       <?php } ?>
                <input type="email" name="email" id="email" placeholder="<?php echo "Email"; ?>" value="<?php if (isset($_POST['email']))
                       echo $_POST['email'];
                   ?>" class="text required requiredField email" required/>
                       <?php if ($emailError != '') { ?>
                    <span class="error email"> <?php echo $emailError; ?> </span>  
					<?php } ?>
                <div class="clearfix"></div>
                <p class="formfield">				
                <textarea value="<?php
                   if (isset($_POST['comments'])) {
                       if (function_exists('stripslashes')) {
                           echo stripslashes($_POST['comments']);
                       } else {
                           echo $_POST['comments'];
                       }
                   }
                       ?>" name="comments" id="commentsText" placeholder="<?php echo "Message"; ?>"  class="required requiredField message" required></textarea>
					   
                    <?php if ($commentError != '') { ?>
                    <span class="error comment"> <?php echo $commentError; ?> </span>
                <?php } ?>
				<div class="clearfix"></div>               
                <input  class="btnSubmit" type="submit" name="submit" value="<?php echo "Send"; ?>"/>
				</p>
                <input type="hidden" name="submitted" id="submitted" value="true" />
            </form>  
<?php } ?>
<div class="clear"></div>