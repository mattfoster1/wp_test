<?php
function ow_clients( $atts ) {

	global $ow_option;

	extract( shortcode_atts(
		array(
			'title' => ''
		), $atts )
	);

	ob_start();

	?>

	<div id="partner-section" class="partner-section ow-section partners-background">

		<div class="container">

			<?php echo makeclean_content('<div class="section-header"><h3><img src="'. esc_url( OWTH_LIB ) . '/images/sep-icon.png" alt="">', '</h3></div>', esc_attr( $title ) ); ?>

			<div id="make-clean-partner" class="owl-carousel owl-theme">
				<?php
				if( IsNullOrEmptyArray( $ow_option["opt_client_items"][0], "attachment_id" ) ) :

					foreach( $ow_option["opt_client_items"] as $single_item ):
						?>
						<div class="item">

							<a href="<?php echo esc_url( $single_item["url"] ); ?>">

								<?php echo wp_get_attachment_image( $single_item["attachment_id"], "makeclean_170_132" ); ?>

							</a>

						</div>
						<?php
					endforeach;

				endif;
				?>
			</div>

		</div>

	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_clients', 'ow_clients');