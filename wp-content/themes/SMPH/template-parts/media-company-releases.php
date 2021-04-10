
<?php
	/* DISPLAY PRESS RELEASE */
	$paged1 = isset( $_GET['paged1'] ) ? (int) $_GET['paged1'] : 1;
	$post_year = isset($_GET['post_year']) ? (int) $_GET['post_year'] : '';

	$cpt_arg = array(
		'post_type' => 'company_releases', 
		'post_status' => 'publish', 
  	'posts_per_page' => 10,
  	'order_by' => 'date',
  	'paged' => $paged1,
		'order' => 'DESC'
	);

  if($post_year) {
      $cpt_arg['date_query'] = array(
          array('year' => $post_year)
      );
  }
  $cpt_query = new WP_Query($cpt_arg);

?>

<div id="companyRelease" class="media-tabs-wrapper active">
	<div class="smph-center-container">
		<div class="ajax-posts">
			<?php if ($cpt_query->have_posts()){  ?>
				<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
					<?php if(get_fields(get_the_id(),'file')['file']) { ?>
						<a href="<?= get_fields(get_the_id(),'file')['file']['url']; ?>" target="_blank" class="list-style-wrapper">
					<?php } else { ?>
						<a href="<?= the_permalink(); ?>" class="list-style-wrapper">
					<?php } ?>
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
	            $pag_args1 = array(
									'prev_text'    => __('<i class="fa fa-chevron-left"></i> Prev'),
									'next_text'    => __('Next <i class="fa fa-chevron-right"></i>'),
	                'format'  => '?paged1=%#%',
	                'current' => $paged1,
	                'total'   => $cpt_query->max_num_pages,
	            );
	            echo paginate_links( $pag_args1 );
				    ?>
				</div>

				<?php wp_reset_postdata(); ?>
			<?php } else { ?>
				<p class="no-post">No Content Found.</p>
			<?php } ?>
		</div>
	</div>
</div>