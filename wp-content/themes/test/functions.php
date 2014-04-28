<?php

require_once('wp_bootstrap_navwalker.php');
/***********************************************************************************************/
/* 	Define Constants */
/***********************************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/assets/images');

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/
function register_my_menus(){
	register_nav_menus(
		array(
			'top-menu' => __('Top Menu', 'new-item')
		)
	);
}
add_action('init', 'register_my_menus');




/***********************************************************************************************/
/* Add Sidebar Support */
/***********************************************************************************************/
if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => __('Main Sidebar', 'new-item'),
			'id' => 'main-sidebar',
			'description' => __('The main sidebar area', 'new-item'),
			'before_widget' => '<div class="sidebar-widget">',
			'after_widget' => '</div> <!-- end sidebar-widget -->',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		)
	);
	register_sidebar(
		array(
			'name' => __('Footer widget 1', 'new-item'),
			'id' => 'footer-widget-1',
			'description' => __('The footer widget area 1', 'new-item'),
			'before_widget' => '<div class="col-lg-3 footer-widget-1">',
			'after_widget' => '</div> <!-- end col-lg-3 -->',
			'before_title' => '<h5>',
			'after_title' => '</h5>'
		)
	);
	register_sidebar(
		array(
			'name' => __('Footer widget 2', 'new-item'),
			'id' => 'footer-widget-2',
			'description' => __('The footer widget area 2', 'new-item'),
			'before_widget' => '<div class="col-lg-3 footer-widget-2">',
			'after_widget' => '</div> <!-- end col-lg-3 -->',
			'before_title' => '<h5>',
			'after_title' => '</h5>'
		)
	);
	register_sidebar(
		array(
			'name' => __('Footer widget 3', 'new-item'),
			'id' => 'footer-widget-3',
			'description' => __('The footer widget area 3', 'new-item'),
			'before_widget' => '<div class="col-lg-6 footer-widget-3">',
			'after_widget' => '</div> <!-- end col-lg-6 -->',
			'before_title' => '<h5>',
			'after_title' => '</h5>'
		)
	);

}


/***********************************************************************************************/
/* Set the max width of the uploaded images */
/***********************************************************************************************/
if (!isset($content_width)) $content_width = 784;



/***********************************************************************************************/
/* Add Theme Support for Post Formats, Post Thumbnails and Automatic Feed Links */
/***********************************************************************************************/
if (function_exists('add_theme_support')) {
	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video'));
	
	add_theme_support('post-thumbnails', array('post'));
	set_post_thumbnail_size(210, 210, true);
	add_image_size('custom-blog-image', 784, 350);

	add_theme_support('automatic-feed-links');
}



/***********************************************************************************************/
/* Adding bootstrap js */
/***********************************************************************************************/
function my_scripts_method() {

	wp_enqueue_script(
		'bs-js',
		get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'mm-js',
		get_stylesheet_directory_uri() . '/assets/js/jquery.mmenu.js',
		array( 'jquery' )
	);	
}


add_action( 'wp_enqueue_scripts', 'my_scripts_method' );





// add_filter('bbp_get_topic_freshness_link' , 'my_own');

// function my_own($topic_id){
// 	return 'check'.bbp_get_topic_last_active_time( $topic_id );
// }


?>