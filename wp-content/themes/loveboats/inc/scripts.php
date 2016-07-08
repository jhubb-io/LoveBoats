<?php
/**
 * Proper way to enqueue scripts and styles
 */
function love_boats_scripts() {
    wp_enqueue_style( 'love_boats_scripts', get_stylesheet_uri() );
    wp_enqueue_style( 'love_boats_scripts_actual', get_stylesheet_directory_uri() . '/css/style.css' );
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'main-boats-js', get_template_directory_uri() . '/js/main.js' );
    
    $data = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'theme' => get_stylesheet_directory_uri()
    );
    wp_localize_script( 'main-boats-js', 'obj', $data );
    wp_enqueue_script( 'jquery-form', array('jquery'),false,true ); 
    //wp_enqueue_script( 'slick-boats-js', get_template_directory_uri() . '/js/slick.js' );
    wp_enqueue_script( 'exif-boats-js', get_template_directory_uri() . '/js/exif.js' );
    wp_enqueue_script( 'main-boats-js' );
    wp_enqueue_script( 'raster', get_stylesheet_directory_uri() . '/js/rasterizeHTML.allinone.js' );
}
add_action('wp_enqueue_scripts', 'love_boats_scripts');