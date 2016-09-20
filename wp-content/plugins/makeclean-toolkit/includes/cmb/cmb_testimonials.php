<?php

// Start with an underscore to hide fields from custom fields list
$prefix = 'ow_cf_';

/* - Testimonials Options */
$cmb_testimonials = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_testimonials',
	'title'         => __( 'Options', 'dron' ),
	'object_types'  => array( 'ow_testimonials', ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );

$cmb_testimonials->add_field( array(
	'name'         => __( 'Feedback', 'dron' ),
	'id'           => $prefix . 'testimonial_desc',
	'type'         => 'textarea_small',
) );

$cmb_testimonials->add_field( array(
	'name'         => __( 'Designation', 'dron' ),
	'id'           => $prefix . 'testimonial_desig',
	'type'         => 'text',
) );
?>