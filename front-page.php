<?php
/**
 * The template for displaying the front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Daneh
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'home' );

			endwhile;
			?>

		</main>
	</div>

<?php
get_footer();
