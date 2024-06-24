<?php

$categories = get_the_category(get_the_ID());
if ($categories) {
    $category_ids = array();
    foreach( $categories as $individual_category ) $category_ids[] = $individual_category->term_id;
?>

<div class="recent-post">
    <div class="section-title">
    <img class="symbol-mark" src="<?php bloginfo('template_url'); ?>/assets/images/symbol-mark.svg" />
        <h3><span class="section-title__text">LIÊN QUAN</span></h3>
    </div>
    <div class="owl-carousel recent-post__carousel" data-autoheight="true" data-items="4" data-desktop="4" data-desktop-small="4" data-tablet="3" data-mobile="2" data-nav="false" data-margintb="30" data-dots="true" data-loop="false" data-autoplay="false" data-speed="500" data-autotime="3000">
        <?php 
            $args=array(
                'category__in'      => $category_ids,
                'post__not_in'      => array(get_the_ID()),
                'posts_per_page'    => 12,
            );
            $my_query = new wp_query($args);
            if ( $my_query->have_posts() ):
                while ($my_query->have_posts()):$my_query->the_post();
            ?>
            <div class="owl-carousel-item">
                <div class="post-item post-component col-12">
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></a>
                    </div>
                    <div class="post-category">
                    <?php
                        $TermShows = get_the_terms( $post->ID, 'category' );
                        if ( $TermShows && ! is_wp_error( $TermShows ) ) {
                            foreach ( $TermShows as $Term ) {
                                if ( $Term === reset($TermShows) ) {
                                    echo '<a href="' .  esc_url( get_term_link( $Term->term_id ) ) . '">';
                                    echo $Term->name;
                                    echo '</a>';
                                }
                            }
                        }    
                    ?>
                    </div>
                    <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <div class="post-meta">
                        <?php echo get_the_date('d'); ?> Thg <?php echo get_the_date('m'); ?>, <?php echo get_the_date('Y'); ?>
                        <span class="post-meta__separate">|</span><?php echo biti_get_post_view(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    <?php endif; wp_reset_query(); ?>
    </div>
</div>
<?php } ?>