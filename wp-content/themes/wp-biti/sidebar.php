<div id="sidebar" class="sidebar d-none d-lg-block">
  <div class="section-title">
    <img class="symbol-mark" src="<?php bloginfo('template_url'); ?>/assets/images/symbol-mark.svg" />
    <h3><span class="section-title__text">BÀI VIẾT MỚI</span></h3>
    <?php
    $args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'orderby' => 'date',
    'order' => 'DESC',
    );
    $the_query = new WP_Query($args); ?>
    <ul class="sidebar--list">
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <li class="sidebar--item">
        <a href="<?php echo get_post_permalink() ?>">
          <div class="row g-2 ">
            <div class="col-12 sidebar--item__img">
              <?php echo get_the_post_thumbnail(); ?>
            </div>
            <div class="col-12">
              <div class="sidebar--item__title">
                <?php echo get_the_title(); ?>
              </div>
            </div>
          </div>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>

    <?php wp_reset_query(); ?>

  </div>
</div>