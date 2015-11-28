<?php
/*
  Plugin Name: FormGet Contact Form
  Plugin URI: http://www.formget.com
  Description: FormGet Contact Form is an eassy and effective form builder tool which enable you to bulid and embed form on your website in few steps. With FormGet Contact Form manage all your contact forms and your entire client communication at one single place.
  Version: 5.3.6
  Author: FormGet
  Author URI: http://www.formget.com
 */
require 'mailget.php';

function cf_mg_ajax() {
    $mg_obj = new mailget();
    add_action('wp_ajax_mg_display_contact_list', array($mg_obj, 'mg_display_contact_lists'));
    add_action('wp_ajax_mg_save_contact_list_id', array($mg_obj, 'mg_save_contact_list_id'));
    add_action('wp_ajax_mg_save_options', array($mg_obj, 'mg_save_options'));

    /**
     * Form ajax
     */
    add_action('wp_ajax_mg_form_action', array($mg_obj, 'mg_form_action'));
    add_action('wp_ajax_nopriv_mg_form_action', array($mg_obj, 'mg_form_action'));
}

add_action('init', 'cf_mg_ajax');

function my_admin_notice() {
    $fg_iframe_form = get_option('fg_embed_code');
    $string = "sideBar";
    $pos = strpos($fg_iframe_form, $string);
    if ($pos == false) {
        global $current_user;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
        if (!get_user_meta($user_id, 'admin_ignore_notice')) {
            ?>
            <div class="fg_trial-notify updated below-h2">
                <p class="fg_division_note">
                    Welcome to FormGet - You're almost ready to create your form <a class="fg_button_prime click_notice" href='<?php echo admin_url('admin.php?page=cf_page'); ?>'>Click to Create.</a><?php printf(__('<a class="fg_hide_notice fg_button_prime", href="%1$s">Hide Notice</a>'), '?admin_nag_ignore=0'); ?>
                </p>
            </div>
            <?php
        }
    }
}

if (isset($_GET['page']) && $_GET['page'] != 'cf_page') {
    add_action('admin_notices', 'my_admin_notice');
}

function admin_nag_ignore() {
    global $current_user;
    $user_id = $current_user->ID;
    /* If user clicks to ignore the notice, add that to their user meta */
    if (isset($_GET['admin_nag_ignore']) && '0' == $_GET['admin_nag_ignore']) {
        add_user_meta($user_id, 'admin_ignore_notice', 'true', true);
    }
}

add_action('admin_init', 'admin_nag_ignore');

function delete_user_entry() {
    global $current_user;
    $user_id = $current_user->ID;
    delete_user_meta($user_id, 'admin_ignore_notice', 'true', true);
}

register_deactivation_hook(__FILE__, 'delete_user_entry');


if (is_admin() && isset($_GET['page']) && ($_GET['page'] == 'cf_page' || $_GET['page'] == 'cf_mg_page' || $_GET['page'] == 'cf_submenu_page')) {

    function cf_add_style() {
        wp_enqueue_style('form1_style1_sheet1', plugins_url('css/fgstyle.css', __FILE__));
        wp_enqueue_style('mg_admin_stylesheet', plugins_url('css/mgstyle.css', __FILE__));
    }

    add_action("admin_head", "cf_add_style");

    function wordpress_style() {
        wp_enqueue_style('stylesheet_menu', admin_url('load-styles.php?c=1&amp;dir=ltr&amp;load=admin-bar,wp-admin,buttons,wp-auth-check&amp'));
        wp_enqueue_style('style_menu', admin_url('css/colors-fresh.min.css'));
    }

    add_action('admin_head', 'wordpress_style');
}


//setting page
add_action('admin_menu', 'cf_menu_page');

