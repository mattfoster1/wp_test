<?php
function ow_contact_map( $atts ) {
	
	extract( shortcode_atts(
		array(
			'vc_map_lati' => '',
			'vc_map_longi' => '',
			'vc_address' => ''
		), $atts )
	);

	ob_start();

	?>

	<div class="map">
		<div class="map-canvas" id="map-canvas-contact" data-lat="<?php echo esc_attr( $vc_map_lati ); ?>" data-lng="<?php echo esc_attr( $vc_map_longi ); ?>" data-string="<?php echo esc_attr( $vc_address ); ?>" data-marker="<?php echo esc_url( OWTH_LIB ).'images/marker.png'; ?>" data-zoom="12"></div>
	</div>
	
	<?php
	return ob_get_clean();
}
add_shortcode('ow_contact_map', 'ow_contact_map');