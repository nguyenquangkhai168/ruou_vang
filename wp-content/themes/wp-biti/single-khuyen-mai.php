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
             
                $category = get_terms("danh-muc-khuyen-mai"); 
                $category_name =($category[0]->name);
                $category_slug =($category[0]->slug);
                $category_link = (get_term_link($category_slug,"danh-muc-khuyen-mai"));
								$TermShows = get_the_terms( $post->ID, 'category' );
											echo '<a class="post-category" href="'. $category_link .'">';
											echo $category_name;
											echo '</a>';
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
          <?php require_once dirname( __FILE__ ) . '/sidebar-khuyen-mai.php'; ?>

        </div>
      </div>
      <?php $args = array( 'post_type' => 'khuyen-mai' ); ?>
      <?php get_template_part( 'templates/posts/content', 'recent',$args); ?>
    </div>
  </section>
</main>
<!--main-content-->

<?php get_footer(); ?>