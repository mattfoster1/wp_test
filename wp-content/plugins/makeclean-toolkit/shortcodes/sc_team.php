<?php
function ow_team( $atts ) {

	extract( shortcode_atts(
		array(
		'title' => '',
		'desc' => '',
		'per_page' => ''
		), $atts )
	);

	if( '' === $per_page ) :
		$per_page = 5;
	endif;
	
	$args = array(
		'post_type' => 'ow_team',
		'posts_per_page' => $per_page,
		'order'   => 'ASC',
	);

	$qry = new WP_Query( $args );

	ob_start();

	?>

	<div id="team-section" class="team-section ow-section">
		<div class="container">
			<div class="col-md-3 col-sm-4">
				<?php
					echo makeclean_content('<div class="section-header"><h3><img src="'. esc_url( OWTH_LIB ) . '/images/sep-icon.png" alt="">', '</h3></div>', esc_attr( $title ) );
					echo wpautop( $desc );
				?>
			</div>
			<?php
			if( $qry->have_posts() ) {
				?>
				<div class="col-md-9 col-sm-8">
					<?php
					$i = 1;
					while ( $qry->have_posts() ) : $qry->the_post();		
						?>
						<div class="modal fade" id="serviceModal-<?php echo esc_attr( $i ); ?>" tabindex="-1" role="dialog">

							<div class="modal-dialog" role="document">

								<div class="modal-content">

									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>

									<div class="modal-body">
										<?php echo wpautop( get_post_meta( get_the_ID(), 'ow_cf_team_desc', true ) ); ?>
									</div>

								</div>

							</div>

						</div>
						<?php
						$i++;

					endwhile;
					
					// Reset Post Data
					wp_reset_postdata();
					?>

					<div id="make-clean-team" class="owl-carousel owl-theme team-style1">
						<?php
						$i = 1;
						while ( $qry->have_posts() ) : $qry->the_post();		
							?>
							<div class="item">

								<div class="team-box">

									<?php the_post_thumbnail('makeclean_253_253'); ?>

									<div class="team-box-inner">

										<a href="" title="About Us" data-toggle="modal" data-target="#serviceModal-<?php echo esc_attr( $i ); ?>">
											<img src="<?php echo esc_url( OWTH_LIB ); ?>/images/team-icon.png" alt="team icon"/>
										</a>

										<?php the_title('<h4>','</h4>'); ?>

										<hr>

										<?php echo wpautop( get_post_meta( get_the_ID(), 'ow_cf_team_desig', true ) ); ?>
									</div>

								</div>
								
							</div>
							<?php
							$i++;
						endwhile;

						// Reset Post Data
						wp_reset_postdata();
						?>
					</div>
				</div>
				<?php
			}?>
		</div>
	</div>
	
	<?php
	return ob_get_clean();
}
add_shortcode('ow_team', 'ow_team');