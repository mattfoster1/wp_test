<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Makeclean
 * @since Makeclean 1.0
 */
	global $ow_option;
?>

	<footer id="footer-section" class="footer-section ow-background">

		<div class="container">

			<div class="footer-heading">

				<h5><?php echo esc_attr( $ow_option['opt_footer_title'] ); ?></h5>

				<h3><?php esc_html_e("Call Now: ", 'makeclean'); ?><?php echo esc_attr( $ow_option['opt_footer_phone'] ); ?></h3>

			</div>

			<?php
			if( is_active_sidebar("sidebar-3") ) {
				?>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<?php dynamic_sidebar('sidebar-3'); ?>
				</div>
				<?php
			} ?>

			<?php
			if( is_active_sidebar("sidebar-4") ) {
				?>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<?php dynamic_sidebar('sidebar-4'); ?>
				</div>
				<?php
			} ?>

			<?php
			if( is_active_sidebar("sidebar-5") ) {
				?>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<?php dynamic_sidebar('sidebar-5'); ?>
				</div>
				<?php
			} ?>

			<?php
			if( is_active_sidebar("sidebar-6") ) {
				?>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<?php dynamic_sidebar('sidebar-6'); ?>
				</div>
				<?php
			} ?>

			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<?php echo wpautop( $ow_option['opt_footer_copyright'] ); ?>
			</div>

		</div>

	</footer>

	<?php wp_footer(); ?>
</body>
</html>