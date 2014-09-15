<?php

/**
 * Plugin Name: Foto Finagler
 * Description: A simple plugin to manipulate images
 * Version: 1.0
 * Author: Ann Gunter
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: GPLv2 or later
 */

//create a class to contain the image function to help prevent naming conflicts
class get_image {
	//get the image to be placed
	function foto_get_image() {
		$image = "<p>This would be my image</p>";
		echo "<div id='image_wrap'>$image</div>";
	}
}
$my_get_image = new get_image();

//calls foto_get_image function and creates a div when admin_notices is called
add_action( 'admin_notices', array( $my_get_image, 'foto_get_image' ));

//create a class to contain the css function
class foto_css {
	//add css for the image div
	function foto_css() {
		echo "
		<style type='text/css'>
		#image_wrap {
			float: right;
			margin: 2px;
			padding: 2px;
			font-size: 11px;
			background-color: red;
		}
		</style>
		";
	}
}

//create an instance of the class
$my_foto_css = new foto_css();
//add css to the created div to admin header
add_action( 'admin_head', array($my_foto_css, 'foto_css' ));



//begin new functions for sidebar stuff
//loads a cute red sidebar, breaks rest of page
function foto_sidebar_init() {
    register_sidebar( array(
        'name'          => __( 'Anns Sidebar' ),
        'id'            => 'anns_sidebar-1',
        'description'   => __( 'my first sidebar, lets see what happens' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

function foto_add_stylesheet() {
	wp_register_style( 'sidebar-wrapper', plugins_url( '/foto_style.css'));
	wp_enqueue_style( 'sidebar-wrapper' );
}

function add_foto_sidebar() {
	echo " <div id=\"secondary\" class = \"sidebar_wrapper\"> ";
	echo " <div class =\"widget-area\"> ";
	dynamic_sidebar ( 'anns_sidebar-1' );
	echo " </div> ";
	echo " </div> ";
}

add_action ( 'admin_enqueue_scripts', 'foto_add_stylesheet');
add_action ( 'widgets_init', 'foto_sidebar_init');
add_action ( 'admin-footer', 'add_foto_sidebar'); 

