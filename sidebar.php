<?php
/**
* The Sidebar containing the main widget areas.
*
* @package Shape
* @since Shape 1.0
*/
?>
			



<aside id="secondary" class="secondary-area" role="complementary">
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
 
        <aside id="search" class="widget widget_search">
            <?php get_search_form(); ?>
        </aside>
 
        <aside id="archives" class="widget">
            <div class="widget-title"><h2><?php _e( 'Archives', 'shape' ); ?></h2></div>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
 
        <aside id="meta" class="widget">
            <div class="widget-title"><h2><?php _e( 'Meta', 'shape' ); ?></h2></div>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul></aside>
 
    <?php endif; // end sidebar widget area ?>

    <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
 
     <div id="tertiary" class="widget-area" role="supplementary">
      <?php dynamic_sidebar( 'sidebar-2' ); ?>
     </div><!-- #tertiary .widget-area -->
 
	<?php endif; ?>

</aside><!-- #secondary .widget-area -->

