<?php 
	// wp_redirect( get_permalink(416), 301 );
	// exit;    
?>

<?php get_header(); ?>


<?php if(have_posts() ): ?>
	<?php while(have_posts()) : the_post(); ?>
		<?php $fields = get_fields(); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php $indicator = ''; ?>

<?php $ctr = 0; ?>
<?php if($fields['rotating_banner']) { ?>
	<section id="homepageCarousel" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
			<?php foreach($fields['rotating_banner'] as $key => $val) { ?>
					<?php if($val['banner_status'] != 'Unpublish'): ?>
					<?php $class = ($ctr == 0) ? 'active' : ''; ?>
		    <div class="carousel-item <?= $class; ?>">
		    	<?php if($val['video_link']) { ?>
		    		<!-- VIDEO BANNER -->
		    		<div class="video-banner">
						  <div class="video-carousel-caption">
						    <h5 class="banner-title"><?= $val['banner_title']; ?></h5>
						    <?php if($val['banner_description']): ?>
							    <p class="banner-desc"><?= $val['banner_description']; ?></p>
							  <?php endif; ?>
								<?php if(strpos($val['video_link'], 'youtube') !== false) { ?>
							    <a data-fancybox href="<?= $val['video_link']; ?>" class="smph-btn <?= strtolower($val['link_color']); ?>-btn"><?= $val['banner_link_text']; ?></a>
							  <?php } else { ?>
							    <a href="<?= $val['video_link']; ?>" class="smph-btn <?= strtolower($val['link_color']); ?>-btn" target="_blank"><?= $val['banner_link_text']; ?></a>
							  <?php } ?>
						  </div>
						  <div class="img-wrapper video-thumb">
					      <img class="d-block w-100" src="<?= $val['banner_image']['url'] ?>" alt="<?= $val['banner_image']['alt'] ?>">
						    <a data-fancybox href="<?= $val['video_link']; ?>" class="play-btn"></a>
								<?php if(strpos($val['video_link'], 'youtube') !== false) { ?>
							    <a data-fancybox href="<?= $val['video_link']; ?>" class="play-btn"></a>
							  <?php } else { ?>
							    <a href="<?= $val['video_link']; ?>" class="play-btn" target="_blank"></a>
							  <?php } ?>
						  </div>
					  </div>
						
		    	<?php } else { ?>
		    		<!-- STILL IMAGE BANNER -->
			      <img class="d-block w-100" src="<?= $val['banner_image']['url'] ?>" alt="<?= $val['banner_image']['alt'] ?>">
					  <div class="carousel-caption">
					    <h5 class="banner-title"><?= $val['banner_title']; ?></h5>
					    <?php if($val['banner_description']): ?>
						    <p class="banner-desc"><?= $val['banner_description']; ?></p>
						  <?php endif; ?>
						  <?php if($val['banner_link_text']): ?>
						    <a href="<?= $val['banner_link']['url']; ?>" class="smph-btn <?= strtolower($val['link_color']); ?>-btn"><?= $val['banner_link_text']; ?></a>
						  <?php endif; ?>
					  </div>
		    	<?php } ?>
		    </div>
		    <?php $indicator .= '<li data-target="#homepageCarousel" data-slide-to="'.$key.'" class="'.$class.'"></li>';  ?>
			<?php $ctr++; ?>
		  <?php endif; ?> 
		  <?php } ?>
	  </div>
	  <!-- <ol class="carousel-indicators"> -->
		  <!-- <?= $indicator; ?> -->
	  <!-- </ol> -->
	  <div class="carousel-controls prev-control">
		  <a href="#homepageCarousel" role="button" data-slide="prev">
		    <span class="fa fa-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
	  </div>
	  <div class="carousel-controls next-control">
		  <a href="#homepageCarousel" role="button" data-slide="next">
		    <span class="fa fa-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
	  </div>
	</section>
<?php } ?>

