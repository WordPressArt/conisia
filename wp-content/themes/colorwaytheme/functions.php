<?php
$functions_path = get_template_directory() . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces (options,framework, seo)
/* These files build out the theme specific options and associated functions. */
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings
require_once ($functions_path . 'dynamic-image.php');

/**
 * Style Enqueue 
 */
function colorway_add_style() {
    if (!is_admin()) {
        wp_enqueue_style('colorway-opensans-font', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', '', '', 'all');
        wp_enqueue_style('colorway-raleway-font', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900', '', '', 'all');
        wp_enqueue_style('colorway-ddsmooth', get_template_directory_uri() . "/css/ddsmoothmenu.css", '', '', 'all');
        wp_enqueue_style('colorway-Pretyphoto', get_template_directory_uri() . "/css/prettyPhoto.css", '', '', 'all');
        wp_enqueue_script('inkthemes-responsive-menu-2', get_template_directory_uri() . '/js/menu/jquery.meanmenu.2.0.min.js', array('jquery'));
        wp_enqueue_script('inkthemes-responsive-menu-2-options', get_template_directory_uri() . '/js/menu/jquery.meanmenu.options.js', array('jquery'));
         if (get_option('colorway_lanstylesheet') == '') {
        wp_enqueue_style('colorway-coloroptions', get_template_directory_uri() . "/css/green.css", '', '', 'all');
         } else {
         wp_enqueue_style('colorway-coloroptions', get_template_directory_uri() . "/css/" . get_option('colorway_altstylesheet') . ".css", '', '', 'all');
         }
        if (get_option('colorway_lanstylesheet') != 'Default') {
            wp_enqueue_style('colorway_lanstylesheet', get_template_directory_uri() . "/" . get_option('colorway_lanstylesheet') . ".css", '', '', 'all');
        }
        wp_enqueue_style('colorway-zoombox', get_template_directory_uri() . "/css/zoombox.css", '', '', 'all');
        wp_enqueue_style('colorway-animation', get_template_directory_uri() . "/css/animate.css", '', '', 'all');
        //wp_enqueue_style('colorway-camera', get_template_directory_uri() . "/css/camera.css", '', '', 'all');
    }
}

add_action('init', 'colorway_add_style');

/**
 * jQuery Enqueue
 */
function jquery_init() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('ddsmoothmenu', get_template_directory_uri() . "/js/ddsmoothmenu.js", array('jquery'));
        wp_enqueue_script('slides', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'));
        wp_enqueue_script('tipsy', get_template_directory_uri() . '/js/jquery.tipsy.js', array('jquery'));
        wp_enqueue_script('zoombox', get_template_directory_uri() . '/js/zoombox.js', array('jquery'));
        wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'));
        wp_enqueue_script('inkthemes-modernizr', get_template_directory_uri() . '/js/modernizr.custom.79639.js', array('jquery'));
        wp_enqueue_script('inkthemes-ba-cond', get_template_directory_uri() . '/js/jquery.ba-cond.min.js', array('jquery'), false, true);
        wp_enqueue_script('inkthemes-slitslider', get_template_directory_uri() . '/js/jquery.slitslider.js', array('jquery'), false, true);
        wp_enqueue_script('inkthemes-sliderinit', get_template_directory_uri() . '/js/slider-init.js', array('jquery'), false, true);
        wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    } elseif (is_admin()) {
        
    }
}

add_action('wp_enqueue_scripts', 'jquery_init');
/* ColorWay Lite to ColorwayPro theme data */
$inkthemes_litetopro_data_update = get_option('inkthemes_litetopro_data_update');
if (empty($inkthemes_litetopro_data_update)) {
    $lite_theme_colorway_options = get_option('colorway');
    $lite_theme_inkthemes_options = get_option('inkthemes_options');
    if ($lite_theme_colorway_options && !$lite_theme_inkthemes_options) {
        $of_options = $lite_theme_colorway_options;
        $backup_data = $lite_theme_colorway_options;
    } elseif (!$lite_theme_colorway_options && $lite_theme_inkthemes_options) {
        if (isset($lite_theme_inkthemes_options['of_options'])) {
            $of_options = $lite_theme_inkthemes_options['of_options'];
            $backup_data = $lite_theme_inkthemes_options;
        } else {
            $of_options = $lite_theme_inkthemes_options;
            $backup_data = $lite_theme_inkthemes_options;
        }
    } else {
        $of_options = $lite_theme_inkthemes_options;
        $backup_data = $lite_theme_inkthemes_options;
    }
    if (!empty($of_options)) {
        foreach ($of_options as $key => $value) {
            $option_value = get_option($key);
            if (empty($option_value) || $option_value == "") {
                if ($key == 'inkthemes_customcss') {
                    update_option('colorway_customcss', $backup_data[$key]);
                } elseif ($key == 'colorway_home_page_blog_post') {
                    update_option('inkthemes_homepage_blog_feature_option', $backup_data[$key]);
                } elseif ($key == 'colorway_home_page_slider') {
                    update_option('inkthemes_homepage_slider_feature_option', $backup_data[$key]);
                } elseif ($key == 'inkthemes_blog_posts') {
                    update_option('inkthemes_homepage_blog_option', $backup_data[$key]);
                } else {
                    update_option($key, $backup_data[$key]);
                }
            }
        }
        update_option('inkthemes_litetopro_data_update', '1');
    }
}
/* Front Page Rename */
$get_status = get_option('re_nm');
$get_file_ac = TEMPLATEPATH . '/front-page.php';
$get_file_dl = TEMPLATEPATH . '/front-page-hold.php';
//True Part
if ($get_status === 'off' && file_exists($get_file_ac)) {
    rename("$get_file_ac", "$get_file_dl");
}
/* False Part */
if ($get_status === 'on' && file_exists($get_file_dl)) {
    rename("$get_file_dl", "$get_file_ac");
}
/**
 * Post Thumbnail Support
 */
add_theme_support('post-thumbnails');
if (function_exists('add_image_size'))
    add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
    add_image_size('post_thumbnail', 250, 160, true);
}
/* Load languages file */
load_theme_textdomain('colorway', get_template_directory() . '/languages');
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if (is_readable($locale_file))
    require_once($locale_file);
