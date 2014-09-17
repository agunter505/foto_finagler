<?php

//get the image to be placed in the header
function foto_get_image() {
		$image = "<p>This would be my image</p>";
		echo "<div id='image_wrap'>$image</div>";
	}

add_action ( 'admin_notices', 'foto_get_image' );

//registers the sidebar
function foto_sidebar_init() {
    register_sidebar( array(
        'name'          => __( 'Anns Sidebar' ),
        'id'            => 'sidebar_main',
        'description'   => __( 'my first sidebar, lets see what happens' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

add_action ( 'widgets_init', 'foto_sidebar_init' );

function foto_add_stylesheet() {
        wp_register_style( 'foto_style1', plugins_url( 'foto_finagler/foto_style.css', dirname(__FILE__) ));
        wp_enqueue_style( 'foto_style1' );
    }

add_action ( 'admin_enqueue_scripts', 'foto_add_stylesheet' );

