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
	if (get_field( 'images_video' )):
	$home_page_box_image = get_field( 'home_page_box_image' );
	$home_page_tall_image = get_field( 'home_page_tall_image' );
	?>
	<div id="home_page_box_image" class="coverimage <?php if (get_field( 'mobile_image_overide' )): ?>hideonmobile <?php endif; ?> <?php if(!$home_page_tall_image): ?>wide<?php endif; ?>" style="background-image: url(<?php echo $home_page_box_image; ?>)"></div>

	<?php if (get_field( 'mobile_image_overide' )): ?>
	<div id="home_page_box_image_mobile" class="coverimage" style="background-image: url(<?php echo get_field( 'mobile_image' ); ?>)"></div>
	<?php endif ?>

	<?php if ($home_page_tall_image): ?>
	<div id="home_page_tall_image" class="coverimage <?php if (get_field( 'mobile_image_overide' )):?>hideonmobile<?php endif; ?>" style="background-image: url(<?php echo $home_page_tall_image; ?>)"></div>
	<?php endif ?>

	<?php else: ?>

	<div id="video">
		<video poster="<?php echo get_field( 'home_page_video_fallback' ); ?>" id="bgvid" playsinline autoplay muted loop>
		<!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
		<source src="<?php echo get_field( 'home_page_video_webm' ); ?>" type="video/webm">
		<source src="<?php echo get_field( 'home_page_video' ); ?>" type="video/mp4">
		</video>	
	</div>

	<?php endif; ?>

</article>
