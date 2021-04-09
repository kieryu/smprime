<?php

add_filter( 'post_link', 'custom_permalink', 10, 3 ); 
add_filter('rewrite_rules_array','wp_insertMyRewriteRules');
add_filter('init','flushRules'); 

function custom_permalink( $permalink, $post, $leavename ) {
  $category = get_the_category($post->ID); 
  if (  !empty($category) && $category[0]->cat_name == "story_covid_response" )
  {
      $permalink = trailingslashit( home_url('story_covid_response/' . $post->post_name ) );
  }
  return $permalink;
}

function flushRules(){
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}

function wp_insertMyRewriteRules($rules)
{
  $newrules = array();
  $newrules['^test/(.*)$'] = 'index.php?name=$matches[1]';
  return $newrules + $rules;
}


// ------------COVID RESPONSONSE CPT ------------

function smph_cpt_stories_covid_response() {
	// Set the labels, this variable is used in the $args array
	$labels = array(
		'name'               => __( 'Covid Response Stories' ),
		'singular_name'      => __( 'Covid Response Story' ),
		'add_new'            => __( 'Add New Covid Response Stories' ),
		'add_new_item'       => __( 'Add New Covid Response Stories' ),
		'edit_item'          => __( 'Edit Covid Response Stories' ),
		'new_item'           => __( 'New Covid Response Stories' ),
		'all_items'          => __( 'All Covid Response Stories' ),
		'view_item'          => __( 'View Covid Response Stories' ),
		'search_items'       => __( 'Search Covid Response Stories' ),
		'featured_image'     => 'Thumbnail',
		'set_featured_image' => 'Add Thumbnail',
	);
	// The arguments for our post type, to be entered as parameter 2 of register_post_type()
	$args = array(
		'labels'            => $labels,
		'description'       => 'Custom Covid Response Stories',
		'public'            => true,
		'menu_position'     => 5,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions'),
		'menu_icon'         => 'dashicons-welcome-write-blog',
		'has_archive'       => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'taxonomies' => array('covid19_response'),
    'has_archive' => 'Covid Response Stories',
		'show_in_menu' => 'stories-sections',	);

	// Call the actual WordPress function
	// Parameter 1 is a name for the post type
	// Parameter 2 is the $args array
	register_post_type( 'story_covid_response', $args);
}
add_action( 'init', 'smph_cpt_stories_covid_response' );
 
function taxonomy_stories_covid_response() {
 
  $labels = array(
    'name' => _x( 'Covid19 Response', 'taxonomy general name' ),
    'singular_name' => _x( 'Covid19 Response', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Covid19 Response  Category', 'stories-sections' ),
    'all_items' => __( 'All Covid19 Response', 'stories-sections' ),
    'parent_item' => __( 'Parent Category', 'stories-sections' ),
    'parent_item_colon' => __( 'Parent Category:', 'stories-sections' ),
    'edit_item' => __( 'Edit Covid19 Response', 'stories-sections' ), 
    'update_item' => __( 'Update Covid19 Response', 'stories-sections' ),
    'add_new_item' => __( 'Add New Covid19 Response', 'stories-sections' ),
    'new_item_name' => __( 'New Covid19 Response Name', 'stories-sections' ),
    'menu_name' => __( 'Covid19 Response', 'stories-sections' ),
  ); 	
 
  register_taxonomy('covid19_response',array('story_covid_response'), array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'capabilities'      => array(
      'assign_terms' => 'manage_options',
      'edit_terms'   => 'administrator',
      'manage_terms' => 'administrator',
    ),
    'rewrite' => array( 'slug' => 'covid19_response' ),
  ));
}
add_action( 'init', 'taxonomy_stories_covid_response', 0 );

