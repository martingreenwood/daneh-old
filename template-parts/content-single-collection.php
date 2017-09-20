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


	<header class="page-header">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<hr>
	</header>

	<div class="collections">

		<?php
		$collection_gallery = get_field( 'gallery' );
		$size = 'full'; // (thumbnail, medium, large, full or custom size)

		if( $collection_gallery ): ?>
		<ul class="items">			
			<?php foreach( $collection_gallery as $image ): ?>
			<li>
				<a class="gallery" rel="my-gallery" href="<?php echo wp_get_attachment_image_url( $image['ID'], $size ); ?>">
					<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>

	</div>

</article>
