<?php

// Start with an underscore to hide fields from custom fields list
$prefix = 'ow_cf_';

$cmb_service = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_service',
	'title'         => __( 'Options', 'makeclean' ),
	'object_types'  => array( 'ow_services' ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );

/*  Repeatable Group Field */
$cmb_grp_service = $cmb_service->add_field( array(
	'id'          => $prefix . 'service_grp',
	'type'        => 'group',
	'options'     => array(
		'group_title'   => __( 'Content Box {#}', 'makeclean' ), // {#} gets replaced by row number
		'add_button'    => __( 'Add Item', 'makeclean' ),
		'remove_button' => __( 'Remove Item', 'makeclean' ),
	),
) );

$cmb_service->add_group_field( $cmb_grp_service, array(
	'name'       => __( 'Image', 'makeclean' ),
	'id'         => 'image',
	'type' => 'file',
) );

$cmb_service->add_group_field( $cmb_grp_service, array(
	'name'       => __( 'Title', 'makeclean' ),
	'id'         => 'title',
	'type' => 'text',
) );

$cmb_service->add_group_field( $cmb_grp_service, array(
	'name'       => __( 'Description', 'makeclean' ),
	'id'         => 'desc',
	'type' => 'textarea_small',
) );
?>