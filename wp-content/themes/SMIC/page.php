<?php get_header(); ?>
<?php global $post; ?>

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

	// At a Glance Staging 2557 Local 1729
	($post->ID == 2557) ? get_template_part('template-parts/about', 'at-a-glance') : '';

	// Awards and Citations Staging 2545 Local 1689
	($post->ID == 2545) ? get_template_part('template-parts/about', 'awards-and-citations') : '';

	// Board of Directors staging 2649 local 1753
	($post->ID == 2649) ? get_template_part('template-parts/about', 'our-history') : '';

	// Board of Directors staging 2735  local 1810
	($post->ID == 2735) ? get_template_part('template-parts/about', 'retails') : '';

	// Board of Directors
	($post->ID == 304) ? get_template_part('template-parts/about', 'board-directors') : '';

	// Governance
  ($post->ID == 363) ? get_template_part('template-parts/about', 'governance-landing-page') : '';

	// equity investments staging 3972 local 2202
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

	// staging 1672 local 1556
	($post->ID == 1672) ? get_template_part('template-parts/sustainability', 'sustainable-growth') : '';

	// staging 1676 local 1562
	($post->ID == 1676) ? get_template_part('template-parts/sustainability', 'value-creation') : '';

	// 2448 local 1650
	($post->ID == 2448) ? get_template_part('template-parts/sustainability', 'leadership') : '';

	// 2452 local 1667
	($post->ID == 2452) ? get_template_part('template-parts/sustainability', 'our-economic-impact') : '';

	// staging 3797  local 2152
	($post->ID == 3797) ? get_template_part('template-parts/sustainability', 'presidents-report') : '';

	// staging 3968 local 2192
	($post->ID == 3968) ? get_template_part('template-parts/sustainability', 'communities-we-serve') : '';

	// staging 4078 local 2232
	($post->ID == 4078) ? get_template_part('template-parts/sustainability', 'responsible-investments') : '';


?>


<?php
	/* ====================================
					  INVESTORS PAGES
	=====================================*/

	// Overview 2317 local 1579
	($post->ID == 2317) ? get_template_part('template-parts/investors', 'overview') : '';

	// Investors FAQs 2336 local 1599
	($post->ID == 2336) ? get_template_part('template-parts/investors', 'faqs') : '';

	// Annual Reports
	($post->ID == 243) ? get_template_part('template-parts/investors', 'annual-reports') : '';


?>

<?php 

	($post->ID == 448) ? get_template_part('template-parts/media','landing-page') : '';

	// 1759 
	($post->ID == 1759) ? get_template_part('template-parts/media', 'multimedia') : '';

	// 1761 
	($post->ID == 1761) ? get_template_part('template-parts/media', 'multimedia-speeches') : '';

?>

<?php 
	($post->ID == 7994) ? get_template_part('template-parts/annual','2021') : '';
?>


<?php get_footer(); ?>