function cf_menu_page() {
    add_menu_page('cf', 'Contact Form', 'manage_options', 'cf_page', 'cf_setting_page', plugins_url('image/favicon.ico', __FILE__), 109);
    add_submenu_page('cf_page', 'Extension', 'Extension', 'manage_options', 'cf_submenu_page', 'cf_submenu_dashboard');
    add_menu_page('Email Marketing', 'Email Marketing', 'manage_options', 'cf_mg_page', 'cf_mg_setting_page', plugins_url('image/mailgeticon.png', __FILE__), 110);
}

function cf_submenu_dashboard() {
    echo "<h2 class='heading'>FormGet Powerful Extension</h2><h4 class='heading'>Extensions that simplify your work.</h4><hr/>";
    echo extension_list();
}

function cf_mg_setting_page() {
    $mg_obj = new mailget();
    $mg_obj->mg_interface();
}

function extension_list() {
    $extensions = array(
        array('img_path' => plugins_url("image/bundle.png", __FILE__),
            'ext_title' => 'FormGet Extensions Bundle',
            'ext_desc' => 'Extensions bundle gives you access to all FormGet extensions at one single price. This extension bundle includes more than 30 different extensions and several integration.',
            'ext_url' => 'http://www.formget.com/app/extension/fg_extension/all-1'),
        array('img_path' => plugins_url("image/custom.png", __FILE__),
            'ext_title' => 'Custom Branding',
            'ext_desc' => 'This extensions allows you to remove and edit any FormGet branding from your forms. It allows you to quickly transform your FormGet form into your own branded form.',
            'ext_url' => 'http://www.formget.com/app/single_extension/pricing/formcapabilities-custombranding'),
        array('img_path' => plugins_url("image/paypal.png", __FILE__),
            'ext_title' => 'PayPal',
            'ext_desc' => 'The PayPal Extension helps you to collect online payments through your forms. It accept credit card payments through forms instantly.',
            'ext_url' => 'http://www.formget.com/app/single_extension/pricing/payment-paypal'),
        array('img_path' => plugins_url("image/email.png", __FILE__),
            'ext_title' => 'Email Notification',
            'ext_desc' => 'With this extension whenever a user fills out the form you will recieve an email notification notifying you about the form submission. This way you wont miss any of the form entries.',
            'ext_url' => 'http://www.formget.com/app/single_extension/pricing/notification-emailnotification'),
        array('img_path' => plugins_url("image/mailc.jpg", __FILE__),
            'ext_title' => 'MailChimp',
            'ext_desc' => 'The MailChimp Extension helps you to store form messages on MailChimp mailing list. Thus help in collecting leads.',
            'ext_url' => 'http://www.formget.com/app/single_extension/pricing/thirdparty-mailchimp'),
        array('img_path' => plugins_url("image/aweber.jpg", __FILE__),
            'ext_title' => 'Aweber',
            'ext_desc' => 'The Aweber Extension helps you to store your collected leads through forms on your Aweber mailing list.',
            'ext_url' => 'http://www.formget.com/app/single_extension/pricing/thirdparty-aweber'),
        array('img_path' => plugins_url("image/logical.jpg", __FILE__),
            'ext_title' => 'Logical Forms',
            'ext_desc' => 'The Logical Forms Extension helps you to create form with condition logics that apply to form fields.',
            'ext_url' => 'http://www.formget.com/app/single_extension/pricing/formcapabilities-logicalforms')
    );
    $list = '';
    foreach ($extensions as $extension) {

        $list .="<div class='block-content'>
		<div class='block-left'><img src='" . $extension['img_path'] . "' class='entension-image'></div>
		<div class='block-right'>
			<h3>" . $extension['ext_title'] . "</h3>
			<a href='" . $extension['ext_url'] . "' target='_blank' class='view'>View Extension</a>
			<p class='details'>" . $extension['ext_desc'] . "</p>	
		</div>
	</div>";
    }
    return $list;
}

