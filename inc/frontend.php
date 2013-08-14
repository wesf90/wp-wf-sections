<?php

class WF_Section {

	// Main function
	public function __construct($title, $echo=true)
	{
		$content = WF_Section::get_section($title);

		if ( empty($content) ){
			// Create post
			$content = WF_Section::create_section($title);
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
	private function create_section($title)
	{
		$slug = sanitize_title_with_dashes($title);

		$post = array(
		  'comment_status' => 'closed', 
		  'ping_status'    => 'closed',
		  'post_content'   => '',
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