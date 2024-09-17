<?php 

/*
 * Plugin Name:       Contact
 * Plugin URI:       
 * Description:       This is a basic contact plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Faruq Ahmed
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       contact
 * Domain Path:       /languages
 */

if( !defined ('ABSPATH') ) return;

/**
 * Conatct Main Class
 *  
 */

 class Contact {

    /**
     * Construct funtion for Contact Class
     * 
     */
    public function __construct() {
        $this->include_class();
        $this->init_class();


    }

    /**
     * Instance function 
     * 
     * @return object
     */
    public static function instance() {
        static $instance = false;
        if( !$instance ){
            $instance = new self();
        }
        return $instance;
    }

    /**
     * Includes all file 
     * 
     */
    public function include_class() {
        require_once __DIR__. '/menu.php';
        require_once __DIR__. '/cpt.php';
        require_once __DIR__. '/cmf.php';

    }

    /**
     * Init Class
     * 
     */
    public function init_class() {
        $menu = new Menu();
        $cpt = new CPT();
        $cpt = new CMF();
    }

 }

 /**
  * Click Off Contact Class
  */

  function contact(){
    return Contact::instance();
  }
    contact();