function cf_setting_page() {
    $url = plugins_url();
    ?>

    <!--    <div id="fg_videoContainer" >

        </div>-->
    <?php
    global $wpdb;
    $fg_video_code = get_option('fg_hide_video');
    if ($fg_video_code == "hide") {
        ?>
        <!--        <div class="fg_notice_div" id="fg_notice_div">
                    <p class="fg_video_notice" style="color:white;" > 
                        We have created a simple video for using the FormGet Plugin. 
                    <div class="fg_getting_started" id="fg_video_getting_started"><img src="<?php echo plugins_url('image/wvideo.png', __FILE__); ?>"></div>
                    <div class="hide_video_notice"><img src="<?php echo plugins_url('image/hide-btn-1.png', __FILE__); ?>"></div>
                </p>
        </div>-->

    <?php } ?>


    <div id="fg_of_container" class="fg_wrap" 


         <form id="fg_ofform" action="" method="POST">
            <div id="fg_header">
                <div class="fg_logo">
                    <h2> FormGet Contact Form</h2>
                    <img src="<?php echo plugins_url('image/extension.jpg', __FILE__); ?>" class="extensionimage" alt="Extension" />
                    <a href="http://www.formget.com/app/single_extension/pricing/formcapabilities-custombranding" target="_blank" class="anchorEx1"></a>
                    <a href="http://www.formget.com/app/single_extension/pricing/payment-paypal" target="_blank" class="anchorEx2"></a>
                    <a href="http://www.formget.com/app/single_extension/pricing/notification-emailnotification" target="_blank" class="anchorEx3"></a>
                    <a href="http://www.formget.com/app/extension/fg_extension/all-1" target="_blank" class="anchorEx4"></a>
                </div>
                <a target="#">
                    <div class="fg_icon-option"> </div>
                </a>
                <div class="clear"></div>
            </div>
            <div id="fg_main">

                <div id="fg_of-nav" class="wrap">
                    <h2 class="nav-tab-wrapper">

                        <span id="form_tab" class="nav-tab nav-tab-active ">Contact Form Builder </span>
                        <span id="embed_tab" class="nav-tab ">Embed Code</span>
                        <span id="help_tab" class="nav-tab  ">Help</span>
                        <span id="gopro_tab" class="nav-tab  ">Extensions</span>
                        <!--<span id="support_tab" class="nav-tab ">Support</span>-->
                                                <!--<span id="login_tab" class="nav-tab ">Login</span>-->

                    </h2>
                </div>
                <div id="fg_content">
                    <div class="fg_group" id="pn_content">


                        <div class="fg_section section-text">
                            <h3 class="fg_heading"> Create your custom form by just clicking the fields on left side of the panel. And then paste the sliding form code in embed code section.</h3>
                            <div class="outer_iframe_div" id="outer_iframe_div">
                                <div class="inner_iframe_div" id="inner_iframe_div" >
                                    <iframe src="http://www.formget.com/app" class="fbuild-iframe" name="iframe" id="iframebox" style="width:100%; height:900px; border:1px solid #dfdfdf;  align:center; overflow-y:scroll;" >
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>	
                    <div class="fg_group" id="pn_displaysetting">

                        <div class="fg_section section-text">
                            <h3 class="fg_heading">Embed code field will only accept code for Sliding  Form. Please do not place shortcode here. </h3>
                            <div class="option">
                                <div class="fg_controls" style="height:auto; padding-bottom: 10px;">
                                    <textarea name="content[html]" cols="60" rows="10"   class="regular-text"  id="fg_content_html" style="width:900px"><?php echo show_embed_code(); ?></textarea> 
                                    <p class="fg_info"><b>Select the page in which you want to show "Contact Us" tab. By default it is visible on every page.</b><p>
                                        <?php
                                        $page_title = $wpdb->get_results("SELECT post_title, id FROM $wpdb->posts WHERE (post_type = 'page' AND post_status = 'publish')");
                                        $val = get_option('fg_checked_page_id');
                                        if (!empty($val) && in_array("home1", $val)) {
                                            ?>
                                            <input id="fg_selected_box" type="checkbox" name="checkbox" value="home1" checked>
                                        <?php } else {
                                            ?>
                                            <input id="fg_selected_box" type="checkbox" name="checkbox" value="home1">
                                            <?php
                                        }
                                        echo "Home" . "<br/>";

                                        foreach ($page_title as $title) {
                                            $fg_list_page_id = get_option('fg_checked_page_id');
                                            ?>
                                            <input id="fg_selected_box" type="checkbox" name="checkbox" value="<?php echo $title->id; ?>" 
                                            <?php
                                            if (!empty($fg_list_page_id)) {
                                                foreach ($fg_list_page_id as $list) {
                                                    if ($list == $title->id) {
                                                        ?>
                                                               checked
                                                               <?php
                                                           }
                                                       }
                                                   }
                                                   ?> >

                                            <?php
                                            echo $title->post_title;
                                            echo "<br>";
                                        }
                                        ?>
                                    <div id="submit-form" class="fg_embed_code_save " > Save </div>			
                                    <div id="loader_img" align="center" style="margin-left:110px; display:none;">
                                        <img src="<?php echo plugins_url('image/ajax-loader.gif', __FILE__); ?>">
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="fg_group" id="pn_template">
                        <div class="fg_section section-text">
                            <h3 class="fg_heading"> Watch video tutorial to use Formget Contact Form Plugin</h3>
                            <p class="fg_info"><b>If you have any query. Please <a href="http://www.formget.com/contact-us/" target="blank">Contact Us</a></b> </p>
                            <div id="help_txt">
                                <iframe class="video_tobe_shown" width="700" height="400" src="//player.vimeo.com/video/84023688?autoplay=0&amp;loop=1&amp;rel=0&amp;wmode=transparent" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" __idm_id__="7182340"></iframe>
                            </div>


                        </div>
                    </div>
                    <div class="fg_group" id="pn_gopro">
                        <div class="fg_section section-text">
                            <h3 class="fg_heading"> All Extension that FormGet provides</h3>
                            <iframe src="http://www.formget.com/app/extension/fg_extension/all-1" name="iframe" id="ext-iframe" style="width:1030px; height:900px; overflow-y:scroll;" >
                            </iframe>
                        </div>
                    </div>
                    <div class="fg_group" id="pn_contactus">
                        <div class="fg_section section-text">
                            <h3 class="fg_heading"> Contact Us</h3>
                            <iframe class="formget_contact_form"  height='570' allowTransparency='true' frameborder='0' scrolling='no' style='width:100%;border:none'  src='https://www.formget.com/app/embed/form/qQvs-639'>Your Contact </iframe>
                        </div>
                    </div>	
                    <!--
                    <div class="fg_group" id="pn_login">
    <div class="fg_section section-text">
        <h3 class="fg_heading"> Login </h3>
        <div class="outer_iframe_div" id="outer_iframe_div">
            <div class="inner_iframe_div" id="inner_iframe_div" >
                <iframe src="http://www.formget.com/app/login" name="iframe" id="iframebox" class="login-iframe" style="width:100%; height:900px; border:1px solid #dfdfdf;  align:center; overflow-y:scroll;" >
                </iframe>
            </div>
        </div>
    </div>
    </div>
                    -->
                </div>
                <div class="clear"></div>
            </div>
            <div class="fg_save_bar_top">
            </div>

        </form>
    </div>

    <?php
}

