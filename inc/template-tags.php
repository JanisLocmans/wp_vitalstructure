<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
if ( ! function_exists( 'vital_get_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since VitalStructure 1.0
 */
function vital_posted_on() {
    printf( __( 
    	'<span> %1$s </span> <span>%2$s</span>', 'vital' ),
        esc_html( get_the_date( 'M jS') ),
        esc_html( get_the_date( 'Y') )
    );
}
endif;