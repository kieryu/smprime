<?php

// ------------SUSTAINABILITY MILESTONES CPT ------------

function smph_cpt_sustainability_milestones() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Sustainability Milestones' ),
		'singular_name'      => __( 'Sustainability Milestone' ),
		'add_new'            => __( 'Add New Sustainability Milestones' ),
		'add_new_item'       => __( 'Add New Sustainability Milestones' ),
		'edit_item'          => __( 'Edit Sustainability Milestones' ),
		'new_item'           => __( 'New Sustainability Milestones' ),
		'all_items'          => __( 'All Sustainability Milestones' ),
		'view_item'          => __( 'View Sustainability Milestones' ),
		'search_items'       => __( 'Search Sustainability Milestones' ),
		'featured_image'     => 'Thumbnail',
		'set_featured_image' => 'Add Thumbnail',
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Sustainability Milestones Post Type',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor', 'thumbnail','revisions'),
		'menu_icon'         => 'dashicons-calendar-alt',
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
	register_post_type( 'sustain_milestones', $args);
}
add_action( 'init', 'smph_cpt_sustainability_milestones' );