function cf_embeded_script() {
    wp_enqueue_script('embeded_script', plugins_url('js/fg_script.js', __FILE__), array('jquery'));
    wp_localize_script('embeded_script', 'script_call', array('ajaxurl' => admin_url('admin-ajax.php'), 'aj_nonce' => wp_create_nonce('script-nonce')));
    wp_enqueue_script('mg_script', plugins_url('js/mg_script.js', __FILE__), array('jquery'));
    wp_localize_script('mg_script', 'mg_option', array('ajaxurl' => admin_url('admin-ajax.php'), 'mg_option_nonce' => wp_create_nonce('mg_option_nonce')));
}

if (isset($_GET['page']) && ($_GET['page'] == 'cf_page' || $_GET['page'] == 'cf_mg_page')) {
    add_action('init', 'cf_embeded_script');
}

function cf_text_ajax_process_request() {
    if (!check_ajax_referer('script-nonce', 'aj_nonce') && !is_user_logged_in() && !current_user_can('manage_options')) {
        return;
    }
    $text_value = $_POST['value'];
    // $val = $_POST['value_hide'];
	if(isset($_POST['page_id']))
    $page_id = $_POST['page_id'];
else
	$page_id = '';
    //echo $val;
    $pos = strpos($text_value, "sideBar");
    if ($pos == true || trim($text_value) == '') {
        //update_option('fg_hide_video', $val);
        update_option('fg_embed_code', $text_value);
		update_option('fg_checked_page_id', $page_id);
        //print_r($page_id);
        echo 1;
    } else {
        echo "Please enter valid Sliding Form code";
    }
    die();
}

