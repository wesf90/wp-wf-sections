<?php

class WF_Section {

	// Main function
	// Samples:
	// WF_Section('My section');
	// WF_Section('My ad', '300x250');
	// WF_Section('My echo section', false, true);
	public function __construct($title, $ad=false, $echo=true)
	{
		if ( empty($title) ) break;
		
		$content = WF_Section::get_section($title);

		if ( empty($content) ){
			// Create post
			$content = WF_Section::create_section($title, $ad);
		}

		if ( $echo ){
			echo $content;
		}
		else{
			return $content;
		}
	}


	// Does post exist?
	private function get_section($title)
	{
		global $wpdb;
		return reset($wpdb->get_col( "SELECT post_content FROM {$wpdb->prefix}posts WHERE post_type='wf_sections' AND post_title = '{$title}'" ));
	}


	// Create section
	private function create_section($title, $ad)
	{
		$slug = sanitize_title_with_dashes($title);

		// Are we creating an ad section?
		$content = ( $ad ) ? "<img src='http://placehold.it/{$ad}&text={$ad}' />" : "[Section: {$slug}]";

		$post = array(
		  'comment_status' => 'closed', 
		  'ping_status'    => 'closed',
		  'post_content'   => $content,
		  'post_name'      => $slug,
		  'post_status'    => 'publish',
		  'post_title'     => $title,
		  'post_type'      => 'wf_sections'
		);

		if ( wp_insert_post($post) ){
			return WF_Section::get_section($title);
		}
	}

	// Shortcode
}

// new WF_Sections;
?>