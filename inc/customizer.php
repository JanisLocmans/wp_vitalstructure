<?php
/**
 * Main file for theme customization
 *
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
function vital_theme_customizer( $wp_customize ) {

    $wp_customize->add_section( 'vital_logo_section' , array(
    'title'       => __( 'Logo', 'vital' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );
   $wp_customize->add_setting( 'vital_logo' );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'vital_logo', array(
    'label'    => __( 'Logo', 'vital' ),
    'section'  => 'vital_logo_section',
    'settings' => 'vital_logo',
    ) ) );

   $wp_customize->add_section( 'vital_banner_section' , array(
    'title'      => __('Banner','vital'),
    'priority'   => 31,
    'description' => 'Upload a banner',
    ) );
   $wp_customize->add_setting( 'vital_banner' );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'vital_banner', array(
    'label'    => __( 'Banner', 'vital' ),
    'section'  => 'vital_banner_section',
    'settings' => 'vital_banner',
    'description' => __( 'Select the image to be used for Home Top Background.', 'theme-slug' )
    ) ) );


}
add_action('customize_register', 'vital_theme_customizer');