add_action('wp_ajax_request_response', 'cf_text_ajax_process_request');

function show_embed_code() {
    global $wpdb;
    $fg_iframe_form = get_option('fg_embed_code');
    $string = "sideBar";
    $pos = strpos($fg_iframe_form, $string);
    if ($pos == true) {
        echo stripslashes($fg_iframe_form);
    }
}

/*
  if (is_page(cf_page)) {
  add_action('init', 'show_embed_code');
  }
 */


if (!function_exists('embeded_code')) {

    function embeded_code() {
        //$title = get_the_title();
        $postid = get_the_ID();
        $fg_list_page_id = get_option('fg_checked_page_id');
        global $wpdb;
        $fg_iframe_form = get_option('fg_embed_code');
        $string = "sideBar";
        $pos = strpos($fg_iframe_form, $string);
        if (!empty($fg_list_page_id)) {
            foreach ($fg_list_page_id as $key) {
                if ($postid == $key) {
                    if ($pos == true) {
                        echo stripslashes($fg_iframe_form);
                    }
                } else {
                    if (is_front_page() && $key == "home1") {
                        if ($pos == true) {
                            echo stripslashes($fg_iframe_form);
                        }
                    }
                }
            }
        } else {
            if ($pos == true) {
                echo stripslashes($fg_iframe_form);
            }
        }
    }

}

function cf_mg_subscribe_form() {
    $mg_obj = new mailget();
    $page_id = get_the_ID();
    $mg_form_description_text = $mg_obj->mg_get_option('mg_selected_page_id');
    $mg_enable_switch = $mg_obj->mg_get_option('mg_switch');
    if ($mg_enable_switch == 'on') {
        if (!empty($mg_form_description_text)) {
            foreach ($mg_form_description_text as $key) {
                if ($page_id == $key) {
                    $mg_obj->mg_subscribe_form();
                } elseif (is_front_page() && $key == "home1") {
                    $mg_obj->mg_subscribe_form();
                }
            }
        } else {
            $mg_obj->mg_subscribe_form();
        }
    }
}

if (!is_admin()) {
    add_action('wp_footer', 'cf_mg_subscribe_form');
}
if (!is_admin()) {
    add_action('wp_head', 'embeded_code');
}

function mg_style() {
    wp_enqueue_style('mg-style', plugins_url('css/mg_popup.css', __FILE__));
    wp_enqueue_script("mg-front", plugins_url('js/mg_front.js', __FILE__), array('jquery'));
    wp_localize_script('mg-front', 'mg', array('ajaxurl' => admin_url('admin-ajax.php'), 'imgurl' => plugins_url('image/mailget.png', __FILE__), 'mg_nonce' => wp_create_nonce('mg_nonce')));
}

