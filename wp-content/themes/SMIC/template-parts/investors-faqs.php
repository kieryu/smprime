
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>


<?php if($fields['faqs']): ?>
	<section id="accordion" class="faqs-wrapper smph-wrapper">
		<div class="smph-center-container">
			
			<?php foreach($fields['faqs'] as $key => $val): ?>
			  <div class="card">
			    <div class="card-header" id="headingOne">
			      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?= $key; ?>" aria-expanded="true" aria-controls="collapse-<?= $key; ?>">
			        <?= $val['question']; ?>
			        <i class="fa fa-plus"></i>
			      </button>
			    </div>
			    <div id="collapse-<?= $key; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
			      <div class="card-body">
			        <?= $val['answer']; ?>
			      </div>
			    </div>
			  </div>
			<?php endforeach; ?>

		</div>
	</section>
<?php endif; ?>