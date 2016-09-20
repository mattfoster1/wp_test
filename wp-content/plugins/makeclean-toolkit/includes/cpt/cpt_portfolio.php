<?php


/* CPT : Portfolio */
if ( ! function_exists('ow_cpt_portfolio') ) {

	function ow_cpt_portfolio() {

		$labels = array(
			'name' =>  __('Portfolio', 'makeclean' ),
			'singular_name' => __('Portfolio', 'makeclean' ),
			'add_new' => __('Add New', 'makeclean' ),
			'add_new_item' => __('Add New Portfolio', 'makeclean' ),
			'edit_item' => __('Edit Portfolio', 'makeclean' ),
			'new_item' => __('New Portfolio', 'makeclean' ),
			'all_items' => __('All Portfolio', 'makeclean' ),
			'view_item' => __('View Portfolio', 'makeclean' ),
			'search_items' => __('Search Portfolio', 'makeclean' ),
			'not_found' =>  __('No Portfolio found', 'makeclean' ),
			'not_found_in_trash' => __('No Portfolio found in Trash', 'makeclean' ),
			'parent_item_colon' => '',
			'menu_name' => __('Portfolio', 'makeclean' )
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite'  => array( 'slug' => 'portfolio-item' ),
			'has_archive' => true, 
			'capability_type' => 'post', 
			'hierarchical' => true,
			'menu_position' => 106,
			'menu_icon' => 'dashicons-portfolio',
			'supports' => array( 'title', 'thumbnail', 'editor' )
		);
		register_post_type( 'ow_portfolio', $args );
	}
	add_action( 'init', 'ow_cpt_portfolio', 0 );
}

// Register Custom Taxonomy
function ow_tax_portfolio() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'text-domain' ),
		'singular_name'              => _x( 'Portfolio Categories', 'Taxonomy Singular Name', 'text-domain' ),
		'menu_name'                  => __( 'Taxonomy', 'text-domain' ),
		'all_items'                  => __( 'All Items', 'text-domain' ),
		'parent_item'                => __( 'Parent Item', 'text-domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text-domain' ),
		'new_item_name'              => __( 'New Item Name', 'text-domain' ),
		'add_new_item'               => __( 'Add New Item', 'text-domain' ),
		'edit_item'                  => __( 'Edit Item', 'text-domain' ),
		'update_item'                => __( 'Update Item', 'text-domain' ),
		'view_item'                  => __( 'View Item', 'text-domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text-domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text-domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text-domain' ),
		'popular_items'              => __( 'Popular Items', 'text-domain' ),
		'search_items'               => __( 'Search Items', 'text-domain' ),
		'not_found'                  => __( 'Not Found', 'text-domain' ),
		'items_list'                 => __( 'Items list', 'text-domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text-domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'ow_portfolio_tax', array( 'ow_portfolio' ), $args );

}
add_action( 'init', 'ow_tax_portfolio', 0 );