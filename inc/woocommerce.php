<?php
/**
 * Custom stuff for this theme and woocommerce
 *
 * @package Daneh
 */

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
		]
	);
}
add_action('init', 'daneh_custom_post_type');


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
		'show_tagcloud'              => true,
	);
	
	register_taxonomy( 'collection', 'product', $args );
	register_taxonomy_for_object_type( 'collection', 'product' );
}

