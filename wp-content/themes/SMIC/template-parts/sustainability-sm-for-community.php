
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

<?php if($fields['cta_banner_link_out']): ?>
	<?php foreach($fields['cta_banner_link_out'] as $key => $value): ?>
		<?php if($value['banner_image']['url']): // CHECK IF HAS BANNER IMAGE ?>
			<section class="smph-wrapper cta-banner cta-banner-link-out cta-banner-key-<?= $key; ?>">
				<img src="<?= $value['banner_image']['url']; ?>" alt="" class="cta-banner-image">
				<div class="smph-inner-subcontainer">
					<div class="cta-banner-content">
						<?= $value['content']; ?>
					</div>
				</div>
			</section>
		<?php endif; //IF HAS BANNER IMAGE ?>
	<?php endforeach; ?>
<?php endif; ?>


<?php get_footer(); ?>