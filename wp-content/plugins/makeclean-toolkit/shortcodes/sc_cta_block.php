<?php
function ow_cta_block( $atts ) {

	extract( shortcode_atts(
		array(
			'title_icon' => '',
			'title' => '',
			'desc' => '',
			'btntxt' => '',
			'btnurl' => '',
		), $atts )
	);

	ob_start();

	?>

	<div class="services-style2 vc-servicebox services-style3 wc-servicebox">

		<div class="service-box">
		
			<span>
				<?php echo wp_get_attachment_image( $title_icon ); ?>
			</span>
			
			<div class="service-box-inner">
			
				<?php echo makeclean_content('<h4>','</h4>', esc_attr( $title ) ); ?>
				
				<?php echo makeclean_content('<p>','</p>', esc_attr( $desc ) ); ?>

				<a title="<?php echo esc_attr( $btntxt ); ?>" href="<?php echo esc_url( $btnurl ); ?>"><?php echo esc_attr( $btntxt ); ?></a>

			</div>
			
		</div>
		
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_cta_block', 'ow_cta_block');