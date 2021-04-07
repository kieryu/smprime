
<?php
	/* DISPLAY PRESS RELEASE */
	$page_speeches = isset( $_GET['page_speeches'] ) ? (int) $_GET['page_speeches'] : 1;
	$cpt_arg = array(
		'post_type' => 'speeches', 
		'post_status' => 'publish', 
  	'posts_per_page' => 10,
  	'order_by' => 'date',
  	'paged' => $page_speeches,
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

	$post_count = $cpt_query->found_posts;

?>
<section class="media-tabs-content smph-wrapper speeches-wrapper-container pt-0">
	<div class="smph-center-container">
		<div id="speeches" class="media-tabs-wrapper">
			<div class="ajax-posts">
				<?php if ($cpt_query->have_posts()){  ?>
					<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
						<a href="<?= get_fields(get_the_id(),'file')['file']['url']; ?>" target="_blank" class="list-style-wrapper">
							<div class="date">
								<p class="day-month"><?= the_time('d M '); ?></p>
								<p class="year"><?= the_time('Y'); ?></p>
							</div>
							<div class="info-wrapper">
								<p class="title"><?= the_title(); ?></p>
								<div class="excerpt">
									<?= the_excerpt(); ?>
								</div>
								<i class="fa fa-file-download"></i>
							</div>
						</a>
					<?php endwhile; ?>

					<div class="pagination">
					    <?php 
		            // http://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
		            $pag_args3 = array(
										'prev_text'    => __('<i class="fa fa-chevron-left"></i> Prev'),
										'next_text'    => __('Next <i class="fa fa-chevron-right"></i>'),
		                'format'  => '?page_speeches=%#%',
		                'current' => $page_speeches,
		                'total'   => $cpt_query->max_num_pages,
		            );
		            echo paginate_links( $pag_args3 );
					    ?>
					</div>

					<?php wp_reset_postdata(); ?>
				<?php } else { ?>
					<p class="no-post">No Content Found.</p>
				<?php } ?>
			</div>
		</div>
	</div>
</section>