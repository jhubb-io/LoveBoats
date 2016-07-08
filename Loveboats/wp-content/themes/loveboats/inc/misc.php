<?php 
/*
 * report to developer function
 * Used on some ajax forms where data is inserted to DB.
 */
function report_to_developer( $error, $where ) {
    $to = 'mircea.rechesan@reea.net'; //this needs to go when launching.
    
    $subject = 'Problems on ' . get_bloginfo('name') . 'Project'; 
    $message = 'Error is: ' . $error . ' in: ' . $where;
    wp_mail( $to, $subject, $message );
}

/*
 * function for clearing a form
 */
function clear_form( $FormClass ) { ?>
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $('form.<?php echo $FormClass; ?>')[0].reset();
    </script>
<?php
}
/*
 * show thanks message on sign up form 
 */
function thanks_message ( $FormClass ) { ?>
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $('form.<?php echo $FormClass; ?>').parent().children('.cta-newsletter-thanks').show();
    </script>
<?php 
}
/*
 * used mostly with wp_mail
 */
function set_html_content_type() {
    return 'text/html';
}

/*
 * custom excerpt. counts words
 */
function custom_excerpt( $limit, $post_id ) {
    $content = get_post_field( 'post_content', $post_id );
    $content = strip_tags( $content );
    $content = explode(' ', $content, $limit);
    if ( count($content ) >= $limit ) {
        array_pop($content);
        $content = implode( " ",$content ).'';
    } else {
        $content = implode( " ",$content );
    } 
    $content = apply_filters( 'the_content', $content ); 
    return $content;
}

/*
 * generates a hidden input that will send referal ! need to think a good solution for this. basicly it need to tell where the user is. Have to take in account if the dropdown is ussed, from exactly where. 
 * 
 */
function generate_referral_input() {
    
}

/*
 * returns a slug of a certain post/page, by id
 */
function slug_by_id( $post_id ) {
    $post_data = get_post( $post_id , ARRAY_A );
    $slug = $post_data['post_name'];
    return $slug; 
}


/*
 * gets room name for a specific story
 */
function get_room_type( $StoryId ) {    
    $AllRooms = query_room_types();
    foreach ( $AllRooms as $value ) {
        $ids[] = $value['page_id'];
    }
    
    $returnIds = array();
    foreach ( $ids as $id ) {
        if ( get_post_meta( $StoryId, 'assigned_to_' . $id, true ) == '1' ) {
            $returnIds[] = $id;
        }
    }
    return ( $returnIds );
}


/*
 * searches for stuff in arrays that have objects
 * 
 * Usage: $test = ArrayUtils::objArraySearch($testimonialLocationTax,'parent',6443);
 */
class ArrayUtils{
    public static function objArraySearch($array,$index,$value){
        $item = null;
        foreach($array as $arrayInf) {
            if($arrayInf->{$index}==$value){
                return $arrayInf;
            }
        }
        return $item;
    }
}

/*
 * used in ajax_form.php
 * last param tells main.js where the user to which step the user should be directed
 */
function response_json( $message, $type, $where, $step, $uri = null ) {
    $body = array(
        'message'       => $message,
        'type'          => $type,
        'where'         => $where,
        'step'          => $step,
        'uri'           => $uri
    );
    return json_encode( $body );
}

/*
 * flag js
 */
function flag_js () { ?>
    <script type="text/javascript">
        $('select.country-flag').on('change keyup', function () {
            var countryflag = $('select.country-flag').val();
            $('.country .flag-holder .flag img').attr("src","<?php echo get_stylesheet_directory_uri(); ?>/images/flags/" + countryflag + ".png");
        });
    </script>
<?php }
add_filter( 'wp_footer', 'flag_js' );


/*
 * template file
 */
