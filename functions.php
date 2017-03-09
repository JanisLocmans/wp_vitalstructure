<?php
/**
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 920; /* pixels */
/**
 *
 * imports scripts and stylesheets.
 *
 * @since VitalStructure 1.0
 */
add_action( 'after_setup_theme', 'vital_setup' );

function enque_files() {    
    wp_enqueue_style('style', get_stylesheet_uri() );
    wp_enqueue_script( 'script_js', get_template_directory_uri() . '/inc/js/scripts.js', 
                        array(), 
                        null, 
                        true );
    wp_enqueue_style('fa_css', get_stylesheet_directory_uri() . '/inc/font-awesome-4.7.0/css/font-awesome.min.css' );
}
add_action('wp_enqueue_scripts', 'enque_files');
/**
 * Theme setup function
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since VitalStructure 1.0
 */
if ( ! function_exists( 'vital_setup' ) ):
function vital_setup() {
 
    /**
     * require files
     */
    require( get_template_directory() . '/inc/template-tags.php' );
    require( get_template_directory() . '/inc/tweaks.php' );
    require( get_template_directory() . '/inc/customizer.php' );
    require( get_template_directory() . '/inc/vital_widget_manager.php' );
 
    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on vital, use a find and replace
     * to change 'vital' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'vital', get_template_directory() . '/languages' );
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );
    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'fullwidth' ) );
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
       'Left' => __( 'Left', 'vital' ),
        'Right' => __( 'right', 'vital' )
   	) );
    /**
     * add featured image support
     */

    add_theme_support('post-thumbnails');
    add_image_size('entry-banner', 675, 380, true);

}
endif; // vital_setup

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since VitalStructure 1.0
 */
function widget_area_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'vital' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'vital' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'widget_area_init' );


