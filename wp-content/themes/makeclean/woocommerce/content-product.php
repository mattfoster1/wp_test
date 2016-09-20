<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class('product-box'); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<!--a href="<?php the_permalink(); ?>"-->

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

	<!--/a-->

	<div class="product-hover">

		<div class="star-rating-container aggregate">

			<?php
			global $product;

			if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
				return;
			}

			$rating_count = $product->get_rating_count();
			$review_count = $product->get_review_count();
			$average      = $product->get_average_rating();

			if ( $rating_count > 0 ) : ?>

				<div class="woocommerce-product-rating rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
					<div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'makeclean' ), $average ); ?>">
						<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
							<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( esc_html__( 'out of %s5%s', 'makeclean' ), '<span itemprop="bestRating">', '</span>' ); ?>
							<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'makeclean' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
						</span>
					</div>
				</div>

			<?php endif; ?>

		</div>

		<ul>
			<!--li>
				<a title="Quick View" href="#" data-toggle="modal" data-target="#quickview-product-<?php echo esc_attr( $i ); ?>">
					<?php esc_html_e("quick view", 'makeclean'); ?>
				</a>
			</li-->
			
			<?php
			if ( class_exists( 'YITH_WCWL_UI' ) ) {
				?>
				<li><?php echo wc_makeclean_wishlist_button(); ?></li><?php
			} ?>
			<!--li>
				<i class="fa fa-heart-o"></i>
			</li-->
			<li><img src="<?php echo esc_url( OWTH_LIB ); ?>/images/repeat-icon.png" alt="repeat icon" /></li>
		</ul>

	</div>

	<div class="clearfix"></div>

	<div class="product-detail">

		<a href="<?php the_permalink(); ?>" class="product-title"><?php the_title(); ?></a>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item hook
			 *
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );

		?>

	</div>

</li>