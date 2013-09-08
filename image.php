<?php
/*
	Dynamic Image Creation for WF-Sections
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

// Ensure valid input
if( !preg_match('/^[\d]+x[\d]+$/i', $_GET['s']) )    fatal_error('Error: No size specified');

// Check for GD support
if(!function_exists('ImageCreate'))
		fatal_error('Error: Server does not support PHP image generation');

// Image information
$text = strtolower($_GET['s']);
list($width,$height) = explode('x', $text);

// Create text vars
$color_text       = hex_to_rgb('aaa');
$color_background = hex_to_rgb('eee');

// Create the background
$image = imagecreatetruecolor($width, $height);

// Create BG and border
imagefilledrectangle($image, 0, 0, $width, $height, imagecolorallocate($image, $color_text['red'], $color_text['green'], $color_text['blue']) );
imagefilledrectangle($image, 3, 3, $width-4, $height-4, imagecolorallocate($image, $color_background['red'], $color_background['green'], $color_background['blue']) );

// Write the text
$text_x = ( $width / 2 ) - ( ( imagefontwidth(5) * strlen($text) ) / 2 );
$text_y = ( $height / 2 ) - ( imagefontheight(5) / 2 );
imagestring($image, 5, $text_x, $text_y, $text, imagecolorallocate($image, $color_text['red'], $color_text['green'], $color_text['blue']) );

// Display image
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);


//==== FUNCTIONALITY
// Easily show errors
function fatal_error($message)
{
	header("HTTP/1.0 500 Internal Server Error");
	print($message);
	exit;
}


// Convert hex to RGB values
function hex_to_rgb($hex) {
	// Ecpand short form #fff color to long form #ffffff
	if(strlen($hex) == 3) {
		$hex = substr($hex,0,1) . substr($hex,0,1) .
					 substr($hex,1,1) . substr($hex,1,1) .
					 substr($hex,2,1) . substr($hex,2,1);
	}

	if(strlen($hex) != 6)
		fatal_error('Error: Invalid color "'.$hex.'"');

	// Convert from hexidecimal number systems
	$rgb['red']   = hexdec(substr($hex,0,2));
	$rgb['green'] = hexdec(substr($hex,2,2));
	$rgb['blue']  = hexdec(substr($hex,4,2));

	return $rgb;
}

?>