<?php
/**
 * Custom WooCommerce Function
 *
 * Main function to custom WooCommerce Hook.
 *
 * @package WordPress
 * @subpackage WP-BITI
 * @version 1.0.0
 * @author  phuclq
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link http://biti.vn
 * @since  1.0.0
 */

/**
 * Get the product rating when empty.
 *
 * @author phuclq
 * @param string $rating_html The rating html.
 * @param string $rating The rating.
 * @param string $count The count of rating.
 * @return string
 */
function biti_get_rating_html_when_empty( $rating_html, $rating, $count ) {
	$rating_html  = '<div class="star-rating">';
	$rating_html .= wc_get_star_rating_html( $rating, $count );
	$rating_html .= '</div>';

	return $rating_html;
};
add_filter( 'woocommerce_product_get_rating_html', 'biti_get_rating_html_when_empty', 10, 3 );

function biti_woo_set_ingredient_below_title( $product_id ) {
	if ( is_single() && 'product' === get_post_type() ) {
		echo '<div class="ingredient-wine mb-3">' . get_field( 'ingredient', $product_id ) . '</div>';
	} else {
		echo '<div class="ingredient-wine text-center mb-1 px-1 limit-text">' . get_field( 'ingredient', $product_id ) . '</div>';
	}
	
}
add_action( 'woocommerce_shop_loop_item_title', 'biti_woo_set_ingredient_below_title' );
add_action( 'woocommerce_single_product_summary', 'biti_woo_set_ingredient_below_title' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		global $post, $woocommerce;
		$output = '';

		if ( has_post_thumbnail() ) {
			$output .= get_the_post_thumbnail( $post->ID, 'full' );
		} else {
			$output .= wc_placeholder_img( 'full' );
		}
		echo $output;
	}
}

