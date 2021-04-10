
<section class="smph-wrapper custom-quicklinks">
	<div class="smph-inner-subcontainer">
		<div class="quicklinks-container">
			<div class="row">
					<?php
						$certain_pages = array(2557,2545,304,363);
						foreach( $certain_pages as $a_page ) {
						    $special_tabs = new WP_Query('page_id='.$a_page);
						    if ($special_tabs->have_posts()) : while ($special_tabs->have_posts()) : $special_tabs->the_post();
						        $fields = get_fields(); ?>
					<div class="quicklinks col-md-6">
						<a href="<?= the_permalink(); ?>" class="quicklinks-wrapper">
							<div class="img-wrapper">
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
									<?php the_post_thumbnail('full'); ?>
								<?php } ?> 
							</div>
							<h4 class="quicklinks-title"><?= the_title(); ?></h4>
						</a>
					</div>
				  <?php 
						    endwhile; endif;
						}
						wp_reset_postdata(); 
				  ?>
			</div>
		</div>
	</div>
</section>


<section class="smph-wrapper cta-banner cta-banner-link-out">
	<img src="<?= get_template_directory_uri().'/assets/images/about-us/MOA Complex2020_edited.jpg'; ?>" alt="" class="cta-banner-image">
	<div class="smph-inner-subcontainer">
		<div class="cta-banner-content">
			<h2>Our Businesses</h2>
			<p><a class="smph-btn white-btn" href="<?= get_site_url().'/about-us/our-businesses'; ?>">Discover More</a></p>
		</div>
	</div>
</section>

<section class="img-page-linkout">
	<div class="row">
		<div class="left-content col-md-6 dark-blue-bg">
			<div class="info-content">
				<h4 class="title text-white bigger-title">Our History</h4>
				<p class="mb-4">SM began as a single shoe store established in 1958.  It has evolved into a forerunner of customer experience, service excellence and innovation that has become part of every lives of Filipinos.</p>
				<a href="<?= get_site_url().'/about-us/our-history'; ?>" class="smph-btn white-btn">Learn more about our history</a>
			</div>
		</div>
		<div class="right-content col-md-6">
			<img src="<?= get_template_directory_uri().'/assets/images/about-us/HSSR_Our History.png'; ?>" alt="" class="img-full">
		</div>
	</div>
</section>