<?php
/**
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
get_header();?>
	<div id="content" class="site-content" role="main">
		<div id="primary" class="main-content">	    
	    	<?php if ( have_posts() ) : 

				while ( have_posts() ) : the_post(); 

    				if ( is_search() ) : 

			          		get_template_part( 'search', get_post_format() ); 

			        	elseif ( is_archive() ) :

			         		get_template_part( 'archive', get_post_format() );

			        	else :

			        		get_template_part( 'content', get_post_format() );

			        endif;

			    endwhile;

			    else :

			    	get_template_part( 'no-results', 'index' );

			endif; 
			wp_reset_postdata(); // reset the query ?>	    
		</div><!-- #primary .content-area -->
		<?php get_sidebar(); ?>
	</div><!-- #content .site-content -->
<?php get_footer();?>


