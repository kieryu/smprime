
<?php

	$page_video = isset( $_GET['page_video'] ) ? (int) $_GET['page_video'] : 1;
	$cpt_arg = array(
		'post_type' => 'videos', 
		'post_status' => 'publish', 
  	'posts_per_page' => 6,
  	'order_by' => 'date',
  	'paged' => $page_video,
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>
<?php if ($cpt_query->have_posts()) : ?>
<section class="smph-wrapper multimedia-video">
	
	<div class="smph-inner-subcontainer">
		<div class="section-content">
				
			<div class="row">
					
				<?php  while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>


				<?php if(strpos(get_fields(get_the_id(),'video_link')['video_link'], 'youtube') !== false) { ?>
					<a data-fancybox href="<?= get_fields(get_the_id(),'video_link')['video_link']; ?>"  class="col-md-4 multimedia-video-wrapper">
			  <?php } else { ?>
					<a href="<?= get_fields(get_the_id(),'video_link')['video_link']; ?>" class="col-md-4 multimedia-video-wrapper" target="_blank">
			  <?php } ?>
						<div class="img-wrapper">
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
								<?php the_post_thumbnail('full'); ?>
							<?php } ?> 
						</div>
						<div class="desc">
							<h4 class="title"><?= the_title(); ?></h4>
							<?= the_excerpt(); ?>
						</div>
					</a>
				<?php endwhile; ?>

			</div>

			<div class="pagination">
			    <?php 
            // http://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
            $page_video_args = array(
								'prev_text'    => __('<i class="fa fa-chevron-left"></i> Prev'),
								'next_text'    => __('Next <i class="fa fa-chevron-right"></i>'),
                'format'  => '?page_video=%#%',
                'current' => $page_video,
                'total'   => $cpt_query->max_num_pages,
            );
            echo paginate_links( $page_video_args );
			    ?>
			</div>

		</div>
	</div>
</section>
<?php endif;wp_reset_postdata(); ?>
