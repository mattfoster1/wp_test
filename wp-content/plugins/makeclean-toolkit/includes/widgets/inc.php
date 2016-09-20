<?php

/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Makeclean 1.0
 */

if( !function_exists('ow_widget_setup') ) :

	function ow_widget_setup() {

		/* Script For Widget */
		add_image_size( 'makeclean-92-72', 92, 72, true ); /* Recent Posts Widget */
		add_image_size( 'makeclean-88-88', 88, 88, true ); /* Portfolio Gallery Widget */
	}
	add_action( 'after_setup_theme', 'ow_widget_setup' );
endif;

/* Widget Register / UN-register */
function ow_manage_widgets() {

	/* Recent Posts */
	require_once("recent_posts.php");
	register_widget( 'OW_Widget_RecentPosts' );

	/* Portfolio Gallery */
	require_once("portfolio_gallery.php");
	register_widget( 'OW_Widget_PorfolioGallery' );

	/* Services List */
	require_once("services_list.php");
	register_widget( 'OW_Widget_ServicesList' );
}
add_action( 'widgets_init', 'ow_manage_widgets' );