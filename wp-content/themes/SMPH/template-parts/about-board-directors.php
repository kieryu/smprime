<?php

	/* DISPLAY Board of Directors */
	$cpt_arg = array(
		'post_type' => 'board_directors', 
		'post_status' => 'publish', 
  	'posts_per_page' => -1,
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>

<section class="smph-wrapper board-of-directors pt-0">
	<div class="smph-inner-subcontainer">
		<div class="section-body">
			<div class="bod-container">
				<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
					<?php $bod_position = get_post_meta(get_the_ID(),'bod_position'); ?>
					<?php $bod_age      = get_post_meta(get_the_ID(),'bod_age'); ?>

					<div class="bod-wrapper">
						<a href="<?= get_the_permalink(); ?>"  class="bod-name"><?= the_title(); ?></a>
						<p class="position"><?= $bod_position[0]; ?></p>
					</div>
			  <?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>