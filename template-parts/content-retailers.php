<?php
/**
 * Template part for displaying retailers
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Daneh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
	$thumb_url = $thumb_url_array[0];
	?>

	<div class="featureimage" style="background-image: url(<?php echo $thumb_url; ?>)">
		
	</div>

	<div class="content">
		<?php
		$count = 1;
		$loop = new WP_Query( 
			array( 
				'post_type' 		=> 'retailers',
				'posts_per_page' 	=> -1,
			) 
		);
		if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post(); 
			if ($count%2 == 1) {  
			echo "<div class='row'>";
			}
			?>
			<div class="retailer">
				<?php if(get_field( 'retailer_url' )): ?>
				<a target="_blank" href="<?php the_field( 'retailer_url' ); ?>">
				<?php endif; ?>
					<p><strong><?php the_title( ); ?></strong></p>
					<?php if(get_field( 'retailer_url' )): ?>
					<p><?php the_field( 'retailer_url' ); ?></p>
					<?php endif; ?>
				<?php if(get_field( 'retailer_url' )): ?>
				</a>
				<?php endif; ?>
			</div>
			<?php 
			if ($count%2 == 0) {
			echo "</div>";
			}
			$count++;
			endwhile;
			if ($count%2 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in terms is not a multiple of 4
		endif;
		wp_reset_postdata();
		?>
	</div>

</article>
