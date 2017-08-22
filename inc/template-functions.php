<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Daneh
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function daneh_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'daneh_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function daneh_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'daneh_pingback_header' );

/**
 * Add an ACF options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	
}


/**
 * Custom post types
 *
 * @package wccc
 */
	

// Creating a Custom Post Type is blissfully simple ...
// Simply add your Post Types to the $cpts array.
// The first descriptor should be lowercase and plural
// The second descriptor should be singular and title case
// The third descriptor should be plural and title case     


global $cpts;

$cpts = array(
	array(
		'collections',
		'Collection',
		'Collections',
		'dashicons-nametag',
		array('title','editor','thumbnail'),
		array('slug' => 'collection','with_front' => false),
	),
	array(
		'videos',
		'Video',
		'Videos',
		'dashicons-video-alt3',
		array('title','editor','thumbnail'),
		array('slug' => 'video','with_front' => false),
	),
);


function cpts_register() {

	global $cpts;
	
	foreach($cpts as $cpt){
		
		// $cpt[0] = Name
		// $cpt[1] = Singular
		// $cpt[2] = Plural
		// $cpt[3] = image / icon
		// $cpt[4] = supports
		// $cpt[5] = rewrite

		$labels = array(
	  	'name' 					=> _x($cpt[2], 'post type general name'),
	    'singular_name' 		=> _x( $cpt[1], 'post type singular name'),
	    'add_new' 				=> _x('Add New', $cpt[0]),
	    'add_new_item' 			=> __('Add New '.$cpt[1]),
	    'edit_item' 			=> __('Edit '.$cpt[1]),
	    'new_item' 				=> __('New '.$cpt[1]),
	    'view_item' 			=> __('View '.$cpt[1]),
	    'search_items' 			=> __('Search '.$cpt[2]),
	    'not_found' 			=>  __('No '.$cpt[2].' Found'),
	    'not_found_in_trash' 	=> __('No '.$cpt[2].' Found in Trash'), 
	    'parent_item_colon' 	=> '',
	  );
	  $args = array(
	  	'labels' 				=> $labels,
	    'public' 				=> true,
	    'show_ui' 				=> true,
	    'publicly_queryable' 	=> true,
	    'query_var' 			=> true,
	    'capability_type' 		=> 'page',
	    'hierarchical' 			=> false,
	    'rewrite' 				=> $cpt[5],
	    'show_in_rest' 			=> true,
	    'supports' 				=> $cpt[4],
	    'menu_icon'   			=> $cpt[3],
		);

		register_post_type($cpt[0], $args );
		
	}
}

//create Products custom post type
add_action('init', 'cpts_register');

// function _wccc_taxonomies() {
//     register_taxonomy(
//         'filter',
//         'players',
//         array(
//             'labels' => array(
//                 'name' => 'Filter',
//                 'add_new_item' => 'Add Filter',
//                 'new_item_name' => "New Filter"
//             ),
//             'show_ui' => true,
//             'show_tagcloud' => false,
//             'hierarchical' => true
//         )
//     );
// }

// add_action( 'init', '_wccc_taxonomies', 0 );