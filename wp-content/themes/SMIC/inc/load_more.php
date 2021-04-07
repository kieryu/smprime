<?php

function more_post_ajax(){

    $taxonomy = (isset($_POST['taxonomy'])) ? $_POST['taxonomy'] : '' ;
    $terms_id = (isset($_POST['terms_id'])) ? $_POST['terms_id'] : '' ;
    $post_type = (isset($_POST['post_type'])) ? $_POST['post_type'] : '' ;
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    header("Content-Type: text/html");

    if($taxonomy && $terms_id) {
        $args = array(
            'suppress_filters' => true,
            'post_status' => 'publish', 
            'posts_per_page' => $ppp,
            'post_type' => $post_type,
            'paged'    => $page,
            'order_by' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'terms'    => $terms_id,
                ),
            ),
        );

    } else {
        $args = array(
            'suppress_filters' => true,
            'post_status' => 'publish', 
            'posts_per_page' => $ppp,
            'paged'    => $page,
            'post_type' => $post_type,
            'order_by' => 'date',
            'order' => 'DESC',
        );
    }


    $loop = new WP_Query($args);

    $out = '';

		if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();

        if($post_type == 'videos') {
            
            if(strpos(get_fields(get_the_id(),'video_link')['video_link'], 'youtube') !== false) { 

                $out .= '<div class="col-md-4">
                            <a data-fancybox href="'.get_fields(get_the_id(),'video_link')['video_link'].'"  class="other-articles-wrapper">
                                <div class="img-wrapper">'.get_the_post_thumbnail(get_the_id(),'full').'</div>
                                <div class="other-articles-info">
                                    <p class="time">'.get_the_time('l, M j, Y').'</p>
                                    <p class="other-articles-title">'.esc_html( get_the_title() ).'</p>
                                </div>
                            </a>
                        </div>';

            } else {

                $out .= '<div class="col-md-4">
                            <a href="'.get_fields(get_the_id(),'video_link')['video_link'].'"  class="other-articles-wrapper" target="_blank">
                                <div class="img-wrapper">'.get_the_post_thumbnail(get_the_id(),'full').'</div>
                                <div class="other-articles-info">
                                    <p class="time">'.get_the_time('l, M j, Y').'</p>
                                    <p class="other-articles-title">'.esc_html( get_the_title() ).'</p>
                                </div>
                            </a>
                        </div>';
            }

        } else {

            $out .= '<div class="col-md-4 "><a href="'.get_the_permalink().'" class="other-articles-wrapper">
    				<div class="img-wrapper">'.get_the_post_thumbnail(get_the_id(),'full').'</div>
    						<div class="other-articles-info">
    							<p class="time">'.get_the_time('l, M j, Y').'</p>
    							<p class="other-articles-title">'.esc_html( get_the_title() ).'</p>
    						</div>
    				</a></div>';

        }

    endwhile; 
  	endif; 
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


function more_post_ajax_list(){

    $post_type = (isset($_POST['post_type'])) ? $_POST['post_type'] : '' ;
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_status' => 'publish', 
        'posts_per_page' => $ppp,
        'paged'    => $page,
        'post_type' => $post_type,
        'order_by' => 'date',
        'order' => 'DESC',
    );


    $loop = new WP_Query($args);

    $out = '';

    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();

        if(get_fields(get_the_id(),'file')['file']['url']) {

            $out .= '<a href="'.get_fields(get_the_id(),'file')['file']['url'].'" target="_blank" class="list-style-wrapper">
                        <div class="date">
                            <p class="day-month">'.get_the_time('d M ').'</p>
                            <p class="year">'.get_the_time('Y').'</p>
                        </div>
                        <p class="title">'.get_the_title().'</p>
                    </a>';
        } else {
            $out .= '<a href="'.get_the_permalink().'" target="_blank" class="list-style-wrapper">
                        <div class="date">
                            <p class="day-month">'.get_the_time('d M ').'</p>
                            <p class="year">'.get_the_time('Y').'</p>
                        </div>
                        <p class="title">'.get_the_title().'</p>
                    </a>';
        }


    endwhile; 
    endif; 
    wp_reset_postdata();
    die($out);

}

add_action('wp_ajax_nopriv_more_post_ajax_list', 'more_post_ajax_list');
add_action('wp_ajax_more_post_ajax_list', 'more_post_ajax_list');


