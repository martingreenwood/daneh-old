<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<?php /* ?>
<script>
jQuery(function( $ ) {
	var keymap = {};

	// LEFT
	keymap[ 37 ] = ".prev a";
	// RIGHT
	keymap[ 39 ] = ".next a";

	$( document ).on( "keyup", function(event) {
		var href,
		    selector = keymap[ event.which ];
		// if the key pressed was in our map, check for the href
		if ( selector ) {
			href = $( selector ).attr( "href" );
			if ( href ) {
				// navigate where the link points
				window.location = href;
			}
		}
	});
});
</script>
<?php */ ?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>

	<div class="featureimage" style="background-image: url(<?php  echo $image[0]; ?>);">
		<div class="table">
			<div class="cell middle">
				<?php woocommerce_show_product_images(); ?>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="table">
			<div class="cell middle">
				<div class="summary entry-summary">

					<?php
						/**
						 * woocommerce_single_product_summary hook.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
						
						add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 65 );
						add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 70 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
						remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
						remove_action( 'woocommerce_single_product_summary', 'WC_Structured_Data::generate_product_data()', 60 );
						do_action( 'woocommerce_single_product_summary' );
					?>

				</div>
			</div>
		</div>
	</div>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
