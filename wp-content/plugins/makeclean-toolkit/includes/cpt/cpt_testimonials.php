<?php

/* CPT Testimonials */
function ow_cpt_testimonials() {

	$labels = array(
		'name' => _x( 'Testimonials', 'testimonials', 'makeclean' ),
		'singular_name' => _x( 'Testimonials', 'testimonials', 'makeclean' ),
		'add_new' => __( 'Add New', 'testimonials', 'makeclean' ),
		'add_new_item' => __( 'Add New Testimonial', 'testimonials', 'makeclean' ),
		'edit_item' => __( 'Edit Testimonial', 'testimonials', 'makeclean' ),
		'new_item' => __( 'New Testimonial', 'testimonials', 'makeclean' ),
		'view_item' => __( 'View Testimonial', 'testimonials', 'makeclean' ),
		'search_items' => __( 'Search Testimonial', 'testimonials', 'makeclean' ),
		'not_found' => __( 'No Testimonial found', 'testimonials', 'makeclean' ),
		'not_found_in_trash' => __( 'No Testimonial found in Trash', 'testimonials', 'makeclean' ),
		'parent_item_colon' => __( 'Parent Testimonial:', 'testimonials', 'makeclean' ),
		'menu_name' => __( 'Testimonials', 'testimonials', 'makeclean' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title','thumbnail'),
		'rewrite'  => array( 'slug' => 'testimonial-item' ),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 101,
		'menu_icon' => 'dashicons-testimonial',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'ow_testimonials', $args );
}
add_action( 'init', 'ow_cpt_testimonials', 0 );