function biti_set_category_below_rating() {
	$terms = get_the_terms( get_the_ID(), 'product_cat' );
	foreach ( $terms as $term ) {
		if ( 23 == $term->parent ) {
			if ( is_single() && 'product' === get_post_type() ) {
				echo '<div class="product-brand mb-3">' . $term->name . '</div>';
			} else {
				echo '<div class="product-brand text-center px-1 limit-text">' . $term->name . '</div>';
			}
		}
		
	}

}
add_action( 'woocommerce_after_shop_loop_item_title', 'biti_set_category_below_rating' );
add_action( 'woocommerce_single_product_summary', 'biti_set_category_below_rating', 20 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

/**
 * Make the WooCommerce products without price can purchasable.
 *
 * @author phuclq
 * @param bool  $can The variable to check the product.
 * @param array $product All of the product information.
 * @return bool
 */
function biti_make_product_is_purchasable( $can, $product ) {
	if ( '' == $product->get_price() ) {
		$can = $product->exists() && ( 'publish' === $product->get_status() || current_user_can( 'edit_post', $product->get_id() ) );
	}

	return $can;
}
add_filter( 'woocommerce_is_purchasable', 'biti_make_product_is_purchasable', 10, 2 );

/**
 * Set the WooCommerce products without price is Free (price = 0).
 *
 * @author phuclq
 * @param number $price The value of product price.
 * @param array  $product All of the product information.
 * @return number
 */
function biti_set_product_price_value( $price, $product ) {
	if ( empty( $value ) ) {
		$value = 0;
	}
	return $value;
}
add_filter( 'woocommerce_product_get_price', 'biti_set_product_price_value', 10, 2 );

/**
 * Change the price of free product to 'Liên hệ'.
 *
 * @author phuclq
 * @param number $price The value of product price.
 * @param array  $product All of the product information.
 * @return string
 */
function biti_custom_get_price_html( $price, $product ) {
	if ( $product->get_price() == 0 ) {
		if ( $product->is_on_sale() && $product->get_regular_price() ) {
			$regular_price = wc_get_price_to_display(
				$product,
				array(
					'qty'   => 1,
					'price' => $product->get_regular_price(),
				)
			);

			$price = wc_format_price_range( $regular_price, __( 'Free!', 'woocommerce' ) );
		} else {
			$price = '<span class="amount">' . __( 'Liên hệ', 'woocommerce' ) . '</span>';
		}
	}
	return $price;
}
add_filter( 'woocommerce_get_price_html', 'biti_custom_get_price_html', 10, 2 );

/**
 * Set the WooCommerce products without price is 'Liên hệ' on Cart Table.
 *
 * @author phuclq
 * @param number $price The value of product price on Cart Table.
 * @param array  $cart_item The product information on Cart Table.
 * @param string $cart_item_key The product key on Cart Table.
 * @return string
 */
function biti_set_product_price_value_in_cart_table( $price, $cart_item, $cart_item_key ) {

	if ( 0 === $cart_item['data']->price ) {
		$price = __( 'Liên hệ', 'woocommerce' );
	}

	return $price;
}
add_filter( 'woocommerce_cart_item_price', 'biti_set_product_price_value_in_cart_table', 10, 3 );

/**
 * Set the WooCommerce products subtotal without price is 'Liên hệ' on Cart Table.
 *
 * @author phuclq
 * @param number $subtotal The value of product price on Cart Table.
 * @param array  $cart_item The product information on Cart Table.
 * @param string $cart_item_key The product key on Cart Table.
 * @return string
 */
function biti_set_product_subtotal_value_in_cart_table( $subtotal, $cart_item, $cart_item_key ) {

	if ( 0 === $cart_item['data']->price ) {
		$subtotal = __( 'Liên hệ', 'woocommerce' );
	}

	return $subtotal;
}
add_filter( 'woocommerce_cart_item_subtotal', 'biti_set_product_subtotal_value_in_cart_table', 10, 3 );


add_filter( 'woocommerce_order_formatted_line_subtotal', 'so_38057349_order_item_subtotal', 10, 3 );
function so_38057349_order_item_subtotal( $subtotal, $item, $order ) {

	if ( isset( $item['line_subtotal'] ) && $item['line_subtotal'] == 0 ) {
		$subtotal = __( 'Liên hệ', 'woocommerce' );
	}

	return $subtotal;
}

function so_38057349_woocommerce_cart_subtotal( $cart_subtotal, $compound, $cart ) {
	if ( 0 == $cart->subtotal ) {
		$cart_subtotal = __( 'Liên hệ', 'woocommerce' );
	}
	return $cart_subtotal;
}
add_filter( 'woocommerce_cart_subtotal', 'so_38057349_woocommerce_cart_subtotal', 10, 3 );


// define the woocommerce_order_amount_total callback 
function so_38057349_woocommerce_order_amount_total( $order_total ) {
	if ( 0 == WC()->cart->get_total() ) {
		$order_total = __( 'Liên hệ', 'woocommerce' );
	}
	return $order_total;
};
add_filter( 'woocommerce_cart_totals_order_total_html', 'so_38057349_woocommerce_order_amount_total' );

function wc_refresh_mini_cart_count( $fragments ) {
	ob_start();
	$items_count = WC()->cart->get_cart_contents_count();
	?>
	<span class="quantity d-inline-flex align-items-center justify-content-center rounded-circle text-dark position-absolute"><?php echo $items_count ? $items_count : '0'; ?></span>
	<?php
		$fragments['.header .quantity'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count' );

function custom_my_account_menu_items( $items ) {
	unset( $items['downloads'] );
	return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 25 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'biti_new_product_additional_tab' );
function biti_new_product_additional_tab( $tabs ) {
	// Adds the new tab

	$tabs['test_tab'] = array(
		'title'    => __( 'Thông tin chi tiết', 'woocommerce' ),
		'priority' => 20,
		'callback' => 'biti_new_product_additional_tab_content',
	);

	return $tabs;

}
function biti_new_product_additional_tab_content() {
	ob_start();
	$terms = get_the_terms( get_the_ID(), 'product_cat' );
	?>
	<div class="additional">
		<div class="additional__wrapper d-flex align-items-center pb-3 border-bottom">
			<div class="icon-box me-3">
				<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/icon/origin-icon.png">
			</div>
			<div class="content-box">
				<span class="fw-bold">Xuất xứ:</span>
				<?php
				foreach ( $terms as $term ) {
					if ( 22 === $term->parent ) {
						echo '<span class="product-brand">' . $term->name . '</span>';
					}
				}
				?>
			</div>
		</div>
		<div class="additional__wrapper d-flex align-items-center py-3 border-bottom">
			<div class="icon-box me-3">
				<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/icon/ingredient-icon.png">
			</div>
			<div class="content-box">
				<span class="fw-bold">Thành phần:</span>
				<span class="product-ingredient"><?php the_field( 'ingredient' ); ?></span>
			</div>
		</div>
		<div class="additional__wrapper d-flex align-items-center py-3 border-bottom">
			<div class="icon-box me-3">
				<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/icon/concentration-icon.png">
			</div>
			<div class="content-box">
				<span class="fw-bold">Độ cồn:</span>
				<span class="product-concentration"><?php the_field( 'concentration' ); ?></span>
			</div>
		</div>
		<div class="additional__wrapper d-flex align-items-center py-3 border-bottom">
			<div class="icon-box me-3">
				<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/icon/time-icon.png">
			</div>
			<div class="content-box">
				<span class="fw-bold">Thời gian sản xuất:</span>
				<span class="product-concentration"><?php the_field( 'time' ); ?></span>
			</div>
		</div>
		<div class="additional__wrapper d-flex align-items-center pt-3">
			<div class="icon-box me-3">
				<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/icon/enjoy-icon.png">
			</div>
			<div class="content-box">
				<span class="fw-bold">Thưởng thức:</span>
				<span class="product-concentration"><?php the_field( 'enjoy' ); ?></span>
			</div>
		</div>
	</div>
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
}

function biti_add_custom_button_below_add_to_cart() {
	echo '<a class="return-shop button text-center w-100" target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/TopRuouDN/">Liên hệ ngay</a>';
}
add_action( 'woocommerce_after_add_to_cart_form', 'biti_add_custom_button_below_add_to_cart' );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	// unset($fields['billing']['billing_first_name']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_company']);
	// unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	// unset($fields['billing']['billing_phone']);
	// unset($fields['order']['order_comments']);
	// unset($fields['billing']['billing_email']);
	// unset($fields['account']['account_username']);
	// unset($fields['account']['account_password']);
	// unset($fields['account']['account_password-2']);

	$fields['billing']['billing_address_1']['required'] = false;
	return $fields;
}