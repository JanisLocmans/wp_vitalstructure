<?php
/**
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
?>
 

    
	
		<article class='entry-wrapper'>	<!--Entry wrapper-->
	
			<header>
					<div class='entry-featured-image'>
						<?php the_post_thumbnail('entry-banner');?>
							<div class='entry-meta'>
						<?php vital_post_date(); ?>
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

			</header>

			<section class='entry-content'>		
					<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
						<?php the_content(); ?> 
					<?php else : ?>
						<p><?php echo excerpt(50); ?></p>
					<?php endif; ?>
			</section>

			<footer class='entry-footer'>
					<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>

					<?php else : ?>
						
						<?php vital_post_meta(); ?>
						<a class='read-more' href="'. get_permalink($post->ID) . '">Read More</a>

					<?php endif; ?>
			</footer>


			
		</article>

		