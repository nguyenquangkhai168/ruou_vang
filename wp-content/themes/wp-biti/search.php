<?php get_header(); ?>
</header>
<main id="main">
	<div class="container">
		<div class="section-title mt-5">
			<h3><span class="section-title__text">KẾT QUẢ TÌM KIẾM: <?php echo get_search_query(); ?></span></h3>
		</div>
	</div>
	<section class="post-layout homepage-feature">
		<div class="container">
			<div class="woocommerce">
				<ul class="products">
					<div class="row gx-md-3 gx-2">
					<?php
					$args = array(
						'posts_per_page' => -1,
						'post_type' 	 => 'product',
						's'              => get_search_query(),
					);
					$the_query = new WP_query( $args );
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post() ?>
							<div class="col-lg-3 col-6">
								<?php wc_get_template_part( 'content', 'product' ); ?>
							</div>
						<?php endwhile;
					else : ?>
						<p class="text-center">Không tìm thấy kết quả phù hợp!</p>
					<?php endif; wp_reset_query(); ?>
					</div>
				</ul>
			</div>
		</div>
	</section>		
</main>
<div class="clear"></div>
<?php get_footer(); ?>