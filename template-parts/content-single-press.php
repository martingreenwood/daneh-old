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
				<p><?php echo get_the_date(); ?></p>
			</div>
			<hr>
		</header>

		<?php
			the_content();
		?>

		<a class="backup" href="<?php echo home_url( 'press'); ?>">Back to Press</a>

	</div>

	<div class="news-links">
		<p class="prev">
			<span><?php previous_post_link( "%link Prev" ); ?></span>
		</p>
		<p class="next">
			<span><?php next_post_link( "Next %link" ); ?></span>
		</p>
	</div>

</article>
