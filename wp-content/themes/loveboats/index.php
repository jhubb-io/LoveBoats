<?php get_header(); ?>

    <div class="top-right"></div>
    <header>
        <a href="javascript:void(0);" class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"></a>
    </header>

    <div class="content step1">
        <menu>
            <div class="step1"><a href="javascript:void(0);"><b><?php _e( 'COUNTRY', 'loveboats' ); ?></b></a></div>
            <div class="step2"><a href="javascript:void(0);"><b><?php _e( 'COLOUR', 'loveboats' ); ?></b></a></div>
            <div class="step3"><a href="javascript:void(0);"><b><?php _e( 'IMAGE', 'loveboats' ); ?></b></a></div>
            <div class="step4"><a href="javascript:void(0);"><b><?php _e( 'MESSAGE', 'loveboats' ); ?></b></a></div>
            <div class="step5"><a href="javascript:void(0);"><b><?php _e( 'PREVIEW', 'loveboats' ); ?></b></a></div>
            <div class="step6"><a href="javascript:void(0);"><b><?php _e( 'SUBMIT', 'loveboats' ); ?></b></a></div>
            <div><a href="<?php echo get_permalink( 19 ); ?>"><b><?php _e( 'GALLERY', 'loveboats' ); ?></b></a></div>
        </menu>


            <!-- FORM - starts here -->
            <form class="love-form" method="post" action="#" enctype="multipart/form-data">
                <input type="hidden" name="action" id="action" value="upload_love_form">
                <?php wp_nonce_field( 'upload_love_form', 'upload_love_form' ); ?>
                    <!-- step 1 - start build boat start here -->
                    <div class="page-content intro">
                            <h1>CREATE YOUR OWN LOVEBOAT <br />AND JOIN OUR CANAL PARADE</h1>
                            <p>
                                    This year Amsterdam is hosting EuroPride for the second time, making the city the gay capital of Europe once again. Our canal parade is famous amongst pride events and this year, even if you can't be there in person, you can still join in from anywhere in the world.
                            </p>
                            <p>
                                    Use the following simple steps to create your own paper boat with a personalised message. It can be your own story, your message to us in Amsterdam, a memory of a friend, in fact anything you like. Besides appearing in the gallery on this website your boat design will also take part in a live flotilla event on the pond in front of the Rijksmuseum Amsterdam during the Europride event weeks.
                            </p>
                            <button type="button" class="createaboat"><?php _e( 'CREATE YOUR BOAT', 'loveboats' ); ?></button>
                    </div>
                    <!-- step 1 - start build boat endes here -->

                    <!-- step 2 - start build boat start here -->
                    <div class="page-content country">
                            <h1><?php _e( 'select your country', 'loveboats' ); ?></h1>
                            <div class="flag-holder it">
                                <div class="flag"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png"></div>
                            </div>
                            <div class="custom">
                                    <select name="country" class="country-flag" autocomplete="off">
                                        <option value="" disabled selected>Select Your Country</option>
                                        <option value="al">Albania</option>
                                        <option value="ad">Andorra</option>
                                        <option value="am">Armenia</option>
                                        <option value="at">Austria</option>
                                        <option value="az">Azerbaijan</option>
                                        <option value="by">Belarus</option>
                                        <option value="be">Belgium</option>
                                        <option value="ba">Bosnia and Herzegovina</option>
                                        <option value="bg">Bulgaria</option>
                                        <option value="hr">Croatia</option>
                                        <option value="cy">Cyprus</option>
                                        <option value="cz">Czech Republic</option>
                                        <option value="dk">Denmark</option>
                                        <option value="ee">Estonia</option>
                                        <option value="fi">Finland</option>
                                        <option value="fr">France</option>
                                        <option value="ge">Georgia</option>
                                        <option value="de">Germany</option>
                                        <option value="gr">Greece</option>
                                        <option value="hu">Hungary</option>
                                        <option value="is">Iceland</option>
                                        <option value="ie">Ireland</option>
                                        <option value="it">Italy</option>
                                        <option value="kz">Kazakhstan</option>
                                        <option value="lv">Latvia</option>
                                        <option value="li">Liechtenstein</option>
                                        <option value="lt">Lithuania</option>
                                        <option value="lu">Luxembourg</option>
                                        <option value="mk">Macedonia</option>
                                        <option value="mt">Malta</option>
                                        <option value="md">Moldova</option>
                                        <option value="mc">Monaco</option>
                                        <option value="me">Montenegro</option>
                                        <option value="nl">Netherlands</option>
                                        <option value="no">Norway</option>
                                        <option value="pl">Poland</option>
                                        <option value="pt">Portugal</option>
                                        <option value="ro">Romania</option>
                                        <option value="ru">Russia</option>
                                        <option value="sm">San Marino</option>
                                        <option value="rs">Serbia</option>
                                        <option value="sk">Slovakia</option>
                                        <option value="si">Slovenia</option>
                                        <option value="es">Spain</option>
                                        <option value="se">Sweden</option>
                                        <option value="ch">Switzerland</option>
                                        <option value="tr">Turkey</option>
                                        <option value="ua">Ukraine</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="va">Vatican City</option>
                                    </select>
                            </div>

                            <div class="button-holder">
                                    <button type="button" type="button" class="btn-back"><?php _e( 'BACK', 'loveboats' ); ?></button>
                                    <button type="button" class="btn-next"><?php _e( 'Next', 'loveboats' ); ?></button>
                            </div>
                    </div>
                    <!-- step 2 - start build boat endes here -->


                    <!-- step 3 - start build boat start here -->
                    <div class="page-content colors">
                            <h1><?php _e( 'Pick a colour', 'loveboats' ); ?></h1>
                            <div class="color-box">
                                    <div class="color-row">
                                            <div class="color pink"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/color-1.png"></div>
                                            <div class="color red"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/color-2.png"></div>
                                            <div class="color green"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/color-3.png"></div>
                                            <div class="color turquaze"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/color-4.png"></div>
                                    </div>
                                    <div class="color-row">
                                            <div class="color orange"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/color-5.png"></div>
                                            <div class="color yellow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/color-6.png"></div>
                                            <div class="color blue"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/color-7.png"></div>
                                            <div class="color purple"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/color-8.png"></div>
                                    </div>
                            </div>

                            <div class="colorx-holder">
                                    <div class="pink"></div>
                                    <input class="selected-color" value="pink" name="color" />
                                    <input class="template-variant" name="template_variant" value="" onchange="" type="hidden" />
                            </div>

                            <div class="button-holder">
                                    <button type="button" class="btn-back"><?php _e( 'BACK', 'loveboats' ); ?></button>
                                    <button type="button" class="btn-next"><?php _e( 'Next', 'loveboats' ); ?></button>
                            </div>
                    </div>
                    <!-- step 3 - start build boat endes here -->


                    <!-- step 4 - start build boat start here -->
                    <div class="page-content imageupload">
                            <h1><?php _e( 'Upload an image', 'loveboats' ); ?></h1>
                            <div class="uploadimage">
                                    <div class="chose-file">
                                        <div class="image-holder">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shample-img.png">
                                        </div>

                                        <div class="upload">
                                            <input type="file" name="upload" class="file-selector" id="file-selector"/>
                                        </div>
                                    </div>

                                    <div class="chose-file-text">
                                        <p><?php _e( 'Here you can upload a selfie, a picture of a loved one or anything else.', 'loveboats' ); ?></p>
                                    </div>
                            </div>

                            <div class="button-holder">
                                <button type="button" class="btn-back"><?php _e( 'BACK', 'loveboats' ); ?></button>
                                <button type="button" class="btn-next"><?php _e( 'Next', 'loveboats' ); ?></button>
                            </div>
                    </div>
                    <!-- step 4 - start build boat endes here -->


                    <!-- step 5 - start build boat start here -->
                    <div class="page-content message">
                            <h1><?php _e( 'type a message', 'loveboats' ); ?></h1>
                            <textarea class="enter-message" placeholder="<?php _e( 'Here you can enter a personalised message to be displayed on your boat. Click to type.', 'loveboats' ); ?>" maxlength="140" name="message"></textarea>
                            <p class="message-limit"><span class="countdown">140</span> <?php _e( 'characters remaining', 'loveboats' ); ?></p>


                            <div class="button-holder">
                                    <button type="button" class="btn-back"><?php _e( 'BACK', 'loveboats' ); ?></button>
                                    <button type="button" class="btn-next btn-textarea"><?php _e( 'Next', 'loveboats' ); ?></button>
                            </div>					
                    </div>
                    <!-- step 5 - start build boat endes here -->


                    <!-- step 6 - start build boat start here -->
                    <div class="page-content boatview">
                        <div class="boat-view-container minimized">
                            <!-- boat wrapper - starts here -->
                            <div class="boat-wrapper template-a portview">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-body-white.png" class="boat-main" />

                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-right-port-view-texture.png" class="boat-texture" />
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-right-port-view-color-pink.png" class="boat-color" />

                                <div class="boat-flag">
                                    <div class="cut-off-one"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-first"/></div>
                                    <div class="cut-off-two"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-second"/></span></div>
                                    <div class="cut-off-three"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-third"></div>
                                    <div class="cut-off-four"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-fourth"></div>
                                    <!--<img src="images/boat-layers/boat-a-right-port-view-flag.png" class="boat-main">-->
                                </div>
                                <p><?php _e( 'Here you can enter a personalised message to be displayed on your boat, here you can enter a personalised message to be displayed on your boat', 'loveboats' ); ?></p>
                                <div class="user-image-rot">
                                    <div class="user-image">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shample-img.png" />
                                    </div>
                                </div>
                            </div>
                            <!-- boat wrapper - ends here -->


                            <h3><?php _e( 'Port View', 'loveboats' ); ?></h3>
                        </div>

                        <div class="boat-view-container">

                            <!-- boat wrapper - starts here -->
                            <div class="boat-wrapper template-a starboard">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-body-white.png" class="boat-main" />

                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-left-starboard-view-texture.png" class="boat-texture" />
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-left-starboard-view-color-pink.png" class="boat-color" />

                                <div class="boat-flag">
                                    <div class="cut-off-one"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-first"/></span></div>
                                    <div class="cut-off-two"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-second"/></div>
                                    <div class="cut-off-three"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-third"></div>
                                    <div class="cut-off-four"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-fourth"></div>
                                    <!--<img src="images/boat-layers/boat-a-left-starboard-view-flag.png" class="boat-main">-->
                                </div>
                                <p><?php _e( 'Here you can enter a personalised message to be displayed on your boat, here you can enter a personalised message to be displayed on your boat', 'loveboats' ); ?></p>
                                <div class="user-image-rot">
                                    <div class="user-image">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shample-img.png" />
                                    </div>
                                </div>
                            </div>
                            <!-- boat wrapper - ends here -->	


                            <h3><?php _e( 'Starboard View', 'loveboats' ); ?></h3>
                        </div>

                        <div class="button-holder">
                            <button type="button" class="btn-back"><?php _e( 'BACK', 'loveboats' ); ?></button>
                            <button type="button" class="btn-next"><?php _e( 'Next', 'loveboats' ); ?></button>
                        </div>
                    </div>
                    <!-- step 6 - start build boat endes here -->


                    <!-- step 7 - start build boat start here -->
                    <div class="page-content submit">
                        <div class="submit-preview">
                            <div class="boat-view-container small">
                                <!-- boat wrapper - starts here -->
                                <div class="boat-wrapper template-a portview">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-body-white.png" class="boat-main" />

                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-right-port-view-texture.png" class="boat-texture" />
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-right-port-view-color-pink.png" class="boat-color" />

                                    <div class="boat-flag">
                                        <div class="cut-off-one"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-first"/></div>
                                        <div class="cut-off-two"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-second"/></span></div>
                                        <div class="cut-off-three"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-third"></div>
                                        <div class="cut-off-four"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-fourth"></div>
                                        <!--<img src="images/boat-layers/boat-a-right-port-view-flag.png" class="boat-main">-->
                                    </div>
                                    <p><?php _e( 'Here you can enter a personalised message to be displayed on your boat, here you can enter a personalised message to be displayed on your boat', 'loveboats' ); ?></p>
                                    <div class="user-image-rot">
                                        <div class="user-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shample-img.png" />
                                        </div>
                                    </div>
                                </div>
                                <!-- boat wrapper - ends here -->

                            </div>

                            <div class="boat-view-container small">
                                <!-- boat wrapper - starts here -->
                                <div class="boat-wrapper template-a starboard">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-body-white.png" class="boat-main" />

                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-left-starboard-view-texture.png" class="boat-texture" />
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-left-starboard-view-color-pink.png" class="boat-color" />

                                    <div class="boat-flag">
                                        <div class="cut-off-one"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-first"/></span></div>
                                        <div class="cut-off-two"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-second"/></div>
                                        <div class="cut-off-three"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-third"></div>
                                        <div class="cut-off-four"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-fourth"></div>
                                        <!--<img src="images/boat-layers/boat-a-left-starboard-view-flag.png" class="boat-main">-->
                                    </div>
                                    <p><?php _e( 'Here you can enter a personalised message to be displayed on your boat, here you can enter a personalised message to be displayed on your boat', 'loveboats' ); ?></p>
                                    <div class="user-image-rot">
                                        <div class="user-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shample-img.png" />
                                        </div>
                                    </div>
                                </div>
                                <!-- boat wrapper - ends here -->	

                            </div>
                        </div>

                        <div>
                            <h2><?php _e( 'submit your boat', 'loveboats' ); ?></h2>
                            <div class="submit-form-container">
                                <div class="row row-name"><label><?php _e( 'Name', 'loveboats' ); ?>*</label><input type="text" name="name" /></div>
                                <div class="row row-mail"><label><?php _e( 'Email Address', 'loveboats' ); ?>*</label><input type="text" name="mail" /></div>
                            </div>

                            <div class="button-holder">
                                <button type="button" class="btn-back"><?php _e( 'BACK', 'loveboats' ); ?></button>
                                <button type="submit" class="btn-next submit"><?php _e( 'Next', 'loveboats' ); ?></button>
                            </div>
                        </div>

                    </div>
                    <!-- step 7 - start build boat endes here -->
                    <input type="hidden" name="img_val" id="img_val" value="" />
                </form>
            
            <!-- FORM - ends here -->

                <!-- step 8 - start build boat start here -->
                <div class="page-content thank-you">
                    <div class="submit-preview">
                        <div class="boat-view-container thank-you">

                            <!-- boat wrapper - starts here -->
                            <div class="boat-wrapper template-a portview">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-body-white.png" class="boat-main" />

                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-right-port-view-texture.png" class="boat-texture" />
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/boat-layers/boat-a-right-port-view-color-pink.png" class="boat-color" />

                                <div class="boat-flag">
                                    <div class="cut-off-one"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-first"/></div>
                                    <div class="cut-off-two"><span><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-second"/></span></div>
                                    <div class="cut-off-three"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-third"></div>
                                    <div class="cut-off-four"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flags/00.png" class="flag-fourth"></div>
                                </div>
                                <p>Here you can enter a personalised message to be displayed on your boat, here you can enter a personalised message to be displayed on your boat</p>
                                <div class="user-image-rot">
                                    <div class="user-image">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shample-img.png" />
                                    </div>
                                </div>
                            </div>
                            <!-- boat wrapper - ends here -->

                        </div>
                    </div>

                    <h2><?php _e( 'Thank You!', 'loveboats' ); ?></h2>

                    <div class="button-holder">
                        <button type="button" class="btn-back"><?php _e( 'BACK', 'loveboats' ); ?></button>
                        <a class="btn-next download" target="_blank" ><?php _e( 'Download pdf', 'loveboats' ); ?></a>
                    </div>
                </div>
                <!-- step 8 - start build boat endes here -->
            
            <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.min.js"></script>    
            <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/html2canvas.js"></script>
            <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/base64js.min.js"></script>
            <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/canvas2image.js"></script>
            <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/plg.js"></script>
            <form class="encodedimg" style="display: none;">
                <input type="hidden" name="action" value="encoded_image" />
                <input type="hidden" name="rotatedimage" class="rotatedimage" />
            </form>
                      
<?php get_footer(); ?>