<?php
/**
 * Calls the class on the post edit screen.
 */
function image_meta_box() {
    new image_meta_box();
}

if (is_admin()) {
    add_action('load-post.php', 'image_meta_box');
    add_action('load-post-new.php', 'image_meta_box');
}

class image_meta_box {

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'add_meta_box'));
        add_action('save_post', array($this, 'save'));
    }

    public function add_meta_box($post_type) {
        $post_types = array('boat');     //limit meta box to certain post types
        if (in_array($post_type, $post_types)) {
            add_meta_box(
                    'image_meta_box'
                    , __('Image Preview', 'myplugin_textdomain')
                    , array($this, 'render_meta_box_content')
                    , $post_type
                    , 'side'
                    , 'high'
            );
        }
    }

    public function save($post_id) {
        // Check if our nonce is set.
        if (!isset($_POST['image_meta_box_inner_custom_box_nonce'])) {
            return $post_id;
        }



        $nonce = $_POST['image_meta_box_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'image_meta_box_inner_custom_box')) {
            return $post_id;
        }



        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }



        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            } 
        }

    }

    public function render_meta_box_content($post) {
        // Add an nonce field so we can check for it later.
        wp_nonce_field('image_meta_box_inner_custom_box', 'image_meta_box_inner_custom_box_nonce');

        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta($post->ID, 'user_image', true);

        echo '<img src="' . $value . '" alt="" style="width: 100%; height: auto;" />';
        
        
    }

}