
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<?php if($fields['covid_response_category']) : ?>
<section class="smph-wrapper covid-response-cat">
	<div class="smph-inner-container">
		
		<div class="row">

			<?php foreach($fields['covid_response_category'] as $values): ?>

				<?php 
					$term = get_term( $values['covid_response_category'], 'covid19_response' );
					$term_link = get_term_link( $term );
				  $term = get_term_by('id', $values['covid_response_category'], 'covid19_response');
				?>

				<a href="<?= $term_link; ?>" class="covid-response-cat-wrapper col-md-4">
					<div class="img-wrapper">
						<img src="<?= $values['category_image']['url']; ?>" alt="">
					</div>				
					<div class="info">
						<h4 class="title"><?= $term->name; ?></h4>
						<p><?= $values['covid_response_category_description']; ?></p>
					</div>
				</a>
			<?php endforeach; ?>

		</div>

	</div>
</section>
<?php endif; ?>

<?php if($fields['infographic_slider']): ?>

	<section class="smph-wrapper infographic-slider">
		<div class="smph-inner-container">
			<?php foreach($fields['infographic_slider'] as $val) : ?>
				<div class="infographic-wrapper">
					<img src="<?= $val['infographic_image']['url']; ?>" alt="<?= $val['infographic_image']['alt']; ?>" class="infographic-img">
				</div>
			<?php endforeach; ?>
		</div>
	</section>

<?php endif; ?>

<?php if($fields['sm_groups_response_in_numbers']) : ?>
<!-- <section class="smph-wrapper smrn">
	<div class="smph-inner-container">
		
		<div class="smrn-container">
			<div class="smrn-title-container">
				<p class="title"><u>COVID-19</u><br/>SM group's Response in Numbers</p>
			</div>
			<div class="smrn-wrapper">
				<?php if($fields['sm_groups_response_in_numbers']['worth_of_donations']) : ?>
					<div class="smrn-inner-wrapper">
						<p class="info">PHP <strong><?= $fields['sm_groups_response_in_numbers']['worth_of_donations'] ?></strong>worth of donations for PPEs, medical supplies, test kits</p>
					</div>
				<?php endif; ?>
				<?php if($fields['sm_groups_response_in_numbers']['support_for_project_ugnayan']) : ?>
					<div class="smrn-inner-wrapper">
						<p class="info">PHP <strong><?= $fields['sm_groups_response_in_numbers']['support_for_project_ugnayan'] ?></strong>support for Project Ugnayan</p>
					</div>
				<?php endif; ?>
				<?php if($fields['sm_groups_response_in_numbers']['waived_tenant_rental_fees']) : ?>
					<div class="smrn-inner-wrapper">
						<p class="info">PHP <strong><?= $fields['sm_groups_response_in_numbers']['waived_tenant_rental_fees'] ?></strong>waived tenant rental fees</p>
					</div>
				<?php endif; ?>
				<?php if($fields['sm_groups_response_in_numbers']['meals_and_kalinga_packs_donated_to_frontliners']) : ?>
					<div class="smrn-inner-wrapper">
						<p class="info">Over <strong><?= $fields['sm_groups_response_in_numbers']['meals_and_kalinga_packs_donated_to_frontliners'] ?></strong>Meals and Kalinga packs donated to front liners</p>
					</div>
				<?php endif; ?>
				<?php if($fields['sm_groups_response_in_numbers']['emergency_quarantine_facilities_built']) : ?>
					<div class="smrn-inner-wrapper">
						<p class="info">Total of <div class="info d-flex"><strong class="mr-2"><?= $fields['sm_groups_response_in_numbers']['emergency_quarantine_facilities_built'] ?></strong>emergency quarantine facilities built</div></p>
					</div>
				<?php endif; ?>
			</div>
		</div>

	</div>
</section> -->
<?php endif; ?>

<?php if($fields['featured_video_details']): ?>
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