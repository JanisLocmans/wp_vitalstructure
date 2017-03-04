<?php
/**
 * Widget manager. registers and manages custom theme widgets
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
require_once( get_template_directory() . '/inc/widgets/vital_archive.php' );

function register_vital_widgets() {
    register_widget( 'Vital_Archive_Widget' );
}
add_action( 'widgets_init', 'register_vital_widgets' );