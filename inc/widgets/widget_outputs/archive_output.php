<?php
global $wpdb;
$limit = 0;
$year_prev = null;
$month_prev = null;
$months = $wpdb->get_results(
	"SELECT DISTINCT MONTH( post_date ) AS month , YEAR( post_date ) AS year, post_title
	FROM $wpdb->posts 
	WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' 
	GROUP BY post_title 
	ORDER BY post_date DESC");
	var_dump($months);
		foreach($months as $month) {
			$year_current = $month->year;
			$month_current = $month->month;
				if ($year_current != $year_prev){ 
					if ($year_prev != null){}                             
						printf( __( 
						'<li class="archive-year"> <a href=%1$s/%2$s/>%3$s </a></li>', 'vital' ),
							esc_url( get_bloginfo('wpurl') ),
							esc_attr( $month->year ),
							esc_html( $month->year )
						);    
					}
				if ($month_current != $month_prev) {
						printf( __( 
						'<li><a href=" %1$s/%2$s/%3$s"> <span class="archive-month">%4$s</span></a></li>', 'vital' ),
							esc_url( get_bloginfo('wpurl') ),
							esc_attr( $month->year ),
							esc_attr( date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ),
							esc_html( date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year)) )
						); }


				 echo ('<li>' . $month->post_title . '</li>');

						?><a> <?php // echo $month->post_count; ?> </a><?php
			$month_prev = $month_current;				
			$year_prev = $year_current;
			if(++$limit >= 70) { break; }
		} //endforeach; 
