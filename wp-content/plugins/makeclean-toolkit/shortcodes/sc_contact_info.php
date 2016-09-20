<?php
function ow_contact_info( $atts ) {

	extract( shortcode_atts(
		array(
			'title_icon' => '',
			'title' => '',
			'txt_one' => '',
			'txt_two' => '',
			'txt_three' => ''
		), $atts )
	);

	ob_start();

	?>

	<div class="contact-detail">

		<div class="contact-detail-box">

			<?php echo wp_get_attachment_image( $title_icon ); ?>

			<?php echo makeclean_content('<h3>', '</h3>', $title ); ?>

			<?php echo makeclean_content('<p>', '</p>', $txt_one ); ?>

			<?php echo makeclean_content('<p>', '</p>', $txt_two ); ?>

			<?php echo makeclean_content('<p>', '</p>', $txt_three ); ?>

		</div>

	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_contact_info', 'ow_contact_info');