// function wpa_show_permalinks( $post_link, $post ){
//     if ( is_object( $post ) && $post->post_type == 'story_covid_response' ){
//         $terms = wp_get_object_terms( $post->ID, 'covid19_response' );
//         if( $terms ){
//             return str_replace( '%story_covid_response%' , $terms[0]->slug , $post_link );
//         }
//     }
//     return $post_link;
// }
// add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );

// ------------GREEN MOVEMENT CPT ------------

function smph_cpt_stories_green_movement() {
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Green Movement Stories' ),
    'singular_name'      => __( 'Green Movement Story' ),
    'add_new'            => __( 'Add New Green Movement Stories' ),
    'add_new_item'       => __( 'Add New Green Movement Stories' ),
    'edit_item'          => __( 'Edit Green Movement Stories' ),
    'new_item'           => __( 'New Green Movement Stories' ),
    'all_items'          => __( 'All Green Movement Stories' ),
    'view_item'          => __( 'View Green Movement Stories' ),
    'search_items'       => __( 'Search Green Movement Stories' ),
    'featured_image'     => 'Thumbnail',
    'set_featured_image' => 'Add Thumbnail',
  );
  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Custom Green Movement Stories',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions'),
    'menu_icon'         => 'dashicons-welcome-write-blog',
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'show_in_rest'      => true,
    'query_var'         => true,
    'taxonomies' => array('green_movement_stories'),
    'has_archive' => 'Green Movement Stories',
    'show_in_menu' => 'stories-sections',
  );

  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // Parameter 2 is the $args array
  register_post_type( 'story_green_movement', $args);
}
add_action( 'init', 'smph_cpt_stories_green_movement' );
 
function taxonomy_stories_green_movement() {
 
  $labels = array(
    'name' => _x( 'Green Movement', 'taxonomy general name' ),
    'singular_name' => _x( 'Green Movement', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Green Movement  Category', 'stories-sections' ),
    'all_items' => __( 'All Green Movement', 'stories-sections' ),
    'parent_item' => __( 'Parent Category', 'stories-sections' ),
    'parent_item_colon' => __( 'Parent Category:', 'stories-sections' ),
    'edit_item' => __( 'Edit Green Movement', 'stories-sections' ), 
    'update_item' => __( 'Update Green Movement', 'stories-sections' ),
    'add_new_item' => __( 'Add New Green Movement', 'stories-sections' ),
    'new_item_name' => __( 'New Green Movement Name', 'stories-sections' ),
    'menu_name' => __( 'Green Movement', 'stories-sections' ),
  );  
 
  register_taxonomy('green_movement_cat',array('story_green_movement'), array(
    'hierarchical' => true,
    'show_in_rest' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'green_movement_cat' ),
  ));
}
add_action( 'init', 'taxonomy_stories_green_movement', 0 );



function smph_cpt_stories_kasama_sm() {
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Kasama ng SM Stories' ),
    'singular_name'      => __( 'Kasama ng SM Story' ),
    'add_new'            => __( 'Add New Kasama ng SM Stories' ),
    'add_new_item'       => __( 'Add New Kasama ng SM Stories' ),
    'edit_item'          => __( 'Edit Kasama ng SM Stories' ),
    'new_item'           => __( 'New Kasama ng SM Stories' ),
    'all_items'          => __( 'All Kasama ng SM Stories' ),
    'view_item'          => __( 'View Kasama ng SM Stories' ),
    'search_items'       => __( 'Search Kasama ng SM Stories' ),
    'featured_image'     => 'Thumbnail',
    'set_featured_image' => 'Add Thumbnail',
  );
  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Custom Kasama ng SM Stories',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions'),
    'menu_icon'         => 'dashicons-welcome-write-blog',
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'show_in_rest'      => true,
    'query_var'         => true,
    'has_archive' => 'Kasama ng SM Stories',
    'show_in_menu' => 'stories-sections',
  );

  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // Parameter 2 is the $args array
  register_post_type( 'story_kasama_sm', $args);
}
add_action( 'init', 'smph_cpt_stories_kasama_sm' );