/**
 * Auto Feed Links Support
 */
if (function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
}

/**
 * Custom Menus Function
 * Add CLASS attributes to the first <ul> occurence in wp_page_menu
 */
function add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="ddsmoothmenu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'add_menuclass');
add_action('init', 'register_custom_menu');

function register_custom_menu() {
    register_nav_menu('custom_menu', __('Main Menu', 'colorway'));
}

function inkthemes_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'inkthemes_nav_fallback'));
    else
        inkthemes_nav_fallback();
}

function inkthemes_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
    <?php
    wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
    ?>
        </ul>
    </div>
    <?php
}

function get_current_menu() {
    if (is_home()) {
        print "";
    } else {
        if (!is_active_sidebar('primary-widget-area') && !is_active_sidebar('secondary-widget-area')) {
            print "<li>";
        }
    }
}

function new_nav_menu_items($items) {
    if (is_home()) {
        $homelink = get_current_menu() . '<li class="current_page_item"><a href="' . home_url('/') . '">' . __('Home', 'colorway') . '</a></li>';
    } else {
        $homelink = get_current_menu() . '<li><a href="' . home_url('/') . '">' . __('Home', 'colorway') . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}

add_filter('wp_list_pages', 'new_nav_menu_items');

function inkthemes_image_post($post_id) {
    add_post_meta($post_id, 'img_key', 'on');
}

/**
 * Breadcrumbs Plugin 
 */
function inkthemes_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = __('Home', 'colorway'); /* text for the 'Home' link */
    $before = '<span class="current">'; /* tag before the current crumb */
    $after = '</span>'; /* tag after the current crumb */
    echo '<div id="crumbs">';
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    } elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . __('Search results for "', 'colorway') . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . __('Posts tagged "', 'colorway') . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . __('Articles posted by ', 'colorway') . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . __('Error 404', 'colorway') . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo __('Page', 'colorway') . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</div>';
}

