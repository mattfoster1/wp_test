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
if( IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_sidebar_layout', true ) ) ) {
	$sidebar_layout = get_post_meta( get_the_ID(), 'ow_cf_sidebar_layout', true );
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
	$content_area_css = "full-content col-md-12";
}
?>
<main id="main" class="site-main">

	<div class="post-content">

		<div class="<?php echo esc_attr( $page_layout_css ); ?>">

			<div class="content-area <?php echo esc_attr( $content_area_css ); ?>">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'ow_portfolio' );

				// End the loop.
				endwhile;
				?>
			</div>

			<!-- Sidebar -->
			<?php get_sidebar(); ?>

		</div><!-- .container /- -->

	</div><!-- Page Content /- -->

</main><!-- .site-main -->

<?php get_footer(); ?>