function template () { 
    $body = '<!DOCTYPE HTML>
    <html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EUROPRIDE - LOVEBOATS - Amsterdam 2016</title>
        <link href="' . get_stylesheet_directory_uri() . '/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="print-template-wrapper">
            <div class="second-page template-a">
                <img src="' . get_stylesheet_directory_uri() . '/images/template-layers/template-page-second-base.png" class="base" />

                <div class="user-image-container">
                    <img src="' . get_stylesheet_directory_uri() . '/images/gay.jpg" class="user-image-first" />
                    <img src="' . get_stylesheet_directory_uri() . '/images/gay.jpg" class="user-image-second" />
                    <img src="' . get_stylesheet_directory_uri() . '/images/gay.jpg" class="user-image-third" />
                    <img src="' . get_stylesheet_directory_uri() . '/images/gay.jpg" class="user-image-fourth" />
                </div>

                <img src="' . get_stylesheet_directory_uri() . '/images/template-layers/template-page-second-texture-a.png" class="texture" />
                <img src="' . get_stylesheet_directory_uri() . '/images/template-layers/template-a-page-second-color-pink.png" class="color" />

                <div class="flag-container">
                    <img class="one" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="two" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="three" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="four" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="five" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="six" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="seven" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="eight" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="nine" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="ten" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="eleven" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                    <img class="twelve" src="' . get_stylesheet_directory_uri() . '/images/flags/00.png" />
                </div>
                <div class="text-container">
                    <p class="template-text-left">Here you can enter a personalised message to be displayed on your boat, here you can enter a personalised message to be displayed on your boat</p>
                    <p class="template-text-right">Here you can enter a personalised message to be displayed on your boat, here you can enter a personalised message to be displayed on your boat</p>
                </div>
            </div>
	</div>
        
    </body>
    </html>';
    
    return $body;
}

function html_gen( $imageURI ) {
    $FirstImage = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/template-page-first-abc.png';
    $body = '<!DOCTYPE HTML>
    <html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Love Boats</title>
        <style type="text/css">
            @page { 
            margin: 0; 
            }
            body {
                margin: 0; 
            }
            html { 
                margin: 0; 
            }
            img {
                width: 100%;
                max-width: 100%;
            }
        </style>
    </head>
    <body>
        <img src="' . $FirstImage . '" alt="" />
        <img src="' . $imageURI . '" alt="" />
    </body>
    </html>';
    
    return $body;
} 


function flags_loveboats() {
    $flags = array(
        "al"    => 'Albania',
        "ad"    => 'Andorra',
        "am"    => 'Armenia',
        "at"    => 'Austria',
        "az"    => 'Azerbaijan',
        "by"    => 'Belarus',
        "be"    => 'Belgium',
        "ba"    => 'Bosnia and Herzegovina',
        "bg"    => 'Bulgaria',
        "hr"    => 'Croatia',
        "cy"    => 'Cyprus',
        "cz"    => 'Czech Republic',
        "dk"    => 'Denmark',
        "ee"    => 'Estonia',
        "fi"    => 'Finland',
        "fr"    => 'France',
        "ge"    => 'Georgia',
        "de"    => 'Germany',
        "gr"    => 'Greece',
        "hu"    => 'Hungary',
        "is"    => 'Iceland',
        "ie"    => 'Ireland',
        "it"    => 'Italy',
        "kz"    => 'Kazakhstan',
        "lv"    => 'Latvia',
        "li"    => 'Liechtenstein',
        "lt"    => 'Lithuania',
        "lu"    => 'Luxembourg',
        "mk"    => 'Macedonia',
        "mt"    => 'Malta',
        "md"    => 'Moldova',
        "mc"    => 'Monaco',
        "me"    => 'Montenegro',
        "nl"    => 'Netherlands',
        "no"    => 'Norway',
        "pl"    => 'Poland',
        "pt"    => 'Portugal',
        "ro"    => 'Romania',
        "ru"    => 'Russia',
        "sm"    => 'San Marino',
        "rs"    => 'Serbia',
        "sk"    => 'Slovakia',
        "si"    => 'Slovenia',
        "es"    => 'Spain',
        "se"    => 'Sweden',
        "ch"    => 'Switzerland',
        "tr"    => 'Turkey',
        "ua"    => 'Ukraine',
        "uk"    => 'United Kingdom',
        "va"    => 'Vatican City'
    );
    return $flags;
}