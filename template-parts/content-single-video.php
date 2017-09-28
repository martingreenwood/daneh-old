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

	<div class="video-peice">

		<header>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<hr>
		</header>

		<?php
			the_content();
		?>
	</div>

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
			<div class="glossy">
				<a href="<?php the_permalink(); ?>">
					<?php if (has_post_thumbnail( )): ?>
						<?php the_post_thumbnail( 'video' ); ?>
					<?php else: ?>
						<img src="http://placehold.it/600x400" alt="">
					<?php endif; ?>
				</a>
			</div>
			<?php 
			$count++;
			endwhile;

		endif;
		wp_reset_postdata();
		?>
		
		</div>
	</center>

</article>
