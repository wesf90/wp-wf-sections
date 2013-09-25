=== Sections by Wesfed ===

Contributors: therealwesfoster
Tags: adsense, sections, content, text placement, ads, wesfed
Requires at least: 3.0.1
Tested up to: 3.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to create admin-manageable content sections across your site. You simply add the small code (php or shortcode) where you would like the section to appear, then edit it in the admin panel. Extremely easy to use, and allows an unlimited number of sections to be created.

== Description ==

This plugin allows you to create admin-manageable content sections across your site. You simply add the small code (php or shortcode) where you would like the section to appear, then edit it in the admin panel. Extremely easy to use, and allows an unlimited number of sections to be created.

Feel free to help develop this plugin at: https://github.com/wesf90/wp-wf-sections

##How to Use##

You create sections by implementing them into your website. You *can* create them via Admin > Sections > Add New, however that is not the intended use.

To create a section in the content of your site via the admin panel, simply add the following shortcode to your page, post, or widget.

    [wf_section title="My New Section"]

To create a section anywhere in a php file of your website, simply use the following code:

    <?php new WF_Section('My New Section'); ?>

After adding this code, the section will automatically create itself in the admin panel's "Section" area. You can then edit the content from there.

###Section Options###
This plugin offers a number of options which allow for quicker development, and easier implementation, whether you're using the shortcode or the PHP method to implement it.

####PHP####
The defaults for this code are:

    WF_Section($title, $ad=false, $echo=true);

To alter these defaults, simply write the code as:

	new WF_Section('My section');                    // Simple placement with echo
	new WF_Section('My ad', '300x250');              // Created a section with a pre-filled ad image. Great for wireframing!
	new WF_Section('My echo section', false, true);  // Doesn't display as an ad, and returns the content instead of echoing it

To allow even more features, use an array to assign your options (defaults are shown):

    new WF_Section(array(
		'title'      => '',			// The title of the section
		'default'    => '',			// The default content upon creation
		'shortcodes' => true,		// Parse shortcodes inside the content?
		'ad'         => false,	// Is this an ad? If so, place the dimensions such as '300x250'
		'echo'       => true		// Echo or return the content
	));

####Shortcode####
To set your own options when using the shortcode, simply add the option name to the shortcode call. The options and their defaults are the same as listed above for the PHP method:

	[wf_section title="Your Title" default="The default content upon creation" shortcodes=true ad="300x250" echo=true]

####Creating Ad Placements####

This plugin also allows you to quickly create sectional ad placements by setting the size in the shortcode or function call (shown above). A pre-filled stand-in image will be inserted as the content of your section by default. This can always be taken out later and replaced with your actual ad's code. This is a great tool for creating design mockups.


== Installation ==

The easiest way to add this plugin to your site is to go to Admin > Plugins > Add New and search for "WF Sections". However, feel free to install it manually:

1. Upload the `wf-sections` directory to your `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Follow the *How to Use* instructions found in the description of this plugin.

== Frequently Asked Questions ==


== Screenshots ==


== Changelog ==

= 1.0 =
First commit :)


== Upgrade Notice ==

== Arbitrary section ==
