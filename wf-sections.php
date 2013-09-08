<?php
/*
Plugin Name: Sections by Wesfed
Version: 1
Plugin URI: 
Description: Easily insert editable content sections into your site via shortcode or php
Author: Wes Foster
Author URI: http://twitter.com/therealwesf
License: GPL v3

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

define( 'WF_SECTIONS_PATH', plugin_dir_path( __FILE__ ) );

require( WF_SECTIONS_PATH . '/inc/backend.php' );
require( WF_SECTIONS_PATH . '/inc/frontend.php' );

?>