<?php

// ============= CPT REPORTS ============= 
require get_template_directory() . '/inc/custom_post_type/reports.php';
// ============= CPT STORIES ============= 
require get_template_directory() . '/inc/custom_post_type/stories.php';
// ============= CPT MEDIA ============= 
require get_template_directory() . '/inc/custom_post_type/media.php';
// ============= CPT INVESTORS ============= 
require get_template_directory() . '/inc/custom_post_type/investors.php';
// ============= CPT ABOUT US ============= 
require get_template_directory() . '/inc/custom_post_type/about-us.php';
// ============= CPT SUSTAINABILITY ============= 
require get_template_directory() . '/inc/custom_post_type/sustainability.php';

// ------------REMOVE POST TYPE ------------
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

