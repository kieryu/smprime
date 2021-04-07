
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<?php if($fields['store_network']['stores']): ?>

	<section class="smph-wrapper store-network-container view-all-wrapper">
		
		<div class="smph-inner-subcontainer">
			
			<div class="section-title">
				<h3 class="title">Store Network</h3>
				<p class="subtitle"><?= $fields['store_network']['subtitle']; ?></p>
			</div>
			<div class="body-container">
				<div id="counter" class="row counter-wrapper">

					<?php foreach($fields['store_network']['stores'] as $val): ?>

						<div class="store-network-wrapper col-md-3">
							<p class="count counter"><?= $val['count']; ?></p>
							<p class="name"><?= $val['name']; ?></p>
						</div>

					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</section>

<?php endif; ?>

<?php if($fields['the_sm_store']): ?>
	<section class="smph-wrapper sm-store-markets-container">
		<div class="img-wrapper">
			<img src="<?= $fields['the_sm_store']['banner_image']['url']; ?>" alt="<?= $fields['the_sm_store']['banner_image']['alt']; ?>">
		</div>
		<div class="smph-inner-subcontainer">
			<h3 class="title">The SM Store</h3>
			<?= $fields['the_sm_store']['content']; ?>
		</div>
	</section>
<?php endif; ?>


<?php if($fields['sm_markets']): ?>
	<section class="smph-wrapper sm-store-markets-container">
		<div class="img-wrapper">
			<img src="<?= $fields['sm_markets']['banner_image']['url']; ?>" alt="<?= $fields['sm_markets']['banner_image']['alt']; ?>">
		</div>
		<div class="smph-inner-subcontainer">
			<h3 class="title">SM Markets</h3>
			<?= $fields['sm_markets']['content']; ?>
		</div>
	</section>
<?php endif; ?>

<?php if($fields['specialty_stores']): ?>
	<section class="smph-wrapper specialty-stores-container">
		<div class="smph-inner-subcontainer">
			<div class="left-content col-md-4">
				<?= $fields['specialty_stores']['content']; ?>
			</div>
			<div class="right-content col-md-8">
				<?php foreach($fields['specialty_stores']['images'] as $val): ?>
					<img src="<?= $val['images']['url']; ?>" alt="<?= $val['images']['alt']; ?>">
				<?php endforeach; ?>
			</div>
			<?php //print'<pre>';print_r($fields['specialty_stores']);print'</pre>'; ?>
		</div>
	</section>
<?php endif; ?>

<?php if($fields['cta_banner']): ?>
	<section class="smph-wrapper our-investsments-cta-banner">
		<div class="img-wrapper">
			<img src="<?= $fields['cta_banner']['banner_image']['url']; ?>" alt="<?= $fields['cta_banner']['banner_image']['alt']; ?>">
		</div>
		<div class="smph-inner-subcontainer">
			<div class="the-content">
				<h2 class="title"><?= $fields['cta_banner']['title']; ?></h2>
				<?= $fields['cta_banner']['description']; ?>
			</div>
		</div>
	</section>
<?php endif; ?>