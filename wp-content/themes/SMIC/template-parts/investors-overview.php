
<section class="ip-cd-download pdf-file-container smph-wrapper view-all-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="row">
			<div class="col-md-6 ip-cd-download-container">	
				<div class="ip-cd-wrapper investor-presentations">
					<div class="section-title">
						<h3 class="title">Investor Presentations</h3>
					</div>
					<div class="section-body">
						<?php 
							$cpt_arg = array(
								'post_type' => 'inv_presentations', 
								'post_status' => 'publish', 
								'posts_per_page' => 2,
							 	// 'orderby' => 'rand',
							 	'orderby' => 'date',
								'order' => 'DESC',
							);

						  $cpt_query = new WP_Query($cpt_arg);
						?>

						<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post(); $fields = get_fields();  ?>
							<a href="<?= $fields['file']['url'] ?>" target="_blank" class="list-style-wrapper">
								<div class="info">
									<p class="title"><?= the_title(); ?></p>
									<p class="date"><?= the_time('M j, Y') ?></p>
								</div>
								<i class="fa fa-file-download"></i>
							</a>
					  <?php endwhile; endif; wp_reset_postdata(); ?>

						<a href="<?= get_site_url().'/investors/investor-presentations/'; ?>" class="view-all smph-btn blue-btn mt-3">View All</a>
					</div>
				</div>

			</div>
			<div class="col-md-6 ip-cd-download-container">
				<div class="ip-cd-wrapper corporate-disclosures">
					<div class="section-title">
						<h3 class="title">Corporate Disclosures</h3>
					</div>
					<div class="section-body">
						<?php 
							$cpt_arg = array(
								'post_type' => 'corp_disclosure', 
								'post_status' => 'publish', 
								'posts_per_page' => 2,
							 	// 'orderby' => 'rand',
							 	'orderby' => 'date',
								'order' => 'DESC',
							);

						  $cpt_query = new WP_Query($cpt_arg);
						?>

						<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post(); $fields = get_fields();  ?>
							<a href="<?= $fields['file']['url'] ?>" target="_blank" class="list-style-wrapper">
								<div class="info">
									<p class="title"><?= the_title(); ?></p>
									<p class="date"><?= the_time('M j, Y') ?></p>
								</div>
								<i class="fa fa-file-download"></i>
							</a>
					  <?php endwhile; endif; wp_reset_postdata(); ?>

						<a href="<?= get_site_url().'/investors/corporate-disclosure/'; ?>" class="view-all smph-btn blue-btn mt-3">View All</a>
					</div>
				</div>
			</div>
<!-- 			<div class="col-md-6 smph-stocks-container">
				<div class="smph-stocks-wrapper">
					<div class="section-title">
						<h3 class="title">SM Investments Corporation (SM)</h3>
					</div>
					<div class="section-body">
						<div class="stocks-wrapper">
							<label>Share Price</label>
							<p class="value"><strong>864.00</strong> PHP</p>
						</div>
						<div class="stocks-wrapper">
							<label>Change (% Change)</label>
							<p class="subvalue">+/- 10.00 (+1.2%)</p>
							<p>Last Updated: 20 October 2020</p>
						</div>
						<div class="stocks-wrapper">
							<label>Volumes (Shares)</label>
							<p class="subvalue">85,410</p>
							<p class="subvalue">Market Cap: 1,052,805,425,758.00</p>
						</div>
						<div class="stocks-wrapper">
							<p>PSE Ticker | SM</p>
							<p>Bloomberg Ticker | SM PM Equity</p>
							<p>Reuters Ticker | SM.PH</p>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>


<?php
	/* DISPLAY PRESS RELEASE */
	$cpt_arg = array(
		'post_type' => 'press_release', 
		'post_status' => 'publish', 
  	'posts_per_page' => 1,
  	'order_by' => 'date',
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>

<?php if ($cpt_query->have_posts()):  ?>

	<section class="inv-overview press-release-container smph-wrapper">
		<div class="smph-inner-subcontainer">
			<div class="section-body">
				<div class="top-wrapper">
				<h3 class="title">Press Release</h3>
					<div class="pr-wrapper">
						<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
							<a href="<?= the_permalink(); ?>" class="pr-container">
									<h4 class="title"><?= the_title(); ?></h4>
									<span class="time"><?= the_time('M j, Y'); ?></span>
							</a>
						<?php endwhile; ?>
					</div>
				</div>
				<div class="more-wrapper">
					<a href="<?= get_site_url().'/media?type=pressRelease'; ?>" class="more-news mt-4 smph-btn blue-btn">More News</a>
				</div>
			</div>
		</div>
	</section>

<?php endif;wp_reset_postdata(); ?>

<?php $fields = get_fields(); ?>

<?php if($fields['quick_download']): ?>
	<section class="inv-overview latest-company-reports-container view-all-wrapper smph-wrapper">
		<div class="smph-inner-subcontainer">
			<div class="section-title">
				<h3 class="title">Quick Download</h3>
			</div>
			<div class="section-body">
				<div class="row">
					<?php foreach($fields['quick_download'] as $value): ?>
						<div class="latest-company-wrapper col-md-6">
								<?php //print'<pre>';print_r($value);print'</pre>'; ?>
								<img src="<?= $value['thumbnail']['url']; ?>" alt="<?= $value['thumbnail']['alt']; ?>" class="reports-img">
								<div class="info-wrapper">
									<h4 class="title"><?= $value['name']; ?></h4>
									<a href="<?= $value['pdf_file']['url']; ?>"><i class="fa fa-file-download"></i> Download</a>
									<a href="<?= $value['link']; ?>"><img src="<?= get_template_directory_uri().'/assets/images/investors/linkout-icon.png'; ?>" alt="" class="linkout-img"> View Online</a>
								</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="inv-overview smph-wrapper quicklinks-reports parallax" style="background-image: url('<?= get_template_directory_uri().'/assets/images/investors/adjusted_SM Mega banner image2.jpg'; ?>')">
	<div class="parallax-content">
		<div class="smph-inner-subcontainer">
			<div class="row">
				<div class="col-md-4 ">
					<a href="<?= get_site_url().'/investors/financial-reports/'; ?>" class="quicklinks-wrapper">
						<img src="<?= get_template_directory_uri().'/assets/images/investors/chart-blue-01.png'; ?>" alt="" class="fr-img">
						<p class="title">Financial <br/>Reports</p>
					</a>
				</div>
				<div class="col-md-4">
					<a href="<?= get_site_url().'/investors/faqs/'; ?>" class="quicklinks-wrapper">
						<img src="<?= get_template_directory_uri().'/assets/images/investors/FAQ.png'; ?>" alt="" class="if-img">
						<p class="title">Investors <br/>FAQs</p>
					</a>
				</div>
				<div class="col-md-4">
					<a class="quicklinks-wrapper" data-toggle="collapse" href="#contactUsCollapse" role="button" aria-expanded="false" aria-controls="contactUsCollapse">
						<img src="<?= get_template_directory_uri().'/assets/images/investors/contact.png'; ?>" alt="" class="contact-img">
						<p class="title">Contact <br/>IR Team</p>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="contactUsCollapse" class="contact-us-wrapper collapse">
	<div class="smph-inner-subcontainer">
	  <div class="card card-body">
	    <h2 class="title">Contact</h2>
	    <p><strong>Investor Relations Office</strong></p>
	    <p class="phone">Phone: <a href="tel:+63288570100">+632 8857-0100</a></p>
	    <p class="email">Email: <a href="mailto:ir@sminvestments.com">ir@sminvestments.com</a></p>
	  </div>
	</div>
</section>