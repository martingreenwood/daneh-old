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

	<div class="table">
		<div class="cell middle">

			<div class="entry-content">
				<center>
				<?php the_content(); ?>
				</center>
			</div>

		</div>
	</div>

</article>
