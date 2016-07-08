<?php 
function upload_love_form() {
    if ( ! isset( $_POST['upload_love_form'] ) || ! wp_verify_nonce( $_POST['upload_love_form'], 'upload_love_form' ) ) {
        die( 'please reload page' );
    }
    
    
    $country = sanitize_text_field( $_POST['country'] );
    if ( empty( $country ) ) {
        echo response_json( __( 'Please select a country', 'loveboats' ), 'error', 'page-content.country .custom', 'step2' ); wp_die();
    }
    
    $template = sanitize_text_field( $_POST['template_variant'] );
    
    $color = sanitize_text_field( $_POST['color'] );
    
    require_once( ABSPATH . 'wp-admin' . '/includes/image.php' );
    require_once( ABSPATH . 'wp-admin' . '/includes/file.php' );
    require_once( ABSPATH . 'wp-admin' . '/includes/media.php' );

    if ( !$_FILES ) {
        echo response_json( __( 'Please select an image from your computer', 'loveboats' ), 'error', 'chose-file-text', 'step4' ); wp_die();
    }

    if ( $_FILES['upload']['type'] !== 'image/jpeg' && $_FILES['upload']['type'] !== 'image/png' ) {
        echo response_json( __( 'Invalid image type. Accepted files are: jpeg or png', 'loveboats' ), 'error', 'chose-file-text', 'step4' ); wp_die();
    }

    if ( $_FILES['upload']['size'] > 2097152 ) { //2mb
        echo response_json( __( 'Please upload a smaller picture. Max. image size can be 2MB', 'loveboats' ), 'error', 'chose-file-text', 'step4' ); wp_die();
    }

    $message = sanitize_text_field( $_POST['message'] );
    if ( empty( $message ) ) {
        echo response_json( __( 'Please enter a message.', 'loveboats' ), 'error', 'page-content.message', 'step5' ); wp_die();
    }
    
    $name = sanitize_text_field( $_POST['name'] );
    if ( empty( $name ) ) {
        echo response_json( __( 'Please enter your name.', 'loveboats' ), 'error', 'row-name', 'step7' ); wp_die();
    }
    
    $mail = sanitize_text_field( $_POST['mail'] );
    if ( empty( $mail ) ) {
        echo response_json( __( 'Please enter your e-mail address', 'loveboats' ), 'error', 'row-mail', 'step7' ); wp_die();
    } elseif ( !filter_var( $mail, FILTER_VALIDATE_EMAIL ) ) {
        echo response_json( __( 'Please enter a valid e-mail address', 'loveboats' ), 'error', 'row-mail', 'step7' ); wp_die();
    }
    
    
    
    if ( empty( $_POST['img_val'] ) ) {
        echo response_json( __( 'Something went wrong. Please refresh your page and start again', 'loveboats' ), 'error', 'page-content.country .custom', 'step2' ); wp_die();
    }
    
    $img_val = $_POST['img_val']; //encoded image
    
    $filteredData = substr( $_POST['img_val'], strpos($_POST['img_val'], "," )+1);
 
    //Decode the string
    $unencodedData=base64_decode($filteredData); //actual generated image

    //Save the image
    $FirstImage = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/template-page-first-abc.png'; //this should not be deleted
    $templateFile = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/' .  $name . '.png';
    file_put_contents( $templateFile, $unencodedData);
    
    $htmlForPDF = html_gen( $templateFile );
    
    require_once ('dompdf/dompdf_config.inc.php');

    
    $dompdf = new DOMPDF();
    $dompdf->load_html($htmlForPDF);
    $dompdf->set_paper("A4", "landscape");
    
    $dompdf->render();
    $output = $dompdf->output();
    $rootPath = $_SERVER["DOCUMENT_ROOT"];
    $pdfFileName = sanitize_title( time() . $name  ) . '.pdf';
    file_put_contents( '../wp-content/' . $pdfFileName, $output);
    
    $pdfPath = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/' . $pdfFileName;
    
    $finalPDFURI = get_bloginfo('url') . '/wp-content/' . $pdfFileName;
    
    
    //unlink( $templateFile );
    
    
    //doing the db saving
    
    
    $args = array(
        'post_type'         => 'boat',
        'post_title'        => $name
    );
    
    $boatID = wp_insert_post( $args );
    if ( is_wp_error( $boatID ) ) {
        $error_string = $boatID->get_error_message();
        report_to_developer( $error_string, 'loveboats ajax_form.php' );
        echo response_json( __( 'Something went wrong. Please try again later.', 'loveboats' ), 'error', 'row-mail', 'step8' ); wp_die();
    }
    
    update_post_meta( $boatID, 'name', $name );
    update_post_meta( $boatID, 'mail', $mail );
    update_post_meta( $boatID, 'message', $message );
    update_post_meta( $boatID, 'country', $country  );
    update_post_meta( $boatID, 'color', $color );
    update_post_meta( $boatID, 'template', $template );
    
    foreach ( $_FILES as $file => $array ) {
        $attach_id = media_handle_upload( $file, $boatID );
    }
    
    update_post_meta( $boatID, 'user_image', wp_get_attachment_url( $attach_id ) ); 
    update_post_meta( $boatID, 'generated_pdf_URI', $finalPDFURI );
    $attachments = array( $pdfPath );
    $headers = 'From: LoveBoats <noreply@loveboats.com>' . "\r\n";
    //$tempmail = 'mircea.rechesan@reea.net,bandeanlorand@reea.net';
    //$tempmail = 'mircea.rechesan@reea.net';
    $tempmail = 'europrideloveboats@gmail.com';
    $mailBody = 'Thank you for creating a Loveboat for Europride! Watch out for it in the Loveboats gallery at (URL TBC) and in our live flotilla event on the pond in front of the Rijksmuseum Amsterdam during the Europride event weeks.';
    
    add_filter( 'wp_mail_content_type', 'set_content_type' );
    wp_mail( $mail, 'Your Loveboat is ready!', $mailBody, $headers, $attachments ); //to user
    $mailBodyNotify = ' <a href="' . get_admin_url() . '/post.php?post=' . $boatID . '&action=edit">Click here too aprove/decline this boat</a>' ;
    
    wp_mail( $tempmail, 'New boat awaiting approval!', $mailBodyNotify, $headers, $attachments ); //to admin
    remove_filter( 'wp_mail_content_type', 'set_content_type' );
    echo response_json( __( 'Uploaded with success', 'loveboats' ), 'success', 'output1', 'step8', $finalPDFURI ); 
    wp_die();
}
add_action('wp_ajax_upload_love_form', 'upload_love_form');
add_action('wp_ajax_nopriv_upload_love_form', 'upload_love_form');


function set_content_type( $content_type ) {
	return 'text/html';
}