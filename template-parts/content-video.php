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

		<center>
			<div class="wrapper">

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
				?>
				<?php if ($count == 1): ?>
				<div class="row">
				<?php endif; ?>
					<div class="<?php if ($count == 1): ?>feat<?php else: ?>glossy<?php endif; ?>">
						<?php if ($count == 1): ?>
							<header class="page-header ">
								<h1 class="entry-title"><?php the_title(  ) ?></h1>
							</header>
							<?php the_content( ); ?>
						<?php else: ?>
						<a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail( )): ?>
								<?php the_post_thumbnail( 'video' ); ?>
								<h3><?php the_title( ); ?></h3>
							<?php else: ?>
								<img src="http://placehold.it/600x400" alt="">
								<h3><?php the_title( ); ?></h3>
							<?php endif; ?>
						</a>
						<?php endif; ?>
					</div>
				<?php if ($count == 1): ?>
				</div>
				<?php endif; ?>
				<?php 
				$count++;
				endwhile;

			endif;
			wp_reset_postdata();
			?>
			
			</div>
		</center>

</article>