<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<section class="smph-wrapper our-business light-blue-bg">
	<div class="smph-inner-subcontainer">
		<div class="section-title">
			<h2 class="title">Our Business</h2>
		</div>
		<div class="section-content">
			<div class="row">

			<?php 

				// $certain_pages = array(2735,3744,3788,3972);
				$certain_pages = array(3744,3751,3769,3758);
				foreach( $certain_pages as $a_page ) {
				    $special_tabs = new WP_Query('page_id='.$a_page);
				    if ($special_tabs->have_posts()) : while ($special_tabs->have_posts()) : $special_tabs->the_post();
				        $fields = get_fields(); ?>

					<a href="<?= the_permalink(); ?>" class="our-business-wrapper col-md-3">
						<div class="img-wrapper">
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
								<?php the_post_thumbnail('full'); ?>
							<?php } ?> 			
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

<section class="smph-wrapper press-release-investor-presentations">
	<div class="smph-inner-subcontainer">
		<div class="section-content">
			
			<div class="row">
				
				<div class="col-md-6 press-release-container">
					<div class="container-title">
						<h4 class="title">Press Release</h4>
					</div>
					<?php 
						$cpt_arg = array(
							'post_type' => 'press_release', 
							'post_status' => 'publish', 
							'posts_per_page' => 4,
						 	// 'orderby' => 'rand',
						 	'orderby' => 'date',
							'order' => 'DESC',
						);

					  $cpt_query = new WP_Query($cpt_arg);
					?>

					<div class="container-content">
						<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post(); $fields = get_fields();  ?>
						<a href="<?= the_permalink(); ?>" class="press-release-wrapper">
							<span class="date"><?= the_time('F j, Y') ?></span>
							<p><?= the_title(); ?></p>
						</a>
					  <?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
					<a href="<?= get_site_url().'/media?type=pressRelease'; ?>" class="smph-btn blue-btn mt-4">View All</a>
				</div>
				<div class="col-md-6 investor-presentations-container">
					<div class="container-title">
						<h4 class="title">Investor Presentations</h4>
					</div>
					<?php 
						$cpt_arg = array(
							'post_type' => 'inv_presentations', 
							'post_status' => 'publish', 
							'posts_per_page' => 4,
						 	// 'orderby' => 'rand',
						 	'orderby' => 'date',
							'order' => 'DESC',
						);

					  $cpt_query = new WP_Query($cpt_arg);
					?>
					<div class="container-content">
						<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post(); $fields = get_fields();  ?>
							<a href="<?= $fields['file']['url'] ?>" class="investor-wrapper"><?= the_title(); ?></a>
					  <?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
					<a href="<?= get_site_url().'/investors/investor-presentations/'; ?>" class="smph-btn blue-btn">View All</a>
				</div>

			</div>

		</div>
	</div>
</section>

<section class="smph-wrapper our-business light-blue-bg">
	<div class="smph-inner-subcontainer">
		<div class="section-content">
			<div class="row">

			<?php 

				$certain_pages = array(2735,3744,3788,3972);
				foreach( $certain_pages as $a_page ) {
				    $special_tabs = new WP_Query('page_id='.$a_page);
				    if ($special_tabs->have_posts()) : while ($special_tabs->have_posts()) : $special_tabs->the_post();
				        $fields = get_fields(); ?>

					<a href="<?= the_permalink(); ?>" class="our-business-wrapper col-md-3">
						<div class="img-wrapper">
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
								<?php the_post_thumbnail('full'); ?>
							<?php } ?> 			
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

<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<?php if($fields['cta_banner_link_out']): ?>
	<?php foreach($fields['cta_banner_link_out'] as $key => $value): ?>
		<?php if($value['banner_image']['url']): $sec += 0.2;// CHECK IF HAS BANNER IMAGE ?>
			<section class="smph-wrapper cta-banner cta-banner-link-out cta-banner-key-<?= $key; ?> ">
				<img src="<?= $value['banner_image']['url']; ?>" alt="" class="cta-banner-image">
				<div class="smph-inner-subcontainer wow fadeIn" data-wow-delay="<?= $sec; ?>s">
					<div class="cta-banner-content">
						<?= $value['content']; ?>
					</div>
				</div>
			</section>
		<?php endif; //IF HAS BANNER IMAGE ?>
	<?php endforeach; ?>
<?php endif; ?>

<?php get_footer(); ?>