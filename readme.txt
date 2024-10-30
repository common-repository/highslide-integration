=== Highslide Integration ===
Contributors: scrollleiste
Donate link: http://www.scrollleiste.de/online/highslide-integration-in-wordpress
Tags: highslide, integration, images, pictures, js, javascript, enlargement, zoom, player 
Requires at least: 2.5
Tested up to: 3.1.3
Stable tag: trunk

Integrates "Highslide JS" as zero-click-solution.

== Description ==

This Wordpress plugin integrates the open source image and gallery viewer "Hisghslide JS". The
"Highslide JS" framework is written by Torstein Honsi (http://vikjavev.no/highslide/). Just enable the
plugin and all of your linked images in posts will by zoomed by Highslide JS. Playing all images of a
post in a slideshow is also possible.

If you have any suggestion to improve this plugin or if want to translate it to other languages, please
contact me or post a comment on my site.

== Installation ==

1. Upload the full directory to your wordpress plugins folder
2. Activate the plugin
3. Optionally: check the setting to customize the appearance of Highslide JS

== Frequently Asked Questions ==

= How can i update from an old version of this plugin? =

Deactivate your current plugin, delete the plugin-folder, upload the new one and active it.

= I want to update the extension from an older version. What should i pay attention to? =

If you have custom JavaScript settings on the options page or if you have a custom CSS file, make
sure to backup these data somewhere on your computer. You can overwrite or extend the JavaScript
settings or the CSS statements of the new plugin after the update process. 

= The plugin doesn't seem to work on my site. Where is the mistake? =

Highslide is automatically attached to all linked images that point to another images in post.
That means make sure the following things:
1. The thumbnail image has a link to the big version of the image (you can do that in worpress
when you insert in image)
2. If you insert a gallery make sure you link the thumbnails to the images, not to the
attachment site

= The plugin zooms all images on my site. I just want to zoom images in posts. =

Use a CSS-class like ".post" in your template to mark your posts. Then customize the selectors in
file "highslide-injection.js" in line 4. Every selector should be specific to your CSS-class. For
example: ".post a[href$='jpg'] img".

= Can i group images to slidehow groups? =

Yes, remove the comment slashes of the first part in file "highslide-injection.js". Add slashes to
the second part.

= Can i customize the appearance and behaviour of Highslide JS? =

Yes, you can configure Highslide JS via JavaScript as described on the Highslide website
(http://highslide.com/) on the settings page in Wordpress. A lot of settings are predefined. So
customization is easy.

= Where can i change the look of Highslide JS? =

You can change main things on the settings page in wordpress (via JavaScript). You can format
everything via CSS in the file "highslide/highslide.css" in the plugin folder.

= I changed the settings of my installation and it doesn't work anymore. Can i restore the defaults? =

There is a file named "default_settings.bak.js" in the plugin folder. You will find the JavaScript
default settings in it.

= Is it free to use? =

Yes, it's free to use. But notice that Highslide JS is released under Creative Commons
Attribution-NonCommercial 2.5 License and is not free for commercial use! Full text at
http://creativecommons.org/licenses/by-nc/2.5/.

== Screenshots ==

1. Zoom images via Highslide

== Licence ==

It's free to use, but notice that the Highslide JS is released under Creative Commons
Attribution-NonCommercial 2.5 License and is not free for commercial use! Full text at
http://creativecommons.org/licenses/by-nc/2.5/.
You like this plugin? Buy me a beer by [donating](http://www.scrollleiste.de/online/highslide-integration-in-wordpress "Donate with PayPal")
on my website.

== Translations ==

The plugin is multilingual, please refer to the
[WordPress Codex](http://codex.wordpress.org/Installing_WordPress_in_Your_Language "Installing WordPress in Your Language")
for more information about activating the translation. If you want to help to translate the plugin to your language,
please have a look at the highslide-integration.pot file which contains all defintions and may be used with a
[gettext](http://www.gnu.org/software/gettext/) editor like [Poedit](http://www.poedit.net/). Contact me if you
have translated the plugin.
Currently available lanuages: English (Christoph Dietrich), German (Christoph Dietrich)

== Changelog ==

= 2.2 =
* Changed autoinjection functionality (should work for more people out of the box now)

= 2.1 =
* Fixed JavaScript-Bug (removed not needed comma)
* Upgraded highslide library to newest version (4.1.12)

= 2.0 =
* Completely new developed
* All known bugs fixed
* Supports now image galleries
* No more code saved in the databse. All highslide activities work on the fly in the frontend
* More predefined settings
* Easier handling
* Added new italian translation by Gianni Diurno

= 1.4 =
* Added italian translation by Gianni Diurno

= 1.3 =
* Fixed a bug within loading jQuery
 
= 1.2 =
* Improved english translation
* Added support for scaling of too big images
 
= 1.1 =
* Fixed some bugs within saving the settings
* Fixed some path bugs
* Improvement, size-decrease and annotation of the CSS-file
* Added support for displaying image titles
* Changed the highslide injection to jQuery

= 1.0 =
* [First Release]