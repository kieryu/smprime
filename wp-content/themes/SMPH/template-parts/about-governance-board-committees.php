<?php get_header(); ?>
<?php global $post; ?>
<?php $fields = get_fields(); ?>

<?php if($fields['Committees']): ?>
	<div class="accordion board-committees-accordion smph-center-container mb-5" id="boardAccordion">
		<?php foreach($fields['Committees'] as $key => $val): ?>
		  <div class="card accordion-chevron-wrapper">
		    <div class="card-header" id="headingOne">
		      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $key; ?>" aria-expanded="true" aria-controls="collapse<?= $key; ?>">
		        <span><?= $val['committees']; ?></span>
		        <i class="fa fa-chevron-down"></i>
		      </button>
		    </div>

		    <div id="collapse<?= $key; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#boardAccordion">
		      <div class="card-body">
		        <?= $val['body']; ?>
		      </div>
		    </div>
		  </div>
		<?php endforeach;  ?>
	</div>
<?php endif; ?>

<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<?php get_footer(); ?>