<?php
/**
* The Sidebar containing the main widget areas.
*
* @package VitalStructure
* @since VitalStructure 1.0
*/
?>
			



<aside id="secondary" class="widget-area-wrapper" role="complementary">
    <?php do_action( 'before_sidebar' ); ?>
    <!--Default sidebar content-->
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
 
        <aside id="search" class="widget widget_search">
            <?php get_search_form(); ?>
        </aside>
 
        <aside id="archives" class="widget widget_archives">
            <div class="widget-title"><h2><?php _e( 'Archives', 'vital' ); ?></h2></div>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
 
        <aside id="meta" class="widget widget_meta">
            <div class="widget-title"><h2><?php _e( 'Meta', 'vital' ); ?></h2></div>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside><!--End Defaul sidebar content-->
 		
    <?php endif; // end sidebar widget area ?>

</aside><!-- #secondary .widget-area -->

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
 
    	 <aside id="tertiary" class="widget-area" role="supplementary">
    		 <?php dynamic_sidebar( 'sidebar-2' ); ?>
    	 </aside><!-- #tertiary .widget-area -->
 
	<?php endif; ?>
