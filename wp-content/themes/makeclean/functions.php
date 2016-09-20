<?php

/**
 * Theme functions and definitions
 *
*/

/* Include Core */
require get_template_directory() . '/include/common.php';
require get_template_directory() . '/include/inc.php';

/* Include Admin */
require get_template_directory() . '/admin/inc.php';

if ( class_exists('WPBakeryVisualComposerAbstract') ) {
	require get_template_directory() . '/vc_templates/vc_ow_shortcodes.php';
}

/* ************************************************************************ */

/* Dynamic */
add_filter('wp_nav_menu_items', 'makeclean_add_searchmenu_link', 10, 2);
function makeclean_add_searchmenu_link( $items, $args ) {

	if ( $args->theme_location == 'ow_primary') {

		$items .= '<li class="expand-search">
		<a href="#" title="Search"><i class="fa fa-search"></i></a>
		<div class="sb-search" id="sb-search">
			<form method="get" class="search-form" action="'.home_url( '/' ).'">
				<input type="text" class="sb-search-input" placeholder="'.esc_attr_x( 'Enter your search term...', 'placeholder', 'makeclean' ).'" value="'.get_search_query().'" name="s" title="'.esc_attr_x( 'Search for:', 'label', 'makeclean' ).'" />
				<input type="submit" class="sb-search-submit" />
				<span class="sb-icon-search"></span>
			</form>
		</div>
		</li>';
	}

	return $items;
}

/* ************************************************************************ */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see ow_content_width()
 *
 * @since Makeclean 1.0
 */
if ( ! isset( $content_width ) ) { $content_width = 474; }

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Makeclean 1.0
 */
if( !function_exists('makeclean_content_width') ) :
	function makeclean_content_width() {
		if ( is_attachment() && wp_attachment_is_image() ) { $GLOBALS['content_width'] = 810; }
	}
	add_action( 'template_redirect', 'makeclean_content_width' );
endif;

/* ************************************************************************ */

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
if( !function_exists('makeclean_theme_setup') ) :

	function makeclean_theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		// wp-content/themes/makeclean-child/languages/en_US.mo
		load_theme_textdomain( "makeclean", get_stylesheet_directory() . '/languages' );

		/* load theme languages */
		load_theme_textdomain( "makeclean", get_template_directory() . '/languages' );

		/* Image Sizes */
		set_post_thumbnail_size( 823, 365, true ); /* Default Featured Image */

		add_image_size( 'makeclean_859_370', 859, 370, true ); // Service Single
		add_image_size( 'makeclean_410_260', 410, 260, true ); // Service Single with group Filed Repeater
		add_image_size( 'makeclean_1132_514', 1132, 514, true ); // Portfolio Single Full Image
		add_image_size( 'makeclean_110_83', 110, 83, true ); // Portfolio Single Thumbnail Image
		add_image_size( 'makeclean_360_324', 360, 324, true ); // Related Portfolio Thumbnail
		add_image_size( 'makeclean_260_216', 260, 216, true ); // Shop Page

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'ow_primary'   => esc_html__( 'Primary menu', 'makeclean' ),
		) );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'video'/*, 'quote'*/, 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'makeclean_theme_setup' );
endif;

/* ************************************************************************ */

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Makeclean 1.0
 */
