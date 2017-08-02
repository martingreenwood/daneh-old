<?php
/**
 * Custom stuff for this theme and woocommerce
 *
 * @package Daneh
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
	?>
	<div id="primary" class="content-area container">
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

function daneh_custom_post_type()
{
	register_post_type('retailers',
		[
			'labels'      => [
				'name'          => __('Retailers'),
				'singular_name' => __('Retailer'),
			],
			'public'      => true,
			'has_archive' => flase,
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
			'has_archive' => flase,
			'menu_icon'   => 'dashicons-book',
			'supports'    => array( 'title', 'thumbnail' ),
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



// REMOVE SHIT

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_price', 10 );

remove_action( 'woocommerce_after_shop_loop_item' , 'woocommerce_template_loop_add_to_cart', 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar'	, 10 );

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