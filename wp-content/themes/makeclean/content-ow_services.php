<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Makeclean
 * @since Makeclean 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	the_title("<div class='section-header'><h3>","</h3></div>");

	the_post_thumbnail('makeclean_859_370');

	/* translators: %s: Name of current post */
	the_content( sprintf(
		esc_html__( 'Continue reading %s', 'makeclean' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	) );

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'makeclean' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'makeclean' ) . ' </span>%',
		'separator'   => '<span class="screen-reader-text">, </span>',
	) );

	$entries = get_post_meta( get_the_ID(), 'ow_cf_service_grp', true );
	?>

	<div class="row">

		<?php
		foreach ( (array) $entries as $key => $entry ) {
			?>
			<div class="col-md-6 col-sm-6 col-xs-6">

				<?php echo wp_get_attachment_image( $entry['image_id'], 'makeclean_410_260' ); ?>

				<h4><?php echo esc_attr( $entry['title'] ); ?></h4>

				<?php echo wpautop( $entry['desc'] ); ?>

			</div>
			<?php
		} ?>

	</div>

	<?php global $ow_option; ?>

	<a title="Estimate" href="#" data-toggle="modal" data-target="#scheduleservices_s" class="btn">
		<?php esc_html_e('Schedule your ' . get_the_title() . ' estimate today!', 'makeclean'); ?>
	</a>

	<div class="scheduleservices">

		<div class="modal fade" id="scheduleservices_s" tabindex="-1" role="dialog">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<div class="modal-body">
						<?php echo do_shortcode( $ow_option['opt_quoteform'] ); ?>
					</div>

				</div>

			</div>

		</div>

	</div>

</article>