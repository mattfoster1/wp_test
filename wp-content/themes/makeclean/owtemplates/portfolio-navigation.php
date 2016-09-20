<?php
$prevPost = get_previous_post();
$nextPost = get_next_post();
?>

<div class="prev-next-btn">

	<div class="col-md-5 col-sm-5 col-xs-5 prev-btn">
		<?php
		if( $prevPost ) {

			$args = array(
				'posts_per_page' => 1,
				'include' => $prevPost->ID,
				'post_type' => 'ow_portfolio',
			);

			$prevPost = get_posts( $args );

			foreach ( $prevPost as $post ) {

				setup_postdata( $post );
				?>
				
				<a title="Project Previous" href="<?php esc_url( the_permalink() ); ?>">
				
					<b><?php esc_html_e( 'Previous Project', 'makeclean' ); ?></b>

					<p><?php the_title(); ?></p>

				</a>
				
				<?php
				// Reset Post Data
				wp_reset_postdata();
			}
		}
		?>
	</div>

	<div class="col-md-2 col-sm-2 col-xs-2">
	
		<i class="fa fa-th"></i>
		
	</div>

	<div class="col-md-5 col-sm-5 col-xs-5 next-btn">
	
		<?php
		if( $nextPost ) {

			$args = array(
				'posts_per_page' => 1,
				'include' => $nextPost->ID,
				'post_type' => 'ow_portfolio',
			);
			$nextPost = get_posts( $args );

			foreach ( $nextPost as $post ) {

				setup_postdata( $post );
				?>
					
				<a title="Project Previous" href="<?php esc_url( the_permalink() ); ?>">
				
					<b><?php esc_html_e( 'Next Project', 'makeclean' ); ?></b>
					
					<p><?php the_title(); ?></p>
				
				</a>
				<?php
				// Reset Post Data
				wp_reset_postdata();
			}
		}
		?>

	</div>

</div>