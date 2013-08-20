<?php

class WF_Section {

	// Main function
	// Samples:
	// WF_Section('My section');                    // simple placement with echo
	// WF_Section('My ad', '300x250');              // ad
	// WF_Section('My echo section', false, true);  // no ad, no echo
	public function __construct($config, $ad=false, $echo=true)
	{
		$opts = wp_parse_args($config, array(
			'title' 			=> '',
			'default'			=> '',
			'shortcodes' 	=> true,
			'ad'    			=> false,
			'echo'  			=> true
		));
		extract( $opts );


		if ( !empty($title) ){
			$content = WF_Section::get_section($title);

			if ( empty($content) ){
				// Create post
				$content = WF_Section::create_section($title, $ad, $default);
			}

			// Do shortcode?
			if ( $shortcodes ) $content = do_shortcode($content);

			// Echo or return
			if ( $echo ){
				echo $content;
			}
			else{
				return $content;
			}

		}
	}


	// Does post exist?
	private function get_section($title)
	{
		global $wpdb;
		return reset($wpdb->get_col( "SELECT post_content FROM {$wpdb->prefix}posts WHERE post_type='wf_sections' AND post_title = '{$title}'" ));
	}


	// Create section
	private function create_section($title, $ad, $default)
	{
		$slug = sanitize_title_with_dashes($title);

		// Are we creating an ad section?
		$content = ( $ad ) ? "<img src='http://placehold.it/{$ad}&text={$ad}' />" : "[Section: {$slug}]";

		// Did we have default content that should be in this section instead?
		if ( !empty($default) ) $content = $default;

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