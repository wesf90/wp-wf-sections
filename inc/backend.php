<?php

// Short and sweet, create the section in the admin panel!
add_action( 'init', 'wf_create_sections_post_type' );
function wf_create_sections_post_type() {
	$labels = array(
		'name'               => 'Sections',
		'singular_name'      => 'Section',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Section',
		'edit_item'          => 'Edit Section',
		'new_item'           => 'New Section',
		'all_items'          => 'All Sections',
		'view_item'          => '',
		'search_items'       => 'Search Sections',
		'not_found'          => 'No Sections found',
		'not_found_in_trash' => 'No Sections found in Trash', 
		'parent_item_colon'  => '',
		'menu_name'          => 'Sections'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false, 
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' )
	); 

	register_post_type( 'wf_sections', $args );
}


// The shortcode
add_shortcode('wf_section', 'sc_wf_section');
function sc_wf_section($atts)
{
	extract( shortcode_atts( array(
		'title' => '',
		'ad'		=> '',
		'echo'	=> true
	), $atts ) );

	new WF_Section($title, $ad, $echo);
}


?>