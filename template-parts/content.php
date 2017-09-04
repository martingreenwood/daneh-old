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

	<a href="<?php the_permalink(); ?>">
		
		<?php the_post_thumbnail( 'thumbs' ); ?>

		<div class="overlay">
			<div class="table"><div class="cell middle">
				<h3><?php the_title( ); ?></h3>
				<small><?php echo get_the_date(); ?></small>
			</div></div>
		</div>
	</a>

</article>
