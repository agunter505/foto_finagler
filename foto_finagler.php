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

	//constructor
	public function __construct() {
		//hooks div creation to admin_notices function
		add_action( 'admin_notices', array( $this, 'foto_get_image' ));
		//hooks stylesheet to admin scripts since it's appearing in admin area
		add_action ( 'admin_enqueue_scripts', array( $this, 'foto_add_stylesheet' ));
		//adds foto finagler options page and menu item under settings
		add_action( 'admin_menu', array( $this, 'my_plugin_menu' ));
	}

	//get the image to be placed and puts it in a div
	public function foto_get_image() {
		$image = "<p>This would be my image</p>";
		echo "<div id='image_wrap'>$image</div>";
	}

	//registers and queues stylesheet for the image created above
	public function foto_add_stylesheet() {
		wp_register_style( 'foto_style1', plugins_url( 'foto_finagler/css/admin_foto_style.css', dirname(__FILE__) ));
		wp_enqueue_style( 'foto_style1' );
	}
	//loads plugin html for admin page
	public function my_plugin_options() {
		require_once( plugin_dir_path(__FILE__) . 'views/admin.php');
	}
	//loads options page
	public function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'Foto Finagler', 'manage_options', 'my-unique-identifier', array( $this, 'my_plugin_options' ));
	}

} // end main plugin class

//instantiates foto_finagler class
function run_foto_finagler() {
	$foto_finagler = new foto_finagler();	
}

//runs it all
run_foto_finagler();
