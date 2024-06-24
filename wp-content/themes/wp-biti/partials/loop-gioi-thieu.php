<?php get_header(); 
global $post;
?>

<div id="gioi-thieu">
	<section class="banner">
		<?php
		$banner_image     = get_field( 'banner_image' );
		$banner_title     = get_field( 'banner_title' );
		$banner_sub_title = get_field( 'banner_sub_title' );
		?>
		<img class="banner--image"
			src="<?php echo esc_html( $banner_image ); ?>" alt="">
		<div class="d-flex flex-column justify-content-center align-items-center banner--text">
			<h1><?php echo esc_html( $banner_title ); ?></h1>
			<h2 class="d-none d-md-block"><?php echo esc_html( $banner_sub_title ); ?></h2>
			<a class="text-decoration-none banner--button" href="<?php echo esc_url( home_url( '/san-pham' ) ); ?>">Xem bộ sưu
				tập&nbsp;&nbsp;<i class="far fa-angle-right"></i></a>
		</div>
	</section>
	<section class="smell">
		<?php
		$intro1_image = get_field( 'intro1_image' );
		$intro1_tag   = get_field( 'intro1_tag' );
		$intro1_title = get_field( 'intro1_title' );
		$intro1_desc  = get_field( 'intro1_desc' );
		?>
		<div class="container">
			<div class="row gy-3">
				<div class="col-md-6">
					<img class="smell--image"
						src="<?php echo esc_url( $intro1_image ); ?>" alt="">
				</div>
				<div class="col-md-6">
					<div class="h-100 d-flex flex-column justify-content-center align-items-start content smell--content">
						<div class="mt-3 mt-md-0 sub-title smell--content__sub-title"><?php echo esc_html( $intro1_tag ); ?></div>
						<h2 class="title smell--content__title"><?php echo esc_html( $intro1_title ); ?></h2>
						<div class="desc smell--content__desc"><?php echo esc_html( $intro1_desc ); ?></div>
						<a class="button smell--content__button" href="<?php echo esc_url( home_url( '/san-pham' ) ); ?>">Xem bộ sưu
							tập&nbsp;&nbsp;<i class="far fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="producer">
		<div class="container">
			<div class="text-center producer__header">
				<div class="sub-title producer__header--sub-title">categories</div>
				<h2 class="title producer__header--title">Khám phá các nhà sản xuất của chúng tôi</h2>
			</div>
			<div class="text-center producer__body">
				<?php if ( have_rows( 'nha_san_xuat' ) ) : ?> 
				<div class="row g-3">
					<?php
					while ( have_rows( 'nha_san_xuat' ) ) :
						the_row();
						$banner_url     = get_sub_field( 'banner' );
						$logo_url       = get_sub_field( 'logo' );
						$logo_popup_url = get_sub_field( 'logo_popup' );
						$name_producer  = get_sub_field( 'ten_nha_san_xuat' );
						$desc           = get_sub_field( 'mo_ta' );
					?>
					<a href="<?php echo esc_html( $name_producer ); ?>" class="col-6 col-md-3">
						<div class="producer__body--item" id="producer-<?php echo esc_html( $name_producer ); ?>"
							data-banner="<?php echo esc_html( $banner_url ); ?>" data-logo="<?php echo esc_html( $logo_popup_url ); ?>"
							data-name="<?php echo esc_html( $name_producer ); ?>" data-desc="<?php echo esc_html( str_replace( '"', '', $desc ) ); ?>">
							<img src="<?php echo esc_html( $logo_url ); ?>" alt="">
						</div>
					</a>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<section class="review">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img class="review--image"
						src="<?php bloginfo( 'template_url' ); ?>/assets/images/img-gioi-thieu/gioi-thieu-review.jpg">
				</div>
				<div class="col-md-6">
					<div class="include-carosel d-flex h-100">
						<div class="owl-carousel" data-autoheight="true" data-items="1" data-desktop="1" data-desktop-small="1"
							data-tablet="1" data-mobile="1" data-nav="false" data-margintb="20" data-margintb="20" data-dots="true"
							data-loop="true" data-autoplay="false" data-speed="500" data-autotime="3000">

							<?php
							if ( have_rows( 'list-review' ) ) :
								while ( have_rows( 'list-review' ) ) :
									the_row();
									$name_reviewer = get_sub_field( 'name-reviewer' );
									$content       = get_sub_field( 'content-review' );
							?>
							<div class="owl-carousel-item">
								<div class="text-center review--content">
									<i class="review--content__icon fad fa-quote-left"></i>
									<div class="review--content__text">
										“<?php echo esc_html( $content ); ?>”
									</div>
									<div class="review--content__name">
										<?php echo esc_html( $name_reviewer ); ?>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<section class="choice">
		<?php
		$intro2_image = get_field( 'intro2_image' );
		$intro2_tag   = get_field( 'intro2_tag' );
		$intro2_title = get_field( 'intro2_title' );
		$intro2_desc  = get_field( 'intro2_desc' );
		?>
		<div class="container">
			<div class="row gy-3">
				<div class="col-md-6">
					<div class="h-100 d-flex flex-column justify-content-center align-items-start content choice--content">
						<div class="sub-title choice--content__sub-title"><?php echo esc_html( $intro2_tag ); ?></div>
						<h2 class="title choice--content__title"><?php echo esc_html( $intro2_title ); ?></h2>
						<div class="desc choice--content__desc"><?php echo esc_html( $intro2_desc ); ?></div>
						<a class="button choice--content__button" href="<?php echo esc_url( home_url( '/san-pham' ) ); ?>">Mua
							ngay&nbsp;&nbsp;<i class="far fa-angle-right"></i></a>
					</div>
				</div>
				<div class="col-md-6">
					<img class="choice--image"
						src="<?php echo esc_url( $intro2_image ); ?>" alt="">
				</div>
			</div>
		</div>

	</section>
	<section class="discover">
		<div class="container">
			<div class="text-center discover__header">
				<div class="sub-title discover__header--sub-title">hơn nữa về top rượu</div>
				<h2 class="title discover__header--title">Khám phá thêm những chủ đề khác</h2>
			</div>
			<div class="text-center discover__body">
			<?php
			$cat_args           = array(
				'hide_empty' => false,
				'parent'     => 23,
			);
			$product_categories = get_terms( 'product_cat', $cat_args );
			if ( ! empty( $product_categories ) ) :
			?>
				<div class="row g-3">
					<?php
					foreach ( $product_categories as $key => $category ) :
						$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
						$image        = wp_get_attachment_url( $thumbnail_id );
					?>

					<div class="col-6 col-md-3">
						<a href="<?php echo esc_url( get_term_link( $category ) ); ?>"
							class="d-flex justify-content-center align-items-center discover__body--item">
							<img class="image-item" src="<?php echo esc_url( $image ); ?>" alt="">
							<div class="name-item"><?php echo esc_html( $category->name ); ?></div>
						</a>
					</div>

					<?php endforeach; ?>

				</div>

				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
		$bannerbottom_image   = get_field( 'bannerbottom_image' );
		$bannerbottom_content = get_field( 'bannerbottom_content' );
	?>
	<section class="register" style=" background-image: url(<?php echo esc_url( $bannerbottom_image ); ?>); " >
		<div class="container">
			<div class="row">
				<div class="col-9">
					<div class="d-flex flex-column justify-content-center align-items-start content register--content">
						<h2 class="title register--content__title"><?php echo esc_html( $bannerbottom_content ); ?></h2>
						<a class="button register--content__button" href="<?php echo esc_url( home_url( '/lien-he' ) ); ?>">Đăng ký
							ngay&nbsp;&nbsp;<i class="far fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>

<div id="pop-up-about" class="pop-up-about">
	<div class="pop-up-about--info">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="d-flex align-items-center h-100  pop-up-about--info__image">
						<img id="producer-img" src="" alt="">
					</div>
				</div>
				<div class="col-md-8">
					<div class="pop-up-about--info__content">
						<h2 class="title"><span id="producer-name"></span>
						</h2>
						<div class="desc" id="producer-desc"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
