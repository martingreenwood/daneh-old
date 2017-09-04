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
		if ($count%4 == 1) {  
		echo "<div class='row'>";
		}
		?>
		<div class="glossy">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'thumbs' ); ?>
				<div class="overlay">
					<div class="table"><div class="cell middle">
						<?php the_title( ); ?>
					</div></div>
				</div>
			</a>
		</div>
		<?php 
		if ($count%4 == 0) {
		echo "</div>";
		}
		$count++;
		endwhile;
		if ($count%4 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in terms is not a multiple of 4
	endif;
	wp_reset_postdata();
	?>
</article>
