<?php
/**
 * Wishlist Button
 *
 * @return  array
 */
if ( ! function_exists( 'wc_makeclean_wishlist_button' ) ) {
	function wc_makeclean_wishlist_button() {

		global $product, $yith_wcwl;

		if ( class_exists( 'YITH_WCWL_UI' ) )  {
			$url          = $yith_wcwl->get_wishlist_url();
			$product_type = $product->product_type;
			$exists       = $yith_wcwl->is_product_in_wishlist( $product->id );
			$classes      = 'class="add_to_wishlist"';

			$html  = '<div class="yith-wcwl-add-to-wishlist">';
			    $html .= '<div class="yith-wcwl-add-button';  // the class attribute is closed in the next row
			    $html .= $exists ? ' hide" style="display:none;"' : ' show"';
			    $html .= '><a href="' . htmlspecialchars( $yith_wcwl->get_addtowishlist_url() ) . '" data-product-id="' . $product->id . '" data-product-type="' . $product_type . '" ' . $classes . ' ><i class="fa fa-heart-o"></i></a>';
			    $html .= '</div>';

			$html .= '<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><a href="' . $url . '"><i class="fa fa-heart-o"></i></a></div>';
			$html .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ( $exists ? 'show' : 'hide' ) . '" style="display:' . ( $exists ? 'block' : 'none' ) . '"><a href="' . $url . '"><i class="fa fa-heart-o"></i></a></div>';
			$html .= '<div class="yith-wcwl-wishlistaddresponse"></div>';
			$html .= '</div>';

		return $html;
		}
	}
}

function update_wishlist_count(){
    if( function_exists( 'YITH_WCWL' ) ){
        wp_send_json( YITH_WCWL()->count_products() );
    }
}
add_action( 'wp_ajax_update_wishlist_count', 'update_wishlist_count' );
add_action( 'wp_ajax_nopriv_update_wishlist_count', 'update_wishlist_count' );

/**
 * Set WooCommerce image dimensions upon theme activation
 * @since 1.0
 */
if ( ! function_exists( 'wc_makeclean_image_dimensions' ) ) {
	function wc_makeclean_image_dimensions() {

		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}

		$catalog = array(
			'width'  => '260', // px
			'height' => '216', // px
			'crop'	 => 1
		);

		$single = array(
			'width'  => '420', // px
			'height' => '402', // px
			'crop'	 => 1
		);

		$thumbnail = array(
			'width' 	=> '125', // px
			'height'	=> '80', // px
			'crop'		=> 1
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
		update_option( 'shop_single_image_size', $single ); // Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
	}
	add_action( 'after_switch_theme', 'wc_makeclean_image_dimensions', 1 );
}

/* ************************************************************************ */

add_filter( 'loop_shop_columns', 'makeclean_loop_shop_columns', 1, 10 );

/*
* Return a new number of maximum columns for shop archives
* @param int Original value
* @return int New number of columns
*/
function makeclean_loop_shop_columns( $number_columns ) {
	return 3;
}

/* ************************************************************************ */

add_filter( 'woocommerce_output_related_products_args', 'makeclean_products_args' );
function makeclean_products_args( $args ) {

	$args['posts_per_page']     = 3; // 3 related products
	$args['columns']            = 3; // arranged in columns

	return $args;
}