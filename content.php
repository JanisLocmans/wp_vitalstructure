<?php
/**
 * @package VitalStructure
 * @since VitalStructure 1.0
 */
?>	
		<article id='post-<?php the_ID(); ?>' class='entry-wrapper'>	<!--Entry wrapper-->
	
			<header class='vital-entry-header'>
					<div class='entry-featured-image'>
					<?php if ( has_post_thumbnail() ) : ?>
   						<?php the_post_thumbnail('entry-banner'); ?>
					<?php else : ?>
						<img src="<?php bloginfo('template_url'); ?>/inc/img/placeholder.jpg">
					<?php endif; ?>
							<div class='post-date'>
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

				<span class='entry-info'> <?php vital_post_meta(); ?> </span>

			</header>

			<section class='entry-content'>		
					<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<p><?php echo excerpt(125); ?></p>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'shape' ), 'after' => '</div>' ) ); ?>
					<?php else : ?>
							<p><?php echo excerpt(50); ?></p>
		
					<?php endif; ?>
			</section>

			<footer class='entry-footer'>
						<a class='read-more' href='<?php the_permalink(); ?>'>Read More</a>
			</footer>			
		</article>