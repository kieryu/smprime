<?php get_header(); ?>
<?php global $post;$post_id = $post->ID; ?>

<?php get_template_part('template-parts/inside', 'banner'); ?> <!-- inside banner -->

<div class="smph-breadcrumbs">
	<div class="smph-container">
		<?php custom_breadcrumbs(); ?>
	</div>
</div>

<?php if(have_posts()) : ?>
	<?php while( have_posts() ) : the_post(); ?>
	<?php $bod_position = get_post_meta(get_the_ID(),'bod_position'); ?>
	<?php $bod_age      = get_post_meta(get_the_ID(),'bod_age'); ?>
			<section class="mainbody-content">
				<div class="smph-inner-subcontainer">
					<div class="row">
						<div class="col-sm-9 smph-inside-section">
							<div class="row">
								<div class="profile-image col-md-3">
									<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
										<?php the_post_thumbnail('full'); ?>
									<?php } ?> 
								</div>
								<div class="profile-content col-md-9">
									<h2 class="bod-name"><?= the_title(); ?></h2>
									<p class="bod-position"><?= $bod_position[0]; ?></p>
									<p class="bod-age"><?= $bod_age[0]; ?></p>
									<?= the_content(); ?>
								</div>
							</div>
						</div>
						<?php
							$cpt_arg = array(
								'post_type' => 'board_directors', 
								'post_status' => 'publish', 
						  	'posts_per_page' => -1,
								'order' => 'DESC'
							);
						  $cpt_query = new WP_Query($cpt_arg);
						?>
						<aside class="col-sm-3 inside-side-nav">
							<h2 class="block-title">Board of Directors</h2>
							<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
								<a href="<?= get_the_permalink(); ?>" class="bod-quicklinks <?= ($post_id == get_the_ID()) ? 'active' : '' ; ?>"><?= the_title(); ?></a>
						  <?php endwhile; endif; wp_reset_postdata(); ?>
						</aside>
					</div>
				</div>
			</section>
	<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>