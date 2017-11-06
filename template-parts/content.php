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

	<div class="newsbox">
		<div class="table"><div class="cell middle">

			<a href="<?php the_permalink(  ); ?> ">
			<div class="image half">
				<?php the_post_thumbnail( '' ); ?>
			</div>

			<div class="title half">
				<header>
					<?php
						the_title( '<h1 class="entry-title">', '</h1>' );
					?>
					<!-- <p><?php the_date(); ?></p> -->
					<!-- <hr> -->
				</header>
			</div>
			</a>

		</div></div>
	</div>

</article>