if( !function_exists('makeclean_enqueue_scripts') ) :

	function makeclean_enqueue_scripts() {

		// load the Internet Explorer specific stylesheet.
		wp_enqueue_style( 'ie-css', get_template_directory_uri() . '/css/ie.css' , '20131205' );

		wp_style_add_data( 'ie-css', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/* Font Icons */
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'makeclean-genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '3.2' );
		wp_enqueue_style( 'makeclean-fontawesome', get_template_directory_uri() . '/fonts/font-awesome.min.css', array(), '3.2' );
		wp_enqueue_style( 'makeclean-ionicons', get_template_directory_uri() . '/fonts/ionicons.css', array(), '3.2' );

		/* Font Familys */
		wp_enqueue_style( 'makeclean-font-cabin', '//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic', array(), '3.2' );
		wp_enqueue_style( 'makeclean-font-lato', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic', array(), '3.2' );

		wp_enqueue_script( 'makeclean-easing', get_template_directory_uri() . '/libraries/jquery.easing.min.js', array( 'jquery' ),  null, true );

		/* OWL Carousel */
		wp_enqueue_script( 'makeclean-owlcarousel', get_template_directory_uri() . '/libraries/owl-carousel/owl.carousel.min.js', array( 'jquery' ),  null, true );
		wp_enqueue_style( 'makeclean-owlcarousel', get_template_directory_uri() . '/libraries/owl-carousel/owl.carousel.css');
		wp_enqueue_style( 'makeclean-owltheme', get_template_directory_uri() . '/libraries/owl-carousel/owl.theme.css');

		/* Magnific Popup */
		wp_enqueue_style( 'makeclean-magnific-popup', get_template_directory_uri() . '/libraries/magnific-popup.css');
		wp_enqueue_script( 'makeclean-magnific-popup', get_template_directory_uri() . '/libraries/jquery.magnific-popup.min.js', array( 'jquery' ),  null, true );

		wp_enqueue_script( 'makeclean-animateNumber', get_template_directory_uri() . '/libraries/animateNumber.min.js', array( 'jquery' ),  null, true );
		wp_enqueue_script( 'makeclean-appear', get_template_directory_uri() . '/libraries/jquery.appear.js', array( 'jquery' ),  null, true );
		wp_enqueue_script( 'makeclean-isotope.pkgd.min', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ),  null, true );

		/* Flexslider */
		wp_enqueue_style( 'makeclean-flexslider', get_template_directory_uri() . '/libraries/flexslider/flexslider.css');
		wp_enqueue_script( 'makeclean-flexslider', get_template_directory_uri() . '/libraries/flexslider/jquery.flexslider-min.js', array( 'jquery' ),  null, true );

		/* Bootstrap */
		wp_enqueue_script( 'makeclean-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),  null, true );
		wp_enqueue_style( 'makeclean-bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css');

		/* Expaning Search */
		wp_enqueue_script( 'makeclean-modernizr', get_template_directory_uri() . '/libraries/expanding-search/modernizr.custom.js', array( 'jquery' ),  null, true );
		wp_enqueue_script( 'makeclean-classie', get_template_directory_uri() . '/libraries/expanding-search/classie.js', array( 'jquery' ),  null, true );
		wp_enqueue_script( 'makeclean-uisearch', get_template_directory_uri() . '/libraries/expanding-search/uisearch.js', array( 'jquery' ),  null, true );

		/* Theme */
		wp_enqueue_script( 'makeclean-theme', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ),  null, true );
		wp_enqueue_style( 'makeclean-theme', get_template_directory_uri() . '/css/theme.css');

		/* Main Stylesheet */
		wp_enqueue_style( 'makeclean-components', get_template_directory_uri() . '/css/components.css');
		wp_enqueue_style( 'makeclean-stylesheet', get_stylesheet_uri(), null );
		wp_enqueue_style( 'makeclean-media', get_template_directory_uri() . '/css/media.css');
		wp_enqueue_style( 'makeclean-woocommerce', get_template_directory_uri() . '/css/ow-woocommerce.css');

		/* Custom Functions JS */
		wp_enqueue_script( 'makeclean-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ),  null, true );
	}
	add_action( 'wp_enqueue_scripts', 'makeclean_enqueue_scripts' );
endif;

// IE8 / WP Head
function makeclean_ie_scripts() {
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5/html5shiv.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5/respond.min.js"></script>
	<![endif]-->

	<script type="text/javascript">
		var templateUrl = '<?php echo esc_url( get_template_directory_uri() ); ?>';
	</script>
	<?php
}
add_action( 'wp_head', 'makeclean_ie_scripts' );

/**************************************************************************/

/**
 * Extend the default WordPress body classes.
 *
 * @since Makeclean 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
if( !function_exists('makeclean_body_classes') ) :

	function makeclean_body_classes( $classes ) {

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		if( is_front_page() && !is_home() ) {
			$classes[] = 'front-page';
		}

		return $classes;
	}
	add_filter( 'body_class', 'makeclean_body_classes' );
endif;

/* ************************************************************************ */

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Makeclean 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
if( !function_exists('makeclean_post_classes') ) :
	function makeclean_post_classes( $classes ) {
		if ( ! is_attachment() && has_post_thumbnail() ) { $classes[] = 'has-post-thumbnail'; }
		return $classes;
	}
	add_filter( 'post_class', 'makeclean_post_classes' );
endif;

/* ************************************************************************ */

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Makeclean 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function makeclean_search_form_modify( $html ) {
	$html = '<form method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div class="input-group">
	<input type="text" name="s" id="s" placeholder="Type Your Query Here..." class="form-control" required>
	<span class="input-group-btn">
		<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
	</span>
	</div><!-- /input-group -->
	</form>';
	return $html;
}
add_filter( 'get_search_form', 'makeclean_search_form_modify' );