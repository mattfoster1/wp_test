<?php
/*
*	Template Name: Blog Page
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
	$content_area_css = "content-left col-md-9 col-sm-8";
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

			<div class="content-area blog-list <?php echo esc_attr( $content_area_css ); ?>">
				<?php
				query_posts('posts_per_page='.get_option('posts_per_page').'&paged='. get_query_var('paged'));

				if ( have_posts() ) :

					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', get_post_format() );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					// End the loop.
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => esc_html__( '<i class="fa fa-angle-left"></i> Previous', 'makeclean' ),
						'next_text'          => esc_html__( 'Next <i class="fa fa-angle-right"></i>', 'makeclean' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'makeclean' ) . ' </span>',
					) );

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );
				endif;
				?>
			</div>

			<?php get_sidebar(); ?>

		</div><!-- .container /- -->

	</div><!-- Page Content /- -->

</main><!-- .site-main -->

<?php get_footer(); ?>