<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />

		<title>
			<?php
				/*
				* Print the <title> tag based on what is being viewed.
				*/
				global $page, $paged;
				 
				wp_title( '|', true, 'right' );
				 
				// Add the blog name.
				bloginfo( 'name' );
				 
				// Add the blog description for the home/front page.
				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
				 
				// Add a page number if necessary:
				if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'vital' ), max( $paged, $page ) );
				 
			?>
		</title>
		
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">

		<!--Main Header Start-->
		   	<header id="main-header" class="site-header" role="mainheader">

		   		<!--Navigatoion Start-->

		   			<!-- This shithole needs to be changed -->
					<nav id="primary-menu" class="main-menu-wrapper" role="menu">		
				    	<?php wp_nav_menu( array( 'theme_location' => 'main_menu',  
				    							'menu_class' => 'main_menu' ) ); ?>
				    </nav>
				 <!--Navigatoion End-->				    					   

			    <!--Banner Start-->
			   		<?php  if(is_single()) : ?>

					<?php if ( has_post_thumbnail() ) : ?>
   						<?php the_post_thumbnail('entry-banner'); ?>
					<?php else : ?>
						<img src="<?php bloginfo('template_url'); ?>/inc/img/placeholder.jpg">
					<?php endif; ?>

					<?php else : ?>
				    	<div id="primary-banner" class="site-banner" role="banner" style="background: #00ff00 url(<?php echo esc_url( get_theme_mod( 'vital_banner' ) ); ?>) no-repeat no-repeat top;">
						<!--Logo Start-->
									<?php if ( get_theme_mod( 'vital_logo' ) ) : ?>
			    						<div class='site-logo-wrapper'>
									        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' 
									       		title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' 
									        	rel='home'>
									        	
										      	<img src='<?php echo esc_url( get_theme_mod( 'vital_logo' ) ); ?>'
										        	alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
									        </a>
									    </div>
									<?php else : ?>
									    	<div class='site-logo-wrapper'>
									        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' 
									       		title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' 
									        	rel='home'>
									        <img src=''
									        	alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
									        </a>
									    </div>
									<?php endif; ?>
								<!--Logo End-->			 
				    	</div>

				    <?php endif; ?>
	 			<!--Banner End-->

			</header>
		<!--Main Header End-->

	<div id="main" class="site-main">
		
