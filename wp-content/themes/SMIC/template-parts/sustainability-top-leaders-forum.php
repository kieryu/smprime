<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<?php if($fields['first_stack']['image']['url']): ?>
<section class="smph-wrapper top-leaders-forum-first-stack">
	<div class="smph-inner-subcontainer">
		<div class="first-stack-wrapper">
			<div class="desc-content">
				<?= $fields['first_stack']['description'] ?>
			</div>
			<div class="img-content">
				<img src="<?= $fields['first_stack']['image']['url']; ?>" alt="<?= $fields['image']['url']; ?>">
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if($fields['message']['speaker_image']): ?>
	<section class="smph-wrapper ungc-message-container">
		<div class="smph-inner-subcontainer">
			<div class="message-wrapper">
				<div class="img-content">
					<img src="<?= $fields['message']['speaker_image']['url']; ?>" alt="<?= $fields['message']['speaker_image']['alt']; ?>" class="speaker-image">
				</div>
				<div class="desc-content">
					<h5 class="title"><?= $fields['message']['title']; ?></h5>
					<p class="desc"><?= $fields['message']['message']; ?></p>
					<div class="message-info">
						<span class="name"><?= $fields['message']['name']; ?></span>
						<span class="position"><?= $fields['message']['position']; ?></span>
						<span class="company"><?= $fields['message']['company']; ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>



<?php if($fields['images']): ?>
<section class="smph-wrapper ungc-photos-container">
	<div class="smph-inner-subcontainer">
		<div class="section-body">
			<?php foreach($fields['images'] as $val): ?>
				<div class="stack-item">
					<div class="img-wrapper">
						<img src="<?= $val['images']['url']; ?>" alt="<?= $val['images']['alt']; ?>">
					</div>
					<?php if($val['description']): ?><p class="desc"><?= $val['description']; ?></p><?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>		
	</div>
</section>
<?php endif; ?>