add_action('wp_enqueue_scripts', 'mg_style');
//schort code function
if (!function_exists('formget_shortcode')) {

    function formget_shortcode($atts, $content = null) {
        extract(shortcode_atts(array(
            'user' => '',
            'formcode' => '',
            'tabtext' => 'Contact Us',
            'position' => 'right',
            'bgcolor' => 'e54040',
            'textcolor' => 'ffffff',
            'fontsize' => '16',
            'width' => '350',
            'allowTransparency' => true,
            'height' => '500',
            'tab' => ''
                        ), $atts));
        $iframe_formget = '';
        $url = "https://www.formget.com/app/embed/form/" . $formcode;
        if ($tab == 'page') {
            $iframe_formget .="<iframe height='" . $height . "' allowTransparency='true' frameborder='0' scrolling='no' style='width:100%;border:none'  src='" . $url . "' >";
            $iframe_formget .="</iframe>";
            add_filter('widget_text', 'do_shortcode');
            return $iframe_formget;
        }
        if ($tab == 'tabbed') {

            $tabbed_formget = <<<EOD
<script type='text/javascript'>
(function(s) 
{var head = document.getElementsByTagName('HEAD').item(0);
var s= document.createElement('script');
s.type = 'text/javascript';
s.src='//www.formget.com/app/app_data/new-widget/popup.js';
head.appendChild(s); 
var options = {
'tabKey': '{$formcode}',
'tabtext':'{$tabtext}',
'height': '{$height}',
'width': '{$width}',
'tabPosition':'{$position}',
'textColor': '{$textcolor}',
'tabBackground': '{$bgcolor}',
'fontSize': '{$fontsize}',
'tabbed':''
};
s.onload = s.onreadystatechange = function() {
var rs = this.readyState;
if (rs)
if (rs != 'complete')
if (rs != 'loaded')
return;
try {
sideBar = new buildTabbed();
sideBar.initializeOption(options);
sideBar.loadContent();sideBar.buildHtml();
} 
catch (e) {}  
};
var scr = document.getElementsByTagName(s)[0];
})(document, 'script');
</script>
EOD;
            return $tabbed_formget;
        }
    }

}
add_shortcode('formget', 'formget_shortcode');


// FormGet Widget
if (!class_exists('Formget_Widget')) {

    class Formget_Widget extends WP_Widget {

        function __construct() {
            parent::__construct(
                    'FormGet_widget', __('FormGet Widget', 'formget_widget'), array('description' => __('FormGet widget to show forms on sidebar and footer', 'formget_widget'),)
            );
        }

        public function widget($args, $instance) {
            $text = format_to_edit($instance['textarea']);
            $pos = strpos($text, 'embed');
            ?>  
            <div class='formget_widget' style="<?php if ($pos == True) { ?>  
                     -webkit-box-shadow: 1px 0px 11px rgba(50, 50, 50, 0.74);-moz-box-shadow: 1px 0px 11px rgba(50, 50, 50, 0.74);box-shadow: 1px 0px 11px rgba(50, 50, 50, 0.74); margin-bottom: 25px; padding-top: 15px;   
                     <?php }
                     ?>">
                     <?php
                     echo $instance['textarea'];
                     echo "</div>";
                 }

                 public function update($new_instance, $old_instance) {
                     return $new_instance;
                 }

                 public function form($instance) {
                     $instance = wp_parse_args((array) $instance, array('textarea' => ''));
                     $text = format_to_edit($instance['textarea']);
                     ?>
                <p>
                    <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'wp_widget_plugin'); ?></label>
                    <textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>" rows="7" cols="20" placeholder="Enter here your Iframe Code
                              "><?php echo $text ?></textarea>
                </p>
                <?php
                !empty($text)
                        and print '<h3>Preview</h3><div style="border:3px solid #369;padding:11px; margin-bottom: 5px;">'
                                . $instance['textarea'] . '</div>';
                ?>
                <?php
            }

        }

    }
    add_action('widgets_init', 'register_formget_widget', 20);

    if (!function_exists('register_formget_widget')) {

        function register_formget_widget() {
            register_widget('Formget_Widget');
        }

    }
    ?>