<?php


// ------------ AWARDS AND CITATIONS CPT -------------

function smph_cpt_award_citation() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Awards and Citations' ),
		'singular_name'      => __( 'Award and Citation' ),
		'add_new'            => __( 'Add New Awards and Citations' ),
		'add_new_item'       => __( 'Add New Awards and Citations' ),
		'edit_item'          => __( 'Edit Awards and Citations' ),
		'new_item'           => __( 'New Awards and Citations' ),
		'all_items'          => __( 'All Awards and Citations' ),
		'view_item'          => __( 'View Awards and Citations' ),
		'search_items'       => __( 'Search Awards and Citations' ),
		'featured_image'     => 'Thumbnail',
		'set_featured_image' => 'Add Thumbnail',
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Awards and Citations Post Type',
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
		'menu_position' => 25
	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'award_citation', $args);
}
add_action( 'init', 'smph_cpt_award_citation' );


// ------------ AWARDS AND CITATIONS CPT -------------

function smph_cpt_history() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Our History' ),
		'singular_name'      => __( 'Our History' ),
		'add_new'            => __( 'Add New Our History' ),
		'add_new_item'       => __( 'Add New Our History' ),
		'edit_item'          => __( 'Edit Our History' ),
		'new_item'           => __( 'New Our History' ),
		'all_items'          => __( 'All Our History' ),
		'view_item'          => __( 'View Our History' ),
		'search_items'       => __( 'Search Our History' ),
		'featured_image'     => 'Thumbnail',
		'set_featured_image' => 'Add Thumbnail',
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Our History Post Type',
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
		'menu_position' => 25
	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'our_history', $args);
}
add_action( 'init', 'smph_cpt_history' );


// ------------BOARD OF DIRECTORS CPT ------------
function smph_cpt_board_of_directors() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Board of Directors' ),
		'singular_name'      => __( 'Board of Director' ),
		'add_new'            => __( 'Add New Board of Directors' ),
		'add_new_item'       => __( 'Add New Board of Directors' ),
		'edit_item'          => __( 'Edit Board of Directors' ),
		'new_item'           => __( 'New Board of Directors' ),
		'all_items'          => __( 'All Board of Directors' ),
		'view_item'          => __( 'View Board of Directors' ),
		'search_items'       => __( 'Search Board of Directors' ),
		'featured_image'     => 'Thumbnail',
		'set_featured_image' => 'Add Thumbnail',
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Board of Directors Post Type',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor', 'thumbnail','revisions'),
		'menu_icon'         => 'dashicons-businessperson',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'public' => true,  // it's not public, it shouldn't have it's own permalink, and so on
		'publicly_queryable' => true,  // you should be able to query it
		'show_ui' => true,  // you should be able to edit it in wp-admin
		'exclude_from_search' => true,  // you should exclude it from search results
		'show_in_nav_menus' => true,  // you shouldn't be able to add it to menus
		'has_archive' => true,  // it shouldn't have archive page
		'rewrite' => true,  // it shouldn't have rewrite rules
	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'board_directors', $args);
}
add_action( 'init', 'smph_cpt_board_of_directors' );