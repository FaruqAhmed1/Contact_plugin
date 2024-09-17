<?php 

/**
 * Custom Post Register
 * 
 */
class CPT {

    /**
     * Constractor for class
     */
    public function __construct() {
        add_action( 'init', [$this, 'register_custom_post_type'] );

    }

    /**
     * Register Post type
     */
    public function register_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Contacts', 'conatct' ),
		'singular_name'         => _x( 'Contact',  'conatct' ),
		'menu_name'             => _x( 'Contacts', 'conatct' ),
		'name_admin_bar'        => _x( 'Contact', 'conatct' ),
		'add_new'               => __( 'Add Contact', 'conatct' ),
		'add_new_item'          => __( 'Add Contact', 'conatct' ),
		'new_item'              => __( 'New Contact', 'conatct' ),
		'edit_item'             => __( 'Edit Contact', 'conatct' ),
		'view_item'             => __( 'View Contact', 'conatct' ),
		'all_items'             => __( 'All Contact', 'conatct' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'contact',
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', ),
	);

	register_post_type( 'contact', $args );
    }

}