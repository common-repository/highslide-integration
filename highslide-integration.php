<?php
/*

*******************************************************************************************

Plugin Name: Highslide Integration
Plugin URI: http://www.scrollleiste.de/online/highslide-integration-in-wordpress
Description: Integrates "Highslide JS" as zero-click-solution.
Version: 2.3
Author: Christoph Dietrich
Author URI: http://www.scrollleiste.de/

*******************************************************************************************

Copyright 2010 Christoph Dietrich

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

http://www.gnu.org/licenses/gpl.txt

*******************************************************************************************

This plugin requires:
	- Highslide JS 4.1.8 or higher from Torstein Honsi (http://vikjavev.no/highslide/)
	  Please note that this player is released under Creative Commons
     Attribution-NonCommercial 2.5 License and is not free for commercial use!
	  Full text at: http://creativecommons.org/licenses/by-nc/2.5/
	  Other Version may work, but haven't been tested.

Installation:	  
   - Upload to your Wordpress plugin folder
   - Activate in Wordpress
   - Optionally: check the settings to customize the appearance of Highslide JS
   
If you like the plugin, please donate at http://highslideintegration.scrollleiste.de/
to support the the further development of it.
Many Thanks!
   
This Wordpress plugin has been tested with Wordpress 2.9.2 and Highslide 4.1.18

This Wordpress plugin is released "as it is". Without any warranty. The author cannot
be held responsible for any damage that this script might cause.

*******************************************************************************************

*/
   
   
// constants
define ('HI_TEXTDOMAIN', 'highslide-integration');
define ('HI_FOLDER', WP_PLUGIN_URL . '/highslide-integration');

// load translation
$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain(HI_TEXTDOMAIN, 'wp-content/plugins/' . $plugin_dir, $plugin_dir );



// load javascript libraries
function highslide_integration_load_libraries() {
   wp_enqueue_script('jquery');
}
add_action('wp_print_scripts', 'highslide_integration_load_libraries');


// add highslide library to wp-head
function highslide_integration_head_add_js() {
    echo '<!-- plugin:highslide-integration v2.0 -->' . "\n";
    echo '<link rel="stylesheet" href="' . HI_FOLDER . '/highslide/highslide.css" type="text/css" media="screen" />' . "\n";
	echo '<!--[if IE 6]>' . "\n";
    echo '<link rel="stylesheet" href="' . HI_FOLDER . '/highslide/highslide-ie6.css" type="text/css" media="screen" />' . "\n";
	echo '<![endif]-->' . "\n";
    echo '<script type="text/javascript" src="' . HI_FOLDER . '/highslide/highslide.js"></script>' . "\n";
    echo '<script type="text/javascript">' . "\n";
    echo 'hs.graphicsDir = "' . HI_FOLDER . '/highslide/graphics/";' . "\n\n";
	echo get_option('hi_jsSettings') . "\n\n";
	echo "
		hs.lang = {
			cssDirection: '" . __('ltr', HI_TEXTDOMAIN) ."',
			loadingText: '" . __('loading...', HI_TEXTDOMAIN) ."',
			loadingTitle: '" . __('click to cancel', HI_TEXTDOMAIN) ."',
			focusTitle: '" . __('click to bring to front', HI_TEXTDOMAIN) ."',
			fullExpandTitle: '" . __('expand to original size', HI_TEXTDOMAIN) ."',
			creditsText: '" . __('powered by Highslide JS', HI_TEXTDOMAIN) ."',
			creditsTitle: '" . __('visit Highslide JS website', HI_TEXTDOMAIN) ."',
			previousText: '" . __('previous', HI_TEXTDOMAIN) ."',
			nextText: '" . __('next', HI_TEXTDOMAIN) ."',
			moveText: '" . __('move', HI_TEXTDOMAIN) ."',
			closeText: '" . __('close', HI_TEXTDOMAIN) ."',
			closeTitle: '" . __('close (ESC)', HI_TEXTDOMAIN) ."',
			resizeTitle: '" . __('resize', HI_TEXTDOMAIN) ."',
			playText: '" . __('play', HI_TEXTDOMAIN) ."',
			playTitle: '" . __('play slideshow (SPACEBAR)', HI_TEXTDOMAIN) ."',
			pauseText: '" . __('pause', HI_TEXTDOMAIN) ."',
			pauseTitle: '" . __('pause slideshow (SPACEBAR)', HI_TEXTDOMAIN) ."',
			previousTitle: '" . __('previous (ARROW LEFT)', HI_TEXTDOMAIN) ."',
			nextTitle: '" . __('next (ARROW RIGHT)', HI_TEXTDOMAIN) ."',
			moveTitle: '" . __('move', HI_TEXTDOMAIN) ."',
			fullExpandText: '" . __('fullscreen', HI_TEXTDOMAIN) ."',
			number: '" . __('picture %1 of %2', HI_TEXTDOMAIN) ."',
			restoreTitle: '" . __('Click to close image, click und drag to move. Use ARROW keys for previous and next.', HI_TEXTDOMAIN) ."'
		};
	";
	echo '</script>' . "\n";
    echo '<script type="text/javascript" src="' . HI_FOLDER . '/highslide-injection.js"></script>' . "\n";
}
add_action('wp_head', 'highslide_integration_head_add_js');


