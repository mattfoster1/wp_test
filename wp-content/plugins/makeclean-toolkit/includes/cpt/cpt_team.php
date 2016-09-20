<?php

/* CPT Team */
function ow_cpt_team() {

	$labels = array( 
		'name' => _x( 'Team', 'team', 'makeclean' ),
		'singular_name' => _x( 'Team', 'team', 'makeclean' ),
		'add_new' => __( 'Add New', 'Team', 'makeclean' ),
		'add_new_item' => __( 'Add New Team', 'team', 'makeclean' ),
		'edit_item' => __( 'Edit Team', 'team', 'makeclean' ),
		'new_item' => __( 'New Team', 'team', 'makeclean' ),
		'view_item' => __( 'View Team', 'team', 'makeclean' ),
		'search_items' => __( 'Search Team', 'team', 'makeclean' ),
		'not_found' => __( 'No Teams found', 'team', 'makeclean' ),
		'not_found_in_trash' => __( 'No Team found in Trash', 'team', 'makeclean' ),
		'parent_item_colon' => __( 'Parent team', 'team', 'makeclean' ),
		'menu_name' => __( 'Team', 'team', 'makeclean' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title', 'thumbnail' ),
		'rewrite'  => array( 'slug' => 'team-item' ),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 101,
		'menu_icon' => 'dashicons-groups',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'ow_team', $args );
}
add_action( 'init', 'ow_cpt_team', 0 );