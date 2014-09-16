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
$my_get_image = new get_image();

//use new object to call functions then add them to admin hooks
add_action( 'admin_notices', array( $my_get_image, 'foto_get_image' ));
add_action( 'admin_head', array($my_get_image, 'foto_css' ));

