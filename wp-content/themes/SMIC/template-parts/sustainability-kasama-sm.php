
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<section class="smph-wrapper msmes">
	<div class="smph-inner-container">
		
		<div class="row">

			<div class="msmes-wrapper col-md-4">
				<div class="msmes-inner-wrapper">
					<div class="msmes-inner">
						<p class="count counter"><?= ($fields['sm']) ? $fields['sm'] : '0.00'; ?></p>
						<div class="info-wrapper">
							<div class="msmes-sprite supermall"></div>
							<p>SME Tenants in <br/>SM Supermalls</p>
						</div>
					</div>
				</div>
			</div>

			<div class="msmes-wrapper col-md-4">
				<div class="msmes-inner-wrapper">
					<div class="msmes-inner">
						<p class="count counter"><?= ($fields['sm_markets']) ? $fields['sm_markets'] : '0.00'; ?></p>
						<div class="info-wrapper">
							<div class="msmes-sprite markets"></div>
							<p>MSMEs in <br/>SM Markets</p>
						</div>
					</div>
				</div>
			</div>

			<div class="msmes-wrapper col-md-4">
				<div class="msmes-inner-wrapper">
					<div class="msmes-inner">
						<p class="count counter"><?= ($fields['sm_retail']) ? $fields['sm_retail'] : '0.00'; ?></p>
						<div class="info-wrapper">
							<div class="msmes-sprite retail"></div>
							<p>MSMEs in <br/>SM Retail (Non-Food)</p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>


<?php
	/* DISPLAY FEATURED POST */
	$cpt_arg = array(
		'post_type' => 'story_kasama_sm', 
		'post_status' => 'publish', 
		'meta_key' => 'featured-post',
		'meta_value' => 'yes',
  	'posts_per_page' => 6,
	 	'orderby' => 'date',
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>

<?php if ($cpt_query->have_posts()) {  ?>
	<section class="smph-wrapper featured-stories view-all-wrapper">
		
		<div class="smph-inner-container">
			<div class="section-title">
				<h2 class="title">Featured Stories</h2>
				<a href="<?= get_permalink(687); ?>" class="see-all">See all Stories</a>
			</div>
			<div class="section-content">
					
				<div class="row">
					
					<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
						<a href="<?= the_permalink(); ?>" class="col-md-4 featured-stories-wrapper">
							<div class="img-wrapper">
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
									<?php the_post_thumbnail(); ?>
								<?php } ?> 
							</div>
							<div class="desc">
								<h4 class="title"><?= the_title(); ?></h4>
								<?= the_excerpt(); ?>
							</div>
						</a>
					<?php endwhile;  ?>

				</div>

			</div>
		</div>
	</section>
<?php wp_reset_postdata(); } ?>


<?php if($fields['featured_video_details']['thumbnail']): ?>
<section class="smph-wrapper featured-video">
	<div class="featured-video-wrapper">
		<div class="row">
			<div class="col-md-6 featured-video-info blue-bg">
				<div class="info-content">
					<h4 class="title blue-title">Featured Video</h4>
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

<section class="smph-wrapper more-on-sm-community view-all-wrapper">
	
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

</section>