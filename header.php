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
<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>
	<div id="page" class="hfeed site">

		<!--Main Header Start-->
		   	<header id="main-header" class="vital-main-header" role="mainheader">

		   		<!--Navigatoion Start-->

					<nav id="primary-menu" class="main-menu-wrapper js_primary_menu" role="menu">
						<button id='js_menu_button' class='c-hamburger c-hamburger--htla'>
	  						<span></span>
						</button>		
				    	<?php wp_nav_menu( array( 'theme_location' => 'main_menu',  
				    							'menu_class' => 'main-menu' ) ); ?>
				    		
				    </nav>
				 <!--Navigatoion End-->				    					   

			    <!--Banner Start-->
				    	<div id="primary-banner" class="site-banner" role="banner" style="background: url(<?php echo esc_url( get_theme_mod( 'vital_banner' ) ); ?>) no-repeat no-repeat center; background-size: cover;">
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
									<?php endif; ?>
								<!--Logo End-->			 
				    	</div>
	 			<!--Banner End-->

			</header>
		<!--Main Header End-->

	<div id="main" class="site-main">
