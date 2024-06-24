<?php /* Template Name: Home */ ?>
<?php
	get_header();
	global $post;
?>
<main id="homepage" class="homepage">
	<section class="homepage-banner position-relative">
		<div class="homepage-banner__advantages position-absolute d-none d-lg-block top-0 w-100 py-3">
			<div class="container">
				<ul class="advantages list-unstyled mb-0 d-flex justify-content-between">
					<li class="d-flex">
						<div class="icon-box me-3"><i class="far fa-shipping-fast"></i></div>
						Giao hàng toàn quốc
					</li>
					<li class="d-flex">
						<div class="icon-box me-3"><i class="far fa-file-certificate"></i></div>
						Hàng cao cấp, thượng hạng
					</li>
					<li class="d-flex">
						<div class="icon-box me-3"><i class="far fa-gift"></i></div>
						Khuyến mãi 10-15%
					</li>
					<li class="d-flex">
						<div class="icon-box me-3"><i class="far fa-check-circle"></i></div>
						An toàn, tin cậy
					</li>
				</ul>
			</div>
		</div>
		<div class="homepage-banner__carousel">
			<div class="owl-carousel" data-autoheight="true" data-items="1" data-desktop="1" data-desktop-small="1" data-tablet="1" data-mobile="1" data-nav="false" data-margintb="0" data-dots="false" data-loop="true" data-autoplay="true" data-speed="500" data-autotime="3000">
				<?php while ( have_rows( 'banner_images' ) ) : the_row(); ?>
				<div class="owl-carousel-item h-100">
					<img style="height:500px" src="<?php the_sub_field( 'banner_image' ); ?>" alt="banner" />
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<section class="homepage-categories">
		<div class="container">
			<h2 class="section-title text-center position-relative">
				<span class="d-inline-block position-relative">KHÁM PHÁ THEO CHỦ ĐỀ</span>
			</h2>
			<div class="homepage-categories__column">
				<div class="row gx-3">
					<?php
					$args = array(
						'taxonomy'     => 'product_cat',
						'parent'       => 22,
						'orderby'      => '',
						'show_count'   => 0,
						'hierarchical' => 0,
						'hide_empty'   => 0,
					);
					$product_cats = get_categories( $args );
					foreach ( $product_cats as $product_cat ) :
						$cat_thumb_id = get_term_meta( $product_cat->term_id, 'thumbnail_id', true );
						$shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'full' );
					?>
					<div class="col-lg-4 col-6">
						<a href="<?php echo get_term_link( $product_cat->slug, 'product_cat' ); ?>" class="category-box d-inline-block overflow-hidden position-relative">
							<div class="category-box__image">
								<img src="<?php echo $shop_catalog_img[0]; ?>" alt="">
							</div>
							<div class="category-box__title text-center position-absolute w-100"><?php echo $product_cat->name; ?></div>
						</a>
					</div>
					<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="homepage-feature">
		<div class="container">
			<h2 class="section-title text-center position-relative">
				<span class="d-inline-block position-relative">SẢN PHẨM NỔI BẬT</span>
			</h2>
			<div class="woocommerce">
				<ul class="products">
					<div class="row gx-md-3 gx-2">
						<?php
						$args = array(
							'posts_per_page' => 8,
							'post_status'    => 'publish',
							'post_type'      => 'product',
							'post__in'       => wc_get_featured_product_ids(),
						);
						?>
						<?php $getposts = new WP_query( $args ); ?>
						<?php while ( $getposts->have_posts() ) : $getposts->the_post(); ?>
							<div class="col-lg-3 col-6">
								<?php wc_get_template_part( 'content', 'product' ); ?>
							</div>
						<?php endwhile; wp_reset_query(); ?>
					</div>
				</ul>
			</div>
		</div>
	</section>
	<section class="homepage-ads">
		<div class="container">
			<div class="row gx-3">
				<?php
				if ( have_rows( 'banner_middle_images' ) ) :
					while ( have_rows( 'banner_middle_images' ) ) :
						the_row();
						$banner_middle_image = get_sub_field( 'banner_middle_image' );
						$banner_middle_tag   = get_sub_field( 'banner_middle_tag' );
						$banner_middle_title = get_sub_field( 'banner_middle_title' );
				?>
				<div class="col-lg-6 col-12">
					<div class="h-100 homepage-ads__box overflow-hidden mx-2 mx-lg-0">
						<img src="<?php echo esc_html( $banner_middle_image ); ?>" alt="">
						<div class="text">
							<div class="tag"><?php echo esc_html( $banner_middle_tag ); ?></div>
							<div class="title"><?php echo esc_html( $banner_middle_title ); ?></div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
				
			</div>
		</div>
	</section>
	<section class="homepage-newest">
		<div class="container">
			<h2 class="section-title text-center position-relative">
				<span class="d-inline-block position-relative">SẢN PHẨM MỚI NHẤT</span>
			</h2>
			<div class="homepage-newest__carousel owl-carousel products" data-autoheight="true" data-items="8" data-desktop="4" data-desktop-small="4" data-tablet="2" data-mobile="2" data-nav="true" data-margintb="16" data-dots="false" data-loop="true" data-autoplay="false" data-speed="500" data-autotime="3000">
				<?php
				$args = array(
					'posts_per_page' => 8,
					'post_status'    => 'publish',
					'post_type'      => 'product',
					'orderby'        => 'date',
					'order'          => 'DESC',
				);
				?>
				<?php $getposts = new WP_query( $args ); ?>
				<?php while ( $getposts->have_posts() ) : $getposts->the_post(); ?>
					<div class="product">
						<a class="product-wrap d-block" href="<?php the_permalink(); ?>">
							<div class="product-thumb overflow-hidden mb-2">
								<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="product-title text-center"><?php the_title(); ?></div>
						</a>
					</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</section>
	<section class="homepage-promotion">
		<?php
		$membership_img   = get_field( 'membership_img' );
		$membership_tag   = get_field( 'membership_tag' );
		$membership_text1 = get_field( 'membership_text1' );
		$membership_text2 = get_field( 'membership_text2' );
		$membership_text3 = get_field( 'membership_text3' );
		?>
		<div class="container">
			<div class="homepage-promotion__box overflow-hidden position-relative">
				<img src="<?php echo esc_url( $membership_img ); ?>" alt="">
				<div class="text position-absolute top-50 start-0 translate-middle-y ps-5">
					<div class="tag text-white fw-bold"><?php echo esc_html( $membership_tag ); ?></div>
					<div class="content text-white"><?php echo esc_html( $membership_text1 ); ?></div>
					<div class="highlight fw-bold"><?php echo esc_html( $membership_text2 ); ?></div>
					<div class="content text-white"><?php echo esc_html( $membership_text3 ); ?></div>
				</div>
			</div>
		</div>
	</section>
	<section class="homepage-blog">
		<div class="container">
			<h2 class="section-title text-center position-relative">
				<span class="d-inline-block position-relative">TIN TỨC</span>
			</h2>
			<div class="homepage-blog__wrap">
				<div class="row gx-md-3 gx-2">
					<?php
					$args = array(
						'posts_per_page' => 3,
						'post_status'    => 'publish',
						'post_type'      => 'post',
						'orderby'        => 'date',
						'order'          => 'DESC',
					);
					$getposts = new WP_query( $args );
					while ( $getposts->have_posts() ) : $getposts->the_post();
					?>
					<div class="col-lg-4 col-12">
						<div class="blogitem mb-4 mb-lg-0">
							<a class="blogitem__thumb d-inline-block overflow-hidden" href="<?php the_permalink(); ?>">
								<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
							</a>
							<a class="blogitem__title d-inline-block" href="<?php the_permalink(); ?>">
								<h4><?php the_title(); ?></h4>
							</a>
							<div class="blogitem-postmeta d-flex">
								<div class="icon-box me-2"><i class="far fa-calendar-alt"></i></div>
								<?php echo get_the_date( 'd/m/Y' ); ?>
							</div>
						</div>
					</div>
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>
			<div class="homepage-blog__more text-center">
				<a href="<?php echo get_home_url(); ?>/danh-sach-bai-viet" class="d-inline-block">XEM THÊM&nbsp;&nbsp;<i class="far fa-angle-right"></i></a>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
