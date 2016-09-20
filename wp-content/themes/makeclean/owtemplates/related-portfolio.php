<?php
// Get array of terms
$terms = get_the_terms( $post->ID , 'ow_portfolio_tax', 'string');

// Pluck out the IDs to get an array of IDS
$term_ids = wp_list_pluck( $terms,'term_id' );

// Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms

// Chose 'AND' if you want to query for posts with all terms
$qry = new WP_Query( array(
	'post_type' => 'ow_portfolio',
	'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'ow_portfolio_tax',
			'field' => 'id',
			'terms' => $term_ids,
			'operator'=> 'IN' //Or 'AND' or 'NOT IN'
		)
	),
) );

if ( $qry->have_posts() ) :
	?>

	<div class="section-header">
		<h3><?php esc_html_e("you may Also Like", 'makeclean'); ?></h3>
	</div>

	<ul class="portfolio-list">
		<?php
		while( $qry->have_posts() ) : $qry->the_post();
			?>
			<li class="col-md-4 col-sm-6 col-xs-6">

				<div class="portfolio-image-block">

					<a title="<?php the_title(); ?>" href="<?php echo esc_url( get_permalink() ); ?>">

						<?php the_post_thumbnail('makeclean_360_324'); ?>

					</a>

					<div class="portfolio-block-hover">

						<?php					
						the_title( sprintf( '<a class="portfolio-title" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );

						$termname = array();

						foreach ( $terms as $term ) {
							$termname[] = $term->name;
						}
						$terms_seperated = join( ", ", $termname );
						?>
						<p><?php echo esc_attr( $terms_seperated ); ?></p>

						<hr>

						<div class="zoom-link">

							<a title="Search" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>"><i class="fa fa-search"></i></a>

							<a title="Link" href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-link"></i></a>

						</div>

					</div>

				</div>

			</li>
			<?php
		endwhile;

		// Restore original Post Data
		wp_reset_postdata();
		?>
	</ul>
	<?php
endif;
?>