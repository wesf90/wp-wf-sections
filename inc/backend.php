<?php
/*
	For use with: WF-Sections Wordpress Plugin
	Author: Wes Foster
	Author URI: http://twitter.com/therealwesf

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

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
	$opts = shortcode_atts( array(
		'title' 			=> '',
		'default'			=> '',
		'shortcodes' 	=> true,
		'ad'    			=> false,
		'echo'  			=> true
	), $atts );

	new WF_Section($opts);
}


?>