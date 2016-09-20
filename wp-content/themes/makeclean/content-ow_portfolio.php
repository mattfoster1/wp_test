<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Makeclean
 * @since Makeclean 1.0
 */

$entries = get_post_meta( get_the_ID(), 'ow_cf_portfolio_grp', true );
$files = get_post_meta( get_the_ID(), 'ow_cf_portfolio_imglist', 1 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div id="portfolio-details" class="portfolio-details ow-section">

		<div class="container no-padding">
		
			<div class="portfolio-details-slider">
			
				<div class="col-md-12 col-sm-12 col-xs-12">
				
					<div id="portfolio-slider" class="flexslider">
					
						<ul class="slides">
							<?php
							// Loop through them and output an image
							foreach ( (array) $files as $attachment_id => $attachment_url ) {
								?>
								<li>
									<?php echo wp_get_attachment_image( $attachment_id, 'makeclean_1132_514' ); ?>
								</li>
								<?php
							} ?>
						</ul>
						
					</div>
					
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
				
					<div id="portfolio-carousel" class="flexslider thumbnail">

						<ul class="slides">
							<?php
							// Loop through them and output an image
							foreach ( (array) $files as $attachment_id => $attachment_url ) {
								?>
								<li>
									<?php echo wp_get_attachment_image( $attachment_id, 'makeclean_110_83' ); ?>
								</li>
								<?php
							} ?>
						</ul>
						
					</div>
					
				</div>
				
			</div>

			<div class="portfolio-detail-content">
			
				<div class="col-md-8">
				
					<?php the_title('<h3>','</h3>'); ?>

					<?php
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
					?>

				</div>

				<div class="col-md-4">

					<div class="portfolio-detail-content-box">
					
						<h3><?php echo esc_attr('Project Details', 'makeclean'); ?></h3>
						
						<div class="portfolio-table">
							<?php
							foreach ( (array) $entries as $key => $entry ) {
								?>								
								<p><span><?php echo esc_attr( $entry['portfolio_single_txt'] ); esc_html_e(' :', 'makeclean'); ?></span> <?php echo esc_attr( $entry['portfolio_single_value'] ); ?></p>
								<?php
							} ?>
						</div>
						
					</div>
					
				</div>
				
			</div>

			<?php get_template_part('owtemplates/portfolio','navigation'); ?>
		
		</div>
			
		<div class="container">

			<?php get_template_part('owtemplates/related','portfolio'); ?>			
			
		</div>
		
	</div>

</article>