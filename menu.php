<?php 
/**
 * 
 */
class Menu {
    /**
     * Constructor for Class
     * 
     */
    public function __construct() {
        add_action( 'admin_menu', [$this, 'register_admin_menu'] );

    }
    
    /**
     * Register Admin menu
     * 
     */
    public function register_admin_menu() {
        add_menu_page( 
            __('Contact','contact'), 
            __('Contact','contact'), 
            'manage_options',
             'contact', 
             [$this,'menu_page'],
             'dashicons-admin-users',
             2 
        );
        // add_submenu_page(
        //     'contact',
        //     __('Add Contact','contact'), 
        //     __('Add Contact','contact'), 
        //     'manage_options',
        //      'Add_contact', 
        //      [$this,'submenu_page']
             
        // );
    }

 
}