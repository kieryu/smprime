
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<section class="smph-wrapper vision-mission-wrapper">
	<div class="smph-inner-container">
		
		<div class="vision-mission-container vision-container">
			<div class="info-details">
				<h4 class="title">Vision</h4>
				<p><?= $fields['vision']['vision_text']; ?></p>
			</div>
			<img src="<?= $fields['vision']['vision_logo']['url']; ?>" class="vision-logo">
		</div>
		<div class="vision-mission-container mission-container">
			<img src="<?= $fields['mission']['mission_logo']['url']; ?>" class="mission-logo">
			<div class="info-details">
				<h4 class="title">Mission</h4>
				<p><?= $fields['mission']['mission_desc']; ?></p>
			</div>
		</div>

	</div>
</section>

<?php if($fields['green_movement_category']) : ?>
	<section class="smph-wrapper our-pillars view-all-wrapper">
		<div class="smph-inner-container">
			<div class="section-title">
				<h2 class="title">Our Pillars</h2>
			</div>
			<div class="section-content">
					
				<div class="row">

				<?php foreach($fields['green_movement_category'] as $values): ?>

					<?php 
						$term = get_term( $values['green_movement_category'], 'green_movement_cat' );
						$term_link = get_term_link( $term );
					  $term = get_term_by('id', $values['green_movement_category'], 'green_movement_cat');
					?>

					<div class="our-pillar-wrapper col-md-3">
						<img src="<?= $values['category_image']['url']; ?>" alt="">
						<div class="desc">
							<h4 class="title"><?= $term->name; ?></h4>
							<p><?= $values['green_movement_category_description']; ?></p>
							<!-- <a href="<?= $term_link; ?>" class="smph-btn green-btn">Learn More</a> -->
						</div>
					</div>
				<?php endforeach; ?>

				</div>

			</div>
		</div>
	</section>
<?php endif; ?>
<?php

	$cpt_arg = array(
		'post_type' => 'story_green_movement', 
		'post_status' => 'publish', 
		'meta_key' => 'featured-post',
		'meta_value' => 'yes',
  	'posts_per_page' => 6,
	 	'orderby' => 'modified',
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>
<?php if ($cpt_query->have_posts()) : ?>
<section class="smph-wrapper featured-stories view-all-wrapper">
	
	<div class="smph-inner-container">
		<div class="section-title">
			<h2 class="title">Featured Stories</h2>
			<!-- <a href="#" class="see-all">See all Stories</a> -->
		</div>
		<div class="section-content">
				
			<div class="row">
					
				<?php  while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>

					<a href="<?= the_permalink(); ?>" class="col-md-4 featured-stories-wrapper">
						<?php $terms = get_the_terms(get_the_ID(),'green_movement_cat'); ?>
						<div class="img-wrapper">
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
								<?php the_post_thumbnail('full'); ?>
							<?php } ?> 
						</div>
						<div class="desc">
							<span class="stories-type"><?= ($terms[0]->name) ? $terms[0]->name : '' ; ?></span>
							<h4 class="title"><?= the_title(); ?></h4>
							<?= the_excerpt(); ?>
						</div>
					</a>
				<?php endwhile; ?>

			</div>

		</div>
	</div>
</section>
<?php endif;wp_reset_postdata(); ?>

<?php if($fields['featured_video_details']['thumbnail']): ?>
<section class="smph-wrapper featured-video">
	<div class="featured-video-wrapper">
		<div class="row">
			<div class="col-md-6 featured-video-info">
				<div class="info-content">
					<h4 class="title green-title">Featured Video</h4>
					<h3 class="video-title"><?= $fields['featured_video_details']['title']; ?></h3>
					<p><?= $fields['featured_video_details']['description']; ?></p>
					<?php if(strpos($fields['featured_video_details']['video_link'], 'youtube') !== false) { ?>
						<a data-fancybox href="<?= $fields['featured_video_details']['video_link']; ?>" class="smph-btn blue-btn"><?= ($fields['featured_video_details']['video_link_name']) ? $fields['featured_video_details']['video_link_name'] : 'Watch Here' ; ?></a>
					<?php } else { ?>
						<a href="<?= $fields['featured_video_details']['video_link']; ?>" target="_blank" class="smph-btn blue-btn"><?= ($fields['featured_video_details']['video_link_name']) ? $fields['featured_video_details']['video_link_name'] : 'Watch Here' ; ?></a>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 featured-video-img">
				<img src="<?= $fields['featured_video_details']['thumbnail']['url']; ?>" alt="<?= $fields['featured_video_details']['thumbnail']['alt']; ?>">
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- 

<section class="smph-wrapper more-on-sm-community view-all-wrapper green-movement">
	
	<div class="smph-inner-container">
		<div class="section-title">
			<h2 class="title">More on SM for the Community</h2>
		</div>
		<div class="section-content">

			<div class="row">
			<?php 

				$certain_pages = array(479,460,468);
				foreach( $certain_pages as $a_page ) {
				    $special_tabs = new WP_Query('page_id='.$a_page);
				    if ($special_tabs->have_posts()) : while ($special_tabs->have_posts()) : $special_tabs->the_post();
				        $fields = get_fields(); ?>

					<a href="<?= the_permalink(); ?>" class="more-on-sm-community-wrapper col-md-4">
						<div class="img-wrapper">
							<img src="<?= $fields['banner_image']['url']; ?>" alt="">
							<?php if($a_page == 460) : ?>
								<p class="banner-title"><?= $fields['banner_title']; ?></p>
							<?php endif; ?>
						</div>
						<h4 class="title"><?= the_title(); ?></h4>
					</a>

			<?php
				    endwhile; endif;
				}
				wp_reset_postdata(); 
			?>

			</div>

		</div>
	</div>

</section> -->