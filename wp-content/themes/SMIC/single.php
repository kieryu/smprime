<?php get_header(); ?>
<?php 
	$taxonomies = get_taxonomies('','names');
	$taxonomy_name = wp_get_post_terms(get_the_id(), $taxonomies);
	$taxonomy = $taxonomy_name[0]->taxonomy;
	$term_id = $taxonomy_name[0]->term_id;
	$post_type = get_post_type();
?>

<section class="smph-wrapper taxonomy-wrapper <?= $post_type; ?>">
	<div class="smph-inner-container">

			<article class="single-article-container">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="article-wrapper-main">
						<div class="article-header">
								<div class="article-title-wrapper">
									<?php if($taxonomy_name[0]->name) : ?>
							 			<?php if($taxonomy_name[0]->slug != 'no-category'): ?>
											<span class="taxonomy-type"><?= $taxonomy_name[0]->name; ?></span>
										<?php endif; ?>
									<?php endif; ?>
									<h3 class="article-title"><?= the_title(); ?></h3>
								</div>
								<div class="article-datetime-wrapper">
									<span class="time"><?= the_time('l, M j, Y'); ?></span>
									<div class="sm-sharer">
										<a href="//www.facebook.com/sharer/sharer.php?u=<?= get_permalink(); ?>" class="sm-sprite fb" title="Share on Facebook" target="_blank" onclick="window.open(this.href, 'newwindow', 'width=700, height=400,left=400, top=200'); return false;">Share on Facebook</a>
										<a href="https://twitter.com/intent/tweet?url=<?= get_permalink(); ?>" class="sm-sprite twitter" target="_blank" onclick="window.open(this.href, 'newwindow', 'width=700, height=400,left=400, top=200'); return false;">Share on Twitter</a>
										<a href="mailto:?subject=<?= the_title(); ?>&amp;body=<?= get_permalink(); ?>" class="sm-sprite mail" target="_blank" >Share on Mail</a>
										<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= get_permalink(); ?>" class="sm-sprite linked-in" target="_blank" rel="noopener noreferrer">Share on Linked In</a>
									</div>
								</div>
						</div>
						<div class="article-body">
							<?= the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query();  ?>
				<div class="article-sidebar">
					
					<?php if($post_type == 'press_release'){ ?>
						<h4 class="sidebar-title">Other Press Release</h4>
					<?php } else if( $post_type == 'latest_news' ) { ?>
						<h4 class="sidebar-title">Other News</h4>
					<?php } else { ?>
						<h4 class="sidebar-title">Other Stories</h4>
					<?php } ?>

					<?php 
						global $post;
						if($taxonomy && $term_id && $post_type != 'stories') {
							$cpt_arg = array(
								'post_type' => $post_type, 
								'post_status' => 'publish', 
						  	'posts_per_page' => 6,
							 	// 'orderby' => 'rand',
							 	'orderby' => 'date',
								'post__not_in' => array($post->ID),
								'ignore_sticky_posts'=>1,
								'order' => 'DESC',
						  	'tax_query' => array(
						        array(
						            'taxonomy' => $taxonomy,
						            'terms'    => $term_id,
						        ),
						    ),
							);
						} else {
							$cpt_arg = array(
								'post_type' => $post_type, 
								'post_status' => 'publish', 
						  	'posts_per_page' => 6,
							 	// 'orderby' => 'rand',
							 	'orderby' => 'date',
								'post__not_in' => array($post->ID),
								'ignore_sticky_posts'=>1,
								'order' => 'DESC',
							);
						}

					  $cpt_query = new WP_Query($cpt_arg);
					?>
					<?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post();  ?>
						<a href="<?= the_permalink(); ?>" class="article-side-wrapper">
							<!-- <div class="img-wrapper"> -->
								<?php //if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?> 
									<?php //the_post_thumbnail('full'); ?>
								<?php //} ?> 
							<!-- </div>				 -->
							<div class="info">
								<span class="time"><?= the_time('l, M j, Y'); ?></span>
								<h4 class="title"><?= the_title(); ?></h4>
							</div>
						</a>
				  <?php endwhile; endif; wp_reset_postdata(); ?>
				  <?php 
				  	if($term_id && $post_type != 'stories') {
							$go_back_link = get_term_link($term_id);				  		
				  	} else {
				  		if($post_type == 'story_kasama_sm') {
				  			$go_back_link = get_permalink(687);
				  		} else if($post_type == 'press_release') {
				  			$go_back_link = get_permalink(448).'?type=pressRelease';
				  		} else if($post_type == 'stories') {
				  			$go_back_link = get_permalink(448).'?type=stories';
				  		} else if($post_type == 'latest_news') {
				  			$go_back_link = get_permalink(448).'?type=latestNews';
				  		}
				  	}
				  ?>
				  <a href="<?= $go_back_link; ?>" class="go-back smph-btn blue-btn">Go Back</a>
				</div>
			</article>
	</div>
</section>

<?php get_footer(); ?>