function pagination_ajax_list() {

    global $wpdb;

    $post_type = $_POST['post_type'];
    $taxonomy_id = $_POST['taxonomy_id'];
    $taxonomy_type = $_POST['taxonomy_type'];
    $post_year = $_POST['post_year'];

    // Set default variables
    $msg = '';

    if(isset($_POST['page'])){
        // Sanitize the received page   
        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = 10;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;

        // Set the table where we will be querying data
        $table_name = $wpdb->prefix . "posts";

        // Query the necessary posts
        // $all_blog_posts = $wpdb->get_results($wpdb->prepare("
        //     SELECT * FROM " . $table_name . " WHERE post_type = 'financial_reports' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );

        // At the same time, count the number of queried posts
        // $count = $wpdb->get_var($wpdb->prepare("
        //     SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = '".$post_type."' AND post_status = 'publish'", array() ) );

        /**
         * Use WP_Query:
         */
        $all_blog_posts_args = array(
            'post_type'         => $post_type,
            'post_status '      => 'publish',
            'orderby'           => 'post_date',
            'order'             => 'DESC',
            'posts_per_page'    => $per_page,
            'offset'            => $start,
        );

        $count_args = array(
            'post_type'         => $post_type,
            'post_status '      => 'publish',
            'posts_per_page'    => -1
        );

        if($post_year != 'false') {
            $all_blog_posts_args['date_query'] = array(
                array('year' => $post_year)
            );
            $count_args['date_query'] = array(
                array('year' => $post_year)
            );
        }

        if($taxonomy_type != 'false') {
            $all_blog_posts_args['tax_query'] = array(
                array(
                    'taxonomy' => $taxonomy_type,
                    'terms'    => $taxonomy_id,
                ),
            );
            $count_args['tax_query'] = array(
                array(
                    'taxonomy' => $taxonomy_type,
                    'terms'    => $taxonomy_id,
                ),
            );
        }


        $all_blog_posts = new WP_Query($all_blog_posts_args);
        $count = new WP_Query($count_args);

        $count = $count->found_posts;


        // Loop into all the posts
        if ($all_blog_posts->have_posts()){
         while ($all_blog_posts->have_posts()) : $all_blog_posts->the_post(); $fields = get_fields();
            $msg .= '
            <a href="'.$fields['file']['url'].'" target="_blank" class="list-style-wrapper">
                <div class="title-wrapper">
                    <p class="title">'.get_the_title().'</p>
                    <p class="date">'.get_the_time('M j, Y').'</p>
                </div>
                <i class="fa fa-file-download"></i>
            </a>';
         endwhile;
        }

        // foreach($all_blog_posts as $key => $post): 

        //     print'<pre>';print_r($post);print'</pre>';

        //     // Set the desired output into a variable
        //     $msg .= '
        //     <div class = "col-md-12">       
        //         <h2><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></h2>
        //         <p>' . $post->post_excerpt . '</p>
        //         <p>' . $post->post_content . '</p>
        //     </div>';

        // endforeach;

        // Optional, wrap the output into a container
        // $msg = "<div class='cvf-universal-content'>" . $msg . "</div><br class = 'clear' />";

        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);

        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }

        // Pagination Buttons logic     
        $pag_container .= "
        <div class='cvf-universal-pagination'>
            <ul>";

        // if ($first_btn && $cur_page > 1) {
        //     $pag_container .= "<li p='1' class='active'>First</li>";
        // } else if ($first_btn) {
        //     $pag_container .= "<li p='1' class='inactive'>First</li>";
        // }

        if($no_of_paginations > 1) {
            if ($previous_btn && $cur_page > 1) {
                $pre = $cur_page - 1;
                $pag_container .= "<li p='$pre' class='active'><i class='fa fa-chevron-left'></i> Prev</li>";
            }
            for ($i = $start_loop; $i <= $end_loop; $i++) {

                if ($cur_page == $i)
                    $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
                else
                    $pag_container .= "<li p='$i' class='active'>{$i}</li>";
            }

            if ($next_btn && $cur_page < $no_of_paginations) {
                $nex = $cur_page + 1;
                $pag_container .= "<li p='$nex' class='active'>Next <i class='fa fa-chevron-right'></i></li>";
            }
        }

        // if ($last_btn && $cur_page < $no_of_paginations) {
        //     $pag_container .= "<li p='$no_of_paginations' class='active'>Last</li>";
        // } else if ($last_btn) {
        //     $pag_container .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
        // }

        $pag_container = $pag_container . "
            </ul>
        </div>";

        // We echo the final output
        echo $msg. 
        '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

    }
    // Always exit to avoid further execution
    exit();
}


