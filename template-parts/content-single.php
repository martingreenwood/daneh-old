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

	<div class="press-peice">

		<header>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<div class="entry-meta">
				<p>Posted on <?php echo get_the_date(); ?></p>
			</div>
			<hr>
		</header>

		<?php
			the_content();
		?>

		<?php if (get_field( 'enable_image_slider' )): ?>
		<section id="slides">
			<?php 
			$images = get_field('image_slider');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if( $images ): 
			foreach( $images as $image ): ?>
			<div class="slide">
				<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			</div>
			<?php endforeach;
			endif; ?>
		</section>
		<?php endif; ?>
	</div>

</article>
