<?php
/**
 * Custom stuff for this theme and woocommerce
 *
 * @package Daneh
 */

// add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
// add_theme_support( 'wc-product-gallery-slider' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
	<?php
}

function my_theme_wrapper_end() {
	?>
		</div>
	</div>
	<?php
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function my_custom_wc_get_variations_args( $args ) {
    $args['order'] = 'ASC';
    return $args;
}
add_filter( 'woocommerce_ajax_admin_get_variations_args', 'my_custom_wc_get_variations_args' );

function daneh_custom_post_type()
{
	register_post_type('retailers',
		[
			'labels'      => [
				'name'          => __('Retailers'),
				'singular_name' => __('Retailer'),
			],
			'public'      => true,
			'has_archive' => false,
			'menu_icon'   => 'dashicons-store',
		]
	);

	register_post_type('press',
		[
			'labels'      => [
				'name'          => __('Press'),
				'singular_name' => __('Press'),
			],
			'public'      => true,
			'has_archive' => false,
			'menu_icon'   => 'dashicons-book',
			'supports'    => array( 'title', 'thumbnail', 'editor' ),
		]
	);
}
add_action( 'init', 'daneh_custom_post_type') ;


add_action( 'init', 'daneh_custom_taxonomy_collection' );

function daneh_custom_taxonomy_collection()  {
	$labels = array(
		'name'                       => 'Collections',
		'singular_name'              => 'Collection',
		'menu_name'                  => 'Collections',
		'all_items'                  => 'All Collections',
		'parent_item'                => 'Parent Collection',
		'parent_item_colon'          => 'Parent Collection:',
		'new_item_name'              => 'New Collection Name',
		'add_new_item'               => 'Add New Collection',
		'edit_item'                  => 'Edit Collection',
		'update_item'                => 'Update Collection',
		'separate_items_with_commas' => 'Separate Collection with commas',
		'search_items'               => 'Search Collection',
		'add_or_remove_items'        => 'Add or remove Collection',
		'choose_from_most_used'      => 'Choose from the most used Collections',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud' 			 => false,
		'rewrite'      				 => array('slug' => 'collections', 'with_front' => true)
	);
	
	register_taxonomy( 'collection', 'product', $args );
	register_taxonomy_for_object_type( 'collection', 'product' );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 6; // 3 products per row
	}
}


// REMOVE SHIT

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_rating', 5 );
// remove_action( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_price', 10 );

remove_action( 'woocommerce_after_shop_loop_item' , 'woocommerce_template_loop_add_to_cart', 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar'	, 10 );
add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 0 );

add_action( 'init', 'bbloomer_remove_sidebar_product_pages' );
function bbloomer_remove_sidebar_product_pages() {
	if (is_product()) {
		remove_action('woocommerce_sidebar','woocommerce_get_sidebar',0);
	}
}

add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );


/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function woo_hide_page_title() {
	
	return false;
	
}


/**
 * daneh_des_product
 *
 * Adds the "product" description on the main product page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function daneh_des_product() {
	the_excerpt();
}
add_action( 'woocommerce_single_product_summary', 'daneh_des_product', 40 );

/**
 * daneh_prod_collection
 *
 * Adds the "product" collection on the main product page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function daneh_prod_collection() {
	the_terms( get_the_ID(), 'collection', '<h2 class="prod-terms">', ' - ', '</h2>' );
}
add_action( 'woocommerce_single_product_summary', 'daneh_prod_collection', 20 );


/**
 * wc_next_prev_products_links
 *
 * Add previous and next links to products under the product details
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
add_action( 'woocommerce_after_single_product_summary', 'wc_next_prev_products_links', 60 );
function wc_next_prev_products_links() {
	?>
	<div class="prod-links">
    	<p class="prev"><?php previous_post_link( '%link', '' ); ?></p>
		<p class="next"><?php next_post_link( '%link', '' ); ?></p>
	</div>
	<?php
}


/**
 * new_loop_shop_per_page
 *
 * change number of products per page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = -1;
  return $cols;
}


function add_tcs() {
	?>
		<div class='button-wrapper'><a target='_blank' href='<?php echo home_url( 'shipping' ); ?>'>Shipping &amp; Returns</a></div>
	<?php
}


/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'menu-1' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'Daneh');
		$start_shopping = __('Start shopping', 'Daneh');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'Daneh'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		 if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

			$menu_item .= $cart_contents;
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		}
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}