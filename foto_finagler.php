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

	//get the image to be placed in the header
	function foto_get_image() {
		$image = "<p>This would be my image</p>";
		echo "<div id='image_wrap'>$image</div>";
	}

    //registers the sidebar
    function foto_sidebar_init() {
        register_sidebar( array(
            'name'          => __( 'Anns Sidebar' ),
            'id'            => 'anns_sidebar-1',
            'description'   => __( 'my first sidebar, lets see what happens' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }

    //function to add stylesheet, styles 
    function foto_add_stylesheet() {
        wp_register_style( 'foto_style1', plugins_url( 'foto_finagler/foto_style.css', dirname(__FILE__) ));
        wp_enqueue_style( 'foto_style1' );
    }

    function foto_get_sidebar() {
        echo "<div id = \"secondary\" class = \"sidebar_wrapper\">";
        echo "<div>"; 
            dynamic sidebar ( 'sidebar-1' ) 
        echo "</div>";
        echo "</div>";
    }
}

//create an instance of the class
$my_get_image = new get_image();

//use new object to call functions then add them to the proper hooks
add_action ( 'admin_notices', array( $my_get_image, 'foto_get_image' ));
add_action ( 'admin_notices', array( $my_get_image, 'foto_get_sidebar' ));
add_action ( 'widgets_init', array( $my_get_image, 'foto_sidebar_init' ));
add_action ( 'admin_enqueue_scripts', array( $my_get_image, 'foto_add_stylesheet' ));

