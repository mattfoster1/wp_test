<?php
function ow_services_area( $atts, $content = null ) {

	extract( shortcode_atts(
		array(
			'title' => '',
			'areas' => '',
			'icon_upload' => '',
		), $atts )
	);

	ob_start();
	?>

	<div id="call-out-section" class="call-out-section ow-background services-call-out services_area">

		<div class="container">

			<div class="call-out-details">

				<?php
				if( IsNullOrEmptyString( $icon_upload ) )  {
					?>
					<div class="call-out-icon">
						<?php echo wp_get_attachment_image( $icon_upload ); ?>
					</div>
					<?php
				}

				echo makeclean_content("<h3>", "</h3>", esc_attr( $title ) );

				echo wpautop( $content );

				?>

				<span><?php _e("City area: ", "makeclean"); ?></span>

				<?php echo makeclean_content("<span>", "</span>", esc_attr( $areas ) ); ?>

			</div>

		</div>

	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_services_area', 'ow_services_area');