<?php get_header(); ?>
<?php global $post; ?>


<?php ($post->ID == 446) ? wp_redirect(get_permalink(2317)) : ''; //investors redirect to overview page ?>
<?php ($post->ID == 439) ? wp_redirect(get_permalink(1672)) : ''; //sustainability, redirect to path to sustainbiltiy ?>

<?php get_template_part('template-parts/inside', 'banner'); ?> <!-- inside banner -->

<div class="smph-breadcrumbs">
	<div class="smph-container">
		<?php custom_breadcrumbs(); ?>
	</div>
</div>

<?php if(have_posts() && $post->ID != 2545) : ?>
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
	/* ====================================
					    ABOUT US PAGES
	=====================================*/

	// About Landing
	($post->ID == 444) ? get_template_part('template-parts/about', 'landing') : '';

	($post->ID == 2557) ? get_template_part('template-parts/about', 'at-a-glance') : '';

	($post->ID == 2545) ? get_template_part('template-parts/about', 'awards-and-citations') : '';

	($post->ID == 2649) ? get_template_part('template-parts/about', 'our-history') : '';

	($post->ID == 2735) ? get_template_part('template-parts/about', 'retails') : '';

	// Board of Directors
	($post->ID == 304) ? get_template_part('template-parts/about', 'board-directors') : '';

	// Governance
  ($post->ID == 363) ? get_template_part('template-parts/about', 'governance-landing-page') : '';

  ($post->ID == 392) ? get_template_part('template-parts/about', 'governance-board-committees') : '';

  ($post->ID == 3972) ? get_template_part('template-parts/about', 'equity-investments') : '';

?>


<?php
	/* ====================================
					SUSTAINABILITY PAGES
	=====================================*/

	// Sustainability Reports
	($post->ID == 46) ? get_template_part('template-parts/sustainability', 'reports') : '';

	// Green Movement
	($post->ID == 460) ? get_template_part('template-parts/sustainability', 'green-movement') : '';

	// Kasama ng SM
	($post->ID == 468) ? get_template_part('template-parts/sustainability', 'kasama-sm') : '';

	// COVID-19 Response
	($post->ID == 479) ? get_template_part('template-parts/sustainability', 'covid-response') : '';

	// Kasama ng SM Media Page
	($post->ID == 687) ? get_template_part('template-parts/sustainability', 'kasama-sm-article') : '';

	// Kasama ng SM Media Page
	($post->ID == 1198) ? get_template_part('template-parts/sustainability', 'gri-sustainability-summit') : '';

	($post->ID == 1201) ? get_template_part('template-parts/sustainability', 'summit') : '';

	($post->ID == 1313) ? get_template_part('template-parts/sustainability', 'top-leaders-forum') : '';

	($post->ID == 1423) ? get_template_part('template-parts/sustainability', 'green-responsibility') : '';

	($post->ID == 1521) ? get_template_part('template-parts/sustainability', 'our-people') : '';

	($post->ID == 1529) ? get_template_part('template-parts/sustainability', 'culture-and-values') : '';

	($post->ID == 1672) ? get_template_part('template-parts/sustainability', 'sustainable-growth') : '';

	($post->ID == 1676) ? get_template_part('template-parts/sustainability', 'value-creation') : '';

	($post->ID == 2448) ? get_template_part('template-parts/sustainability', 'leadership') : '';

	($post->ID == 2452) ? get_template_part('template-parts/sustainability', 'our-economic-impact') : '';

	($post->ID == 3797) ? get_template_part('template-parts/sustainability', 'presidents-report') : '';

	($post->ID == 3968) ? get_template_part('template-parts/sustainability', 'communities-we-serve') : '';

	($post->ID == 4078) ? get_template_part('template-parts/sustainability', 'responsible-investments') : '';

	($post->ID == 9088) ? get_template_part('template-parts/sustainability', 'milestones') : '';


	( $post->post_parent == 9116 ) ? get_template_part('template-parts/sustainability', 'sm-care') : '' ; 


?>


<?php
	/* ====================================
					  INVESTORS PAGES
	=====================================*/

	($post->ID == 2317) ? get_template_part('template-parts/investors', 'overview') : '';

	($post->ID == 2336) ? get_template_part('template-parts/investors', 'faqs') : '';

	// Annual Reports
	($post->ID == 243) ? get_template_part('template-parts/investors', 'annual-reports') : '';

	($post->ID == 9000) ? get_template_part('template-parts/investors', 'programs-schedule') : '';


?>

<?php 

	($post->ID == 448) ? get_template_part('template-parts/media','landing-page') : '';

	($post->ID == 1759) ? get_template_part('template-parts/media', 'multimedia') : '';

	($post->ID == 1761) ? get_template_part('template-parts/media', 'multimedia-speeches') : '';

?>

<?php 
	($post->ID == 7994) ? get_template_part('template-parts/annual','2021') : '';
?>


<?php get_footer(); ?>