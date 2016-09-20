<?php
function ow_welcome( $atts, $content = null ) {

	global $ow_option;
	
	extract( shortcode_atts(
		array(
			'welcome_image' => '',
			'title' => '',
			'btntxt_one' => '',
			'btnurl_one' => '',		
			'btntxt_two' => '',
			'btnurl_two' => ''
		), $atts )
	);

	ob_start();

	?>

	<div id="welcome-section" class="welcome-section ow-section">
		<div class="container">
			<div class="col-md-4 col-sm-12">
				<?php
				if( IsNullOrEmptyString( $welcome_image ) )  {
					echo wp_get_attachment_image( $welcome_image, 'makeclean_360_248' );
				}
				?>
			</div>
			<div class="col-md-8 col-sm-12 welcome-content">
				<?php 
					echo makeclean_content("<div class='section-header'><h3>", "</h3></div>", esc_attr( $title ) );

					echo wpautop( $content );

					echo makeclean_content('<a href="'.esc_url( $btnurl_one ).'" title="">','</a>', esc_attr( $btntxt_one ) );

					echo makeclean_content('<a href="'.esc_url( $btnurl_two ).'" title="">','</a>', esc_attr( $btntxt_two ) );
				?>
				<div class="welcome-content-box row">
					<?php
					if( IsNullOrEmptyArray( $ow_option["opt_welcome_items"][0], "attachment_id" ) ) :

						foreach( $ow_option["opt_welcome_items"] as $single_item ):
							?>
							<div class="col-md-4 col-sm-6 col-xs-6 welcome-box">
								<img src="<?php echo esc_url( $single_item['image'] ); ?>" alt=""/>
								<?php
									echo makeclean_content("<h4>", "</h4>", esc_attr( $single_item["title"] ) );
									echo wpautop( $single_item["description"] ); 
								?>
							</div>
							<?php
						endforeach;
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	return ob_get_clean();
}
add_shortcode('ow_welcome', 'ow_welcome');