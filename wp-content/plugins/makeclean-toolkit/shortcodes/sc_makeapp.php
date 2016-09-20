<?php
function ow_ourapps( $atts, $content = null ) {

	extract( shortcode_atts(
		array(
			'app_image' => '',
			'title' => '',
			'subtitle' => '',
			'gplay_store' => '',
			'apple_store' => '',
		), $atts )
	);

	ob_start();

	?>

	<div id="application-section" class="application-section ow-background">

		<div class="container">

			<div class="col-md-6 col-sm-6">

				<?php
					echo makeclean_content("<div class='section-header'><h3>", "</h3></div>", esc_attr( $title ) );
					echo makeclean_content("<h4>", "</h4>", esc_attr( $subtitle ) );
					echo wpautop( $content ); 
				?>

				<a title="Application Store" href="<?php echo esc_url( $apple_store ) ?>">
					<img alt="app-store" src="<?php echo esc_url( IMG_URI ); ?>/app/app-store.png">
				</a>

				<a title="Google Play Store" href="<?php echo esc_url( $gplay_store ) ?>">
					<img alt="app-store" src="<?php echo esc_url( IMG_URI ); ?>/app/google-play.png">
				</a>

			</div>

			<div class="col-md-6 col-sm-6 iphone">
				<?php
				if( IsNullOrEmptyString( $app_image ) ) {
					echo wp_get_attachment_image( $app_image , 'makeclean_360_248' );
				}
				?>
			</div>

		</div>

	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_ourapps', 'ow_ourapps');