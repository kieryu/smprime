<?php

  global $post;

	$cpt_arg = array(
	  'post_type' => 'page',
	  'post_parent' => 446,
	  'posts_per_page' => 8,
		'post__not_in' => array($post->ID),
		'order' => 'ASC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>

<section class="smph-wrapper custom-quicklinks">
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
