
<div id="videos" class="media-tabs-wrapper">
	<div class="smph-inner-subcontainer">

	<?php

		$cpt_arg = array(
			'post_type' => 'videos', 
			'post_status' => 'publish', 
			// 'meta_key' => 'featured-post',
			// 'meta_value' => 'yes',
	  	'posts_per_page' => 3,
	  	'order_by' => 'date',
		 	// 'orderby' => 'modified',
			'order' => 'DESC'
		);
	  $cpt_query = new WP_Query($cpt_arg);
	  $ctr = 0;
	  $indicators = '';

	?>

	<?php if ($cpt_query->have_posts()) {  ?>
		<div class="content-wrapper">
			<div class="content-title-wrapper">
				<h2 class="page-title">Featured Video</h2>
			</div>

			<div class="content-body">
				<div id="featuredVideos" class="carousel slide featured-carousel" data-ride="carousel">

					  <div class="carousel-inner">
							<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
					  		<?php $active = ($ctr == 0) ? 'active' : ''; ?>
						    <div class="carousel-item <?= $active ?>">
						    	<div class="latest-update-wrapper">
							    	<div class="left-content img-wrapper">
											<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
												<?php the_post_thumbnail('full'); ?>
											<?php } ?> 
							    	</div>
									  <div class="right-content media-content">
									  	<p class="time"><?= the_time('l, M j, Y'); ?></p>
									    <h3 class="title"><a href="<?= the_permalink(); ?>" ><?= the_title(); ?></a></h3>
											<?php  ?>
											<?php if(strpos(get_fields(get_the_id(),'video_link')['video_link'], 'youtube') !== false) { ?>
										    <a data-fancybox href="<?= get_fields(get_the_id(),'video_link')['video_link']; ?>" class="smph-btn blue-btn">Watch Video</a>
										  <?php } else { ?>
										    <a href="<?= get_fields(get_the_id(),'video_link')['video_link']; ?>" class="smph-btn blue-btn" target="_blank">Watch Video</a>
										  <?php } ?>
									  </div>
								  </div>
						    </div>
								<?php $indicators .= '<li data-target="#featuredVideos" data-slide-to="'.$ctr.'" class="'.$active.'">'; ?>
								<?php $ctr++; ?>
					    <?php endwhile;  ?>
					  </div>
					  <?php if($ctr > 1): ?>
						  <ol class="carousel-indicators">
						  	<?= $indicators; ?>
						  </ol>
						<?php endif; ?>
				</div>
			</div>
		</div>

		<?php
			/* DISPLAY FEATURED POST */
			$cpt_arg = array(
				'post_type' => 'videos', 
				'post_status' => 'publish', 
		  	'offset' => 3,
		  	'posts_per_page' => 6,
		  	'order_by' => 'date',
				'order' => 'DESC'
			);
		  $cpt_query = new WP_Query($cpt_arg);

			$post_count = $cpt_query->found_posts;

		?>

		<div class="content-wrapper other-articles">
			<div class="content-title-wrapper">
				<h2 class="page-title">Other Videos</h2>
			</div>

			<div class="content-body">
				<?php if ($cpt_query->have_posts()) :  ?>
					<div id="ajaxPosts" class="row ajax-posts">
						<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
							<div class="col-md-4">

								<?php if(strpos(get_fields(get_the_id(),'video_link')['video_link'], 'youtube') !== false) { ?>
									<a data-fancybox href="<?= get_fields(get_the_id(),'video_link')['video_link']; ?>"  class="other-articles-wrapper">
							  <?php } else { ?>
									<a href="<?= get_fields(get_the_id(),'video_link')['video_link']; ?>" class="other-articles-wrapper" target="_blank">
							  <?php } ?>
									<div class="img-wrapper">
										<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
											<?php the_post_thumbnail('full'); ?>
										<?php } ?> 								 
								 	</div>
								 	<div class="other-articles-info">
									 	<p class="time"><?= the_time('l, M j, Y'); ?></p>
									 	<p  class="other-articles-title"><?= the_title(); ?></p>
								 	</div>
							 	</a>
							</div>
				    <?php endwhile;  ?>
					</div>
					<?php if($post_count > 6) : ?>
						<div class="load-more-wrapper">
							<div id="more_posts" data-taxonomy="" data-terms=""  data-termsid="" data-post="videos" class="smph-btn blue-btn load-more-btn more-posts-media">Load More</div>
						</div>
					<?php endif; ?> 
				<?php endif; wp_reset_postdata(); ?>
			</div>
		</div>

	<?php wp_reset_postdata(); } else { ?>
		<p class="no-post">No Content Found.</p>
	<?php } ?>
</div>
</div>