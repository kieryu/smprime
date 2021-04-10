<section class="smph-wrapper our-history-container">
	<div class="smph-inner-subcontainer ">
		<p>Explore our milestones through this timeline</p>
	</div>
	<div class="smph-center-container oh-nav-container">
		<div class="left-content oh-nav-for">
			<ul>
			<?php
				/* DISPLAY AWARDS AND CITATIONS */
				$cpt_arg = array(
					'post_type' => 'sustain_milestones', 
					'post_status' => 'publish', 
			  	'posts_per_page' => -1,
			  	'order_by' => 'date',
					'order' => 'ASC'
				);
			  $cpt_query = new WP_Query($cpt_arg);
			?>
			<?php if ($cpt_query->have_posts()):  ?>
			<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
				<li><?= the_title(); ?></li>
			<?php endwhile;endif;wp_reset_postdata(); ?>
			</ul>
		</div>
		<div class="right-content oh-nav">
			<?php
				/* DISPLAY AWARDS AND CITATIONS */
				$cpt_arg = array(
					'post_type' => 'sustain_milestones', 
					'post_status' => 'publish', 
			  	'posts_per_page' => -1,
			  	'order_by' => 'date',
					'order' => 'ASC'
				);
			  $cpt_query = new WP_Query($cpt_arg);
			?>
			<?php if ($cpt_query->have_posts()):  ?>
			<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
				<div class="history-wrapper">
					<div class="history-wrapper-container">
						<div class="img-wrapper">
							<?php if ( has_post_thumbnail() ) { ?> 
								<?php the_post_thumbnail('full'); ?>
							<?php } ?> 					
						</div>
						<div class="info-wrapper">
							<p class="year"><?= the_title(); ?></p>
							<div class="details">
								<?= the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile;endif;wp_reset_postdata(); ?>
		</div>
	</div>
</section>


<?php
	/* DISPLAY FEATURED POST */
	$cpt_arg = array(
		'post_type' => array('stories','videos'), 
		'post_status' => 'publish', 
		'meta_key' => 'featured-history',
		'meta_value' => 'yes',
  	'posts_per_page' => 6,
	 	'orderby' => 'modified',
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);

?>

<?php if ($cpt_query->have_posts()) {  ?>
	<section class="smph-wrapper featured-content-two">
		<div class="smph-inner-subcontainer">
		<div class="section-title">
			<h3 class="title">Featured Content</h3>
		</div>
			<div class="section-body">

				<div class="row">
					<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
						
						<?php if(get_post_type() == 'videos') { ?>
							<?php if(strpos(get_fields(get_the_id(),'video_link')['video_link'], 'youtube') !== false) { ?>
						    <a data-fancybox href="<?= get_fields(get_the_id(),'video_link')['video_link']; ?>" class="featured-content-wrapper">
						  <?php } else { ?>
						    <a href="<?= get_fields(get_the_id(),'video_link')['video_link']; ?>" class="featured-content-wrapper" target="_blank">
						  <?php } ?>
						<?php } else { ?>
							<a href="<?= the_permalink(); ?>" class="featured-content-wrapper">
						<?php } ?>
							<div class="img-wrapper">
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
									<?php the_post_thumbnail('full'); ?>
								<?php } ?> 						
							</div>
							<div class="info-details">
						 		<?php $taxonomy = get_the_terms( $post->ID, 'taxonomy_media_stories' ); ?>
						 		<?php if($taxonomy): ?>
								<p class="type"><?= $taxonomy[0]->name; ?></p>
							 	<?php endif; ?>
								<h4 class="title"><?= the_title(); ?></h4>
							</div>
						</a>
						
					<?php endwhile;  ?>

				</div>

			</div>
		</div>
	</section>
<?php wp_reset_postdata(); } ?>