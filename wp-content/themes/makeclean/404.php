<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Makeclean
* @since Makeclean 1.0
*/
get_header(); ?>

<main id="main" class="site-main section-100px">

	<div class="page-content notfound_template">

		<div id="error-page-section" class="error-page-section">

			<div class="container">

				<div class="col-md-6 error-content">
				
					<img src="<?php echo esc_url( IMG_URI ); ?>/404.png" alt="404" />

					<h3><?php esc_html_e('Ohh! Coundn\'t Find it', 'makeclean'); ?></h3>

					<p><?php esc_html_e('This file May Have Been Moved or Delated. Be Sure to Check Your Spelling.', 'makeclean'); ?></p>

					<div class="widget_search">

						<?php get_search_form(); ?>

					</div>

				</div>

				<div class="col-md-6">
					<img src="<?php echo esc_url( IMG_URI ); ?>/404-2.jpg" alt="404-2" />
				</div>

			</div>

		</div>

	</div><!-- Page Content /- -->

</main><!-- .site-main -->

<?php get_footer(); ?>