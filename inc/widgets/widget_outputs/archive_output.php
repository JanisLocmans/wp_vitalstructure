<?php
global $wpdb;
$limit = 0;
$count = 0;
$current_year = null;
$prev_year = null;
$current_month = null;
$prev_month = null;


$months = $wpdb->get_results(
	"SELECT DISTINCT MONTH( post_date ) AS month , YEAR( post_date ) AS year, post_title, post_name
	FROM $wpdb->posts 
	WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' 
	GROUP BY post_title 
	ORDER BY post_date DESC");

foreach($months as $month) {
	$current_year = $month->year;

	$post_month_url = get_bloginfo('wpurl') . '/' .
					$month->year . '/' .
					date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) . '/';
	$post_month_html = date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year));

	$post_year_url = get_bloginfo('wpurl'). '/' . $month->year;

	if ($current_year != $prev_year && $prev_year === null){
		echo('<div class="archive_year_wrapper">' . '<a>' .  $month->year . '</a>');
	} else if ($current_year != $prev_year){
		echo('</div>' . '</div>' . '<div class="archive_year_wrapper">' . '<a>' .  $month->year . '</a>');
		$prev_month = null;
	}

	$current_month = $month->month;
	if ($current_month != $prev_month && $prev_month === null) {
		echo('<div class="archive_month_wrapper">' . '<a href="'. $post_month_url .'">' . $post_month_html . '</a>');
	} else if ($current_month != $prev_month){
		echo('</div>' . '<div class="archive_month_wrapper">' . '<a href="'. $post_month_url .'">' . $post_month_html . '</a>');
	}
	echo ('<span class="archive_post_link">' .'<a href="'. $post_month_url . '/' . $month->post_name . '">' . $month->post_title . '</a>' . '</span>');

		$prev_month = $current_month;
		$prev_year = $current_year;

	if(++$limit >= 999) { break; } 

}

echo ('</span>'. '' . '</span>' . ''); 

?>

