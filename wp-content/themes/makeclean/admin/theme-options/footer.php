<?php
/* Footer Settings */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Footer Settings', 'makeclean' ),
	'icon' => 'el el-wrench-alt',
	'subsection' => false,
	'fields'     => array(
		/* Fields */
		
		array(
			'id'=>'opt_footer_title',
			'type' => 'text',
			'title' => esc_html__('Title Help Text', 'makeclean'),
			'default'  => esc_html__('Have any questions or want a free estimate?', 'makeclean')
		),

		array(
			'id'=>'opt_footer_phone',
			'type' => 'text',
			'title' => esc_html__('Contact No', 'makeclean'),
			'default'  => esc_html__('+(01) 800 527 4800', 'makeclean')
		),

		array(
			'id'=>'info_copyright',
			'type' => 'info',
			'title' => esc_html__('Copyright Section', 'makeclean' ),
		),
		array(
			'id'       => 'opt_footer_copyright',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text', 'makeclean' ),
			'subtitle' => esc_html__( 'Use any of the features of WordPress editor inside your panel!', 'makeclean' ),
			'default'  => 'Copyright &copy; 2015 Make Clean. All Rights Reserved.',
		),
		/* Fields /- */	
	),
));
?>