
<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => 439,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

<section class="smph-wrapper more-on-sm-community view-all-wrapper">
    
    <div class="smph-inner-container">
        <div class="section-title">
            <h2 class="title">More on Sustainability</h2>
        </div>
        <div class="section-content">
            <div class="row">
                <?php while ( $parent->have_posts() ) : $parent->the_post(); $fields = get_fields(); ?>
                    <a href="<?= the_permalink(); ?>" class="more-on-sm-community-wrapper col-md-4">
                        <div class="img-wrapper">
                            <img src="<?= $fields['banner_image']['url']; ?>" alt="">
                            <?php if($a_page == 460) : ?>
                                <p class="banner-title"><?= $fields['banner_title']; ?></p>
                            <?php endif; ?>
                        </div>
                        <h4 class="title"><?= the_title(); ?></h4>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

</section>

<?php endif; wp_reset_postdata(); ?>
