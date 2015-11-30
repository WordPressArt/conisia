<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <?php
        if (is_front_page()) {
            if (get_option('colorway_keyword') != '') {
                ?>
                <meta name="keywords" content="<?php echo get_option('colorway_keyword'); ?>" />
                <?php
            }
            if (get_option('colorway_description') != '') {
                ?>
                <meta name="description" content="<?php echo get_option('colorway_description'); ?>" /> 
                <?php
            }
            if (get_option('colorway_author') != '') {
                ?>
                <meta name="author" content="<?php echo get_option('colorway_author'); ?>" />
                <?php
            }
        }
        ?>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
        ?>

        <!--[if gte IE 9]>
        <script type="text/javascript">
        Cufon.set('engine', 'canvas');
        </script>
        <![endif]-->
    </head>
    <body background="<?php
    if (get_option('inkthemes_bodybg') != '') {
        echo get_option('inkthemes_bodybg');
    } else {
        echo bloginfo('template_url') . "/images/body-bg.png";
    }
    ?>" <?php body_class(); ?>>
        <!--Start Container Div-->
        <div id="MainNav"> 
        </div>
        <div class="container_24 container">
            <!--Start Header Grid-->
            <div class="grid_24 header">
                <ul class="cole-menu-container">
                    <li class="cole-logo-container">
                        <div class="logo">
                            <div class="call-us">
                                <?php if (get_option('colorway_contact_number') != '') { ?>
                                    <a class="btn" href="tel:<?php echo stripslashes(get_option('colorway_contact_number')); ?>">
                                    </a>
                                <?php } ?>
                            </div>
                            <a href="<?php bloginfo('url'); ?>">
                                <img src="<?php
                                if (get_option('colorway_logo') != '') {
                                    echo get_option('colorway_logo');
                                } else {
                                    echo bloginfo('template_url') . "/images/logo.png";
                                }
                                ?>" alt="<?php bloginfo('name'); ?>" />
                            </a> 
                        </div>
                    </li>
                    <li class="cole-right-menu-container">
                        <div class="cole-right-menu">
                            <div class="cole-langbar"><ul  id="cole-langbar-list"  class="red"><li class="lang-item"><?php _e('Language', 'colorway-coneisa-child'); ?> </li>
                      <?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?></ul></div>
                            
                            <!--Start MenuBar-->
                            <div class="menu-bar">                                           
                                <?php inkthemes_nav(); ?>   
                                <div class="clearfix"></div>
                            </div>
                            <!--End MenuBar-->
                        <div>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <!--End Header Grid-->