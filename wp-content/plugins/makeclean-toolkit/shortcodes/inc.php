<?php

if( !function_exists('ow_sc_setup') ) :

	function ow_sc_setup() {

		/* Script For Shortcodes */
		add_image_size( 'makeclean_290_190', 290, 190, true ); // Service layout 1
		add_image_size( 'makeclean_114_114', 114, 114, true ); // Service layout 2

		add_image_size( 'makeclean_168_269', 168, 269, true ); // Client Testimonials

		add_image_size( 'makeclean_349_558', 349, 558, true ); // Welcome	
		add_image_size( 'makeclean_253_253', 253, 253, true ); // Team	
		add_image_size( 'makeclean_482_269', 482, 269, true ); // Testimonials with col-md-6
		add_image_size( 'makeclean_72_72', 72, 72, true ); // Testimonials Single
		add_image_size( 'makeclean_291_385', 291, 385, true ); // Make App Mobile Images
		add_image_size( 'makeclean_140_47', 140, 47, true ); // Make App App Stores
		add_image_size( 'makeclean_400_360', 400, 360, true ); // Portfolio
		add_image_size( 'makeclean_1035_470', 1035, 470, true ); // Portfolio Single flexslider 
		add_image_size( 'makeclean_120_90', 120, 90, true ); // Portfolio Single flexslider thumbnail
		add_image_size( 'makeclean_278_298', 278, 298, true ); // Blog Section
		add_image_size( 'makeclean_170_132', 170, 132, true ); // Clients
	}

	add_action( 'after_setup_theme', 'ow_sc_setup' );
endif;

/* Include all individual shortcodes. */

$prefix_sc = "sc_";

require_once( $prefix_sc . "blog.php" );

require_once( $prefix_sc . "cta_block.php" );

require_once( $prefix_sc . "shop_products.php" );

require_once( $prefix_sc . "calltoaction.php" );

require_once( $prefix_sc . "clients.php" );

require_once( $prefix_sc . "contact_info.php" );

require_once( $prefix_sc . "contact_map.php" );

require_once( $prefix_sc . "contact_form.php" );

require_once( $prefix_sc . "industryserve.php" );

require_once( $prefix_sc . "makeapp.php" );

require_once( $prefix_sc . "portfolio.php" );

require_once( $prefix_sc . "services.php" );

require_once( $prefix_sc . "statistics.php" );

require_once( $prefix_sc . "team.php" );

require_once( $prefix_sc . "testimonials.php" );

require_once( $prefix_sc . "welcome.php" );

require_once( $prefix_sc . "services_area.php" );