<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>


<section class="smph-wrapper principles-main-container">
	<div class="smph-inner-subcontainer">
		<div class="title-container">
			<img src="<?= $fields['section_logo']['url']; ?>" alt="<?= $fields['section_logo']['alt']; ?>" class="section-logo wow fadeIn" data-wow-delay="0.4s">
			<h4 class="title wow fadeIn" data-wow-delay="0.8s"><?= $fields['section_title']; ?></h4>
		</div>
		<?php if($fields['principle_list']): ?>
			<div class="principles-container">
				
				<?php $delay=1.2; foreach($fields['principle_list'] as $val): ?>
					<div class="principles-wrapper wow fadeIn" data-wow-delay="<?= $delay;$delay+=0.4; ?>s">
						<div class="img-wrapper">
							<h5 class="principles"><?= $val['principle_name']; ?></h5>
							<img src="<?= $val['principle_icon']['url']; ?>" alt="<?= $val['principle_icon']['alt']; ?>" class="principles-logo">
						</div>
						<p><?= $val['principle_description']; ?></p>
					</div>
				<?php endforeach; ?>

			</div>	
		<?php endif ?>
	</div>
</section>

<?php if($fields['ungc_intro']): ?>
	<section class="smph-wrapper ungc-intro-container">
		<div class="smph-inner-subcontainer">
			<div class="section-title">
				<h3 class="title"><?= $fields['ungc_intro']['title']; ?></h3>
				<?= $fields['ungc_intro']['description']; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if($fields['ungc_message']['speaker_image']): ?>
	<section class="smph-wrapper ungc-message-container">
		<div class="smph-inner-subcontainer">
			<div class="message-wrapper">
				<div class="img-content">
					<img src="<?= $fields['ungc_message']['speaker_image']['url']; ?>" alt="<?= $fields['ungc_message']['speaker_image']['alt']; ?>" class="speaker-image">
						<div class="info-caption">
							<p><?= $fields['ungc_message']['speaker_image']['caption']; ?></p>
						</div>
				</div>
				<div class="desc-content">
					<h5 class="title"><?= $fields['ungc_message']['title']; ?></h5>
					<p class="desc"><?= $fields['ungc_message']['message']; ?></p>
					<div class="message-info">
						<span class="name"><?= $fields['ungc_message']['name']; ?></span>
						<span class="position"><?= $fields['ungc_message']['position']; ?></span>
						<span class="company"><?= $fields['ungc_message']['company']; ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="ungc-stack-wrapper pt-1">
	<div class="smph-inner-subcontainer">
		<div class="stack-item message"> 
			<p><i>“SM has integrated three platforms in terms of its operations and sustainability which include investing 10% in malls’ CAPEX in disaster resilience features, continuous capacity-building, and collaboration, and forging private-public partnership at the global, regional and national levels – to manage business risks and ensure business continuity of our MSME partners.”</i></p>
		</div>
		<div class="stack-item">
			<a data-fancybox="true" href="https://youtu.be/NpnzzcO9wa4">
				<img src="<?= get_template_directory_uri().'/assets/images/sustainability-summit-frederic-dybuncio.jpg' ?>" alt="">
			</a>
		</div>
		<div class="stack-item">
			<a data-fancybox="true" href="https://youtu.be/5R9PBUBlpeg">
				<img src="<?= get_template_directory_uri().'/assets/images/sustainability-summit-hans-sy.jpg' ?>" alt="">
			</a>
		</div>
		<div class="stack-item message"> 
			<p><i>“As a new member of the United Nations Global Compact (UNGC), we strengthen our commitment to uphold the UNGC principles and continue to find ways to be of help to our diverse stakeholders.”</i></p>
		</div>
	</div>
</section>



<?php if($fields['ungc_Image']): ?>
<section class="smph-wrapper ungc-photos-container view-all-wrapper pt-1">
	<div class="smph-inner-subcontainer">
		<!-- <div class="section-title"> -->
			<!-- <h2 class="title">UNGC-GRI Sustainablility Summit Philippines</h2> -->
			<!-- <a href="#" class="see-all">See all Stories</a> -->
		<!-- </div> -->
		<div class="section-body">
			<?php foreach($fields['ungc_Image'] as $val): ?>
				<div class="stack-item">
					<div class="img-wrapper">
						<img src="<?= $val['image']['url']; ?>" alt="<?= $val['image']['alt']; ?>">
					</div>
					<?php if($val['image']['caption']): ?><p class="desc"><?= $val['image']['caption']; ?></p><?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>		
	</div>
</section>
<?php endif; ?>