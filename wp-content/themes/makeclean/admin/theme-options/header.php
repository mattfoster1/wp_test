<?php
/* Header Settings */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Header', 'makeclean' ),
	'id'    => 'header_settings',
	'icon'  => 'el el-credit-card',
	'subsection' => false,
	'fields'     => array(
		/* Fields */

		/* Site Logo */
		array(
			'id'=>'info_logo',
			'type' => 'info',
			'title' => 'Logo',
		),
		array(
			'id'       => 'opt_logo_select',
			'type'     => 'select',
			'title'    => esc_html__( 'Logo Type', 'makeclean' ),
			'options'  => array(
				'1' => 'Text Logo',
				'2' => 'Image Logo',
			),
			'default'  => '2',
		),
		array(
			'id'=>'opt_site_logo',
			'type' => 'media',
			'title' => esc_html__('Logo Upload', 'makeclean' ),
			'required' => array( 'opt_logo_select', '=', '2' ),
			'default' => array( 'url' => esc_url( IMG_URI ) . '/common/logo.png' ),
		),

		/* Mobile Site Logo */
		array(
			'id'=>'info_mlogo',
			'type' => 'info',
			'title' => 'Mobile Logo',
		),
		array(
			'id'       => 'opt_mlogo_select',
			'type'     => 'select',
			'title'    => esc_html__( 'Logo Type', 'makeclean' ),
			'options'  => array(
				'1' => 'Text Logo',
				'2' => 'Image Logo',
			),
			'default'  => '2',
		),
		array(
			'id'=>'opt_msite_logo',
			'type' => 'media',
			'title' => esc_html__('Logo Upload', 'makeclean' ),
			'required' => array( 'opt_mlogo_select', '=', '2' ),
			'default' => array( 'url' => esc_url( IMG_URI ) . '/common/responsive-logo.png' ),
		),

		/* Header Top */
		array(
			'id'=>'info_header_top',
			'type' => 'info',
			'title' => 'Header Top',
		),		
		array(
			'id'=>'opt_header_left',
			'type' => 'text',
			'title' => esc_html__('Left Text', 'makeclean'),
			'default'  => esc_html__('best cleaning company website forever!', 'makeclean')
		),		
		array(
			'id'=>'opt_header_right',
			'type' => 'text',
			'title' => esc_html__('Right Text', 'makeclean'),
			'default'  => esc_html__('working hours : Mon-sat (8.00am - 6.00PM)', 'makeclean')
		),

		/* Header Bottom */
		array(
			'id'=>'info_header_bottom',
			'type' => 'info',
			'title' => 'Header Bottom',
		),
		array(
			'id'=>'opt_header_title',
			'type' => 'text',
			'title' => esc_html__('Title', 'makeclean'),
			'default'  => esc_html__('Call to schedule your FREE !', 'makeclean')
		),		
		array(
			'id'=>'opt_header_phone',
			'type' => 'text',
			'title' => esc_html__('Contact no', 'makeclean'),
			'default'  => esc_html__('+(01) 800 527 4800', 'makeclean')
		),
		/* Fields /- */
	)		
) );
/* Header Settings /- */
?>