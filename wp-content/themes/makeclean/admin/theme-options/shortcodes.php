<?php
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Shortcodes', 'makeclean' ),
	'id'    => 'shortcodes',
	'icon'  => 'el el-tasks',
) );

/* Welcome */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Welcome', 'makeclean'),
	'id'         => 'opt_welcome_section',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'=>'opt_welcome_items',
			'type' => 'ow_repeater',
			'title' => esc_html__( 'Welcome', 'makeclean' ),
			'description' => true,
			'url' => false,
	   ),				
		/* Fields /- */
	)
));
/* Welcome /- */

/* Statistics */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Statistics', 'makeclean' ),
	'id'         => 'statistics_section',
	'subsection' => true,
	'fields'     => array(
		/* Field */
		array(
			'id'=>'opt_statistics_items',
			'type' => 'ow_repeater',
			'title' => esc_html__('Statistics', 'makeclean' ),
			'description' => false,
			'url' => false,
			'textOne' => true,
			'placeholder' => array(
				'textOne' => esc_html__('Value', 'makeclean'),
			),			
		),

		/* Field /- */	
	),
));
/*  Statistics /- */	

/* Industries Serve */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Industries Serve', 'makeclean' ),
	'id'         => 'opt_industries_section',
	'subsection' => true,
	'fields'     => array(
		/* Field */
		
		array(
			'id'=>'opt_industries_items',
			'type' => 'ow_repeater',
			'title' => esc_html__('Industries Serve', 'makeclean' ),
			'description' => false,
			'url' => false,
		),
	
		/* Field /- */	
	),
));
/*  Industries Serve /- */

/* Our Clients */
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Our Clients', 'makeclean' ),
	'id'         => 'opt_client',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
		'id'=>'opt_client_items',
		'type' => 'ow_repeater',
		'title' => esc_html__('Our Clients', 'makeclean'),
		'image' => true,
		'url' => true,
	   ),				
		/* Fields /- */
	),
));
/* Our Clients /- */

/* Contact Section */
/*
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Contact Section', 'makeclean'),
	'id'         => 'contact_section',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'info_contact_map',
			'type'     => 'info',
			'title'    => esc_html__('Contact Map', 'makeclean'),
		),		
		array(
			'id'=>'opt_map_lati',
			'type' => 'text',
			'title' => esc_html__('Map Latitute', 'makeclean'),
			'default'  => esc_html__('-37.814255', 'makeclean')
		),		
		array(
			'id'=>'opt_map_longi',
			'type' => 'text',
			'title' => esc_html__('Map Longitute', 'makeclean'),
			'default'  => esc_html__('144.963151', 'makeclean')
		),
		array(
			'id'=>'opt_map_address',
			'type' => 'text',
			'title' => esc_html__('Map Address', 'makeclean'),
			'default'  => esc_html__('Bourke St/Elizabeth St, Melbourne, Victoria, Australia', 'makeclean')
		),
		array(
			'id'       => 'info_contact_shortcode',
			'type'     => 'info',
			'title'    => esc_html__('Contact Form 7', 'makeclean'),
		),	
		array(
			'id'=>'opt_contact_shortcode',
			'type' => 'text',
			'title' => esc_html__('Contact Form 7 Shortcode', 'makeclean'),
			'subtitle' => esc_html__('Here Add Contact Form 7 Shortcode, e.g : [contact-form-7 id="266" title="Contact form 1"]', 'makeclean'),
		)
	),
));
*/
/* Contact Section /- */
?>