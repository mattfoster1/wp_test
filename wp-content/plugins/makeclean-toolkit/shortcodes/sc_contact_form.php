<?php
function ow_contact_form( $atts, $content = null ) {

	extract( shortcode_atts(
		array(
			'vc_title' => '',
			'vc_desc' => '',
		), $atts )
	);

	ob_start();
	?>

	<div id="contact" class="contact-form-section ow-section">
	
		<div class="container">
			
			<div class="row">
				
				<?php echo makeclean_content('<h3>','</h3>', $vc_title ); ?>

				<?php echo makeclean_content('<p>','</p>', $vc_desc ); ?>

				<?php echo do_shortcode( $content ); ?>
				
			</div>

		</div>

	</div>
	<?php
	return ob_get_clean();
}
add_shortcode('ow_contact_form', 'ow_contact_form');