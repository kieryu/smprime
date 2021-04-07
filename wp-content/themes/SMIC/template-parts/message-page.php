
<?php /* Template Name: Message's Page */ ?>

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

<?php //print'<pre>';print_r($fields);print'</pre>'; ?>


<?php get_footer(); ?>