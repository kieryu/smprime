
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>


<?php if($fields['groupwide_economic_performance']): ?>
	<section class="smph-wrapper pt-0 pb-0 groupwide-economic-performance parallax-body view-all-wrapper">
		<div class="smph-inner-subcontainer">
			<div class="section-title flex-column align-items-start">
				<h2 class="title">Groupwide Economic Performance</h2>
				<p><?= $fields['groupwide_economic_performance']['subtext']; ?></p>
			</div>
		</div>
		<div class="section-body parallax" style="background-image: url('<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/MOA Complex_drone_adjusted.jpg'; ?>')">

			<div class="smph-inner-subcontainer">
				<div class="row economic-performance-container">
					
					<div class="col-md-4 wow fadeIn" data-wow-delay="0.4s">
						<div class="economic-performance-wrapper">
							<p class="value counter"><?= $fields['groupwide_economic_performance']['total_economic_value_generated']; ?></p>
							<div class="icons">
								<img src="<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/GEP-1.png'; ?> " alt="">
								<p>Total Economic <br/>Value Generated</p>
							</div>	
						</div>
					</div>
					
					<div class="col-md-4 wow fadeIn" data-wow-delay="0.8s">
						<div class="economic-performance-wrapper">
							<p class="value counter"><?= $fields['groupwide_economic_performance']['total_economic_value_distributed']; ?></p>
							<div class="icons">
								<img src="<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/GEP-2.png'; ?> " alt="">
								<p>Total Economic <br/>Value Distributed</p>
							</div>	
						</div>	
					</div>
					
					<div class="col-md-4 wow fadeIn" data-wow-delay="1.2s">
						<div class="economic-performance-wrapper">
							<p class="value counter"><?= $fields['groupwide_economic_performance']['total_economic_value_retained']; ?></p>
							<div class="icons">
								<img src="<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/GEP-3.png'; ?> " alt="">
								<p>Total Economic <br/>Value Retained</p>
							</div>	
						</div>	
					</div>
					
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if($fields['job_creation']): ?>
<section class="smph-wrapper job-creation view-all-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="section-title flex-column align-items-start">
			<h2 class="title">Job Creation</h2>
			<p class="subtext"><?= $fields['job_creation']['subtext']; ?></p>
		</div>
		<div class="section-body">
			<p class="description"><?= $fields['job_creation']['description']; ?></p>
			<div class="img-wrapper">
				<div class="job-creation-wrapper counter-wrapper wow fadeIn">
					<img src="<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/Job Creation.png'; ?> " alt="" class="d-block small-img">
					<p class="count counter"><?= $fields['job_creation']['employed']['employed_count']; ?></p>
					<p class="details"><?= $fields['job_creation']['employed']['employed_text']; ?></p>
				</div>
				<img src="<?= get_template_directory_uri().'/assets/images/sustainability/our-people/Forbes_Global2000_WBE2019_Siegel_Basic.png'; ?> " alt="" class="d-block by-img wow fadeIn" data-wow-delay="0.4s">
				<img src="<?= get_template_directory_uri().'/assets/images/sustainability/our-people/Forbes_Global2000_BRC2019_Siegel_Basic.png'; ?> " alt="" class="d-block by-img wow fadeIn" data-wow-delay="0.8s">
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if($fields['support_to_local_entrepreneurs']): ?>
	<section class="smph-wrapper local-entrep view-all-wrapper">
		<div class="smph-inner-subcontainer">
			<div class="section-title">
				<h2 class="title">Support to Local Entrepreneurs</h2>
			<p class="subtext"><?= $fields['support_to_local_entrepreneurs']['subtext']; ?></p>
			</div>
			<div class="section-body">
				<p><?= $fields['support_to_local_entrepreneurs']['description']; ?></p>
				<div class="row counter-wrapper">
					<?php foreach($fields['support_to_local_entrepreneurs']['column'] as $val): ?>
					<div class="col-md-3 local-entrep-wrapper wow fadeIn" data-wow-delay="0.4s">
						<p class="count counter"><?= $val['count']; ?></p>
						<p class="details"><?= $val['description']; ?></p>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="img-wrapper text-center">
					<img src="<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/Support-2.png'; ?> " alt="" class="w-50">
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if($fields['innovative_banking_products_and_services']): ?>
	<section class="smph-wrapper banking-products-services view-all-wrapper">
		<div class="smph-inner-subcontainer">
			<div class="section-title">
				<h2 class="title">Innovative Banking Products and Services</h2>
				<p class="subtext"></p>
			</div>
			<div class="section-body">
				<p><?= $fields['innovative_banking_products_and_services']['description']; ?></p>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<?php foreach($fields['innovative_banking_products_and_services']['column'] as $val): ?>
								<div class="col-md-6 banking-products-services-wrapper wow fadeIn" data-wow-delay="<?= $delay += 0.2; ?>s">
									<p class="count counter"><?= $val['count']; ?></p>
									<p class="details"><?= $val['description']; ?></p>
								</div>
							<?php endforeach; ?>
							<div class="col-md-12 img-wrapper">
								<img src="<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/Innovative Banking-2.png'; ?> " alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="img-hover-container">
							<img src="<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/Cash-Agad-unites-communities-and-LGUs-amid-pandemic-1--700px-width.jpg'; ?> " alt="">
							<div class="details">
								<p>BDO’s Cash Agad is a mobile banking solution which allows debit and prepaid cardholders to perform banking transactions through the use of point-of-sale (POS) terminals deployed to the BDO’s partner agents, which are mostly local micro businesses, pawnships, local grocery stores and other similar establishments</p>
							</div>
						</div>
					</div>
				</div>
					
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="smph-wrapper contribution-to-ndg parallax" style="background-image: url('<?= get_template_directory_uri().'/assets/images/sustainability/economic-impact/SM MOA Complex2020_edited.jpg'; ?>')">
	<div class="parallax-content wow fadeIn" data-wow-delay="0.4s">
		<div class="smph-inner-subcontainer">
			<div class="row">
				<h3 class="title col-md-12">Contribution to National Development Goals</h3>
				<div class="left-content col-md-6">
					<p class="value counter">PHP25.9bn</p>
					<p>smph taxes paid in 2019</p>
				</div>
				<div class="right-content col-md-6">
					<p>We contribute to local economic growth, serving as one of the top tax payers in various municipalities.</p>
				</div>
			</div>
		</div>
	</div>
</section>