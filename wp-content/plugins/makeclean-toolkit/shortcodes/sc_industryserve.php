<?php
function ow_industryserve( $atts ) {

	global $ow_option;

	extract( shortcode_atts(
		array(
			'title' => '',
			'desc' => '',
			'btntxt' => '',
			'btnurl' => '',
		), $atts )
	);

	ob_start();

	?>

	<section id="industry-serve-section" class="industry-serve-section ow-section">

		<?php echo makeclean_content('<div class="section-header"><h3><img src="'. esc_url( OWTH_LIB ) . '/images/sep-icon.png" alt="" />', '</h3></div>', esc_attr( $title ) ); ?>

		<div class="industry-serve">

			<?php echo wpautop( $desc ); ?>

			<div class="row">
				<?php

				if( IsNullOrEmptyArray( $ow_option["opt_industries_items"][0], "attachment_id" ) ) :

					foreach( $ow_option["opt_industries_items"] as $single_item ):
						?>
						<p class="col-md-6 col-sm-6 col-xs-6">
							<img src="<?php echo esc_url( $single_item['image'] ); ?>" alt=""/>
							<?php echo makeclean_content("", "", esc_attr( $single_item["title"] ) ); ?>
						</p>
						<?php
					endforeach;
				endif;

				echo makeclean_content('<a href="'.esc_url( $btnurl ).'" title="">','</a>', esc_attr( $btntxt ) );
				?>
			</div>

		</div>

	</section>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_industryserve', 'ow_industryserve');