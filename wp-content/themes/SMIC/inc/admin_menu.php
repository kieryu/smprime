<?php

/*
* Adding a menu to contain the custom post types for Reports
*/
 function reports_admin_menu() {

    add_menu_page(
        'Reports',
        'Reports',
        'read',
        'reports-sections',
        '',
        'dashicons-media-spreadsheet',
        21
    );
    add_submenu_page('reports-sections', 'Sustainability Reports Taxonomy', 'Sustainability Reports Taxonomy', 'edit_posts', 'edit-tags.php?taxonomy=reports_year&post_type=sustain_reports',false );

 }

 add_action( 'admin_menu', 'reports_admin_menu' );




 function stories_admin_menu() {

    add_menu_page(
        'Stories',
        'Stories',
        'read',
        'stories-sections',
        '',
        'dashicons-format-aside',
        22
    );
    add_submenu_page('stories-sections', 'Covid19 Response Taxonomy', 'Covid19 Response Taxonomy', 'edit_posts', 'edit-tags.php?taxonomy=covid19_response&post_type=story_covid_response',false );
    add_submenu_page('stories-sections', 'Green Movement Taxonomy', 'Green Movement Taxonomy', 'edit_posts', 'edit-tags.php?taxonomy=green_movement_cat&post_type=story_green_movement',false );

 }

 add_action( 'admin_menu', 'stories_admin_menu' );




 function media_type_admin_menu() {

    add_menu_page(
        'Media Type',
        'Media Type',
        'read',
        'media-type-sections',
        '',
        'dashicons-media-video',
        23
    );
    add_submenu_page('media-type-sections', 'Story Taxonomy', 'Story Taxonomy', 'edit_posts', 'edit-tags.php?taxonomy=taxonomy_media_stories&post_type=stories',false );

 }

 add_action( 'admin_menu', 'media_type_admin_menu' );


 function investors_type_admin_menu() {

    add_menu_page(
        'Investors Type',
        'Investors Type',
        'read',
        'investor-type-sections',
        '',
        'dashicons-media-video',
        24
    );
    add_submenu_page('investor-type-sections', 'Financial Reports Taxonomy', 'Financial Reports Taxonomy', 'edit_posts', 'edit-tags.php?taxonomy=reports_type&post_type=financial_reports',false );

 }

 add_action( 'admin_menu', 'investors_type_admin_menu' );