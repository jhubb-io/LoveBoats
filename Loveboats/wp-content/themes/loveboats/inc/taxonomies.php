<?php 
/*
 * taxonomy class
 */
class CC_Taxonomy {
    /** 
     * Taxonomy
     * @Type: string
     * @Required
     */
    private $taxonomy;
    
    /**
     * Post type
     * @Type: string
     * @Required
     */
    private $post_type;
    
    /**
     * Taxonomy settings
     * @Type: array
     * @It's optional
     */
    private $args;
    
    /**
     * Default Taxonomy settings if $args is not passed
     */
    private $default_args = array(
        'hierarchical'                  => false,
        'public'                        => true,
        'show_ui'                       => true,
        'show_admin_column'             => true,
        'show_in_nav_menus'             => true,
        'show_tagcloud'                 => true,
        'rewrite'                       => array( 'hierarchical'    => true )
    );
    
    /**
     * settings labels
     */
    private function set_labels () {
        $single = ucwords( $this->taxonomy );
        $plural = ucwords( $this->taxonomy ) . 's';
        
        $this->default_args['labels'] = array(
            'name'                       => $single, 'Taxonomy General Name', 'text_domain' ,
            'singular_name'              => $single, 'Taxonomy Singular Name', 'text_domain',
            'menu_name'                  => $plural, 'text_domain',
            'all_items'                  => 'All ' . $plural, 'text_domain',
            'parent_item'                => 'Parent Item', 'text_domain',
            'parent_item_colon'          => 'Parent Item:', 'text_domain',
            'new_item_name'              => 'New Item Name', 'text_domain',
            'add_new_item'               => 'Add New ' . $single, 'text_domain',
            'edit_item'                  => 'Edit ' . $single, 'text_domain',
            'update_item'                => 'Update ' . $single, 'text_domain',
            'view_item'                  => 'View ' . $single, 'text_domain',
            'separate_items_with_commas' => 'Separate ' . $plural . ' with commas', 'text_domain',
            'add_or_remove_items'        => 'Add or remove ' . $plural, 'text_domain',
            'choose_from_most_used'      => 'Choose from the most used', 'text_domain',
            'popular_items'              => 'Popular ' . $plural, 'text_domain',
            'search_items'               => 'Search ' . $plural, 'text_domain',
            'not_found'                  => 'Not Found', 'text_domain',
        );
    }
    /**
     * init
     */
    public function __construct ( $taxonomy = null, $post_type = null, $args = array()  ) {
        if ( !$taxonomy ) {
            return;
        }
        if ( !$post_type ) {
            return;
        }
        $this->taxonomy = $taxonomy;
        $this->post_type = $post_type;
        $this->set_labels();
        $this->args = wp_parse_args($args, $this->default_args);
        add_action( 'init', array( $this, 'reg_tax' ) );
    }
    
    /**
     * registers the taxonomy
     */
    public function reg_tax () {
        register_taxonomy( $this->taxonomy, $this->post_type, $this->args );
    }
}
/**
 * register taxonomy Places for location post type
 */
$LocationArgs = array(
    'hierarchical'                  => true,
    'public'                        => true,
    'show_ui'                       => true,
    'show_admin_column'             => true,
    'show_in_nav_menus'             => false,
    'show_tagcloud'                 => false,
);
//$locations = new CC_Taxonomy( 'location', array( 'listing', 'testimonial', 'story', 'designer', 'offer' ), $LocationArgs );

