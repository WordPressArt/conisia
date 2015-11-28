<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//
// Your code goes below
//

function my_child_theme_setup() {
    load_child_theme_textdomain( 'symbiosis-coneisa-colorway-child', get_stylesheet_directory() . '/languages' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action( 'after_setup_theme', 'my_child_theme_setup' );

// function bootstrap() {
// 	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri()  .'/css/bootstrap.css');
// 	//	wp_enqueue_script( 'jquery-min-sss', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
// 	wp_enqueue_script( 'x-min', get_stylesheet_directory_uri()  .'/js/jquery.bxslider.min.js');
// 	wp_enqueue_style( 'css', get_stylesheet_directory_uri()  .'/css/jquery.bxslider.css');
// 	wp_enqueue_script( 'cusooes', get_stylesheet_directory_uri()  .'/js/custommer.js');    
// }

// add_action( 'wp_head', 'bootstrap' );

// register_nav_menus( array(
// 	'product_menu' => 'Product page Menu',
// ) );

// add_theme_support( 'post-thumbnails' );
// add_image_size( 'mycustomsize', 400, 150, true );
// add_image_size( 'own_custom', 722, 372, true );
// add_image_size( 'product_custom', 719, 405, true );
// add_image_size( 'empresssa', 352, 358, true );
// add_image_size ('porduct-page_custom', 539, 267, true);

// /**
//  * Registers a custom post type.
//  *
//  * @link http://codex.wordpress.org/Function_Reference/register_post_type
//  */
// function prefix_register_post_type()
// {
// 	register_post_type(
// 		'application',
// 		array(
// 			'labels'        => array(
// 				'name'               => __('Application', 'text_domain'),
// 				'singular_name'      => __('Application', 'text_domain'),
// 				'menu_name'          => __('Application', 'text_domain'),
// 				'name_admin_bar'     => __('Application Item', 'text_domain'),
// 				'all_items'          => __('All Items', 'text_domain'),
// 				'add_new'            => _x('Add New', 'prefix_portfolio', 'text_domain'),
// 				'add_new_item'       => __('Add New Item', 'text_domain'),
// 				'edit_item'          => __('Edit Item', 'text_domain'),
// 				'new_item'           => __('New Item', 'text_domain'),
// 				'view_item'          => __('View Item', 'text_domain'),
// 				'search_items'       => __('Search Items', 'text_domain'),
// 				'not_found'          => __('No items found.', 'text_domain'),
// 				'not_found_in_trash' => __('No items found in Trash.', 'text_domain'),
// 				'parent_item_colon'  => __('Parent Items:', 'text_domain'),
// 			),
// 			'public'        => true,
// 			'menu_position' => 5,
//         'menu_icon'           => 'dashicons-clipboard',
// 			'supports'      => array(
// 				'title',
// 				'editor',
// 				'thumbnail',
// 				'excerpt',
// 				'custom-fields',
// 			),
	
// 			'has_archive'   => true,
// 			'rewrite'       => array(
// 				'slug' => 'application',
// 			),
// 		)
// 	);
// }

// add_action('init', 'prefix_register_post_type');