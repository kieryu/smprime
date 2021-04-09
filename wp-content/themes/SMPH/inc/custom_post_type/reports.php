<?php


// ------------SUSTAINABILITY REPORTS CPT ------------

function smph_cpt_sustainability_reports() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Sustainability Reports' ),
		'singular_name'      => __( 'Sustainability Report' ),
		'add_new'            => __( 'Add New Sustainability Reports' ),
		'add_new_item'       => __( 'Add New Sustainability Reports' ),
		'edit_item'          => __( 'Edit Sustainability Reports' ),
		'new_item'           => __( 'New Sustainability Reports' ),
		'all_items'          => __( 'All Sustainability Reports' ),
		'view_item'          => __( 'View Sustainability Reports' ),
		'search_items'       => __( 'Search Sustainability Reports' ),
		'featured_image'     => 'Thumbnail',
		'set_featured_image' => 'Add Thumbnail',
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Sustainability Reports Post Type',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor', 'thumbnail','revisions'),
		'menu_icon'         => 'dashicons-welcome-add-page',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
		'publicly_queryable' => true,  // you should be able to query it
		'show_ui' => true,  // you should be able to edit it in wp-admin
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
		'has_archive' => false,  // it shouldn't have archive page
		'rewrite' => false,  // it shouldn't have rewrite rules
		'show_in_menu' => 'reports-sections',
		'taxonomies' => array('reports_year'),
	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'sustain_reports', $args);
}
add_action( 'init', 'smph_cpt_sustainability_reports' );
 
//create a custom taxonomy name it "Report Year" for your posts
function taxonomy_sustainability_reports() {
 
  $labels = array(
    'name' => _x( 'Reports Year', 'taxonomy general name' ),
    'singular_name' => _x( 'Report Year', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Reports Year' ),
    'all_items' => __( 'All Reports Year' ),
    'parent_item' => __( 'Parent Reports Year' ),
    'parent_item_colon' => __( 'Parent Report Year:' ),
    'edit_item' => __( 'Edit Report Year' ), 
    'update_item' => __( 'Update Report Year' ),
    'add_new_item' => __( 'Add New Report Year' ),
    'new_item_name' => __( 'New Report Year Name' ),
    'menu_name' => __( 'Reports Year' ),
  ); 	
 
  register_taxonomy('reports_year',array('sustain_reports'), array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'reports_year' ),
  ));
}
// Create Taxonomy for Custom Post Type
add_action( 'init', 'taxonomy_sustainability_reports', 0 );

// ------------ANNUAL REPORTS CPT ------------
function smph_cpt_annual_reports() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Annual Reports' ),
		'singular_name'      => __( 'Annual Report' ),
		'add_new'            => __( 'Add New Annual Reports' ),
		'add_new_item'       => __( 'Add New Annual Reports' ),
		'edit_item'          => __( 'Edit Annual Reports' ),
		'new_item'           => __( 'New Annual Reports' ),
		'all_items'          => __( 'All Annual Reports' ),
		'view_item'          => __( 'View Annual Reports' ),
		'search_items'       => __( 'Search Annual Reports' ),
		'featured_image'     => 'Thumbnail',
		'set_featured_image' => 'Add Thumbnail',
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Annual Reports Post Type',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor', 'thumbnail','revisions'),
		'menu_icon'         => 'dashicons-welcome-add-page',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
		'publicly_queryable' => true,  // you should be able to query it
		'show_ui' => true,  // you should be able to edit it in wp-admin
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
		'has_archive' => false,  // it shouldn't have archive page
		'rewrite' => false,  // it shouldn't have rewrite rules
		'show_in_menu' => 'reports-sections',
	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'annual_reports', $args);
}
add_action( 'init', 'smph_cpt_annual_reports' );


