
<?php
	/* DISPLAY PRESS RELEASE */
	$paged3 = isset( $_GET['paged3'] ) ? (int) $_GET['paged3'] : 1;
	$cpt_arg = array(
		'post_type' => 'speeches', 
		'post_status' => 'publish', 
  	'posts_per_page' => 10,
  	'order_by' => 'date',
  	'paged' => $paged3,
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

	$post_count = $cpt_query->found_posts;

?>

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
					</div>
				</a>
			<?php endwhile; ?>

			<div class="pagination">
			    <?php 
            // http://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
            $pag_args3 = array(
								'prev_text'    => __('<i class="fa fa-chevron-left"></i> Prev'),
								'next_text'    => __('Next <i class="fa fa-chevron-right"></i>'),
                'format'  => '?paged3=%#%',
                'current' => $paged3,
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