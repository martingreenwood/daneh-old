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

	<div class="featureimage">
		<?php
		$collection_gallery = get_field( 'gallery' );
		$size = 'full'; // (thumbnail, medium, large, full or custom size)

		if( $collection_gallery ): ?>

		<div style="width:100%; height: 100%;">
		    <div id="ninja-slider" style="float:left;">
		        <div class="slider-inner">
		            <ul>
						<?php foreach( $collection_gallery as $image ): ?>
						<li>
							<a class="ns-img" href="<?php echo wp_get_attachment_image_url( $image['ID'], $size ); ?>"></a>
							<!-- <a class="gallery" rel="my-gallery">
								<?php //echo wp_get_attachment_image( $image['ID'], $size ); ?>
							</a> -->
						</li>
						<?php endforeach; ?>
		            </ul>
		            <div class="fs-icon" title="Expand/Close"></div>
		        </div>
		    </div>
		    <div id="thumbnail-slider" style="float:left;">
		        <div class="inner">
		            <ul>
						<?php foreach( $collection_gallery as $image ): ?>
						<li>
		                    <a class="thumb" href="<?php echo wp_get_attachment_image_url( $image['ID'], $size ); ?>"></a>
		                </li>
						<?php endforeach; ?>
		            </ul>
		        </div>
		    </div>
		    <div style="clear:both;"></div>
		</div>

		<!-- <ul class="items">			
			<?php //foreach( $collection_gallery as $image ): ?>
			<li>
				<a class="gallery" rel="my-gallery" href="<?php //echo wp_get_attachment_image_url( $image['ID'], $size ); ?>">
					<?php //echo wp_get_attachment_image( $image['ID'], $size ); ?>
				</a>
			</li>
			<?php //endforeach; ?>
		</ul>
		<?php endif; ?> -->
	</div>

	<div class="content">
		<div class="table">
			<div class="cell middle">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			</div>
		</div>
	</div>

</article>
