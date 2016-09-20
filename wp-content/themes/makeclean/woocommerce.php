<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Makeclean
* @since Makeclean 1.0
*/
get_header();

/* Widget Area */
if( IsNullOrEmptyString( get_post_meta( woocommerce_get_page_id('shop'), 'ow_cf_sidebar_layout', true ) ) ) {
	$sidebar_layout = get_post_meta( woocommerce_get_page_id('shop'), 'ow_cf_sidebar_layout', true );
}
else {
	$sidebar_layout = "";
}

/* Page Layout */
if( IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_page_layout', true ) ) ) {
	$page_layout = get_post_meta( get_the_ID(), 'ow_cf_page_layout', true );
}
else {
	$page_layout = "";
}

if( $page_layout == "fluid" ) {
	$page_layout_css = "container-fluid no-padding";
}
else {
	$page_layout_css = "container no-padding";
}

/* Content Area */
if( $sidebar_layout == "right_sidebar" ) {
	$content_area_css = "content-left col-md-9 col-sm-8";
}
elseif( $sidebar_layout == "left_sidebar" ) {
	$content_area_css = "content-right col-md-9 col-sm-8";
}
elseif( $sidebar_layout == "no_sidebar" ) {
	$content_area_css = "full-content col-md-12";
}
else {
	$content_area_css = "content-right col-md-9 col-sm-8";
}

if( get_post_meta( get_the_ID(), 'ow_cf_content_padding', true ) == "off" ) {
	$page_css = " no-padding no-margin";
}
else {
	$page_css = " section-100px";
}
?>
<main id="main" class="site-main<?php echo esc_attr( $page_css ); ?>">

	<div class="page-content">

		<div class="<?php echo esc_attr( $page_layout_css ); ?>">

			<div class="content-area ow-woocommerce <?php echo esc_attr( $content_area_css ); ?>">

				<?php woocommerce_content(); ?>

			</div>

			<?php get_sidebar('wc'); ?>

		</div><!-- .container /- -->

	</div><!-- Page Content /- -->

</main><!-- .site-main -->

<?php get_footer(); ?>