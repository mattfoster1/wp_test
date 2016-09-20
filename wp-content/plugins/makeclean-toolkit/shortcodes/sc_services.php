<?php
function ow_services( $atts ) {

	extract( shortcode_atts(
		array(
		'title' => '',
		'per_page' => '',
		'owlayout' => ''
		), $atts )
	);

	if( '' === $per_page ) :
		$per_page = 5;
	endif;

	if( '' === $owlayout ) :
		$owlayout = "layout_one";
	endif;

	$args = array(
		'post_type' => 'ow_services',
		'posts_per_page' => $per_page,
		'order'   => 'ASC',
	);

	$qry = new WP_Query( $args );

	ob_start();

	if( $owlayout == "layout_one" ) {
		?>
		<div id="service-section" class="service-section ow-section">

			<div class="container">

				<?php
				echo makeclean_content('<div class="section-header"><h3><img src="'. esc_url( OWTH_LIB ) . '/images/sep-icon.png" alt="">', '</h3></div>', esc_attr( $title ) );

				if( $qry->have_posts() ) {
					?>
					<div id="make-clean-service" class="owl-carousel owl-theme services-style1">
						<?php
							while ( $qry->have_posts() ) : $qry->the_post();		
								?>
								<div class="item">

									<div class="service-box">

										<?php the_post_thumbnail('makeclean_290_190'); ?>

										<div class="service-box-inner">

											<?php the_title( '<h4>','</h4>' ); ?>
											<a href="<?php echo esc_url( the_permalink() ); ?>" title=""><?php _e("view details", "makeclean"); ?></a>
											
										</div>

									</div>

								</div>
								<?php
							endwhile;
						
						//Reset Post Data
						wp_reset_postdata();
						?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<?php
	}
	elseif( $owlayout == "layout_two" ) {
		?>
		<div id="service-section" class="service-section ow-section">

			<div class="container">
				<?php
				echo makeclean_content('<div class="section-header"><h3><img src="'. esc_url( OWTH_LIB ) . '/images/sep-icon.png" alt="">', '</h3></div>', esc_attr( $title ) );

				if( $qry->have_posts() ) {
					?>

					<div id="make-clean-service" class="owl-carousel owl-theme services-style2">
						<?php
						while ( $qry->have_posts() ) : $qry->the_post();		
							?>
							<div class="item">

								<div class="service-box">

									<?php the_post_thumbnail('makeclean_114_114'); ?>

									<div class="service-box-inner">

										<?php the_title( '<h4>','</h4>' ); ?>

										<p><?php echo custom_excerpts(10); ?></p>

										<a href="<?php echo esc_url( the_permalink() ); ?>" title=""><?php _e("view details", "makeclean"); ?></a>

									</div>

								</div>

							</div>
							<?php
						endwhile;

						//Reset Post Data
						wp_reset_postdata();
						?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<?php
	}
	elseif( $owlayout == "layout_three" ) {
		?>
		<div id="service-section" class="service-section ow-section services-style2">

			<div class="container">
				<?php
				echo makeclean_content('<div class="section-header"><h3><img src="'. esc_url( OWTH_LIB ) . '/images/sep-icon.png" alt="">', '</h3></div>', esc_attr( $title ) );

				if( $qry->have_posts() ) {

					while ( $qry->have_posts() ) : $qry->the_post();		
						?>
						<div class="service-box col-md-4 col-sm-6 col-xs-6">

							<?php the_post_thumbnail('makeclean_114_114'); ?>

							<div class="service-box-inner">

								<?php the_title( '<h4>','</h4>' ); ?>

								<p><?php echo custom_excerpts(10); ?></p>

								<a href="<?php echo esc_url( the_permalink() ); ?>" title=""><?php _e("view details", "makeclean"); ?></a>

							</div>

						</div>
						<?php
					endwhile;

					//Reset Post Data
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
		<?php
	}
	return ob_get_clean();
}
add_shortcode('ow_services', 'ow_services');