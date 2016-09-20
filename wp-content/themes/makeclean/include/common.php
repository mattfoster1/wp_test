<?php

/* Define Constants */
define( 'THEME_OPTIONS', get_template_directory_uri() . '/admin/theme-options' );
define( 'ADMIN_URI', get_template_directory_uri() . '/admin' );
define( 'THEME_URI', get_template_directory_uri() );
define( 'IMG_URI', get_template_directory_uri() . '/images' );

/**
 * Register three widget areas.
 *
 * @since Makeclean 1.0
 */
if ( ! function_exists( 'makeclean_widgets_init' ) ) {
	function makeclean_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar', 'makeclean' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears in the Content section of the site.', 'makeclean' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3><hr>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar', 'makeclean' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Appears in the Content section of the site.', 'makeclean' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3><hr>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Woocommerce Sidebar', 'makeclean' ),
			'id'            => 'woocommerce-sidebar',
			'description'   => esc_html__( 'Appears in the Content section of the site.', 'makeclean' ),
			'before_widget' => '<aside id="%1$s" class="widget wc-widgets %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3><hr>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 1', 'makeclean' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Appears in the Content section of the site.', 'makeclean' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 2', 'makeclean' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Appears in the Content section of the site.', 'makeclean' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 3', 'makeclean' ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Appears in the Content section of the site.', 'makeclean' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 4', 'makeclean' ),
			'id'            => 'sidebar-6',
			'description'   => esc_html__( 'Appears in the Content section of the site.', 'makeclean' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
	}
	add_action( 'widgets_init', 'makeclean_widgets_init' );
}

/* Custom Excerpt Limit */
if ( ! function_exists( 'custom_excerpts' ) ) :
	function custom_excerpts( $limit ) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if ( count($excerpt) >= $limit ) :
		
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		
		else :
		
			$excerpt = implode(" ",$excerpt);
		
		endif; 

		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}
endif;

/* Check string for Null or Empty & Print It */
if ( ! function_exists( 'makeclean_content' ) ) :

	function makeclean_content( $before_val, $after_val, $val ) {

		if( $val != "" ) {
			return $before_val.$val.$after_val;
		}
		else {
			return "";
		}
	}
endif;

/* Check array element for Null or Empty */
if ( ! function_exists( 'IsNullOrEmptyArray' ) ) :
	function IsNullOrEmptyArray( $arrOptions, $strKey ) {

		if( is_array( $arrOptions )
			&& array_key_exists( $strKey, $arrOptions ) 
			&& isset( $arrOptions[$strKey] ) 
			//&& trim( $arrOptions[$strKey] ) != '' 
		) {
			return true;
		} 
		
		return false;
	}
endif;

/* Check string for Null or Empty */
if ( ! function_exists( 'IsNullOrEmptyString' ) ) :
	function IsNullOrEmptyString( $strValue ) {
		if ( isset( $strValue ) && trim( $strValue ) != '' ) :
			return true;
		endif;
		
		return false;
	}
endif;
?>