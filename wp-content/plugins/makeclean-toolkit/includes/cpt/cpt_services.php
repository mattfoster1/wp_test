<?php

if ( ! function_exists('ow_cpt_services') ) {

	// Register Custom Post Type
	function ow_cpt_services() {

		$labels = array(
			'name'                  => _x( 'Services', 'Post Type General Name', 'CDS' ),
			'singular_name'         => _x( 'Services', 'Post Type Singular Name', 'CDS' ),
			'menu_name'             => __( 'Services', 'CDS' ),
			'name_admin_bar'        => __( 'Services', 'CDS' ),
			'parent_item_colon'     => __( 'Parent Item:', 'CDS' ),
			'all_items'             => __( 'All Items', 'CDS' ),
			'add_new_item'          => __( 'Add New Item', 'CDS' ),
			'add_new'               => __( 'Add New', 'CDS' ),
			'new_item'              => __( 'New Item', 'CDS' ),
			'edit_item'             => __( 'Edit Item', 'CDS' ),
			'update_item'           => __( 'Update Item', 'CDS' ),
			'view_item'             => __( 'View Item', 'CDS' ),
			'search_items'          => __( 'Search Item', 'CDS' ),
			'not_found'             => __( 'Not found', 'CDS' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'CDS' ),
			'items_list'            => __( 'Items list', 'CDS' ),
			'items_list_navigation' => __( 'Items list navigation', 'CDS' ),
			'filter_items_list'     => __( 'Filter items list', 'CDS' ),
		);
		$rewrite = array(
			'slug'                  => 'service-item',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Services', 'CDS' ),
			'description'           => __( 'Services Post Type', 'CDS' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 101,
			'menu_icon'             => 'dashicons-chart-bar',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			//'has_archive'           => 'service-items',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
		);
		register_post_type( 'ow_services', $args );

	}
	add_action( 'init', 'ow_cpt_services', 0 );

}