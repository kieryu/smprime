<?php



// ------------PRESS RELEASE  CPT ------------

function smph_cpt_press_release() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Press Release' ),
		'singular_name'      => __( 'Press Release' ),
		'add_new'            => __( 'Add New Press Release' ),
		'add_new_item'       => __( 'Add New Press Release' ),
		'edit_item'          => __( 'Edit Press Release' ),
		'new_item'           => __( 'New Press Release' ),
		'all_items'          => __( 'All Press Release' ),
		'view_item'          => __( 'View Press Release' ),
		'search_items'       => __( 'Search Press Release' ),
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Press Release',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor','excerpt','revisions'),
		'menu_icon'         => 'dashicons-welcome-write-blog',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
    'has_archive' => 'Press Release',
		'show_in_menu' => 'media-type-sections',	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'press_release', $args);
}
add_action( 'init', 'smph_cpt_press_release' );



// ------------STORIES CPT ------------

function smph_cpt_stories() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Stories' ),
		'singular_name'      => __( 'Story' ),
		'add_new'            => __( 'Add New Stories' ),
		'add_new_item'       => __( 'Add New Stories' ),
		'edit_item'          => __( 'Edit Stories' ),
		'new_item'           => __( 'New Stories' ),
		'all_items'          => __( 'All Stories' ),
		'view_item'          => __( 'View Stories' ),
		'search_items'       => __( 'Search Stories' ),
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Stories',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor','thumbnail','excerpt','revisions'),
		'menu_icon'         => 'dashicons-welcome-write-blog',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'taxonomies' => array('taxonomy_media_stories'),
    'has_archive' => 'Stories',
		'show_in_menu' => 'media-type-sections',	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'stories', $args);
}
add_action( 'init', 'smph_cpt_stories' );
 
function taxonomy_media_stories() {
 
  $labels = array(
    'name' => _x( 'Media Stories', 'taxonomy general name' ),
    'singular_name' => _x( 'Media Stories', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Media Stories  Category', 'media-type-sections' ),
    'all_items' => __( 'All Media Stories', 'media-type-sections' ),
    'parent_item' => __( 'Parent Category', 'media-type-sections' ),
    'parent_item_colon' => __( 'Parent Category:', 'media-type-sections' ),
    'edit_item' => __( 'Edit Media Stories', 'media-type-sections' ), 
    'update_item' => __( 'Update Media Stories', 'media-type-sections' ),
    'add_new_item' => __( 'Add New Media Stories', 'media-type-sections' ),
    'new_item_name' => __( 'New Media Stories Name', 'media-type-sections' ),
    'menu_name' => __( 'Media Stories', 'media-type-sections' ),
  ); 	
 
  register_taxonomy('taxonomy_media_stories',array('stories'), array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'taxonomy_media_stories' ),
  ));
}
add_action( 'init', 'taxonomy_media_stories', 0 );
 


// ------------Videos CPT ------------

function smph_cpt_videos() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Videos' ),
		'singular_name'      => __( 'Video' ),
		'add_new'            => __( 'Add New Videos' ),
		'add_new_item'       => __( 'Add New Videos' ),
		'edit_item'          => __( 'Edit Videos' ),
		'new_item'           => __( 'New Videos' ),
		'all_items'          => __( 'All Videos' ),
		'view_item'          => __( 'View Videos' ),
		'search_items'       => __( 'Search Videos' ),
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Videos',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'thumbnail','excerpt','revisions'),
		'menu_icon'         => 'dashicons-video-alt2',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
    'has_archive' => 'Videos',
		'show_in_menu' => 'media-type-sections',	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'videos', $args);
}
add_action( 'init', 'smph_cpt_videos' );


// ------------LATEST NEWS CPT ------------

function smph_cpt_latest_news() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Latest News' ),
		'singular_name'      => __( 'Latest News' ),
		'add_new'            => __( 'Add New Latest News' ),
		'add_new_item'       => __( 'Add New Latest News' ),
		'edit_item'          => __( 'Edit Latest News' ),
		'new_item'           => __( 'New Latest News' ),
		'all_items'          => __( 'All Latest News' ),
		'view_item'          => __( 'View Latest News' ),
		'search_items'       => __( 'Search Latest News' ),
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Latest News',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor','thumbnail','excerpt','revisions'),
		'menu_icon'         => 'dashicons-welcome-write-blog',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
    'has_archive' => 'Latest News',
		'show_in_menu' => 'media-type-sections',	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'latest_news', $args);
}
add_action( 'init', 'smph_cpt_latest_news' );


// ------------SPEECHES CPT ------------

function smph_cpt_speeches() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Speeeches' ),
		'singular_name'      => __( 'Speeeches' ),
		'add_new'            => __( 'Add New Speeeches' ),
		'add_new_item'       => __( 'Add New Speeeches' ),
		'edit_item'          => __( 'Edit Speeeches' ),
		'new_item'           => __( 'New Speeeches' ),
		'all_items'          => __( 'All Speeeches' ),
		'view_item'          => __( 'View Speeeches' ),
		'search_items'       => __( 'Search Speeeches' ),
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Speeeches',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title','excerpt','revisions'),
		'menu_icon'         => 'dashicons-welcome-write-blog',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
    'has_archive' => 'Speeeches',
		'show_in_menu' => 'media-type-sections',	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'speeches', $args);
}
add_action( 'init', 'smph_cpt_speeches' );