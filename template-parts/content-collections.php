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

	<?php 
	$count = 1;
	$terms = get_terms('collection', array(
		'hide_empty' 	=> true,
		'order' 		=> 'DESC'
	));

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		foreach ( $terms as $term ):
		if ($count%4 == 1) {  
		echo "<div class='row'>";
		}
		?>
		<div class="collection">
			<?php $colimage = get_field('taax_image', $term); ?>
			<a href="<?php echo get_term_link( $term ); ?>">
			<img src="<?php echo $colimage['sizes']['collection']; ?>" alt="">
			<div class="overlay">
				<div class="table"><div class="cell middle">
					<?php echo $term->name; ?>
				</div></div>
			</div>
			</a>
		</div>
		<?php
		if ($count%4 == 0) {
		echo "</div>";
		}
		$count++;
		endforeach;
		if ($count%4 != 1) echo "</div>"; //This is to ensure there is no open div if the number of elements in terms is not a multiple of 4
	}
	?>

</article>