// activating the plugin
function highslide_integration_activate() {
	// updating clean ups
	$hi_version = get_option('hi_version');
	switch($hi_version) {
	case "2.3":
		break;
	case "2.2":
		break;
	case "2.1":
		break;
	case "2.0":
		break;
    case "1.4":
   		delete_option('hi_library');
   		delete_option('hi_jsSettings');
		delete_option('hi_enabledForDefault');
        break;
    case "1.3":
   		delete_option('hi_library');
   		delete_option('hi_jsSettings');
		delete_option('hi_enabledForDefault');        
        break;
    case "1.2":
      	delete_option('hi_library');
      	delete_option('hi_jsSettings');
		delete_option('hi_enabledForDefault');
        break;
    default:
        delete_option('hi_library');
        delete_option('hi_jsSettings');
		delete_option('hi_enabledForDefault');
   }
   update_option('hi_version', '2.3');

   // save plugin settings to database
   add_option('hi_jsSettings', '// HIDE CREDITS
hs.showCredits = false;

// SHOW IMAGE TITLES AS CAPTIONS
// hs.captionEval = \'this.thumb.title\'; 
// hs.captionOverlay.position = \'below\';

// DROP SHADOW
hs.outlineType = \'drop-shadow\';

// USE GRAPHICAL EFFECTS
hs.transitions = [\'expand\', \'crossfade\'];
hs.fadeInOut = true;
hs.expandDuration = 150;
hs.restoreDuration = 150;

// SHOW SLIDESHOW CONTROLBAR
hs.addSlideshow({
   interval: 5000,
   repeat: false,
   useControls: true,
   fixedControls: \'fit\',
   overlayOptions: {
      className: \'large-dark\',
      opacity: \'0.75\',
      position: \'bottom center\',
      offsetX: \'0\',
      offsetY: \'-25\',
      hideOnMouseOut: true
   }
});

// DIMM WEBSITE WHEN IMAGE IS OPEN
// hs.dimmingOpacity = 0.75;

// SHOW CLOSE-BUTTON
// hs.registerOverlay({
//    html: \'<div class="closebutton" onclick="return hs.close(this)"></div>\',
//    position: \'top right\',
//    fade: 2
// });');
}
register_activation_hook( __FILE__, 'highslide_integration_activate' );


// backend option page
function highslide_integration_options_page() {
?>
   <div class="wrap">
   	<h2>Highslide Integration</h2>

  	<table class="form-table">
     	<tr valign="top">
     		<th scope="row"><?php _e('Show me your love', HI_TEXTDOMAIN); ?></th>
     		<td>
				<p>
					<?php _e('You like this plugin? By me a beer by clicking on the donate button.', HI_TEXTDOMAIN); ?><br />
					<?php echo str_replace('%s', 'http://www.scrollleiste.de/web/highslide-integration-in-wordpress', __('You can also go to my <a href="%s">website</a> and click on one of the banners in the article.', HI_TEXTDOMAIN)); ?>
				</p>
				<div>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="B8QGVWFA333K4"><input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal."><img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1"></form>
				</div>
     		</td>
     	</tr>
	</table>
   
   	<form method="post" action="options.php">
   
         <?php wp_nonce_field('update-options') ?>
   
      	<table class="form-table">

         	<tr valign="top">
         		<th scope="row"><?php _e('Highslide JS settings', HI_TEXTDOMAIN); ?></th>
         		<td>
         			<p>
         			   <?php
                        echo str_replace('%s', 'http://vikjavev.no/highslide/doc.php', __('Customize the appearance of Highslide JS. Use JavaScript. Visit <a href="%s">%s</a> to read more.', HI_TEXTDOMAIN));
                     ?>
                  </p>
                  <textarea name="hi_jsSettings" cols="60" rows="20" id="hi_jsSettings" style="width: 98%; font-size: 12px;" class="code"><?php echo get_option('hi_jsSettings'); ?></textarea>
         		</td>
         	</tr>
      	</table>
   
      	<p class="submit">
      		<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save settings', HI_TEXTDOMAIN); ?>" />
      		<input type="hidden" name="action" value="update" />
      		<input type="hidden" name="page_options" value="hi_enabledForDefault,hi_library,hi_jsSettings" />
      	</p>
   
   	</form>
   </div>
   
<?php
}



// add option page to backend
function highslide_integration_admin_menu() {
   add_options_page('Highslide Integration', 'Highslide Integration', 'manage_options', basename(__FILE__), 'highslide_integration_options_page');
}
add_action('admin_menu', 'highslide_integration_admin_menu');

?>
