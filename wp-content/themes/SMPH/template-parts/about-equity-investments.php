
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<section class="smph-wrapper equity-investments-percentage-wrapper pt-0 pb-0">
	<img src="<?= $fields['equity_investments']['banner_image']['url']; ?>" alt="<?= $fields['equity_investments']['banner_image']['alt']; ?>">
	<div class="smph-inner-subcontainer">
		<div class="section-title">
			<h3 class="title"><?= $fields['equity_investments']['title']; ?></h3>
			<p class="subtitle"><?= $fields['equity_investments']['subtitle']; ?></p>
		</div>
		<div class="section-body">
			<?php if($fields['equity_investments']['company_investments']): ?>
				<div class="counter-wrapper-container counter-wrapper">
					<?php foreach($fields['equity_investments']['company_investments'] as $key => $val): ?>
						<div class="cw">
							<p class="count"><span class="counter"><?= $val['percentage']; ?></span>%</p>
							<p class="description"><?= $val['company_name']; ?></p>
						</div>
					<?php endforeach; ?>	
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="mainbody-content">
	<div class="smph-inner-subcontainer">
		<?= $fields['equity_investments']['description']; ?>
	</div>
</section>

<section id="accordion" class="investments-company-container smph-wrapper pt-0">
	<div class="smph-center-container">
		
		<?php foreach($fields['equity_investments_companies'] as $key => $val): ?>
		  <div class="card accordion-chevron-wrapper wow fadeIn" data-wow-deley="<?= $delay+=0.4 ?>s">
		    <div class="card-header" id="headingOne">
		      <a class="btn" data-toggle="collapse" data-target="#collapse-<?= $key; ?>" aria-expanded="true" aria-controls="collapse-<?= $key; ?>">
						<img src="<?= $val['banner_image']['url']; ?>" alt="<?= $val['banner_image']['alt']; ?>">
						<div class="btn-wrapper">
			      	<?= $val['company_name']; ?><i class="fa fa-chevron-down"></i>
			      </div>
		      </a>
		    </div>
		    <div id="collapse-<?= $key; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
		      <div class="card-body">
		        <?= $val['description']; ?>
		        <a class="back-to-header"><i class="fa fa-chevron-up"></i></a>
		      </div>
		    </div>
		  </div>
		<?php endforeach; ?>

	</div>
</section>