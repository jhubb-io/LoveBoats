<?php 
/*
 * Removing generator meta from head. 
 */
remove_action('wp_head', 'wp_generator');

/*
 * Add thumbnails to posts and pages
 */
add_theme_support('post-thumbnails');

/*
 * removing admin bar
 */
//add_filter('show_admin_bar', '__return_false');

/*
 * Adds post format support
 */
add_post_type_support('post', 'post-formats');

/*
 * Menu registration
 */
function register_menus_theme() {
    register_nav_menus(
            array(
                'header-menu' => __('Header Menu'),
                'footer-menu' => __('Footer Menu'), 
            )
    );
}
add_action('init', 'register_menus_theme');

/*
 * new image sizes
 */
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
//    add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
//    add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
}

/*
 * scripts and styles enqueue
 */
require_once( 'inc/scripts.php' );
/*
 * post types 
 */
require_once( 'inc/post_types.php' );

/*
 * taxonomies
 */
require_once( 'inc/taxonomies.php' );

/*
 * ajax form
 */
require_once( 'inc/ajax_form.php' );

/*
 * misc funcitons
 */
require_once( 'inc/misc.php' );

require_once( 'inc/rotate_encoded.php' );

require_once( 'inc/imagemetabox.php' );