<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// in case we want the parent theme stylsheet
function ebtTheme_enqueue_styles() {
	wp_enqueue_style( 
		'ebtTheme-parent-style', 
		get_parent_theme_file_uri( 'style.css' )
	);
}

add_action( 'wp_enqueue_scripts', 'ebtTheme_enqueue_styles' );

// add featured image option to post editor
add_theme_support('post-thumbnails', array(
	'post',
	'page',
	'custom-post-type-name',
));

/*  DISABLE GUTENBERG STYLE IN HEADER| WordPress 5.9 */
function wps_deregister_styles() {
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );