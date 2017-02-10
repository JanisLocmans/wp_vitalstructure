<?php
/**
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
?>
 

    
	
		<article class='entry-wrapper'>	<!--Entry wrapper-->
	
		
			<div class='entry-featured-image'>
				<?php the_post_thumbnail('entry-banner');?>
				<div class='entry-meta'>
					<?php vital_posted_on(); ?>
				</div>
			</div>

				<span class='entry-title'>
					<h1>
						<a href="<?php the_permalink(); ?>" 
			   			   title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'vital' ), the_title_attribute( 'echo=0' ) ) ); ?>" 
			   	        rel="bookmark"><?php the_title(); ?>
						</a>
					</h1>
				</span>
			
				<div class='entry-content'>
				<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
					<?php the_content(); ?> 
				<?php else : ?>
					<p><?php echo excerpt(25); ?></p>
				<?php endif; ?>
				</div>
			
		</article>