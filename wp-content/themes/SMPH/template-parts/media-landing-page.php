<?php
	$post_type = ($_GET['type']) ? $_GET['type'] : 'companyRelease';

	if($post_type == 'companyRelease') {
		$post_type = 'press_release';
	} else if($post_type == 'latestNews') {
		$post_type = 'latest_news';
	}

	$year = get_posts_years_array($post_type); 
?>

<section class="smph-wrapper media-tabs-container">
	<div class="smph-inner-container">

		<ul class="nav media-tabs">
			<li><a href="#companyRelease" id="companyRelease_link" class="nav-link active">Company Releases</a></li>
			<!-- <li><a href="#stories" id="stories_link" class="nav-link">Stories</a></li> -->
			<!-- <li><a href="#socialMedia" id="socialMedia_link" class="nav-link">Social Media</a></li> -->
			<!-- <li><a href="#videos" id="videos_link" class="nav-link">Videos</a></li> -->
			<li><a href="<?= get_site_url().'/media/multimedia'; ?>" class="nav-link">Multimedia</a></li>
			<li><a href="#latestNews" id="latestNews_link" class="nav-link">Latest News</a></li>
			<!-- <li><a href="#speeches" id="speeches_link" class="nav-link">Speeches</a></li> -->
			<?php if($post_type != 'socialMedia'): ?>
				<li>
					<p class="search">Go To: 
						<select name="select_year" id="select_year">
						<?php foreach($year as $val): ?>
							<?php 
								if($post_type == 'press_release'):
									if(in_array($val['year'], array(2014,2013,2012))):
										continue;
									endif;
								endif; 
							?>
							<option value="<?= $val['year']; ?>" <?= ($_GET['post_year'] && $_GET['post_year'] == $val['year']) ? 'selected' : '' ; ?>><?= $val['year']; ?></option>
						<?php endforeach; ?>
						</select>
					</p>
				</li>
			<?php endif; ?>
		</ul>

	</div>
</section>

<section class="smph-wrapper media-tabs-content">

		<?php include('media-company-releases.php'); ?>

		<?php include('media-stories.php'); ?>

		<?php include('media-social-media.php'); ?>

		<?php include('media-videos.php'); ?>

		<?php include('media-latest-news.php'); ?>

		<?php //include('media-speeches.php'); ?>
</section>


<section class="smph-wrapper more-on-sm-community view-all-wrapper hide">
    
    <div class="smph-inner-container">
        <div class="section-title">
            <h2 class="title">More on Media</h2>
        </div>
        <div class="section-content">
            <div class="row">
                <a href="<?= site_url().'/media?type=pressRelease'; ?>" class="more-on-sm-community-wrapper col-md-4">
                    <div class="img-wrapper">
												<img src="<?= site_url().'/wp-content/uploads/2020/08/SM-for-the-Community-Default-Image.jpg'; ?>" alt="">
                    </div>
                    <h4 class="title">Press Release</h4>
                </a>

								<?php
									/* DISPLAY FEATURED POST */
									$cpt_arg = array(
										'post_type' => 'stories', 
										'post_status' => 'publish', 
								  	'posts_per_page' => 1,
								  	'order_by' => 'date',
										'order' => 'DESC'
									);
								  $cpt_query = new WP_Query($cpt_arg);

									$post_count = $cpt_query->found_posts;

								?>
								<?php if ($cpt_query->have_posts()) :  ?>
									<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
									<a href="<?= site_url().'/media?type=stories'; ?>" class="more-on-sm-community-wrapper col-md-4">
									  <div class="img-wrapper">
											<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
												<?php the_post_thumbnail('full'); ?>
											<?php } ?> 			
									  </div>
									  <h4 class="title">Stories</h4>
									</a>
	              <?php endwhile;endif;wp_reset_postdata(); ?>
                <a href="<?= site_url().'/media?type=socialMedia'; ?>" class="more-on-sm-community-wrapper col-md-4">
                    <div class="img-wrapper">
												<img src="<?= site_url().'/wp-content/uploads/2020/08/SM-for-the-Community-Default-Image.jpg'; ?>" alt="">
                    </div>
                    <h4 class="title">Social Media</h4>
                </a>

								<?php
									/* DISPLAY FEATURED POST */
									$cpt_arg = array(
										'post_type' => 'videos', 
										'post_status' => 'publish', 
								  	'posts_per_page' => 1,
								  	'order_by' => 'date',
										'order' => 'DESC'
									);
								  $cpt_query = new WP_Query($cpt_arg);

									$post_count = $cpt_query->found_posts;

								?>
								<?php if ($cpt_query->have_posts()) :  ?>
									<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
									<a href="<?= site_url().'/media?type=videos'; ?>" class="more-on-sm-community-wrapper col-md-4">
									  <div class="img-wrapper">
											<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
												<?php the_post_thumbnail('full'); ?>
											<?php } ?> 			
									  </div>
									  <h4 class="title">Videos</h4>
									</a>
	              <?php endwhile;endif;wp_reset_postdata(); ?>
                <a href="<?= site_url().'/media?type=latestNews'; ?>" class="more-on-sm-community-wrapper col-md-4">
                    <div class="img-wrapper">
												<img src="<?= site_url().'/wp-content/uploads/2020/08/SM-for-the-Community-Default-Image.jpg'; ?>" alt="">
                    </div>
                    <h4 class="title">Latest News</h4>
                </a>
                <a href="<?= site_url().'/media?type=speeches'; ?>" class="more-on-sm-community-wrapper col-md-4">
                    <div class="img-wrapper">
												<img src="<?= site_url().'/wp-content/uploads/2020/08/SM-for-the-Community-Default-Image.jpg'; ?>" alt="">
                    </div>
                    <h4 class="title">Speeches</h4>
                </a>
            </div>
        </div>
    </div>
</section>

