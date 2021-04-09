
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>


<?php if($fields['presidents_report']): ?>
	<section id="accordion" class="presidents-report-accordion-wrapper accordion-caret-wrapper smph-wrapper pt-0">
		<div class="smph-inner-subcontainer">
			
			<?php foreach($fields['presidents_report'] as $key => $val): ?>
			  <div class="card wow fadeIn" data-wow-delay="<?= $delay += 0.4 ?>s">
			    <div class="card-header" id="headingOne">
			      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-<?= $key; ?>" aria-expanded="true" aria-controls="collapse-<?= $key; ?>">
			        <?= $val['title']; ?>
			        <i class="fa fa-plus"></i>
			      </button>
			    </div>
			    <div id="collapse-<?= $key; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
		      	<?php $paragraph_count = substr_count( $val['description'], '</p>' ); ?>
			      <div class="card-body column-count">
			        <?= $val['description']; ?>
			      </div>
			    </div>
			  </div>
			<?php endforeach; ?>

		</div>
	</section>
<?php endif; ?>