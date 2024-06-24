<div class="post-item post-component">
    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
    </div>
    <div class="post-data">
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
        <div class="post-desc"><?php echo wp_trim_words(get_the_content(), $num_words = 100, $more = null); ?></div>
    </div>
</div>