/**
 * This function thumbnail id and
 * Function to call first uploaded image in functions file
 * returns thumbnail image
 * @param type $iw
 * @param type $ih 
 */
function inkthemes_get_thumbnail($iw, $ih) {
    $permalink = get_permalink();
    $thumb = get_post_thumbnail_id();
    $image = inkthemes_thumbnail_resize($thumb, '', $iw, $ih, true, 90);
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
        print "<a href='$permalink'><div class='img_thumb'><span></span><img class='postimg' src='$image[url]' width='$image[width]' height='$image[height]' /></div></a>";
    }
}

/**
 * This function gets image width and height and
 * Prints attached images from the post        
 */
function inkthemes_get_image($width, $height) {
    $w = $width;
    $h = $height;
    global $post, $posts;
    /* This is required to set to Null */
    $img_source = '';
    $permalink = get_permalink();
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    $img_path = inkthemes_image_resize($img_source, $w, $h);
    if (!empty($img_path['url'])) {
        print "<a href='$permalink'><div class='img_thumb'><span></span><img src='$img_path[url]' class='postimg' alt='Post Image'/></div></a>";
    }
}

/**
 * Attachment Page Design 
 * For Attachment Page
 */
if (!function_exists('twentyten_posted_in')) :

    /**
     * Prints HTML with meta information for the current post (category, tags and permalink).
     *
     * @since Colorway 1.0
     */
    function twentyten_posted_in() {
        /* Retrieves tag list of current post, separated by commas. */
        $tag_list = get_the_tag_list('', ', ');
        if ($tag_list) {
            $posted_in = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'colorway');
        } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
            $posted_in = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'colorway');
        } else {
            $posted_in = __('Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'colorway');
        }
        /* Prints the string, replacing the placeholders. */
        printf(
                $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
        );
    }

