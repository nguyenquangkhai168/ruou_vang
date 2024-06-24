<?php get_header(); ?>

<div id="lien-he">
	<?php
	$banner_image = get_field( 'banner_image' );
	$banner_title = get_field( 'banner_title' );
	$banner_desc  = get_field( 'banner_desc' );
	$image1       = get_field( 'image1' );
	$image2       = get_field( 'image2' );
	?>
	<section class="banner">
		<img class="banner--image" src="<?php echo esc_url( $banner_image ); ?>"
			alt="">
		<div class="banner--text">
			<h1><?php echo esc_html( $banner_title ); ?></h1>
			<h2 class="d-none d-md-block"><?php echo esc_html( $banner_desc ); ?></h2>
		</div>
	</section>
	<section class="main-content">
		<div class="container">
			<div class="row g-3">
				<div class="col-6">
					<img class="main-content--image" src="<?php echo esc_url( $image1 ); ?>" alt="">
				</div>
				<div class="col-6">
					<img class="main-content--image" src="<?php echo esc_url( $image2 ); ?>" alt="">
				</div>
				<div class="col-12">
					<div class="d-flex flex-column align-items-center main-content--text ">
						<h2 class="main-content--text__title">RƯỢU VANG THƯƠNG HIỆU</h2>
						<div class="main-content--text__content">Hotline: <?php echo get_theme_mod( 'html_phone' ); ?></div>
						<div class="main-content--text__content">Email: <?php echo get_theme_mod( 'html_email' ); ?></div>
						<div class="main-content--text__content">Địa chỉ: <?php echo get_theme_mod( 'html_address' ); ?></div>
					</div>
				</div>
				<div class="offset-md-1 col-md-10">
					<div class="main-content--text__form">
						<div class="row g-0">
							<div class="col-md-7">
								<div class="row">
									<?php echo do_shortcode( '[contact-form-7 id="99" title="Contact Form"]' ); ?>
								</div>
							</div>
							<div class="offset-md-1 col-md-4">
								<h4 class="form--title">Gửi tin nhắn cho chúng tôi</h4>
								<p class="form--text">
									Các bạn có thông tin cần liên hệ, hoặc cần hợp tác, các bạn có thể liên hệ qua Zalo, Facebook, Fanpage
									hoặc để lại thông tin liên hệ ở đây, chúng tôi sẽ liên hệ lại ngay
								</p>
								<h4 class="form--title">Rượu vang thương hiệu</h4>
								<p class="form--text">Mã số thuế: 0402052054</p>
								<div class="social-media">
									<a href="https://www.facebook.com/TopRuouDN"> <i style="color:#0176fe"
											class="me-3 fab fa-facebook"></i></a>
									<a href="tel:0777.333.969"> <i style="color:rgba(82,196,26,0.7)"
											class="me-3 fad fa-phone-alt"></i></a>
									<a href="mailto:ruouvangthuonghieu@gmail.com"> <i style="color:#fff700ea"
											class="me-3 fad fa-envelope"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="map">
		<?php echo get_theme_mod( 'html_maps' ); ?>
	</section>
</div>

<?php get_footer(); ?>
