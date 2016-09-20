<?php
function ow_statistics( $atts ) {

	global $ow_option;

	extract( shortcode_atts(
		array(
		), $atts )
	);

	ob_start();

	?>

	<div id="statistics-section" class="statistics-section ow-background">
		<div class="container">
			<?php
			if( IsNullOrEmptyArray( $ow_option["opt_statistics_items"][0], "attachment_id" ) ) :

				$cnt=1;

				foreach( $ow_option["opt_statistics_items"] as $single_item ):
					?>
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="statistics-box">
							<div class="statistics-heading">
								<img src="<?php echo esc_url( $single_item['image'] ); ?>" alt=""/>
								<span class="count" id="statistics_1_count-<?php echo esc_attr( $cnt); ?>" data-statistics_percent="<?php echo esc_attr( $single_item["textOne"]); ?>"></span>
							</div>
							<img src="<?php echo esc_url( OWTH_LIB ); ?>/images/brush.png" alt="" />
							<?php echo makeclean_content("<h4>","</h4>", esc_attr( $single_item["title"] ) ); ?>
						</div>
					</div>
					<?php
				$cnt++;

				endforeach;

			endif;
			?>
		</div>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('ow_statistics', 'ow_statistics');