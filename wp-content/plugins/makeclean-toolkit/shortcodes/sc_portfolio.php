<?php
function ow_portfolio( $atts ) {

	extract( shortcode_atts(
		array(
		'title' => '',
		'button_txt' => '',
		'button_url' => '',
		'per_page' => ''
		), $atts )
	);

	if( '' === $per_page ) :
		$per_page = -1;
	endif;

	$post_type = 'ow_portfolio';
	$post_tax = 'ow_portfolio_tax';

	$qry_args = array(
		'post_type' => $post_type,
		'posts_per_page' => $per_page,
		'order' => 'ASC',
	);

	$qry = new WP_Query( $qry_args );

	ob_start();
	?>

	<div id="portfolio-section" class="portfolio-section ow-section">

		<?php echo makeclean_content('<div class="section-header"><h3>', '</h3><img src="'. esc_url( OWTH_LIB ) . 'images/portfolio-heading-bg.png" alt=""></div>', esc_attr( $title ) ); ?>

		<div class="portfolio-content">
		
			<ul class="portfolio-categories cat-filter sorting-menu">

				<li><a href="#" data-filter="*" class="active"><?php _e( 'All', 'makeclean' ) ?></a></li>
				<?php
				$terms = get_terms( $post_tax );
				
				if ( count( $terms ) > 0 && is_array( $terms ) ) {
					
					foreach ( $terms as $term ) {
						
						$termname = strtolower($term->name);
						
						$termname =str_replace(' ', '-', $termname);
						?>
						<li><a href="#" data-filter=".<?php echo esc_attr( $termname ); ?>"><?php echo esc_attr ( $term->name ); ?></a></li>						
						<?php
					}
				}
				?>
			</ul>
			<?php

			if( $qry->have_posts() ) {
				?>
				<ul class="portfolio-list portfolio-items no-space">
					<?php

					$cnt=1;
					
					while ( $qry->have_posts() ) : $qry->the_post();

						$terms = get_the_terms( get_the_ID(), $post_tax );

						if ( $terms && ! is_wp_error( $terms ) && is_array( $terms ) ) :

							$termname = array();

							foreach ( $terms as $term ) {
								$termname[] = $term->name;
							}

							$termname_join = join( " ", str_replace(' ', '-', $termname) );

							$termname_list = strtolower( $termname_join );
							$terms_seperated = join( ", ", $termname );

						else :

							$termname_list = '';
							$terms_seperated = '';
						endif;

						$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
						?>

						<li class="col-md-3 col-sm-4 col-xs-6 <?php echo esc_attr( $termname_list ); ?>">

							<div class="portfolio-image-block">

								<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail('makeclean_400_360'); ?>
								</a>

								<div class="portfolio-block-hover">

									<a href="<?php echo esc_url( get_permalink() ); ?>" class="portfolio-title"><?php the_title(); ?></a>

									<p>
										<?php echo esc_attr( $terms_seperated ); ?>
									</p>

									<hr>

									<div class="zoom-link">
										<a title="Search Icon" href="<?php echo wp_get_attachment_url( $post_thumbnail_id ); ?>"><i class="fa fa-search"></i></a>
										<a title="Link" href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-link"></i></a>
									</div>

								</div>
								
							</div>
							
						</li>
						<?php
						$cnt++;
					endwhile;
				
				// Reset Post Data
				wp_reset_postdata();
				?>
				</ul>
				<?php
			}?>
		</div>
		<?php echo makeclean_content('<a href="'.esc_url( $button_url ).'" class="btn" title="">','</a>', esc_attr( $button_txt ) ); ?>
	</div>
	
	<?php
	return ob_get_clean();
}
add_shortcode('ow_portfolio', 'ow_portfolio');