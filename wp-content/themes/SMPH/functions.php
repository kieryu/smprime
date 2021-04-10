<?php 

include_once('acf-repeater/acf-repeater.php');

// Get Menu Walker
require get_template_directory() . '/classes/menu_walker.php';


require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/custom_post_types.php';
require get_template_directory() . '/inc/breadcrumbs.php';
require get_template_directory() . '/inc/admin_menu.php';
require get_template_directory() . '/inc/load_more.php';

// Register Styles
function smph_register_styles() {

	$version = wp_get_theme()->get( 'Version' ); 
	wp_enqueue_style('smph-bootstrap', get_template_directory_uri() . "/assets/libraries/bootstrap/css/bootstrap.min.css", array(), '4.4.1', 'all');
	wp_enqueue_style('smph-fontawesome', "https://use.fontawesome.com/releases/v5.8.2/css/all.css");
	wp_enqueue_style('smph-slick', get_template_directory_uri() . "/assets/libraries/slick/slick.css", array(), '1.8.1', 'all');
	wp_enqueue_style('smph-slick-theme', get_template_directory_uri() . "/assets/libraries/slick/slick-theme.css", array(), '1.8.1', 'all');
	wp_enqueue_style('smph-fancybox', get_template_directory_uri() . "/assets/libraries/fancybox/dist/jquery.fancybox.min.css", array(), '3.5.7', 'all');
	wp_enqueue_style('smph-style', get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style('smph-animate', get_template_directory_uri() . "/assets/libraries/animate.css", array(), $version, 'all');
    wp_enqueue_style('annual-style', get_template_directory_uri() . "/assets/css/annual/annual.css", array(), $version, 'all');

}
add_action( 'wp_enqueue_scripts', 'smph_register_styles' );

// Register Scripts
function smph_register_scripts() {

	$version = wp_get_theme()->get( 'Version' ); 
	wp_enqueue_script('smph-jquery', get_template_directory_uri() . "/assets/libraries/jquery-3.5.1.min.js" , array(), '3.5.1', true ) ;
	wp_enqueue_script('smph-popper', get_template_directory_uri() . "/assets/libraries/popper.min.js" , array(), '1.16.0', true ) ;
	wp_enqueue_script('smph-bootstrap', get_template_directory_uri() . "/assets/libraries/bootstrap/js/bootstrap.min.js" , array(), '4.4.1', true ) ;
	wp_enqueue_script('smph-slick', get_template_directory_uri() . "/assets/libraries/slick/slick.min.js" , array(), '4.4.1', true ) ;
  wp_enqueue_script('smph-fancybox', get_template_directory_uri() . "/assets/libraries/fancybox/dist/jquery.fancybox.min.js" , array(), '3.5.7', true ) ;
  wp_enqueue_script('smph-wow', get_template_directory_uri() . "/assets/libraries/wow.min.js" , array(), $version, true ) ;
  wp_enqueue_script('smph-counterup',get_template_directory_uri() . "/assets/libraries/counterup2-1.0.1.min.js",array(),'1.0.0',true);
  wp_enqueue_script('smph-waypoint','https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js',array(),'4.0.1',true);
  wp_enqueue_script('smph-global', get_template_directory_uri() . "/assets/js/global.js" , array(), $version, true ) ;
	wp_localize_script( 'smph-global', 'ajax_posts', array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
  ));

}
add_action( 'wp_enqueue_scripts', 'smph_register_scripts' );

function smph_theme_support() {
	// Adds Dynamic title tag support
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
  $custom_logo_defaults = array(
    'height'      => 100,
    'width'       => 300,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $custom_logo_defaults );
}
add_action('after_setup_theme', 'smph_theme_support');


function smph_menus() {
	$menu_locations = array(
		'main_header' => 'Main Header',
    'quicklinks'  => 'Footer Quicklinks',
    'footer_third_menu'  => 'Footer Third Menu',
    'footer_fourth_menu'  => 'Footer Fourth Menu',
    'sm_footer' => 'Social Media Footer'
	); 
	register_nav_menus($menu_locations);
}
add_action('init', 'smph_menus');

// add necessary scripts
add_action('plugins_loaded', function(){
  if($GLOBALS['pagenow']=='post.php'){
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles',  'my_admin_styles');
  }
});

// Adding excerpt for page
add_post_type_support( 'page', 'excerpt' );

function my_excerpt_length($length){
return 30;
}
add_filter('excerpt_length', 'my_excerpt_length');

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Get all years posts publish;
function get_posts_years_array($post_type) {

    global $wpdb;
    $result = array();

    $query_prepare = $wpdb->prepare("SELECT YEAR(post_date) as year FROM ($wpdb->posts) WHERE post_status = 'publish' AND post_type = %s GROUP BY YEAR(post_date) DESC", $post_type);

    $years = $wpdb->get_results($query_prepare);

    if ( is_array( $years ) && count( $years ) > 0 ) {
        foreach ( $years as $year ) {
            $result[] = json_decode(json_encode($year), true);
        }
    }

    return $result;
}

// Get all years posts publish;
function get_media_years_array() {

    global $wpdb;
    $result = array();

    $query_prepare = $wpdb->prepare("SELECT YEAR(post_date) as year FROM ($wpdb->posts) WHERE post_status = 'publish' AND post_type IN('press_release','stories','latest_news') GROUP BY YEAR(post_date) DESC");

    $years = $wpdb->get_results($query_prepare);

    if ( is_array( $years ) && count( $years ) > 0 ) {
        foreach ( $years as $year ) {
            $result[] = json_decode(json_encode($year), true);
        }
    }

    return $result;
}

// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

function so48515097_cf7_select_values($tag)
{
    if ($tag['basetype'] != 'select') {
        return $tag;
    }

    $values = [];
    $labels = [];
    foreach ($tag['raw_values'] as $raw_value) {
        $raw_value_parts = explode('|', $raw_value);
        if (count($raw_value_parts) >= 2) {
            $values[] = $raw_value_parts[1];
            $labels[] = $raw_value_parts[0];
        } else {
            $values[] = $raw_value;
            $labels[] = $raw_value;
        }
    }
    $tag['values'] = $values;
    $tag['labels'] = $labels;

    // Optional but recommended:
    //    Display labels in mails instead of values
    //    You can still use values using [_raw_tag] instead of [tag]
    $reversed_raw_values = array_map(function ($raw_value) {
        $raw_value_parts = explode('|', $raw_value);
        return implode('|', array_reverse($raw_value_parts));
    }, $tag['raw_values']);
    $tag['pipes'] = new \WPCF7_Pipes($reversed_raw_values);

    return $tag;
}
add_filter('wpcf7_form_tag', 'so48515097_cf7_select_values', 10);

