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
			<?php the_content(); ?>
			<hr>
		</header>

		<?php do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' ); ?>

		<?php the_field( 'address', 'options' ); ?>
		
	</div>

</article>
