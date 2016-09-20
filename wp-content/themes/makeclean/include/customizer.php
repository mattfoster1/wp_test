<?php
/**
 * Raptish Customizer functionality
 *
 * @package WordPress
 * @subpackage Raptish
 * @since Raptish 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Raptish 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
add_action( 'customize_register', 'raptish_theme_customize_register' );

function raptish_theme_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'raptish_section_1',
		array(
			'title'       => esc_html__( 'Advanced Options', 'raptish' ),
			'priority'    => 30
		)
	);

	$wp_customize->add_setting(
		'custom_css',
		array(
			'default'              => '',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'raptish_example_css_control',
		array(
			'label'    => esc_html__( 'Custom CSS', 'raptish' ),
			'section'  => 'raptish_section_1',
			'settings' => 'custom_css',
			'type'     => 'textarea'
		)
	);
}

// Print custom styles
add_action('wp_head', 'print_theme_styles', 1024);
function print_theme_styles(){

	$custom_css = get_theme_mod('custom_css');

    echo "<style type='text/css' id='theme-customize-css'>
            $custom_css
        </style>";
}