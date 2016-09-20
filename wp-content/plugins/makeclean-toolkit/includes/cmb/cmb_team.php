<?php

// Start with an underscore to hide fields from custom fields list
$prefix = 'ow_cf_';

/* - Team Options */
$cmb_team = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_team',
	'title'         => __( 'Team Options', 'makeclean' ),
	'object_types'  => array( 'ow_team', ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );

$cmb_team->add_field( array(
	'name'         => __( 'Designation', 'makeclean' ),
	'id'           => $prefix . 'team_desig',
	'type'         => 'text',
) );

$cmb_team->add_field( array(
	'name'         => __( 'Description', 'makeclean' ),
	'id'           => $prefix . 'team_desc',
	'type'       => 'wysiwyg',
    'options' => array(
        'wpautop' => true, // use wpautop?
        'media_buttons' => true, // show insert/upload button(s)
        'textarea_rows' => get_option('default_post_edit_rows', 5), // rows="..."
        'tabindex' => '',
        'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
        'editor_class' => '', // add extra class(es) to the editor textarea
        'teeny' => false, // output the minimal editor config used in Press This
        'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
        'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
        'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
    ),
) );
?>