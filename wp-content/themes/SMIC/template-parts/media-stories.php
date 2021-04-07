
<div id="stories" class="media-tabs-wrapper">

		<?php
			/* DISPLAY FEATURED POST */
			$paged4 = isset( $_GET['paged4'] ) ? (int) $_GET['paged4'] : 1;
			$post_year = isset($_GET['post_year']) ? (int) $_GET['post_year'] : '';


			$cpt_arg = array(
				'post_type' => 'stories', 
				'post_status' => 'publish', 
		  	'posts_per_page' => 9,
		  	'order_by' => 'date',
		  	'paged' => $paged4,
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

		<div class="content-wrapper other-articles">
			<div class="smph-inner-subcontainer">
				<div class="content-title-wrapper">
					<h2 class="page-title">Stories</h2>
				</div>

				<div class="content-body">
					<?php if ($cpt_query->have_posts()) :  ?>
						<div id="ajaxPosts" class="row">
							<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
								<div class="col-md-4">
									<a href="<?= the_permalink(); ?>" class="other-articles-wrapper">
										<div class="img-wrapper">
											<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
												<?php the_post_thumbnail('full'); ?>
											<?php } ?> 								 
									 	</div>
									 	<div class="other-articles-info">
									 		<?php $taxonomy = get_the_terms( $post->ID, 'taxonomy_media_stories' ); ?>
									 		<?php if($taxonomy): ?>
									 			<?php if($taxonomy[0]->slug != 'no-category'): ?>
											 		<p class="post-type"><?= $taxonomy[0]->name; ?></p>
											 	<?php endif; ?>
										 	<?php endif; ?>
										 	<p  class="other-articles-title"><?= the_title(); ?></p>
										 	<p class="time"><?= the_time('l, M j, Y'); ?></p>
										 	<!-- <div class="excerpt">
											 	<?= the_excerpt(); ?>
										 	</div> -->
									 	</div>
								 	</a>
								</div>
					    <?php endwhile;  ?>
						</div>
					<?php endif; ?>

					<div class="pagination">
					    <?php 
		            // http://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
		            $pag_args1 = array(
										'prev_text'    => __('<i class="fa fa-chevron-left"></i> Prev'),
										'next_text'    => __('Next <i class="fa fa-chevron-right"></i>'),
		                'format'  => '?paged4=%#%',
		                'current' => $paged4,
		                'total'   => $cpt_query->max_num_pages,
		            );
		            echo paginate_links( $pag_args1 );
					    ?>
					</div>

					<?php wp_reset_postdata(); ?>
				</div>

			</div>
		</div>
</div>