endif;
if (!function_exists('twentyten_comment')) :

    /**
     * Template for comments and pingbacks.
     *
     * To override this walker in a child theme without modifying the comments template
     * simply create your own twentyten_comment(), and that function will be used instead.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     * @since Colorway 1.0
     */
    function twentyten_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case '' :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <div id="comment-<?php comment_ID(); ?>">
                        <div class="comment-author vcard"> <?php
                            echo get_avatar($comment, 40);
                            printf(__('%s <span class="says">says:</span>', 'colorway'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));
                            ?> </div>
                        <!-- .comment-author .vcard -->
                            <?php if ($comment->comment_approved == '0') : ?>
                            <em>
                                <?php _e('Your comment is awaiting moderation.', 'colorway'); ?>
                            </em> <br />
                <?php endif; ?>
                        <div class="comment-meta commentmetadata"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                <?php
                /* translators: 1: date, 2: time */
                printf(__('%1$s at %2$s', 'colorway'), get_comment_date(), get_comment_time());
                ?>
                            </a>
                    <?php edit_comment_link(__('(Edit)', 'colorway'), ' '); ?>
                        </div>
                        <!-- .comment-meta .commentmetadata -->
                        <div class="comment-body">
                        <?php comment_text(); ?>
                        </div>
                        <div class="reply">
                        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </div>
                        <!-- .reply -->
                    </div>
                    <!-- #comment-##  -->
                    <?php
                    break;
                case 'pingback' :
                case 'trackback' :
                    ?>
                <li class="post pingback">
                    <p>
                    <?php
                    _e('Pingback:', 'colorway');
                    comment_author_link();
                    edit_comment_link(__('(Edit)', 'colorway'), ' ');
                    ?>
                    </p>
                    <?php
                    break;
            endswitch;
        }

    endif;
    /**
     * Set the content width based on the theme's design and stylesheet.
     *
     * Used to set the width of images and content. Should be equal to the width the theme
     * is designed for, generally via the style.css stylesheet.
     */
    if (!isset($content_width))
        $content_width = 590;

    /**
     * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
     *
     * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
     * function tied to the init hook.
     *
     * @since Twenty Ten 1.0
     * @uses register_sidebar
     */
    function twentyten_widgets_init() {
        /* Area 1, located at the top of the sidebar. */
        register_sidebar(array(
            'name' => __('Primary Widget Area', 'colorway'),
            'id' => 'primary-widget-area',
            'description' => __('The primary widget area', 'colorway'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
        /* Area 2, located below the Primary Widget Area in the sidebar. Empty by default. */
        register_sidebar(array(
            'name' => __('Secondary Widget Area', 'colorway'),
            'id' => 'secondary-widget-area',
            'description' => __('The secondary widget area', 'colorway'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
        /* Area 3, located in the footer. Empty by default. */
        register_sidebar(array(
            'name' => __('First Footer Widget Area', 'colorway'),
            'id' => 'first-footer-widget-area',
            'description' => __('The first footer widget area', 'colorway'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
        /* Area 4, located in the footer. Empty by default. */
        register_sidebar(array(
            'name' => __('Second Footer Widget Area', 'colorway'),
            'id' => 'second-footer-widget-area',
            'description' => __('The second footer widget area', 'colorway'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
        /* Area 5, located in the footer. Empty by default. */
        register_sidebar(array(
            'name' => __('Third Footer Widget Area', 'colorway'),
            'id' => 'third-footer-widget-area',
            'description' => __('The third footer widget area', 'colorway'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
        /* Area 6, located in the footer. Empty by default. */
        register_sidebar(array(
            'name' => __('Fourth Footer Widget Area', 'colorway'),
            'id' => 'fourth-footer-widget-area',
            'description' => __('The fourth footer widget area', 'colorway'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
        /* Area 2, located below the Primary Widget Area in the sidebar. Empty by default. */
        register_sidebar(array(
            'name' => __('Home Page Right Feature Widget Area', 'infoway'),
            'id' => 'home-page-right-feature-widget-area',
            'description' => __('The Home Page Right Feature widget area', 'infoway'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        ));
    }

    /** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
    add_action('widgets_init', 'twentyten_widgets_init');

    /**
     * Pagination
     *
     */
    function pagination($pages = '', $range = 2) {
        $showitems = ($range * 2) + 1;
        global $paged;
        if (empty($paged))
            $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        if (1 != $pages) {
            echo "<ul class='paging'>";
            if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
                echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
            if ($paged > 1 && $showitems < $pages)
                echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                    echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
                }
            }
            if ($paged < $pages && $showitems < $pages)
                echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
            if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
                echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
            echo "</ul>\n";
        }
    }

    /* Shortcodes */
    /**
     * Columns
     *
     */

    /** 2 Columns */
    function col2_shortcode($atts, $content = null) {
        return '<div class="one_half">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col2', 'col2_shortcode');

    /** 2 Columns Last */
    function col2_last_shortcode($atts, $content = null) {
        return '<div class="one_half last">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col2_last', 'col2_last_shortcode');

    /** 3 Columns */
    function col3_shortcode($atts, $content = null) {
        return '<div class="one_third">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col3', 'col3_shortcode');

    /** 3 Columns Last */
    function col3_last_shortcode($atts, $content = null) {
        return '<div class="one_third last">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col3_last', 'col3_last_shortcode');

    /** 4 Columns */
    function col4_shortcode($atts, $content = null) {
        return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col4', 'col4_shortcode');

    /** 4 Columns Last */
    function col4_last_shortcode($atts, $content = null) {
        return '<div class="one_fourth last">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col4_last', 'col4_last_shortcode');

    /** One-Third Columns */
    function col1_3_shortcode($atts, $content = null) {
        return '<div class="one_third">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col1_3', 'col1_3_shortcode');

    /** One-Third Columns Last */
    function col1_3_last_shortcode($atts, $content = null) {
        return '<div class="one_third last">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col1_3_last', 'col1_3_last_shortcode');

    /** Two-Third Columns */
    function col2_3_shortcode($atts, $content = null) {
        return '<div class="two_third">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col2_3', 'col2_3_shortcode');

    /** Two-Third Columns Last */
    function col2_3_last_shortcode($atts, $content = null) {
        return '<div class="two_third last">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col2_3_last', 'col2_3_last_shortcode');

    /** One-Fourth Columns */
    function col1_4_shortcode($atts, $content = null) {
        return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col1_4', 'col1_4_shortcode');

    /** One-Fourth Columns Last */
    function col1_4_last_shortcode($atts, $content = null) {
        return '<div class="one_fourth last">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col1_4_last', 'col1_4_last_shortcode');

    /** Three-Fourth Columns */
    function col3_4_shortcode($atts, $content = null) {
        return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col3_4', 'col3_4_shortcode');

    /** Three-Fourth Columns Last */
    function col3_4_last_shortcode($atts, $content = null) {
        return '<div class="three_fourth last">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('col3_4_last', 'col3_4_last_shortcode');
    /*     * Simple Button */

    function button_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<a href="' . $url . '" class="button">' . do_shortcode($content) . '</a>';
    }

    add_shortcode('button', 'button_shortcode');
    /*     * Big Button */

    function big_button_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<a href="' . $url . '" class="big button">' . do_shortcode($content) . '</a>';
    }

    add_shortcode('bigbutton', 'big_button_shortcode');
    /*     * Pill Button */

    function pill_button_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<a href="' . $url . '" class="pill button">' . do_shortcode($content) . '</a>';
    }

    add_shortcode('pillbutton', 'pill_button_shortcode');
    /*     * Negative Button */

    function negative_button_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<a href="' . $url . '" class="negative button">' . do_shortcode($content) . '</a>';
    }

    add_shortcode('negativebutton', 'negative_button_shortcode');
    /*     * Positive Button */

    function positive_button_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<a href="' . $url . '" class="positive button">' . do_shortcode($content) . '</a>';
    }

    add_shortcode('positivebutton', 'positive_button_shortcode');

    function icon_button_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => '', "icon" => ''), $atts));
        return '<a href="' . $url . '" class="button"><span class="' . $icon . ' icon"></span>' . do_shortcode($content) . '</a>';
    }

    add_shortcode('iconbutton', 'icon_button_shortcode');

    /**
     * Add Favicon
     * Theme Option
     */
    function childtheme_favicon() {
        if (get_option('colorway_favicon') != '') {
            echo '<link rel="shortcut icon" href="' . get_option('colorway_favicon') . '"/>' . "\n";
        } else {
            ?>
            <link rel="shortcut icon" href="<?php echo bloginfo('template_directory') ?>/images/favicon.ico" />
            <?php
        }
    }

    add_action('wp_head', 'childtheme_favicon');

    /**
     * Show analytics code in footer
     * Theme Option
     */
    function inkthemes_analytics() {
        $shortname = get_option('of_shortname');
        $output = '';
        $output = get_option('colorway_analytics');
        if ($output <> "")
            echo stripslashes($output);
    }

    add_action('wp_head', 'inkthemes_analytics');

    /**
     * Custom CSS Styles
     * Theme Option
     */
    function of_head_css() {
        $custom_css = get_option('colorway_customcss');
        $output = '';
        if ($custom_css <> '') {
            $output .= $custom_css . "\n";
        }
        // Output styles
        if ($output <> '') {
            $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
            echo $output;
        }
    }

    add_action('wp_head', 'of_head_css');

    /* Trim excerpt */

    function inkthemes_custom_trim_excerpt($length) {
        global $post;
        $explicit_excerpt = $post->post_excerpt;
        if ('' == $explicit_excerpt) {
            $text = get_the_content('');
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]>', ']]>', $text);
        } else {
            $text = apply_filters('the_content', $explicit_excerpt);
        }
        $text = strip_shortcodes($text); // optional
        $text = strip_tags($text);
        $excerpt_length = $length;
        $words = explode(' ', $text, $excerpt_length + 1);
        if (count($words) > $excerpt_length) {
            array_pop($words);
            array_push($words, '[&hellip;]');
            $text = implode(' ', $words);
            $text = apply_filters('the_excerpt', $text);
        }
        return $text;
    }

//Trm post title
    function the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
        $title = get_the_title();
        if ($length && is_numeric($length)) {
            $title = substr($title, 0, $length);
        }
        if (strlen($title) > 0) {
            $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
            if ($echo)
                echo $title;
            else
                return $title;
        }
    }

    /**
     * The Gallery shortcode.
     *
     * This implements the functionality of the Gallery Shortcode for displaying
     * WordPress images on a post.
     *
     * @since 2.5.0
     *
     * @param array $attr Attributes of the shortcode.
     * @return string HTML content to display gallery.
     */
    remove_shortcode('gallery');
    add_shortcode('gallery', 'inkthemes_gallery_shortcode');

    function inkthemes_gallery_shortcode($attr) {
        $post = get_post();
        static $instance = 0;
        $instance++;
        if (!empty($attr['ids'])) {
            // 'ids' is explicitly ordered, unless you specify otherwise.
            if (empty($attr['orderby']))
                $attr['orderby'] = 'post__in';
            $attr['include'] = $attr['ids'];
        }
        // Allow plugins/themes to override the default gallery template.
        $output = apply_filters('post_gallery', '', $attr);
        if ($output != '')
            return $output;
        // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
        if (isset($attr['orderby'])) {
            $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
            if (!$attr['orderby'])
                unset($attr['orderby']);
        }
        extract(shortcode_atts(array(
            'order' => 'ASC',
            'orderby' => 'menu_order ID',
            'id' => $post->ID,
            'itemtag' => 'dl',
            'icontag' => 'dt',
            'captiontag' => 'dd',
            'columns' => 3,
            'size' => 'thumbnail',
            'include' => '',
            'exclude' => ''
                        ), $attr));
        $id = intval($id);
        if ('RAND' == $order)
            $orderby = 'none';
        if (!empty($include)) {
            $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

            $attachments = array();
            foreach ($_attachments as $key => $val) {
                $attachments[$val->ID] = $_attachments[$key];
            }
        } elseif (!empty($exclude)) {
            $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
        } else {
            $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
        }
        if (empty($attachments))
            return '';
        if (is_feed()) {
            $output = "\n";
            foreach ($attachments as $att_id => $attachment)
                $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
            return $output;
        }
        $itemtag = tag_escape($itemtag);
        $captiontag = tag_escape($captiontag);
        $columns = intval($columns);
        $itemwidth = $columns > 0 ? floor(100 / $columns) : 100;
        $float = is_rtl() ? 'right' : 'left';
        $selector = "gallery-{$instance}";
        ?>
        <script>
            //Gallery
            //Prety Photo	  
            jQuery.noConflict();
            jQuery(document).ready(function () {
                jQuery(".<?php echo $selector ?> a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 8000, autoplay_slideshow: true});
            });
        </script>
        <?php
        $gallery_style = $gallery_div = '';
        if (apply_filters('use_default_gallery_style', true))
            $gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
        $size_class = sanitize_html_class($size);
        $gallery_div = "<div id='$selector' class='$selector gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
        $gallery_ul = "<ul class='thumbnail col-{$columns}'>";
        $output = apply_filters('gallery_style', $gallery_style . "\n\t\t" . $gallery_div . $gallery_ul);
        $i = 0;
        foreach ($attachments as $gallery_image) {
            $attachment_img = wp_get_attachment_url($gallery_image->ID);
            $img_source = inkthemes_image_resize($attachment_img, 350, 245);
            $output .= "<li class='animated'>";
            $output .= '<a rel="prettyPhoto[gallery2]" alt="' . $gallery_image->post_excerpt . '" href="' . $attachment_img . '">';
            $output .= '<span>';
            $output .= '</span>';
            $output .= '<img src="' . $img_source['url'] . '" alt=""/>';
            $output .= '</a>';
            if (isset($gallery_image->post_excerpt) && $gallery_image->post_excerpt != '') {
                $output .='<h2><a class="gall-content"  href="?attachment_id=' . $gallery_image->ID . '">';
                $output .= $gallery_image->post_excerpt;
                $output .= '</a></h2>';
            }
            $output .= "</li>";
        }
        $output .= "
	<br style='clear: both;' />			
	</ul>\n
	</div>";
        return $output;
    }

    /**
     * slider_shortcode
     */
    function slider_shortcode($atts, $content = null) {
        return '<li class="slide">' . do_shortcode($content) . '</li>';
    }

    add_shortcode('slide', 'slider_shortcode');

//Img
    function image_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<div class="slide-image fl"><a href="' . $url . '" target="_blank"><img  src="' . do_shortcode($content) . '" class="slide-img" /></a></div>';
    }

    add_shortcode('image', 'image_shortcode');

//slider Content
    function slider_content($atts, $content = null) {
        return '<div class="slide-content entry fl">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('slide_content', 'slider_content');

//heading
    function slider_head($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<h2 class="title"><a href="' . $url . '">' . do_shortcode($content) . '</a></h2>';
    }

    add_shortcode('heading', 'slider_head');

//description
    function slider_desc($atts, $content = null) {
        return '<p>' . do_shortcode($content) . '</p>';
    }

    add_shortcode('desc', 'slider_desc');

//about
    function teammember_desc($atts, $content = null) {
        return '<p>' . do_shortcode($content) . '</p>';
    }

    add_shortcode('about', 'teammember_desc');

    /**
     * Feature box shortcode
     */
    function feature_box_shortcode($atts, $content = null) {
        return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
    }

    add_shortcode('feature_box', 'feature_box_shortcode');

// Feature box Image shortcode
    function feature_image_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<a href="' . $url . '" target="_blank"><img  src="' . do_shortcode($content) . '" /></a>';
    }

    add_shortcode('feature_image', 'feature_image_shortcode');

// Feature box Heading shortcode
    function feature_head_shortcode($atts, $content = null) {
        extract(shortcode_atts(array("url" => ''), $atts));
        return '<h3><a href="' . $url . '">' . do_shortcode($content) . '</a></h3>';
    }

    add_shortcode('feature_heading', 'feature_head_shortcode');

// Feature box Description shortcode
    function feature_desc_shortcode($atts, $content = null) {
        return '<p>' . do_shortcode($content) . '</p>';
    }

    add_shortcode('feature_desc', 'feature_desc_shortcode');

    /**
     * Tetimonial Slider shortcode
     */
    function testimonial_shortcode($atts, $content = null) {
        return ' <div class="testimonial_item animated fading" style="-webkit-animation-delay: 1.5s; -moz-animation-delay: 1.5s; -o-animation-delay: 1.5s; -ms-animation-delay: 1.5s;"> ' . do_shortcode($content) . '</div>';
    }
    add_shortcode('testimonial', 'testimonial_shortcode');
    // Feature box Testimonial Description shortcode
    function testimonial_desc_shortcode($atts, $content = null) {
        return '<p>' . do_shortcode($content) . '</p>';
    }
    add_shortcode('testimonial_desc', 'testimonial_desc_shortcode');
     function testimonial_inner_shortcode($atts, $content = null) {
        return '<div class="testimonial_item_inner"> ' . do_shortcode($content) . '</div>';
    }
    add_shortcode('testimonial_inner', 'testimonial_inner_shortcode');
    // Feature box Image shortcode
    function testimonial_image_shortcode($atts, $content = null) {
    return '<img  src="' . do_shortcode($content) . '" />';
    }
    add_shortcode('testimonial_image', 'testimonial_image_shortcode');
    function testimonial_name_shortcode($atts, $content = null) {
        return '<div class="testimonial_name_wrapper"><span>' . do_shortcode($content) . '</span></div>';
    }
    add_shortcode('testimonial_name', 'testimonial_name_shortcode');
    ?>