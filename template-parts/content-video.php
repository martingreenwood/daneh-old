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

		<header class="page-header">
			<h1>Video Showreels</h1>
			<?php the_content( ); ?>
			<hr>
		</header>

		<center>

			<?php 
			$count = 1;
			$loop = new WP_Query( 
				array( 
					'post_type' 		=> 'videos',
					'posts_per_page' 	=> -1,
				) 
			);
			if ( $loop->have_posts() ) :
				while ( $loop->have_posts() ) : $loop->the_post(); 
				if ($count == 1) {  
				echo "<div class='big'>";
				}
				?>
				<div class="glossy">
					<a href="<?php the_permalink(); ?>">
						<?php the_content(); ?>
					</a>
				</div>
				<?php 
				if ($count == 1) {
				echo "</div>";
				}
				$count++;
				endwhile;

			endif;
			wp_reset_postdata();
			?>
			
		</center>

</article>
