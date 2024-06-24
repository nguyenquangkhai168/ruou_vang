<?php
$queried_object = get_queried_object();
$term_child_id  = $queried_object->term_id;
$term_parent_id = $queried_object->parent;
$getdate        = getdate();
$args           = array(
	'taxonomy'   => 'product_cat',
	'hide_empty' => false,
);

if ( ( 22 === $term_child_id || 22 === $term_parent_id ) || ( 23 === $term_child_id || 23 === $term_parent_id ) || is_shop() ) {
	$args = array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
		'exclude'    => array( 37 ),
	);
}

if ( 37 === $term_child_id || 37 === $term_parent_id ) {
	$args = array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
		'exclude'    => array( 22, 23 ),
	);
}

$product_cats = get_terms( $args );

?>

<?php
$output = '<ul id="list-cats" class="product-categories border overflow-hidden list-unstyled mb-0">';
foreach ( $product_cats as $product_cat ) {
	if ( 0 === $product_cat->parent ) {
		$output .= '<li><a href="' . esc_url( get_term_link( $product_cat ) ) . '">' . esc_attr( $product_cat->name ) . '<span class="open-sup d-inline-block d-md-none icon-box"><i class="fal fa-chevron-down"></i></span></a><ul class="list-subs list-unstyled">';
		foreach ( $product_cats as $sub_cat ) {
			$icon_box = '<i class="far fa-square"></i>';
			if ( isset( $queried_object->slug ) ) {
				if ( $queried_object->slug === $sub_cat->slug ) {
					$icon_box = '<i class="far fa-check-square"></i>';
				}
			}
			if ( $sub_cat->parent === $product_cat->term_id ) {
				$output .= '<li class="d-flex"><div class="icon-box me-2">' . $icon_box . '</div><a href="' . esc_url( get_term_link( $sub_cat ) ) . '">' . esc_attr( $sub_cat->name ) . '</a></li>';
			}
		}
		$output .= '</ul></li>';
	}
}
$output .= '</ul>';
echo $output;

