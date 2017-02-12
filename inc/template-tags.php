<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
if ( ! function_exists( 'vital_post_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since VitalStructure 1.0
 */
function vital_post_date() {
    printf( __( 
    	'<span> %1$s </span> <span>%2$s</span>', 'vital' ),
        esc_html( get_the_date( 'M jS') ),
        esc_html( get_the_date( 'Y') )
    );
}
endif;


if ( ! function_exists( 'vital_post_meta' ) ) :
/**
 * Display Category Meta
 *
 * @since VitalStructure 1.0
 */
function vital_post_meta() {
    printf( __( 
    	'<i class="fa fa-user fa-lg"></i> <a class="url fn n" href="%1$s" title="%2$s" rel="author"> %3$s </a>', 'vital' ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'shape' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );
    echo (' <i class="fa fa-tag fa-lg"></i> ');
    the_category(' / ');


}
endif;