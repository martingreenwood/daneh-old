<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Daneh
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

			<div class="content">

				<header class="page-header">
					<h1>Diary</h1>
					<hr>
				</header>

			</div>

			<div class="row">
			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );
				
				endwhile;

			endif; ?>
			</div>

		</main>
	</div>

<?php
get_footer();
