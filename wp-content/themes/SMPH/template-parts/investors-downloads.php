
<?php /* Template Name: Investor Downloads */ ?>

<?php get_header(); ?>
<?php global $post; ?>
<?php $fields = get_fields(); ?>

<?php 
	if($post->ID == 2332) {
		$post_type = 'financial_reports';
		$tax_name = 'reports_type';
	}	else if($post->ID == 2325) {
		$post_type = 'corp_disclosure';
	} else if($post->ID == 2329) {
		$post_type = 'inv_presentations';
	}

?>

<?php get_template_part('template-parts/inside', 'banner'); ?> <!-- inside banner -->

<div class="smph-breadcrumbs">
	<div class="smph-container">
		<?php custom_breadcrumbs(); ?>
	</div>
</div>

<?php if(have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<?php if( '' !== get_post()->post_content ): ?>
			<section class="mainbody-content">
				<div class="smph-inner-subcontainer">
					<?= the_content(); ?>
				</div>
			</section>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php

  $year = get_posts_years_array($post_type);

?>


<section class="smph-wrapper pdf-file-container view-all-wrapper pt-5 ajax-loader-pdf">
	<div class="smph-center-container">
		<div class="section-title">
			<h3 class="title">Downloads</h3>
			<input type="hidden" id="post_type" value="<?= $post_type; ?>">
			<?php 
				if($post_type == 'financial_reports'):
					$terms = get_terms([
					    'taxonomy' => $tax_name,
					    'hide_empty' => false,
					]);
				endif;
			?>
			<form action="#">
				<?php if($post_type == 'financial_reports'): ?>
					<input type="hidden" id="taxonomy_type" value=<?= $tax_name; ?>>
					<select name="reports_type" id="taxonomy_id">
						<option value="all">All</option>
						<?php foreach($terms as $val): ?>
							<option value="<?= $val->term_id; ?>"><?= $val->name; ?></option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>
				<select name="reports_year" id="post_year">
					<option value="all">All</option>
					<?php foreach($year as $val): ?>
						<option value="<?= $val['year']; ?>"><?= $val['year']; ?></option>
					<?php endforeach; ?>
				</select>
			</form>
		</div>
  	<div class="loader hide"></div>
		<div class="section-body">

		</div>
	</div>
</section>



<?php get_footer(); ?>