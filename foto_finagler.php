<?php

/**
 * Plugin Name: Foto Finagler
 * Description: A simple plugin to manipulate images
 * Version: 1.0
 * Author: Ann Gunter
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: GPLv2 or later
 */

/*get the image to be placed*/
function foto_get_image() {
	$image = "<p>This would be my image</p>";
	echo "<div id='image_wrap'>$image</div>";
}

/*calls foto_get_image function when admin_notices is called*/
add_action( 'admin_notices', 'foto_get_image' );

/*add css for the image div*/
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

/*add div to admin header*/
add_action( 'admin_head', 'foto_css' );

?>