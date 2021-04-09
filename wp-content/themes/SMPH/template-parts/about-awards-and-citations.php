
<?php $fields = get_fields(); ?>
<?php //print'<pre>';print_r($fields);print'</pre>'; ?>

<?php if(!$_GET['paged_ac']): ?>

	<?php if(have_posts() ) : ?>
		<?php while( have_posts() ) : the_post(); ?>
			<section class="mainbody-content">
				<div class="smph-inner-subcontainer">
					<?= the_content(); ?>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

<?php endif; ?>


<?php
	/* DISPLAY AWARDS AND CITATIONS */
	$paged_ac = isset( $_GET['paged_ac'] ) ? (int) $_GET['paged_ac'] : 1;
	$cpt_arg = array(
		'post_type' => 'award_citation', 
		'post_status' => 'publish', 
  	'posts_per_page' => 12,
  	'order_by' => 'date',
  	'paged' => $paged_ac,
		'order' => 'DESC'
	);
  $cpt_query = new WP_Query($cpt_arg);
  $ctr = 0;
?>

<?php if ($cpt_query->have_posts()):  ?>
	<div class="accordion awards-citations-accordion smph-center-container" id="accordionExample">
		<?php while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
		  <div class="card accordion-chevron-wrapper">
		    <div class="card-header" id="headingOne">
		      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $ctr; ?>" aria-expanded="true" aria-controls="collapse<?= $ctr; ?>">
		        <span><?= the_title(); ?></span>
		        <i class="fa fa-chevron-down"></i>
		      </button>
		    </div>

		    <div id="collapse<?= $ctr; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		      <div class="card-body">
		        <?= the_content(); ?>
		      </div>
		    </div>
		  </div>
		<?php $ctr++;endwhile; ?>
	</div>
<?php endif; ?>

	<section class="smph-wrapper awards-citations-container">
		<div class="smph-inner-subcontainer">

		<div class="pagination">
		    <?php 
          // http://codex.wordpress.org/Class_Reference/WP_Query#Pagination_Parameters
          $pag_args1 = array(
							'prev_text'    => __('<i class="fa fa-chevron-left"></i> Prev'),
							'next_text'    => __('Next <i class="fa fa-chevron-right"></i>'),
              'format'  => '?paged_ac=%#%',
              'current' => $paged_ac,
              'total'   => $cpt_query->max_num_pages,
          );
          echo paginate_links( $pag_args1 );
		    ?>
		</div>

		<?php wp_reset_postdata(); ?>
			
		</div>
	</section>