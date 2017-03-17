<?php
/**
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
get_header();?>
	<div id="content" class="site-content" role="main">
		<div id="blog-title-id" class="blog-title">
			<H1><?php vital_blog_title(); ?></H1>
		</div>
		<div id="primary" class="main-content">	    
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

			    	<?php vital_nav( 'nav-below' ); ?>

			    <?php else :

			    	get_template_part( 'no-results', 'index' );

			endif; 
			wp_reset_postdata(); // reset the query ?>	    
		</div><!-- #primary .content-area -->
		<?php get_sidebar(); ?>
	</div><!-- #content .site-content -->
<?php get_footer();?>


