<?php
function ow_calltoaction( $atts, $content = null ) {

	extract( shortcode_atts(
		array(
			'title' => '',
			'desc' => '',
			'btntxt_one' => '',
			'btntxt_two' => '',
			'btnurl_one' => '',
			'btnurl_two' => ''
		), $atts )
	);

	ob_start();

	?>

	<div id="call-out-section" class="call-out-section">

		<div class="container">

			<div class="section-header">

				<?php echo makeclean_content("<h3>", "</h3>", esc_attr( $title ) ); ?>

			</div>

			<?php
				echo wpautop( $content );
				echo makeclean_content('<a href="'.esc_url( $btnurl_one ).'" class="btn" title="">','</a>', esc_attr( $btntxt_one ) );
				echo makeclean_content('<a href="'.esc_url( $btnurl_two ).'" class="btn" title="">','</a>', esc_attr( $btntxt_two ) );
			?>

		</div>

	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_calltoaction', 'ow_calltoaction');