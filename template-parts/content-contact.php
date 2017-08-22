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

	<div class="content">

		<header>
			<h1>Contact Us</h1>
			<p>Please fill our contact form out and we will get back to you as soon as possible.</p>
			<hr>
		</header>

		<?php the_content(); ?>
	</div>

</article>
