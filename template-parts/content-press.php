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

	<div class="content">

		<header>
			<h1>Recent Press</h1>
			<?php the_content(); ?>
			<hr>
		</header>
	</div>

	<div class="container">

	<?php
	$count = 1;
	$loop = new WP_Query( 
		array( 
			'post_type' 		=> 'press',
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
			<?php $pressfile = get_field( 'press_pdf' ); ?>
			<a href="<?php the_permalink(); ?>">
				<?php if(has_post_thumbnail(  )): ?>
					<?php the_post_thumbnail( 'full' ); ?>
				<?php else: ?>
					<img src="http://www.danehdesign.com/wp-content/uploads/2017/11/daneh.jpg" alt="">
				<?php endif; ?>
				<h3><?php the_title( ); ?></h3>
				<h6><?php echo get_the_date( ); ?></h6>
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
	</div>

</article>
