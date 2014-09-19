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

class foto_finagler {
	public function __construct() {
		//hooks div creation to admin_notices function
		add_action( 'admin_notices', array( $this, 'foto_get_image' ));
		//hooks stylesheet to admin scripts since it's appearing in admin area
		add_action ( 'admin_enqueue_scripts', array( $this, 'foto_add_stylesheet' ));
		/** Step 2 (from text above). */
		add_action( 'admin_menu', array( $this, 'my_plugin_menu' ));

		include (plugin_dir_path(__FILE__) . 'views/admin.php');
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

	public function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'Anns Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
	}
}


function run_foto_finagler() {
	$foto_finagler = new foto_finagler();	
}


run_foto_finagler();