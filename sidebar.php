<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Daneh
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<h2 class="togglesidebar">Show Filters</h2>
<aside id="secondary" class="widget-area">
	<div class="wrap">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->
