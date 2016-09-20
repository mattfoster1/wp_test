<?php

if( function_exists('vc_map') ) {

	/* - Call to Action Blocks */
	vc_map( array(
		"name" => esc_html__("Call to Action Blocks", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_cta_block",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html__("Title Icon", 'makeclean'),
				"param_name" => "title_icon",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
				"holder" => "div",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Description", 'makeclean'),
				"param_name" => "desc",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button Text", 'makeclean'),
				"param_name" => "btntxt",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button URL", 'makeclean'),
				"param_name" => "btnurl",
			),
		)
	) );

	/* - Shop Products */
	vc_map( array(
		"name" => esc_html__("Shop Products", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_shop_products",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "label",
				"class" => "",
				"heading" => esc_html__("There is no need of settings in field.", 'makeclean'),
				"param_name" => "label",
			),
		)
	) );

	/* - Portfolio */
	vc_map( array(
		"name" => esc_html__("Portfolio", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_portfolio",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
		)
	) );

	/* - Contact Map */
	vc_map( array(
		"name" => esc_html__("Contact Map", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_contact_map",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Map Latitute", 'makeclean'),
				"param_name" => "vc_map_lati",
				"description" => esc_html__("e.g : -37.814255", 'makeclean'),
				"holder" => "div",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Map Latitute", 'makeclean'),
				"param_name" => "vc_map_longi",
				"description" => esc_html__("e.g : 144.963151", 'makeclean'),
				"holder" => "div",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Map Address", 'makeclean'),
				"param_name" => "vc_address",
			),
		)
	) );

	/* - Contact Info */
	vc_map( array(
		"name" => esc_html__("Contact Info", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_contact_info",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title_icon",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Text 1", 'makeclean'),
				"param_name" => "txt_one",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Text 2", 'makeclean'),
				"param_name" => "txt_two",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Text 3", 'makeclean'),
				"param_name" => "txt_three",
			),
		)
	) );

	/* - Contact Form */
	vc_map( array(
		"name" => esc_html__("Contact Form", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_contact_form",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "vc_title",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Description", 'makeclean'),
				"param_name" => "vc_desc",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Contact Form Shortcode", 'makeclean'),
				"description" => esc_html__('Here Add Contact Form 7 Shortcode, e.g : [contact-form-7 id="266" title="Contact form 1"]', 'makeclean'),
				"param_name" => "content",
				"holder" => "div",
			),
		)
	) );

	/* - About */
	vc_map( array(
		"name" => esc_html__("Services", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_services",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Per Page", 'makeclean'),
				"description" => esc_html__("Default 5, The \"Per Page\" shortcode determines how many services to show on the page", 'makeclean'),
				"param_name" => "per_page",
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Layout", 'makeclean'),
				"param_name" => "owlayout",
				'value' => array(
					esc_html__( 'Select an Option', 'makeclean' ) => 'default',
					esc_html__( 'Layout 1', 'makeclean' ) => 'layout_one',
					esc_html__( 'Layout 2', 'makeclean' ) => 'layout_two',
					esc_html__( 'Layout 3', 'makeclean' ) => 'layout_three',
				),
			),
		)
	) );

	/* - Welcome Content */
	vc_map( array(
		"name" => esc_html__("Welcome Box", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_welcome",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html__("Image", 'makeclean'),
				"param_name" => "welcome_image",
			),
			array(
				'type' => 'textarea_html',
				'holder' => 'div',
				'heading' => esc_html__( 'Description', 'makeclean' ),
				'param_name' => 'content',
				'value' => esc_html__( '<p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo eni sai th ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione kavosvo uptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore</p>', 'makeclean' ),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button Text 1", 'makeclean'),
				"param_name" => "btntxt_one",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button URL 1", 'makeclean'),
				"param_name" => "btnurl_one",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button Text 2", 'makeclean'),
				"param_name" => "btntxt_two",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button URL 1", 'makeclean'),
				"param_name" => "btnurl_two",
			),
		)
	) );

	/* - Our Staff */
	vc_map( array(
		"name" => esc_html__("Our Staff", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_team",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Description', 'makeclean' ),
				'param_name' => 'desc',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Per Page", 'makeclean'),
				"param_name" => "per_page",
			),
		)
	) );

	/* - Industries Serve */
	vc_map( array(
		"name" => esc_html__("Industries We Serve", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_industryserve",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Description', 'makeclean' ),
				'param_name' => 'desc',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button Text", 'makeclean'),
				"param_name" => "btntxt",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button URL", 'makeclean'),
				"param_name" => "btnurl",
			),
		)
	) );

	/* - Testimonials */
	vc_map( array(
		"name" => esc_html__("Testimonials", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_testimonials",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => esc_html__("Layout", 'makeclean'),
				"param_name" => "owlayout",
				'value' => array(
					esc_html__( 'Select an Option', 'makeclean' ) => 'default',
					esc_html__( 'Layout 1', 'makeclean' ) => 'layout_one',
					esc_html__( 'Layout 2', 'makeclean' ) => 'layout_two',
				),
			),
		)
	) );

	/* - Statistics */
	vc_map( array(
		"name" => esc_html__("Statistics", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_statistics",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "label",
				"class" => "",
				"heading" => esc_html__("There is no need of settings in field.", 'makeclean'),
				"param_name" => "label",
			),
		)
	) );

	/* - Blog */
	vc_map( array(
		"name" => esc_html__("Blog", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_blog",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button Text", 'makeclean'),
				"param_name" => "btntxt",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button URL", 'makeclean'),
				"param_name" => "btnurl",
			),
		)
	) );

	/* - Call to Action */
	vc_map( array(
		"name" => esc_html__("Call to Action", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_calltoaction",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				"type" => "textarea_html",
				"class" => "",
				"heading" => esc_html__("Description", 'makeclean'),
				"param_name" => "content",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button Text 1", 'makeclean'),
				"param_name" => "btntxt_one",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button URL 1", 'makeclean'),
				"param_name" => "btnurl_one",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button Text 2", 'makeclean'),
				"param_name" => "btntxt_two",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Button URL 1", 'makeclean'),
				"param_name" => "btnurl_two",
			),
		)
	) );

	/* - Clients */
	vc_map( array(
		"name" => esc_html__("Clients", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_clients",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
		)
	) );

	/* - Services Areas */
	vc_map( array(
		"name" => esc_html__("Services Areas", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_services_area",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html__("Title Icon", 'makeclean'),
				"param_name" => "icon_upload",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				"type" => "textarea_html",
				"class" => "",
				"heading" => esc_html__("Description", 'makeclean'),
				"param_name" => "content",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Service Areas", 'makeclean'),
				"param_name" => "areas",
			),
		)
	) );

	/* - Our Applications */
	vc_map( array(
		"name" => esc_html__("Our Applications", 'makeclean'),
		"icon" => 'vc-site-icon',
		"base" => "ow_ourapps",
		"category" => esc_html__('Makeclean', 'makeclean'),
		"params" => array(
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html__("Image", 'makeclean'),
				"param_name" => "app_image",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Title", 'makeclean'),
				"param_name" => "title",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Sub Title", 'makeclean'),
				"param_name" => "subtitle",
			),
			array(
				"type" => "textarea_html",
				"class" => "",
				"heading" => esc_html__("Description", 'makeclean'),
				"param_name" => "content",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Apple Store Link", 'makeclean'),
				"param_name" => "apple_store",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Googleplay Store Link", 'makeclean'),
				"param_name" => "gplay_store",
			),
		)
	) );

	vc_add_param("vc_row", array(
		"type" => "dropdown",
		"group" => "Page Layout",
		"class" => "",
		"heading" => "Type",
		"param_name" => "type",
		'value' => array(
			esc_html__( 'Default', 'makeclean' ) => 'default-layout',
			esc_html__( 'Fixed', 'makeclean' ) => 'container',
		),
	));
}