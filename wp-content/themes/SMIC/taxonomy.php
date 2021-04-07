<?php get_header(); ?>

<?php 
	$term = get_queried_object();
	$taxonomy_name = $term->taxonomy;
	$taxonomy = $term->name;
	$term_id = $term->term_id;
	$image = get_field('banner_image', $term);

	$post_type = get_taxonomy( $taxonomy_name );
	$post_type = $post_type->object_type;
	
	$classArticle = '';

?>

<section class="inside-pages-banner">
	<img src="<?php echo $image['url']; ?>" alt="">
	<div class="banner-content">
		<h2 class="banner-title"><?= $taxonomy; ?></h2>
	</div>
	<div class="shadow"></div>
</section>
	
<div class="smph-breadcrumbs">
	<div class="smph-container">
		<?php custom_breadcrumbs(); ?>
	</div>
</div>


<section class="smph-wrapper taxonomy-wrapper">
	<div class="smph-inner-container">

		<?php

			$cpt_arg = array(
				'post_type' => $post_type, 
				'post_status' => 'publish', 
				// 'meta_key' => 'featured-post',
				// 'meta_value' => 'yes',
		  	'posts_per_page' => 3,
			 	// 'orderby' => 'modified',
		  	'order_by' => 'date',
		  	'tax_query' => array(
		        array(
		            'taxonomy' => $taxonomy_name,
		            'terms'    => $term_id,
		        ),
		    ),
				'order' => 'DESC'
			);
		  $cpt_query = new WP_Query($cpt_arg);
		  $ctr = 0;
		  $indicators = '';

		?>

		<?php if ($cpt_query->have_posts()) {  ?>
			<div class="content-wrapper">
				<div class="content-title-wrapper">
					<h2 class="page-title">Featured Article</h2>
				</div>

				<div class="content-body">
					<div id="featuredArticle" class="carousel slide" data-ride="carousel">

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
										    <?= the_excerpt(); ?>
										    <a href="<?= the_permalink(); ?>" class="smph-btn blue-btn">Read More</a>
										  </div>
									  </div>
							    </div>
									<?php $indicators .= '<li data-target="#featuredArticle" data-slide-to="'.$ctr.'" class="'.$active.'">'; ?>
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
		<?php wp_reset_postdata(); } else { $classArticle = 'no-featured-article'; }  ?>


		<?php
			/* DISPLAY FEATURED POST */
			$cpt_arg = array(
				'post_type' => $post_type, 
				'post_status' => 'publish', 
		  	'offset' => 3,
		  	'posts_per_page' => 6,
		  	'order_by' => 'date',
		  	'tax_query' => array(
		        array(
	            'taxonomy' => $taxonomy_name,
	            'terms'    => $term_id,
		        ),
		    ),
				'order' => 'DESC'
			);
		  $cpt_query = new WP_Query($cpt_arg);

			$post_count = $cpt_query->found_posts;

		?>

		<div class="content-wrapper other-articles <?= $classArticle; ?>">
			<div class="content-title-wrapper">
				<h2 class="page-title"><?= ($classArticle == 'no-featured-article') ? 'Featured' : 'Other'; ?> Stories</h2>
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
									 	<p class="time"><?= the_time('l, M j, Y'); ?></p>
									 	<p class="other-articles-title"><?= the_title(); ?></p>
								 	</div>
							 	</a>
							</div>
				    <?php endwhile;  ?>
					</div>
					<?php if($post_count > 6) : ?>
						<div class="load-more-wrapper">
							<div id="more_posts" data-taxonomy="<?= $taxonomy_name; ?>" data-terms="<?= $taxonomy; ?>"  data-termsid="<?= $term_id; ?>" data-post="<?= $post_type[0]; ?>" class="smph-btn blue-btn load-more-btn">Load More</div>
						</div>
					<?php endif; ?> 
				<?php endif; wp_reset_postdata(); ?>
			</div>

		</div>
	</div>
</section>

<?php 

	// $image = get_field('featured_video_details', $term);
	$featured_video_details = get_field('featured_video_details',$term);
?>

<?php if($featured_video_details['thumbnail']): ?>
<section class="smph-wrapper featured-video">
	<div class="featured-video-wrapper">
		<div class="row">
			<div class="col-md-6 featured-video-info blue-bg">
				<div class="info-content">
					<h4 class="title blue-title">Featured Video</h4>
					<h3 class="video-title"><?= $featured_video_details['title']; ?></h3>
					<p><?= $featured_video_details['description']; ?></p>
					<?php if(strpos($featured_video_details['video_link'], 'youtube') !== false) { ?>
						<a data-fancybox href="<?= $featured_video_details['video_link']; ?>" class="smph-btn blue-btn"><?= ($featured_video_details['video_link_name']) ? $featured_video_details['video_link_name'] : 'Watch Here'; ?></a>
					<?php } else { ?>
						<a href="<?= $featured_video_details['video_link']; ?>" target="_blank" class="smph-btn blue-btn"><?= ($featured_video_details['video_link_name']) ? $featured_video_details['video_link_name'] : 'Watch Here'; ?></a>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 featured-video-img">
				<img src="<?= $featured_video_details['thumbnail']['url']; ?>" alt="<?= $featured_video_details['thumbnail']['alt']; ?>">
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php 
	get_footer();
?>

