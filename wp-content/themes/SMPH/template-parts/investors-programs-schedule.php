
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>



<?php if($fields['program_&_schedule']): ?>
	<section class="mainbody-content pt-0">
		<div class="smph-inner-subcontainer">
			<?php foreach($fields['program_&_schedule'] as $key => $val): ?>
				<?= $val['content_body']; ?>

				<?php if($val['schedule']): ?>
					<div id="schedule_accordion_<?= $key; ?>" class="programs-schedule-accordion smph-wrapper pt-0">
						<?php foreach($val['schedule'] as $key2 => $val2): ?>

						  <div class="card accordion-chevron-wrapper">
						    <div class="card-header" id="headingOne">
						      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $key.$key2; ?>" aria-expanded="true" aria-controls="collapse<?= $key.$key2; ?>">
						        <span><?= $val2['title']; ?></span>
						        <i class="fa fa-chevron-down"></i>
						      </button>
						    </div>

						    <div id="collapse<?= $key.$key2; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#schedule_accordion_<?= $key; ?>">
						      <div class="card-body">
						        <?= $val2['content']; ?>
						      </div>
						    </div>
						  </div>

						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>