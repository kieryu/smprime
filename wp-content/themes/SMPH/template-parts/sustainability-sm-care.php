
<?php $fields = get_fields(); ?>

<?php //print '<pre>';print_r($fields);print'</pre>' ?>

<?php if($fields['sm_cares']): ?>
	<section class="sm-cares-container">
		<div class="smph-inner-subcontainer row">
			<?php foreach($fields['sm_cares'] as $key => $val): ?>
				<div class="col-md-4">
					<div class="sm-cares-wrapper">
						<p class="title"><?= $val['title']; ?></p>
						<div class="img-wrapper">
							<img src="<?= $val['thumbnail']['url']; ?>" alt="">
						</div>
						<p class="desc"><?= $val['description']; ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>