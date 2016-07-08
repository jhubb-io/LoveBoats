<?php
/**
 * Template Name: Love Boats form
 */
get_header(); ?>

<div class="form-boats">
    <form id="upload_love_form" method="post" action="#" enctype="multipart/form-data">
        <input type="file" name="thumbnail" id="thumbnail">
        <input id="submit-ajax" name="submit-ajax" type="submit" value="upload">
        <input type="hidden" name="action" id="action" value="upload_love_form">
        <?php wp_nonce_field( 'upload_love_form', 'upload_love_form' ); ?>
    </form>
    <div id="output1"></div>
</div>


<?php get_footer(); 