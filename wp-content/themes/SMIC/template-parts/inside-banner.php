
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>
 
<?php if($post->ID == 7994) : ?> <!-- ASM Inner Banner -->
	<?php if($fields['banner_image']) : ?>
		<section class="inside-pages-banner annual">
			<img src="<?= $fields['banner_image']['url']; ?>" alt="">
			<div class="banner-content text-<?= strtolower($fields['banner_text_color']); ?>">
				<h2 class="banner-title <?= ($fields['text_shadow'] == 'True') ? 'with-shadow' : ''; ?>"><?= $fields['banner_title']; ?></h2>
				<p><?= $fields['banner_description']; ?></p>
			</div>
			<div class="shadow"></div>
		</section>
	<?php endif; ?>
<?php else : ?>
	<?php if($fields['banner_image']) : ?>
		<section class="inside-pages-banner">
			<img src="<?= $fields['banner_image']['url']; ?>" alt="">
			<div class="banner-content text-<?= strtolower($fields['banner_text_color']); ?>">
				<h2 class="banner-title <?= ($fields['text_shadow'] == 'True') ? 'with-shadow' : ''; ?>"><?= $fields['banner_title']; ?></h2>
				<p><?= $fields['banner_description']; ?></p>
			</div>
			<div class="shadow"></div>
		</section>
	<?php endif; ?>
<?php endif; ?>