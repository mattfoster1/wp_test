<?php
function ow_testimonials( $atts ) {

	extract( shortcode_atts(
		array(
			'title' => '',
			'owlayout' => '',
			'per_page' => ''
		), $atts )
	);

	$args = array(
		'post_type' => 'ow_testimonials',
		'posts_per_page' => $per_page,
		'order'   => 'ASC',
	);

	$qry = new WP_Query( $args );

	if( '' === $per_page ) :
		$per_page = 5;
	endif;

	if( '' === $owlayout ) :
		$owlayout = "layout_one";
	endif;

	ob_start();

	if( $owlayout == "layout_one" ) {
		?>
		<div class="industry-serve-section ow-section <?php echo esc_attr( $owlayout ); ?>">

			<?php echo makeclean_content('<div class="section-header"><h3><img src="'. esc_url( OWTH_LIB ) . '/images/sep-icon.png" alt="">', '</h3></div>', esc_attr( $title ) ); ?>

			<div class="industry-serve">

				<div id="testimonial" class="carousel slide testimonial" data-ride="carousel">

					<ol class="carousel-indicators">
						<?php
						for( $j = 0; $j < $qry->post_count; $j++ ) {
							?><li data-target="#testimonial" data-slide-to="<?php echo esc_attr( $j ); ?>"<?php if( $j == 0 ) { echo ' class="active"'; } ?>></li><?php
						}
						?>
					</ol>

					<div class="carousel-inner" role="listbox">
						<?php
						$cnt = 1;

						while ( $qry->have_posts() ) : $qry->the_post();		
							?>
							<div class="item<?php if( $cnt==1 ) { echo ' active'; } ?>">
							
								<div class="testimonials-content">
									
									<div class="testimonial-image">
									
										<?php the_post_thumbnail('makeclean_168_269'); ?>	
										
									</div>
									
									<div class="carousel-caption">
									
										<?php echo wpautop( get_post_meta( get_the_ID(), 'ow_cf_testimonial_desc', true ) ); ?>
										<h3><?php the_title(); ?><span><?php echo esc_attr( get_post_meta( get_the_ID(), 'ow_cf_testimonial_desig', true ) ); ?></span></h3>
									
									</div>
									
								</div>
								
							</div>
							<?php
							$cnt++;

						endwhile;

						// Reset Post Data
						wp_reset_postdata();
						?>
					</div>

				</div>

			</div>

		</div>
		<?php
	}
	elseif( $owlayout == "layout_two" ) {
		?>
		<div class="testimonial-section ow-section <?php echo esc_attr( $owlayout ); ?>">

			<div class="container">

				<div id="testimonial-carousel" class="carousel slide" data-ride="carousel">

					<div class="carousel-inner" role="listbox">

						<?php
						$cnt = 1;

						while ( $qry->have_posts() ) : $qry->the_post();		
							?>
							<div class="item<?php if( $cnt == 1 ) { echo ' active'; } ?>">

								<div class="testimonial-box">

									<span class="title-icon">
										<img alt="comment" src="<?php echo esc_url( OWTH_LIB ); ?>/images/comment.png">
									</span>

									<?php echo makeclean_content("<h3>", "</h3>", $title ); ?>

									<hr>

									<?php 
									echo wpautop( get_post_meta( get_the_ID(), 'ow_cf_testimonial_desc', true ) );

									the_post_thumbnail('makeclean_72_72'); 
									?>

									<h4><?php the_title(); _e(", ", "makeclean"); echo esc_attr( get_post_meta( get_the_ID(), 'ow_cf_testimonial_desig', true ) ); ?></h4>

								</div>

							</div>
							<?php

							$cnt++;
						endwhile;

						// Reset Post Data
						wp_reset_postdata();
						?>

					</div>

					<a class="left carousel-control" href="#testimonial-carousel" role="button" data-slide="prev">
						<span class="fa fa-long-arrow-left" aria-hidden="true"></span>
						<span class="sr-only"><?php _e('Previous','makeclean'); ?></span>
					</a>

					<a class="right carousel-control" href="#testimonial-carousel" role="button" data-slide="next">
						<span class="fa fa-long-arrow-right" aria-hidden="true"></span>
						<span class="sr-only"><?php _e('Next','makeclean'); ?></span>
					</a>

				</div>

			</div>

		</div>
		<?php
	}
	return ob_get_clean();
}
add_shortcode('ow_testimonials', 'ow_testimonials');