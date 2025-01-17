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

	<div class="row">
		<div class="slide">
		<?php
		// $count = 1;
		// $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$loop = new WP_Query( array( 'post_type' => 'collections', 'posts_per_page' => -1 ) );
		if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post(); 
			
			// if ($count%4 == 1) {  
			// echo "<div class='row'>";
			// }

			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
			$thumb_url = $thumb_url_array[0];
			?>

			<div class="collection" style="background-image: url(<?php echo $thumb_url; ?>)">
				<a href="<?php the_permalink(); ?>">
				<?php //the_post_thumbnail( 'collection' ); ?>
				<div class="overlay">
					<div class="table"><div class="cell middle">
						<?php the_title( ); ?>
					</div></div>
				</div>
				</a>
			</div>
			<?php
			// if ($count%4 == 0) {
			// echo "</div>";
			// }
			// $count++;
			endwhile;
			// if ($count%4 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in terms is not a multiple of 4

		endif;
		wp_reset_postdata();
		?>
		</div>
		<div class="prod-links">
		</div>
	</div>

</article>
