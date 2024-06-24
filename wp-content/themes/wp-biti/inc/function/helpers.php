<?php
//Disable Block New
add_filter( 'use_block_editor_for_post', '__return_false' );

/**
 * The function support pagination.
 *
 * @param string $custom_query The user custom query database.
 * @param number $paged The current page number.
 * @author phuclq <lequangphuc36@gmail.com>
 */
function prw_wp_corenavi( $custom_query = null, $paged = null ) {
	global $wp_query;
	if ( $custom_query ) {
		$main_query = $custom_query;
	} else {
		$main_query = $wp_query;
	}
	$paged = ( $paged ) ? $paged : get_query_var( 'paged' );
	$big   = 999999999;
	$total = isset( $main_query->max_num_pages ) ? $main_query->max_num_pages : '';
	if ( $total > 1 ) {
		echo '<div class="pagenavi">';
	}
	echo paginate_links( array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, $paged ),
		'total'     => $total,
		'mid_size'  => '4', // Số trang hiển thị khi có nhiều trang trước khi hiển thị ...
		'prev_text' => __( 'Trang Trước', 'prw' ),
		'next_text' => __( 'Trang Tiếp', 'prw' ),
	) );
	if ( $total > 1 ) {
		echo '</div>';
	}
}
//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );

	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// change discount price position
add_filter( 'woocommerce_format_sale_price', 'invert_formatted_sale_price', 10, 3 );
function invert_formatted_sale_price( $price, $regular_price, $sale_price ) {
	return '<ins class="text-decoration-none">' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</ins> / <del>' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</del>';
}

//count post view
function biti_get_post_view() {
	$count = get_post_meta( get_the_ID(), 'post_views_count', true );
	$count_view = $count ? $count : 0;
	return "$count_view lượt xem";
}
function biti_set_post_view() {
	$key = 'post_views_count';
	$post_id = get_the_ID();
	$count = (int) get_post_meta( $post_id, $key, true );
	$count++;
	update_post_meta( $post_id, $key, $count );
}
function biti_posts_column_views( $columns ) {
	$columns['post_views'] = 'Views';
	return $columns;
}

function biti_posts_custom_column_views( $column ) {
	if ( 'post_views' === $column ) {
		echo biti_get_post_view();
	}
}
add_filter( 'manage_posts_columns', 'biti_posts_column_views' );
add_action( 'manage_posts_custom_column', 'biti_posts_custom_column_views' );

function viewedPost() {
	session_start();
	if ( ! isset( $_SESSION["viewed"] ) ) {
		$_SESSION["viewed"] = array();
	}
	if ( is_single() ) {
		$_SESSION["viewed"][get_the_ID()] = get_the_ID();
	}
}
add_action( 'wp', 'viewedPost' );

if ( get_theme_mod( 'html_disable_update' ) ) {
    function remove_core_updates(){
        global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
    }
    add_filter( 'pre_site_transient_update_core', 'remove_core_updates' );
    add_filter( 'pre_site_transient_update_plugins', 'remove_core_updates' );
    add_filter( 'pre_site_transient_update_themes', 'remove_core_updates' );
}