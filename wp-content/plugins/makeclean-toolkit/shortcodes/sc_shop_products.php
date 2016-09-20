<?php
function ow_shop_products( $atts, $content = null ) {

	global $ow_option;
	
	extract( shortcode_atts(
		array(
			'per_page' => '',
		), $atts )
	);

	if( '' === $per_page ) :
		$per_page = 5;
	endif;

	ob_start();

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $qry_args = array(
        'post_type' => 'product',
        'paged' => $paged,
		//'posts_per_page'	=>	$per_page,
    );

	// The Query
	$qry = new WP_Query( $qry_args );
	?>

	<div class="product-category">
		<h4><?php echo esc_attr('All Product', 'makeclean'); ?></h4>
		<!--ul>
			<li><a href="#">New Product</a></li>
			<li><a href="#">best seller</a></li>
			<li><a href="#">top rated</a></li>
			<li><a href="#">featured item</a></li>
		</ul-->
	</div>

	<ul class="product-main row">
		<?php
		$i = 1;
		while ( $qry->have_posts() ) : $qry->the_post();
			global $product;
			?>
			<li class="col-md-4 col-sm-6 col-xs-6 woocommerce">

				<div class="product-box">

					<?php the_post_thumbnail('makeclean_260_216'); ?>

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
									<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
										<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
											<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
											<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
										</span>
									</div>
								</div>

							<?php endif; ?>

						</div>

						<ul>
							<!--li>
								<a title="Quick View" href="#" data-toggle="modal" data-target="#quickview-product-<?php echo esc_attr( $i ); ?>">
									<?php _e("quick view", "makeclean"); ?>
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

				</div>

			</li>

			<?php
			if( $i % 3 == 0 ) {
				?>
				<div class="owclearfix-cnt3"></div>
				<?php
			}
			if( $i % 2 == 0 ) {
				?>
				<div class="owclearfix-cnt2"></div>
				<?php
			}

			$i++;

		endwhile;

		// Restore original Post Data
		wp_reset_postdata();
		?>

	</ul>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_shop_products', 'ow_shop_products');