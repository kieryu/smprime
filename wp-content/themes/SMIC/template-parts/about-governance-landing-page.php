<?php

  global $post;

	$cpt_arg = array(
	  'post_type' => 'page',
	  'post_parent' => $post->ID,
	  'posts_per_page' => 6,
		'order' => 'ASC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>

<section class="smph-wrapper governance-quicklinks">
	<div class="smph-inner-subcontainer">
		<div class="quicklinks-container">
			<div class="row">
				<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
					<div class="quicklinks col-md-6">
						<a href="<?= the_permalink(); ?>" class="quicklinks-wrapper">
							<div class="img-wrapper">
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
									<?php the_post_thumbnail('full'); ?>
								<?php } ?> 
							</div>
							<h4 class="quicklinks-title"><?= the_title(); ?></h4>
						</a>
					</div>
			  <?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>

<?php $fields = get_fields(); ?>

<section class="smph-wrapper download-mgmt-wrapper">
	<div class="smph-inner-subcontainer">
		<div class="downloads-container">
			<h5 class="title">Downloads</h5>

			<div class="dl-wrapper">

				<?php if($fields['file_1']) : ?>
					<a href="<?= $fields['file_1']['downloadable_file']['url']; ?>" target="_blank" class="downloads-wrapper">
						<div class="dl-sprite file-1"></div>
						<p class="dl-title"><?= $fields['file_1']['download_label']; ?></p>
					</a>
				<?php endif; ?>
				
				<?php if($fields['file_4']) : ?>
					<a href="<?= $fields['file_4']['downloadable_file']['url']; ?>" target="_blank" class="downloads-wrapper">
						<div class="dl-sprite file-4"></div>
						<p class="dl-title"><?= $fields['file_4']['download_label']; ?></p>
					</a>
				<?php endif; ?>
				
				<?php if($fields['file_2']) : ?>
					<a href="<?= $fields['file_2']['downloadable_file']['url']; ?>" target="_blank" class="downloads-wrapper">
						<div class="dl-sprite file-2"></div>
						<p class="dl-title"><?= $fields['file_2']['download_label']; ?></p>
					</a>
				<?php endif; ?>
				
				<?php if($fields['file_5']) : ?>
					<a href="<?= $fields['file_5']['downloadable_file']['url']; ?>" target="_blank" class="downloads-wrapper">
						<div class="dl-sprite file-5"></div>
						<p class="dl-title"><?= $fields['file_5']['download_label']; ?></p>
					</a>
				<?php endif; ?>
				
				<?php if($fields['file_3']) : ?>
					<a href="<?= $fields['file_3']['downloadable_file']['url']; ?>" target="_blank" class="downloads-wrapper">
						<div class="dl-sprite file-3"></div>
						<p class="dl-title"><?= $fields['file_3']['download_label']; ?></p>
					</a>
				<?php endif; ?>
				
				<?php if($fields['file_6']) : ?>
					<a href="<?= $fields['file_6']['downloadable_file']['url']; ?>" target="_blank" class="downloads-wrapper">
						<div class="dl-sprite file-6"></div>
						<p class="dl-title"><?= $fields['file_6']['download_label']; ?></p>
					</a>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>
