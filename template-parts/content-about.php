<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Daneh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
	$thumb_url = $thumb_url_array[0];

	$bottom_image = get_field( 'bottom_image' );
	?>

	<div class="featureimage" style="background-image: url(<?php echo $thumb_url; ?>)">
		
	</div>

	<div class="content">
		<div class="split top">
			<?php the_content(); ?>
		</div>
		<div class="split bottom" style="background-image: url(<?php echo $bottom_image; ?>)">
			
		</div>
	</div>

</article>
