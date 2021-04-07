<?php $fields = get_fields(); ?>
<?php if($fields['message_section']['section_title']) : ?>
<section class="smph-wrapper message-section-container">
	<div class="smph-inner-subcontainer">
		<div class="row">
			<div class="left-content col-md-6">
				<h4 class="section-title"><?= $fields['message_section']['section_title']; ?></h4>
				<div class="collapse show" id="shareholderMessage">
					<?= $fields['message_section']['section_description']; ?>
				</div>
				<a href="<?= $fields['message_section']['section_button_link']; ?>" class="smph-btn blue-btn">
					<?= $fields['message_section']['section_button_label']; ?>
				</a>
			</div>
			<div class="right-content col-md-6">
				<img src="<?= $fields['message_section']['section_image']['url']; ?>" alt="" class="message-img">
			</div>
		</div>
	</div>
</section>
<?php endif; //if has featured reports  ?>

<?php if($fields['message_section_inverted']) : ?>
<section class="smph-wrapper message-section-container message-section-inverted">
	<div class="smph-inner-subcontainer">
		<div class="row">
			<div class="right-content col-md-6">
				<img src="<?= $fields['message_section_inverted']['section_image']['url']; ?>" alt="" class="message-img">
			</div>
			<div class="left-content col-md-6">
				<h4 class="section-title"><?= $fields['message_section_inverted']['section_title']; ?></h4>
				<div class="collapse show" id="shareholderMessage">
					<?= $fields['message_section_inverted']['section_description']; ?>
				</div>
				<a href="<?= $fields['message_section_inverted']['section_button_link']; ?>" class="smph-btn blue-btn">
					<?= $fields['message_section_inverted']['section_button_label']; ?>
				</a>
			</div>
		</div>
	</div>
</section>
<?php endif; //if has featured reports  ?>

<?php if($fields['featured_report']['featured_report_image']) : ?>
	<section class="smph-wrapper featured-reports">
		<div class="smph-inner-subcontainer">
					<img src="<?= $fields['featured_report']['featured_report_image']['url']; ?>" alt="" class="reports-thumb">
					<?php if($fields['featured_report']['reports']): ?>
					<div class="reports-info">
						<?php foreach ($fields['featured_report']['reports'] as $key => $value) { ?>
							<div class="reports-info-wrapper">
								<p class="desc"><?= $value['reports_description']; ?></p>
								<a href="<?= $value['reports_file']['url'] ?>" target="_blank" class="download">
									<h4 class="title"><?= $value['reports_title']; ?></h4>
									<p class="file-info"><i class="fa fa-file-download"></i> <?= strtoupper($value['reports_file']['subtype']).' '.size_format($value['reports_file']['filesize']); ?></p>
								</a>
							</div>
						<?php } ?>
					</div>
				<?php endif; ?>
		</div>
	</section>
<?php endif; //if has featured reports  ?>

<?php

	/* DISPLAY Reports */
	$cpt_arg = array(
		'post_type' => 'annual_reports', 
		'post_status' => 'publish', 
  	'posts_per_page' => -1,
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>

<section class="smph-wrapper latest-reports reports-file-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="section-title">
			<h2 class="title">Previous Annual Reports</h2>
		</div>
		<div class="section-body">
				
			<div class="reports-container">
				<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
					<?php $report_file = get_post_meta(get_the_ID(),'report_file_post'); ?>
					<a href="<?= $report_file[0]; ?>" target="_blank" class="reports-wrapper">
						<div class="img-wrapper">
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
								<?php the_post_thumbnail('full'); ?>
							<?php } ?> 
						</div>
						<div class="info">
							<h4 class="title"><?= the_title(); ?></h5>
							<p class="download" ><i class="fa fa-file-download"></i> Download PDF</p>
						</div>
					</a>
			  <?php endwhile; endif; wp_reset_postdata(); ?>
			</div>

		</div>
	</div>
</section>