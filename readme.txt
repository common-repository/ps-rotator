=== PS Rotator ===
Contributors: th3mon
Homepage: http://przemyslaw.szelenberger.pl/wtyczki/ps-rotator/
Donate link: http://przemyslaw.szelenberger.pl/wtyczki/ps-rotator/wspomoz-projekt-ps-rotator/
Tags: slider, slides, plugin, jquery, content, featured, images, wordpress, image, picture, photo, gallery, nextgen-gallery, slideshow, javascript
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 0.5

Allows you to pick a gallery named as 'rotator' from the 'NextGen Gallery' plugin to use it as images rotator on your site.

== Description ==

This plugin allows you to add pictures with rotator shortcode or directly in the source theme. Due to implementation
of plug-ins for jQuery jcycle, you can set the transition effect to the next slide.
You can also decide whether the plug is to load pictures randomly or not. For now, plug-in supports up to 10 photos.
IF YOU LOAD MORE THAN THIS NUMBER WILL BE SKIPPED ALL THE PICTURES!

Requirements:

- NextGen Gallery Plugin (http://wordpress.org/extend/plugins/nextgen-gallery/)

== Installation ==

FTP:
1. Download the plugin.
2. Extract the folder from the file.
3. Upload files in the /wp-content/plugins directory with all other plugins.

Usage:
1. You create a gallery at NextGEN Gallery called "rotator".
2. Add photos to created gallery.
3. Then you can use PS Rotator following methods:
3. 1. Shortcode in posts:
`[ps-rotator]`
3. 2.Function in template files:
`<?php do_action( 'ps_rotator', ''); ?>`

== Changelog ==

= 0.1.5 =
* PHP feature: __autoload() changed to spl_autoload_register().

= 0.1.4 =
* PHP feature: __autoload();

= 0.1.3 =
* Select an effect for transitions between slides.
* Added: Random display of slides.

= 0.1.2 =
* Added: Admin Pages: Settings and Help.

= 0.1.1 =
* Added: shortcode: `[ps-rotator]`.

= 0.1 =
* Created plugin for pictures rotation. Only PHP code for add it to post or page.