<?php
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( "General Settings", 'makeclean' ),
	'id'    => 'general_settings',
	'icon'  => 'el el-credit-card',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'info_quoteform',
			'type'     => 'info',
			'title'    => esc_html__('Quote From', 'makeclean'),
		),
		array(
			'id'=>'opt_quoteform',
			'type' => 'text',
			'title' => esc_html__('Quote Form', 'makeclean'),
			'subtitle' => esc_html__('Here Add Contact Form 7 Shortcode, e.g : [contact-form-7 id="132" title="Schedule Service"]', 'makeclean'),
		),
	)
) );
?>