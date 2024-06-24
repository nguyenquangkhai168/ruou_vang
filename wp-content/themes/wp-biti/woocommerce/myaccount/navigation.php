<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
$queried_object = get_queried_object();
$page_title     = $queried_object->post_title;

global $wp;
$endpoint_label = '';
$current_url    = home_url( $wp->request );

if ( function_exists( 'wc_get_account_menu_items' ) && get_theme_mod( 'wc_account_links', 1 ) ) {
	foreach ( wc_get_account_menu_items() as $endpoint => $label ) {
		if ( untrailingslashit( wc_get_account_endpoint_url( $endpoint ) ) === $current_url ) {
			$endpoint_label = $label;
			break;
		}
	}
}

?>

<div class="account-wrapper">
	<div class="account-wrapper__head border-bottom">
		<div class="container">
			<h1 class="mb-1">Tài khoản</h1>
			<?php if ( ! empty ( $endpoint_label ) ) echo '<small class="text-uppercase">' . esc_html( $endpoint_label ) . '</small>'; ?>
		</div>
	</div>
	<div class="container">

		<nav class="woocommerce-MyAccount-navigation">
			<ul class="account-wrapper__menu list-unstyled mb-0">
				<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
					<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
						<a class="d-block text-uppercase position-relative" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<?php do_action( 'woocommerce_after_account_navigation' ); ?>
