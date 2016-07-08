<?php 
/*
 * Prints notices depending on post type or page template
 */
class Reea_Notices {
    /*
     * post type or post types where a message will appear
     */
    private $post_type;
    
    /*
     * the actual message that will appear
     */
    private $message;
    
    /*
     * type of the message
     * Choices can be: updated, error, update-nag
     */
    private $type;
    
    /*
     * used to condition if the message is on a specific page template
     * This is not used and implemented yet. 
     */
    private $page_template;
    
    /*
     * init
     */
    public function __construct( $message, $type = null, $post_type = array(), $page_template = null  ) {
        if ( !$post_type ) {
            return;
        }
        if ( !$message ) {
            return;
        }
        
        $this->post_type        = $post_type;
        $this->message          = $message;
        $this->type             = $type;
        $this->page_template    = $page_template;
        
        add_action( 'admin_notices', array( $this, 'show_message' ) );
    }
    
    /*
     * building the html notice
     */
    public function show_message() {
        $screen = get_current_screen();
        $paragrafStart = ( $this->type !== 'update-nag' ? '<p>' : '' );
        $paragrafEnd = ( $this->type !== 'update-nag' ? '</p>' : '' );
        foreach ( $this->post_type as $postType ) {
            if ( $screen->post_type == $postType ) : ?>
                <div class="<?php echo ( $this->type ? $this->type : 'updated' ); ?>">
                    <?php _e( $paragrafStart . $this->message . $paragrafEnd, 'my-text-domain' ); ?>
                </div>
            <?php endif;
        }
    }
}
//$FranchiseListingsNotice = new Reea_Notices( 'Important: Top level listing is the franchise. Second level is the showroom.', 'update-nag', array( 'listing' ) );