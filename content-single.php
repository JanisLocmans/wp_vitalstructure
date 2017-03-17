		<article id='post-<?php the_ID(); ?>' class='entry-wrapper'>	<!--Entry wrapper-->
	
			<header>
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

			</header>

			<section class='entry-content-single'>		
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'vital' ), 'after' => '</div>' ) ); ?>
			</section>

			<footer class='entry-footer'>
						<span class='entry-info'> <?php vital_post_meta(); ?> </span>
			</footer>			
		</article>