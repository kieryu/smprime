
<?php /* Template Name: Landing Pages with CTA Links and Numbers */ ?>

<?php get_header(); ?>
<?php global $post; ?>

<?php get_template_part('template-parts/inside', 'banner'); ?> <!-- inside banner -->

<div class="smph-breadcrumbs">
	<div class="smph-container">
		<?php custom_breadcrumbs(); ?>
	</div>
</div>

<?php if(have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<section class="mainbody-content">
			<div class="smph-inner-subcontainer">
				<?= the_content(); ?>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>

<?php $fields = get_fields(); ?>

<?php if($fields['cta_banner_link_out_with_numbers']): ?>
	<?php foreach($fields['cta_banner_link_out_with_numbers'] as $key => $value): ?>
		<?php if($value['banner_image']['url']): $sec += 0.2;// CHECK IF HAS BANNER IMAGE ?>
			<section class="smph-wrapper cta-banner cta-banner-link-out cta-banner-key-<?= $key; ?> cta-banner-link-out-with-numbers">
				<img src="<?= $value['banner_image']['url']; ?>" alt="" class="cta-banner-image">
				<div class="smph-inner-subcontainer wow fadeIn" data-wow-delay="<?= $sec; ?>s">
					<div class="cta-banner-content">
						<div class="content-wrapper">
							<?= $value['content']; ?>
						</div>
						<?php if($value['numbers']): ?>
							<div class="numbers-content">
								<?php foreach($value['numbers'] as $val2): ?>
									<div class="numbers-wrapper">
										<p class="floating-element"><?= $val2['text_above'] ?></p>
										<p class="count counter"><?= $val2['value']; ?></p>
										<p class="description"><?= $val2['description']; ?></p>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; //IF HAS BANNER IMAGE ?>
	<?php endforeach; ?>
<?php endif; ?>


<?php get_footer(); ?>