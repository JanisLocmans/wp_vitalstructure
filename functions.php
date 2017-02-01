<?php
function enque_files() {	
	wp_enqueue_style('style', get_stylesheet_uri() );
	wp_enqueue_script( 'script_js', get_template_directory_uri() . '/inc/js/scripts.js', array(), null, true );
}
add_action('wp_enqueue_scripts', 'enque_files');

