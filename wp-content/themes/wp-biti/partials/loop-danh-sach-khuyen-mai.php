<?php
get_header();
$queried_object = get_queried_object();
global $post;
global $wp_query;
?>
<div id="news-list">
	<section class="banner">
	<?php
	$banner_image = get_field( 'banner_image' );
	$banner_title = get_field( 'banner_title' );
	$banner_desc  = get_field( 'banner_desc' );
	?>
		<img class="banner--image" src="<?php echo esc_url( $banner_image ); ?>"
			alt="">
		<div class="banner--text banner--text__left">
			<h1><?php echo esc_html( $banner_title ); ?></h1>
			<h2 class="d-none d-md-block"><?php echo esc_html( $banner_desc ); ?></h2>
			<a class="text-decoration-none banner--button" href="<?php echo esc_url( get_home_url() ); ?>/san-pham">Xem bộ sưu tập &nbsp;&nbsp;<i class="far fa-angle-right"></i></a>
		</div>
	</section>
	<section class="list">
		<div class="container">

			<?php
			$paged_post = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$args       = array(
				'post_type'      => 'khuyen-mai',
				'taxonomy'       => 'danh-muc-khuyen-mai',
				'posts_per_page' => 5,
				'paged'          => $paged_post,
			);

			$the_query = new WP_Query( $args );
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				$category      = get_terms( 'danh-muc-khuyen-mai' );
				$category_name = $category[0]->name;
				$category_slug = $category[0]->slug;
				$category_link = get_term_link( $category_slug, 'danh-muc-khuyen-mai' );
			?>

			<div class="news-item overflow-hidden">
				<div class="row g-0">
					<div class="col-md-5">
						<div class="d-inline-block w-100 h-100 img-news">
							<a href="<?php echo esc_url( get_post_permalink() ); ?>">
								<img class="news-item--image" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="">
							</a>
							<a href="<?php echo esc_url( $category_link ); ?>"
								class="d-flex justify-content-center align-items-center news-item--category">
								<?php
									echo esc_html( $category_name );
								?>
							</a>
						</div>

					</div>
					<div class="col-md-7">
						<div class="news-item--content py-4 py-md-2 px-3">
							<a href="<?php echo esc_url( get_post_permalink() ); ?>">
								<div class="pb-3 news-item--content__title"><?php echo esc_html( get_the_title() ); ?></div>
							</a>

							<div class="news-item--content__description">
								<?php echo esc_html( wp_trim_words( get_the_content(), $num_words = 25 ) ); ?>
							</div>
							<div class="news-item--content__date">
								<i class="far fa-calendar-alt me-2"></i><?php echo get_the_date( 'd-m-Y' ); ?>
							</div>
							<a class="d-inline-block text-decoration-none news-item--content__button"
								href="<?php echo esc_url( get_post_permalink() ); ?>">Xem thêm &nbsp;&nbsp;<i class="far fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>

			<?php endwhile; ?>
			<?php prw_wp_corenavi( $the_query, $paged_post ); ?>
			<?php wp_reset_postdata(); ?>

		</div>
	</section>
</div>

<?php get_footer(); ?>