add_action( 'wp_ajax_nopriv_pagination_ajax_list', 'pagination_ajax_list' );
add_action( 'wp_ajax_pagination_ajax_list', 'pagination_ajax_list' ); 


function pagination_ajax_awards() {

    global $wpdb;

    // Set default variables
    $msg = '';

    if(isset($_POST['page'])){
        // Sanitize the received page   
        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = 6;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;

        // Set the table where we will be querying data
        $table_name = $wpdb->prefix . "posts";

        // Query the necessary posts
        // $all_blog_posts = $wpdb->get_results($wpdb->prepare("
        //     SELECT * FROM " . $table_name . " WHERE post_type = 'financial_reports' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );

        // At the same time, count the number of queried posts
        // $count = $wpdb->get_var($wpdb->prepare("
        //     SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = '".$post_type."' AND post_status = 'publish'", array() ) );

        /**
         * Use WP_Query:
         */
        $all_blog_posts_args = array(
            'post_type'         => 'award_citation',
            'post_status '      => 'publish',
            'orderby'           => 'post_date',
            'order'             => 'DESC',
            'posts_per_page'    => $per_page,
            'offset'            => $start,
        );

        $count_args = array(
            'post_type'         => 'award_citation',
            'post_status '      => 'publish',
            'posts_per_page'    => -1
        );


        $all_blog_posts = new WP_Query($all_blog_posts_args);
        $count = new WP_Query($count_args);

        $count = $count->found_posts;


        // Loop into all the posts
        if ($all_blog_posts->have_posts()){
         while ($all_blog_posts->have_posts()) : $all_blog_posts->the_post(); $fields = get_fields();
            $msg .= '
            <div class="ac-wrapper">
                <div class="ac-wrapper-inner">
                    <div class="img-wrapper">'.get_the_post_thumbnail(get_the_ID(),'full').'</div>
                    <div class="title">'.get_the_title().'</div>
                    <div class="info">'.get_the_content().'</div>
                </div>
            </div>';
         endwhile;
        }

        // foreach($all_blog_posts as $key => $post): 

        //     print'<pre>';print_r($post);print'</pre>';

        //     // Set the desired output into a variable
        //     $msg .= '
        //     <div class = "col-md-12">       
        //         <h2><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></h2>
        //         <p>' . $post->post_excerpt . '</p>
        //         <p>' . $post->post_content . '</p>
        //     </div>';

        // endforeach;

        // Optional, wrap the output into a container
        // $msg = "<div class='cvf-universal-content'>" . $msg . "</div><br class = 'clear' />";

        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);

        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }

        // Pagination Buttons logic     
        $pag_container .= "
        <div class='cvf-universal-pagination'>
            <ul>";

        // if ($first_btn && $cur_page > 1) {
        //     $pag_container .= "<li p='1' class='active'>First</li>";
        // } else if ($first_btn) {
        //     $pag_container .= "<li p='1' class='inactive'>First</li>";
        // }

        if($no_of_paginations > 1) {
            if ($previous_btn && $cur_page > 1) {
                $pre = $cur_page - 1;
                $pag_container .= "<li p='$pre' class='active'><i class='fa fa-chevron-left'></i> Prev</li>";
            }
            for ($i = $start_loop; $i <= $end_loop; $i++) {

                if ($cur_page == $i)
                    $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
                else
                    $pag_container .= "<li p='$i' class='active'>{$i}</li>";
            }

            if ($next_btn && $cur_page < $no_of_paginations) {
                $nex = $cur_page + 1;
                $pag_container .= "<li p='$nex' class='active'>Next <i class='fa fa-chevron-right'></i></li>";
            }
        }

        // if ($last_btn && $cur_page < $no_of_paginations) {
        //     $pag_container .= "<li p='$no_of_paginations' class='active'>Last</li>";
        // } else if ($last_btn) {
        //     $pag_container .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
        // }

        $pag_container = $pag_container . "
            </ul>
        </div>";

        // We echo the final output
        echo $msg. 
        '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

    }
    // Always exit to avoid further execution
    exit();
}


add_action( 'wp_ajax_nopriv_pagination_ajax_awards', 'pagination_ajax_awards' );
add_action( 'wp_ajax_pagination_ajax_awards', 'pagination_ajax_awards' ); 