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
				the_title( '<h1 class="entry-title">', '</h1>' );
			?>
			<!-- <p><?php the_date(); ?></p> -->
			<hr>
		</header>

		<?php
			the_content();
		?>

		<?php if (get_field( 'enable_image_slider' )): ?>
		<div class="wrapper">
			<section id="slides">
				<?php 
				$images = get_field('image_slider');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $images ): 
				foreach( $images as $image ): ?>
				<div class="image">
					<a class="gallery" rel="my-gallery" href="<?php echo $image['url']; ?>">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					</a>
				</div>
				<?php endforeach;
				endif; ?>
			</section>
			<div class="prod-links">
			</div>
		</div>
		<?php endif; ?>

	</div>

	<div class="news-links">
		<p class="prev">
			<?php next_post_link( "%link" ); ?>
		</p>
		<p class="next">
			<?php previous_post_link( "%link" ); ?>
		</p>
	</div>
</article>
