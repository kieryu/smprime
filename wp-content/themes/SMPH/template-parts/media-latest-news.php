
<?php
	/* DISPLAY PRESS RELEASE */
	$paged2 = isset( $_GET['paged2'] ) ? (int) $_GET['paged2'] : 1;
			$post_year = isset($_GET['post_year']) ? (int) $_GET['post_year'] : '';
	$cpt_arg = array(
		'post_type' => 'latest_news', 
		'post_status' => 'publish', 
  	'posts_per_page' => 10,
  	'order_by' => 'date',
  	'paged' => $paged2,
		'order' => 'DESC'
	);
  if($post_year) {
      $cpt_arg['date_query'] = array(
          array('year' => $post_year)
      );
  }
  $cpt_query = new WP_Query($cpt_arg);

	$post_count = $cpt_query->found_posts;

?>

<div id="latestNews" class="media-tabs-wrapper">
	<div class="smph-center-container">
		<div class="ajax-posts">
			<?php if ($cpt_query->have_posts()){  ?>
				<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
					<!-- <?php if(get_fields(get_the_id(),'file')['file']) { ?>

					<?php } else { ?>

					<?php } ?> -->
					<a href="<?= the_permalink(); ?>" class="list-style-wrapper">
						<div class="date">
							<p class="day-month"><?= the_time('d M '); ?></p>
							<p class="year"><?= the_time('Y'); ?></p>
						</div>
						<div class="info-wrapper">
							<p class="title"><?= the_title(); ?></p>
							<div class="excerpt">
								<?= the_excerpt(); ?>
							</div>
						</div>
					</a>
				<?php endwhile; ?>

				<div class="pagination">
				    <?php 
	            // http://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
	            $pag_args2 = array(
									'prev_text'    => __('<i class="fa fa-chevron-left"></i> Prev'),
									'next_text'    => __('Next <i class="fa fa-chevron-right"></i>'),
	                'format'  => '?paged2=%#%',
	                'current' => $paged2,
	                'total'   => $cpt_query->max_num_pages,
	            );
	            echo paginate_links( $pag_args2 );
				    ?>
				</div>

				<?php wp_reset_postdata(); ?>

			<?php } else { ?>
				<p class="no-post">No Content Found.</p>
			<?php } ?>
		</div>
	</div>
</div>