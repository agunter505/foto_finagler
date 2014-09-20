<?php

/**
 * Plugin Name: Foto Finagler
 * Description: A simple plugin to manipulate images
 * Version: 1.0
 * Author: Ann Gunter
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: GPLv2 or later
 */


 // Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
    exit;
};

//main plugin class
class foto_finagler {

	//constructor for main plugin class
	public function __construct() {
		//hooks admin_foto_style to admin_enqueue_scripts 
		add_action ( 'admin_enqueue_scripts', array( $this, 'foto_add_admin_style' ));
		//adds foto finagler options page and menu item under settings
		add_action( 'admin_menu', array( $this, 'foto_menu' ));
	}

	//registers and queues admin stylesheet foto_admin_style
	public function foto_add_admin_style() {
		wp_register_style( 'admin_foto_style1', plugins_url( 'foto_finagler/css/foto_admin_style.css', dirname(__FILE__) ));
		wp_enqueue_style( 'admin_foto_style1' );
	}
	//loads html for admin options page from foto_admin_view
	public function foto_options() {
		require_once( plugin_dir_path(__FILE__) . 'views/foto_admin_view.php');
	}
	//loads admin options page, uses foto_options to load html to admin page
	public function foto_menu() {
	add_options_page( 'Foto Finagler Options', 'Foto Finagler', 'manage_options', 'foto_finagler_options', array( $this, 'foto_options' ));
	}

} // end main plugin class

//instantiates foto_finagler class
function foto_finagler_run() {
	$foto_finagler = new foto_finagler();	
}

//runs it all
foto_finagler_run();
