
<?php /* Template Name: Downloadable Files */ ?>

<?php get_header(); ?>
<?php global $post; ?>
<?php $fields = get_fields(); ?>

<?php get_template_part('template-parts/inside', 'banner'); ?> <!-- inside banner -->

<div class="smph-breadcrumbs">
	<div class="smph-container">
		<?php custom_breadcrumbs(); ?>
	</div>
</div>

<?php if(have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<section class="mainbody-content">
			<div class="smph-center-container">
				<?= the_content(); ?>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>

<?php if($fields['pdf_file']): ?>
	<section class="smph-wrapper pdf-file-container view-all-wrapper">
		<div class="smph-center-container">
			<div class="section-title">
				<h3 class="title">Downloads</h3>
			</div>
			<div class="section-body">
				<?php foreach($fields['pdf_file'] as $val): ?>
					<a href="<?= $val['file']['url']; ?>" target="_blank" class="list-style-wrapper">
							<p class="title"><?= $val['name']; ?></p>
							<i class="fa fa-file-download"></i>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php //print'<pre>';print_r($fields);print'</pre>'; ?>


<?php get_footer(); ?>