<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Daneh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
	$home_page_box_image = get_field( 'home_page_box_image' );
	$home_page_tall_image = get_field( 'home_page_tall_image' );
	?>

	<div id="home_page_box_image" class="coverimage" style="background-image: url(<?php echo $home_page_box_image; ?>)">
		
	</div>

	<div id="home_page_tall_image" class="coverimage" style="background-image: url(<?php echo $home_page_tall_image; ?>)">
		
	</div>

</article>
