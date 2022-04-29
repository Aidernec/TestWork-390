<?php

/**
 * Custom scripts and styles.
 */

/**
 * Enqueue scripts and styles.
 */

function scripts() {
	/*
	 Register styles & scripts.*/
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap', array(), '1.0' );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js' );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'scripts' );

add_action(
	'admin_enqueue_scripts',
	function () {
		wp_enqueue_media();
		wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0' );
		wp_register_script( 'sunset-admin-script', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'sunset-admin-script' );
	},
	99
);
