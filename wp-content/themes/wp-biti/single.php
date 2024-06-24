<?php 
    get_header(); 
    $queried_object = get_queried_object(); 
    global $post;
?>
<main id="main" class="page-content w-100 float-left mt-3">
  <section class="section-blog mb-5 post-layout">
    <div class="container">
      <div class="row">
        <div class="ar-left col-lg-9">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <?php biti_set_post_view(); ?>
          <div class="post-head">
            <div>
              <?php
								$TermShows = get_the_terms( $post->ID, 'category' );
								if ( $TermShows && ! is_wp_error( $TermShows ) ) {
									foreach ( $TermShows as $Term ) {
										if ( $Term === reset($TermShows) ) {
											echo '<a class="post-category" href="' .  esc_url( get_term_link( $Term->term_id ) ) . '">';
											echo $Term->name;
											echo '</a>';
										}
									}
								}    
							?>
            </div>
            <h2 class="page-title"><?php the_title(); ?></h2>
            <div class="post-meta">
              <?php echo get_the_date('d'); ?> Thg <?php echo get_the_date('m'); ?>, <?php echo get_the_date('Y'); ?>
              <span class="post-meta__separate">|</span><?php echo biti_get_post_view(); ?>
            </div>
          </div>
          <div class="post-content">
            <?php the_content(); ?>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <!--ar-left-->
        <div class="col-lg-3">
          <?php get_sidebar(); ?>
        </div>
      </div>
      <?php $args = array( 'post_type' => 'post' ); ?>
      <?php get_template_part( 'templates/posts/content', 'related' ); ?>
      <?php get_template_part( 'templates/posts/content', 'recent',$args); ?>
    </div>
  </section>
</main>
<!--main-content-->

<?php get_footer(); ?>