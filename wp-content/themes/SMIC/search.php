<?php get_header(); ?>

<section class="main-content inside-pages search-page">
  <div class="smph-inner-container">
    <!-- Search result -->
      <?php if( have_posts() ) : ?>
      <div class="search-for">
        <h1><?='Search Result For: <strong>'.get_search_query().'</strong>'; ?></h1>
        <?php global $wp_query; ?>
        <p><?= $wp_query->found_posts.' results found'; ?></p>
      </div>
      <?php while( have_posts() ) : the_post(); ?>
      <div class="_init_search_result">
        <h2><a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="_init_search_date"><?=get_the_date('l, d F Y'); ?></p>
        <p class="content">
          <?=wp_trim_words(get_the_content(), 70); ?>
        </p>
      </div>
      <?php endwhile; ?>
      <?php else : ?>
      <div class="_no_content">
        <h2>We Couldn't find any posts.</h2> 
      </div>
      <?php endif; ?>
    <!-- //Search result -->
  </div>
</section>

<?php get_footer(); ?>