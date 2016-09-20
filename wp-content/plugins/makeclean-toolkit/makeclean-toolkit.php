<?php
/**
 * Plugin Name:  Makeclean Toolkit
 * Plugin URI:   http://www.onistaweb.com/
 * Description:  An easy to use theme plugin to add custom features to WordPress Theme.
 * Version:      1.0
 * Author:       Onista Web
 * Author URI:   http://www.onistaweb.com/
 * Author Email: onistaweb@gmail.com
 *
 * @package    OW_Theme_Toolkit
 * @since      1.0
 * @author     Onista Web
 * @copyright  Copyright (c) 2015-2016, Onista Web
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
	Changes Require For Following Cases : 
	
	1) Change the Plugin dir Name, Theme Name, function name etc..( e.g. Makeclean ) [ Note: Search & Replace in plugin dir ].
	2) Change the textdomain as per theme in function "i18n".
	3) Include only required shortcodes in shortcode dir "inc". delete unnecessary shortcodes
	
*/

class OW_Theme_Toolkit {
	
	/**
	 * PHP5 constructor method.
	 *
	 * @since  1.0
	 */
	public function __construct() {

		// Set constant path to the plugin directory.
		add_action( 'plugins_loaded', array( &$this, 'constants' ), 1 );

		// Internationalize the text strings used.
		add_action( 'plugins_loaded', array( &$this, 'i18n' ), 2 );

		// Load the plugin functions files.
		add_action( 'plugins_loaded', array( &$this, 'includes' ), 3 );

		// Loads the admin styles and scripts.
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_scripts' ) );

		// Loads the frontend styles and scripts.
		add_action( 'wp_enqueue_scripts', array( &$this, 'frontend_scripts' ) ); 

	}

	/**
	 * Defines constants used by the plugin.
	 *
	 * @since  1.0
	 */
	public function constants() {

		// Set constant path to the plugin directory.
		define( 'OWTH_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

		// Set the constant path to the plugin directory URI.
		define( 'OWTH_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// Set the constant path to the inc directory.
		define( 'OWTH_INC', OWTH_DIR . trailingslashit( 'includes' ) );

		// Set the constant path to the shortcodes directory.
		define( 'OWTH_SC', OWTH_DIR . trailingslashit( 'shortcodes' ) );

		// Set the constant path to the assets directory.
		define( 'OWTH_LIB', OWTH_URI . trailingslashit( 'lib' ) );

	}

	/**
	 * Loads the translation files.
	 *
	 * @since  0.1.0
	 */
	public function i18n() {
		load_plugin_textdomain( 'makeclean', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since  0.1.0
	 */
	public function includes() {

		// Load CPT, CMB, Widgets
		require_once( OWTH_INC . 'inc.php' );
		require_once( OWTH_SC . 'inc.php' );
	}

	/**
	 * Loads the admin styles and scripts.
	 *
	 * @since  0.1.0
	 */
	function admin_scripts() {

		// Check if the current screen is post base.
		if ( 'post' != get_current_screen()->base ) {
			return;
		}

		// Loads the popup custom style.
		wp_enqueue_style( 'ow-toolkit-style', trailingslashit( OWTH_LIB ) . 'css/admin.css', null, null );
		wp_enqueue_script( 'ow-toolkit' , trailingslashit( OWTH_LIB ) . 'js/plugin-admin.js', array( 'jquery' ), '1.0', false );
	}

	/**
	 * Loads the frontend styles and scripts.
	 *
	 * @since  0.1.0
	 */
	function frontend_scripts() {

		global $post;

		/* Google Map */
		if( $post && has_shortcode( $post->post_content, 'ow_contact_map' ) ) {
			wp_enqueue_script( 'gmap-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array(), null, true );
		}

		wp_enqueue_style( 'ow-toolkit', trailingslashit( OWTH_LIB ) . 'css/plugin.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'ow-toolkit' , trailingslashit( OWTH_LIB ) . 'js/plugin.js', array( 'jquery' ), '1.0', false );
	}

}

new OW_Theme_Toolkit;