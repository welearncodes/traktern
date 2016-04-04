=== Accessible Poetry ===

Contributors: digisphere
Tags: Accessibility
Requires at least: 3.8
Tested up to: 4.4.2
Stable tag: 1.3.4
Version: 1.3.4
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Enriches your WordPress with better accessibility options such as nicely Skiplinks, Font-Sizer, Contrast changer, Custom Toolbar and many other options.

 What's included?
 
 * Accessibility toolbar - provides options to change the contrast, the font-size & add underline to links. comes with the International icon of accessibility & can be moved from left to right.
 * Skiplinks - beautiful Skiplinks that gives your users the ability to skip between the main areas via the keyboard.
 * Font Sizer - provides the ability to change the font size via the Accessibility toolbar.
 * Contrast - Allows your users to change the contrast of colors via the Accessibility toolbar (you can define your own colors via the options panel).
 * Add role=link to all the link tags.
 * Add underline to all links.
 * Add special effect to element in focus mode.
 * Force open links in current tab (remove the "target" attribute from all links).
 * Force ALT attribute to all images.
 * Use attachment title or attachment description as ALT for images without ALT.

== Installation ==

1. Download the link.
2. Upload the zip file via the Plugin upload.
3. Activate the plugin.
4. Go to "Tools > Accessible Poetry" for more details.

== Frequently Asked Questions ==

= Why does the font-size buttons creates a jump higher then what I chose? =

If this is happening it's because the element that is being affected is inside a deep element far from the element that gives him the font-size settting. to fix this simply set this element a font-size via your CSS.

== Changelog ==

= 1.0.1 =
* Adding screenshots
* Fixing jQuery issue with the Font-Sizer script
* Add a cookie so the browser will remember if the user press on one of the Contrast options

= 1.0.2 =
* The Skiplinks moved below the Fixed Toolbar so the user could land first on them
* A new option was added to the Skiplinks that gives the ability to use different links for the Skiplinks on the Home Page.
* Fixing the shortcode so they will be return at the exact place.
* Some CSS Styles was given to the shorted buttons.
* The plugin was translated to Hebrew.

= 1.2.1 =
* remove shortcodes.
* add option to use attachment title in images ALT who don't have an alt.

= 1.2.2 =
* add option to affect the whole site with the contrast modes
* hide the toolbar when user scroll


= 1.2.3 =
* fix the z-index of the toolbar
* fix the text appear below the small icon
* add option to use attachment description in images ALT who don't have an alt
* changing toolbar tabindex when it's close or open
* improving skiplinks script
* improve toolbar as ajax
* improve skiplinks as ajax

= 1.2.4 =
* The design of the toolbar changed
* Added new option to disable toolbar buttons animations
* Readable font button was added to the toolbar
* All toolbar buttons now have icons
* The option to affect everything with the Contrast become default and the button for it removed
* The option to remove Skiplinks buttons underline removed
* The Skiplinks style changed
* fixed issue with keyboard navigation

= 1.2.5 =
* Fix font-size issue
* Added buttons to set the minimum and the maximum for the increment & the decrement font-size buttons

= 1.3.0 =
* minify js
* code improvement
* Included Images missing ALT's platform
* The z-index of the toolbar got higher
* a Conflict with Jetpack fixed
* a Conflict with Contact form 7 fixed
* The readable font option improved
* aria-hidden rules added to the accessibility toolbar
* Make elements linked with the skiplinks focusable

= 1.3.1 =
* Remove the button to affect all elements with the font-size
* add defaults for the font-size buttons
* Improve toolbar styling for LTR users
* Add Feedback button to the toolbar with options to hide it and to change the Text & the URL  address.
* Add Accessibility declaration button to the toolbar with options to hide it and to change the Text & the URL  address.

= 1.3.2 =
Update assets admin name to match Avada theme.

= 1.3.3 =
* Add option to disable the toolbar.
* Add option to hide toolbar on mobile.
* Fix tbindex issue of toolbar inner links.


