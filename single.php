<?php
/**
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
get_header();?>
	<div id="content" class="site-content" role="main">
		<div id="primary" class="main-content">	    
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'content', 'single' ); ?>

				<?php endwhile; ?>

			    	<?php shape_content_nav( 'nav-below' ); ?>

			 
		</div><!-- #primary .content-area -->
		<?php get_sidebar(); ?>
	</div><!-- #content .site-content -->
<?php get_footer();?>
