<?php
/**
 * Template Name: Gallery
 */
get_header(); ?>
<div class="top-right"></div>
<header>
    <a href="../" class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"></a>
</header>
<!-- gallery - start here -->
<div class="content gallery">
    <div class="page-content gallery">
            <h1><?php _e( 'Gallery', 'loveboats' ); ?></h1>


             <section class="center slider">
                <?php 
                $args = array(
                    'post_type'            => 'boat',
                    'posts_per_page'       => 10,

                );
                $boats = get_posts( $args );
                foreach ($boats as $boat) { 
                    $flags = flags_loveboats(); 
                    $countryCode = get_post_meta( $boat->ID, 'country', true );

                    ?>
                    <div class="slide-element">
                        <!-- boat wrapper - starts here -->
                        <div class="boat-wrapper template-<?php echo get_post_meta( $boat->ID, 'template', true ); ?> portview">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-body-white.png" class="boat-main" />

                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-<?php echo get_post_meta( $boat->ID, 'template', true ); ?>-right-port-view-texture.png" class="boat-texture" />
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-<?php echo get_post_meta( $boat->ID, 'template', true ); ?>-right-port-view-color-<?php echo get_post_meta( $boat->ID, 'color', true ); ?>.png" class="boat-color" />

                            <div class="boat-flag">
                                <div class="cut-off-one"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/<?php echo get_post_meta( $boat->ID, 'country', true ); ?>.png" class="flag-first"/></div>
                                <div class="cut-off-two"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/<?php echo get_post_meta( $boat->ID, 'country', true ); ?>.png" class="flag-second"/></span></div>
                                <div class="cut-off-three"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/<?php echo get_post_meta( $boat->ID, 'country', true ); ?>.png" class="flag-third"></div>
                                <div class="cut-off-four"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/<?php echo get_post_meta( $boat->ID, 'country', true ); ?>.png" class="flag-fourth"></div>
                                <!--<img src="images/boat-layers/boat-a-right-port-view-flag.png" class="boat-main">-->
                            </div>
                            <p><?php echo get_post_meta( $boat->ID, 'message', true ); ?></p>
                            <div class="user-image-rot">
                                <div class="user-image">
                                    <img src="<?php echo get_post_meta( $boat->ID, 'user_image', true ); ?>" alt="<?php echo get_post_meta( $boat->ID, 'name', true ); ?>" />
                                </div>
                            </div>
                        </div>
                        <!-- boat wrapper - ends here -->
                        <h3 class="italy">
                        <b><img class="flag-third" src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/<?php echo get_post_meta( $boat->ID, 'country', true ); ?>.png"></b>
                        <?php echo get_post_meta( $boat->ID, 'name', true ); ?>
                        <span><?php echo $flags[$countryCode]; ?></span></h3>
                        <p><?php echo get_post_meta( $boat->ID, 'message', true );  ?></p>
                    </div>
                 <?php } ?>
              </section>

            <form class="encodedimg" style="display: none;">
                <input type="hidden" name="action" value="encoded_image" />
                <input type="hidden" class="rotatedimage" name="rotatedimage" value="" />
            </form>



        <button type="button" class="createaboat" onclick="location.href='<?php echo home_url(); ?>'"><?php _e( 'CREATE YOUR BOAT', 'loveboats' ); ?></button>
    </div>

    <!-- gallery - endes here -->


<?php get_footer(); 