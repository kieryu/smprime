<?php


// ------------FINANCIAL REPORTS CPT ------------

function smph_cpt_financial_reports() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Financial Reports' ),
		'singular_name'      => __( 'Financial Report' ),
		'add_new'            => __( 'Add New Financial Reports' ),
		'add_new_item'       => __( 'Add New Financial Reports' ),
		'edit_item'          => __( 'Edit Financial Reports' ),
		'new_item'           => __( 'New Financial Reports' ),
		'all_items'          => __( 'All Financial Reports' ),
		'view_item'          => __( 'View Financial Reports' ),
		'search_items'       => __( 'Search Financial Reports' ),
		'featured_image'     => 'Thumbnail',
		'set_featured_image' => 'Add Thumbnail',
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Financial Reports Post Type',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title','revisions' ),
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
		'show_in_menu' => 'investor-type-sections',
		'taxonomies' => array('reports_type'),
	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'financial_reports', $args);
}
add_action( 'init', 'smph_cpt_financial_reports' );
 
//create a custom taxonomy name it "Report Year" for your posts
function taxonomy_financial_reports() {
 
  $labels = array(
    'name' => _x( 'Reports Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Report Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Reports Type' ),
    'all_items' => __( 'All Reports Type' ),
    'parent_item' => __( 'Parent Reports Type' ),
    'parent_item_colon' => __( 'Parent Report Type:' ),
    'edit_item' => __( 'Edit Report Type' ), 
    'update_item' => __( 'Update Report Type' ),
    'add_new_item' => __( 'Add New Report Type' ),
    'new_item_name' => __( 'New Report Type Name' ),
    'menu_name' => __( 'Reports Type' ),
  ); 	
 
  register_taxonomy('reports_type',array('financial_reports'), array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'reports_type' ),
  ));
}
// Create Taxonomy for Custom Post Type
add_action( 'init', 'taxonomy_financial_reports', 0 );



function smph_cpt_inv_presentations() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Investor Presentations' ),
		'singular_name'      => __( 'Investor Presentations' ),
		'add_new'            => __( 'Add New Investor Presentations' ),
		'add_new_item'       => __( 'Add New Investor Presentations' ),
		'edit_item'          => __( 'Edit Investor Presentations' ),
		'new_item'           => __( 'New Investor Presentations' ),
		'all_items'          => __( 'All Investor Presentations' ),
		'view_item'          => __( 'View Investor Presentations' ),
		'search_items'       => __( 'Search Investor Presentations' ),
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Investor Presentations',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title' ,'revisions'),
		'menu_icon'         => 'dashicons-welcome-write-blog',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
    'has_archive' => 'Investor Presentations',
		'show_in_menu' => 'investor-type-sections',	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'inv_presentations', $args);
}
add_action( 'init', 'smph_cpt_inv_presentations' );


function smph_cpt_corp_disclosure() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Corporate Disclosure' ),
		'singular_name'      => __( 'Corporate Disclosure' ),
		'add_new'            => __( 'Add New Corporate Disclosure' ),
		'add_new_item'       => __( 'Add New Corporate Disclosure' ),
		'edit_item'          => __( 'Edit Corporate Disclosure' ),
		'new_item'           => __( 'New Corporate Disclosure' ),
		'all_items'          => __( 'All Corporate Disclosure' ),
		'view_item'          => __( 'View Corporate Disclosure' ),
		'search_items'       => __( 'Search Corporate Disclosure' ),
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Corporate Disclosure',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title','revisions' ),
		'menu_icon'         => 'dashicons-welcome-write-blog',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
    'has_archive' => 'Corporate Disclosure',
		'show_in_menu' => 'investor-type-sections',	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'corp_disclosure', $args);
}
add_action( 'init', 'smph_cpt_corp_disclosure' );