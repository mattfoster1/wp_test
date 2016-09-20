<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

add_action( 'cmb2_init', 'register_ow_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function register_ow_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'ow_cf_';

	/* ## Page/Post Options ---------------------- */

	/* - Styling Options */
	$cmb_styling = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_styling',
		'title'         => __( 'Styling Options', "makeclean" ),
		'object_types'  => array( "page", "post" ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	/*$cmb_styling->add_field( array(
		'name'             => 'Menu Style',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'menu_style',
		'type'             => 'select',
		'default'          => '',
		'options'          => array(
			'' => __( 'Select an Option', "makeclean" ),
			'default'   => __( 'Simple', "makeclean" ),
			'absolute'   => __( 'Absolute', "makeclean" ),
		),
	) );*/

	$cmb_styling->add_field( array(
		'name'             => 'Content Area Padding ?',
		'desc'             => 'If your content section need to have just after header area without space, please select an option Off',
		'id'               => $prefix . 'content_padding',
		'type'             => 'select',
		'default'          => 'on',
		'options'          => array(
			'on' => __( 'On', "makeclean" ),
			'off'   => __( 'Off', "makeclean" ),
		),
	) );

	$prefix_cmb = "cmb_";

	/* ## Page Options ---------------------- */
	require_once( $prefix_cmb . "page.php");

	/* ## Portfolio Options ---------------------- */
	require_once( $prefix_cmb . "portfolio.php");

	/* ## Post Options ---------------------- */
	require_once( $prefix_cmb . "post.php");

	/* ## Services Options ---------------------- */
	require_once( $prefix_cmb . "services.php");

	/* ## Team Options ---------------------- */
	require_once( $prefix_cmb . "team.php");

	/* ## Testimonials Options ---------------------- */
	require_once( $prefix_cmb . "testimonials.php");
}
?>