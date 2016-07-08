<?php
function encoded_image() {
    if ( empty( $_POST['rotatedimage'] ) ) {
        exit;
    }

    $filteredData = substr( $_POST['rotatedimage'], strpos($_POST['rotatedimage'], "," )+1);
    
    $file = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/' . 'temp.jpg';
    $fil2 = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/' . time() . 'rotated.jpg';
    $fil22 = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/' . time() . 'rotated2.jpg';
    $rotatedURI = get_bloginfo('url') . '/wp-content/' . time() . 'rotated.jpg';
    $rotatedURI2 = get_bloginfo('url') . '/wp-content/' . time() . 'rotated2.jpg';
    file_put_contents( $file, base64_decode( $filteredData ) );

    
    $source = imagecreatefromjpeg($file);
    // Rotate
    $rotate = imagerotate($source, -90, 0);
    $rotate2 = imagerotate($source, 90, 0);
    file_put_contents($fil22,$rotate2);
    // Output
    imagejpeg($rotate, $fil2);
    imagejpeg($rotate2, $fil22);
    
    // Free the memory
    imagedestroy($source);
    imagedestroy($rotate);
    imagedestroy($rotate2);
    
    echo json_encode( array( 'user_image_first' => $rotatedURI, 'user_image_third' => $rotatedURI2 ) ); 
//    unlink( $fil2 );
//    unlink( $fil22 );
    exit;
}

add_action('wp_ajax_encoded_image', 'encoded_image');
add_action('wp_ajax_encoded_image', 'encoded_image');