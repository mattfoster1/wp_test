<?php
if( IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_page_header_img', true ) ) ) {
	$header_image = get_post_meta( get_the_ID(), 'ow_cf_page_header_img', true );
}
else {
	$header_image = IMG_URI . '/page-banner.png';
}

if( get_post_meta( get_the_ID(), 'ow_cf_page_title', true ) != "disable" && !is_home() ) :
	?>
	<div class="page-banner"<?php if( IsNullOrEmptyString( $header_image ) ) { ?> style="background-image: url(<?php echo esc_url( $header_image ); ?>);"<?php } ?>>

		<div class="page-heading">

			<div class="container">

				<div class="page-title pull-left no-padding">

					<h3>
						<?php
						if( is_404() ) {
							esc_html_e( 'Error Page', 'makeclean' );
						}
						elseif( is_search() ) {
							printf( esc_html__( 'Search Results for: %s', 'makeclean' ), get_search_query() );
						}
						elseif( is_archive() ) {
							the_archive_title();
						}
						else {
							the_title();
						}
						if( IsNullOrEmptyString( get_post_meta( get_the_ID(), 'ow_cf_page_sub_title', true ) ) ) {
							?>
							<span>
								<?php echo esc_attr( get_post_meta( get_the_ID(), 'ow_cf_page_sub_title', true ) ); ?>
							</span>
							<?php
						}
						?>
					</h3>

				</div>

				<?php
				if( class_exists("woocommerce") && function_exists( 'bcn_display' ) && ( !is_woocommerce() || !is_shop() ) ) {
					?>
					<div class="breadcrumb pull-right no-padding">
						<?php bcn_display(); ?>
					</div>
					<?php
				}
				elseif( function_exists( 'bcn_display' ) ) {
					?>
					<div class="breadcrumb pull-right no-padding">
						<?php bcn_display(); ?>
					</div>
					<?php
				}
				else {
					// Do nothing..
				}
				?>

			</div>

		</div>

	</div>

	<?php
endif;