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
        esc_attr( sprintf( __( 'View all posts by %s', 'vital' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );
    echo (' <i class="fa fa-tag fa-lg"></i> ');
    the_category(' / ');


}
endif;


if ( ! function_exists( 'vital_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since VitalStructure 1.0
 */
function vital_nav( $nav_id ) {
    global $wp_query, $post;
 
    // Don't print empty markup on single pages if there's nowhere to navigate.
    if ( is_single() ) {
        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
        $next = get_adjacent_post( false, '', false );
 
        if ( ! $next && ! $previous )
            return;
    }
 
    // Don't print empty markup in archives if there's only one page.
    if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
        return;
 
    $nav_class = 'site-navigation paging-navigation';
    if ( is_single() )
        $nav_class = 'site-navigation post-navigation';
 
    ?>
    <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
        <h1 class="assistive-text"><?php _e( 'Post navigation', 'shape' ); ?></h1>
 
    <?php if ( is_single() ) : // navigation links for single posts ?>
 
        <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'shape' ) . '</span> %title' ); ?>
        <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'shape' ) . '</span>' ); ?>
 
    <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
 
        <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'shape' ) ); ?></div>
        <?php endif; ?>
 
        <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'shape' ) ); ?></div>
        <?php endif; ?>
 
    <?php endif; ?>
 
    </nav><!-- #<?php echo $nav_id; ?> -->
    <?php
}
endif;


/**
 * Displays Current Page Title
 *
 * @since Vital 1.0
 *
 */
function vital_blog_title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      echo get_the_title(get_option('page_for_posts', true));
    } else {
      _e('Blog', 'vital');
    }
  } elseif (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      echo $term->name;
    } elseif (is_post_type_archive()) {
      echo get_queried_object()->labels->name;
    } elseif (is_day()) {
      printf(__('Daily Archives: %s', 'vital'), get_the_date());
    } elseif (is_month()) {
      printf(__('Monthly Archives: %s', 'vital'), get_the_date('F Y'));
    } elseif (is_year()) {
      printf(__('Yearly Archives: %s', 'vital'), get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      printf(__('Author Archives: %s', 'vital'), $author->display_name);
    } else {
      single_cat_title();
    }
  } elseif (is_search()) {
    printf(__('Search Results for %s', 'vital'), get_search_query());
  } elseif (is_404()) {
    _e('Not Found', 'vital');
  } else {
    the_title();
  }
}