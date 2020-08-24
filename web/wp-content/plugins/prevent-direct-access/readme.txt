=== Prevent Direct Access - Protect WordPress Files ===
Contributors: gaupoit, rexhoang, wpdafiles, buildwps
Donate link: https://preventdirectaccess.com/pricing/?utm_source=wordpress&utm_medium=plugin&utm_campaign=donation
Tags: protect uploads, file protection, media files, downloads, secure downloads
Requires at least: 4.7
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tested up to: 5.5
Stable tag: 5.4

A simple way to prevent search engines and the public from indexing and accessing your files without complex user authentication.

== Description ==

Prevent Direct Access (PDA) provides a simple solution to protect your WordPress files as well as prevent Google, other search engines and unwanted users from indexing and stealing your hard-to-produce ebooks, documents, and videos.

We've created an intuitive user interface under Media Library list view. It's simple and easy to use. You'll be able to protect your private files in no time.

= An Inside Look at Prevent Direct Access (PDA) Gold =
https://www.youtube.com/watch?v=37wP7TTcW4Q

Our PDA Lite version offers the following features:

== Protect WordPress Media Library File Uploads ==
Prevent Direct Access is designed to protect all your WordPress media files such as images (PNG, JPEG), documents (PDF, DOCX, PPTX), audios, and videos (MP4, MP3) that you upload to your website under Media Library or via Media, Pages or Posts.

Once protected, only the file's author can access them directly. Unwanted users will be redirected to your 404 not found page when attempting to read and download these file URLs.

== Customize "No Access" Page ==
Instead of redirecting unauthorized users to the 404 page, you can show them a custom page, e.g registration or login page. Users will have to log into your site in order to access these protected files.

== Auto-generate Private URLs ==
Once a WordPress file is protected, Prevent Direct Access will automatically generate a private download link containing a random string for you to access or share this private file with others.

You can then copy that private download link to clipboard and subsequently paste it on your browsers and/or email by clicking on the Copy URL button.

== Restrict Access based on IP Addresses ==
Private Download Links can be accessed by anyone who knows the exact URL. You have an option to block unwanted IP addresses from accessing your private links. You can also expire them automatically by clicks or time with our PDA Gold version.

== Block Google from Indexing your Files ==
Prevent Direct Access (PDA) explicitly tells Google and other search engines not to index any of your protected files so that their content and original URLs will never appear on the search results.

== Prevent Image Hotlinking ==
Our plugin also stops others from stealing and using your images on their website by linking them directly from your website, which could slow down your website significantly.

== Protect WordPress Uploads Directory ==
The `wp-content/uploads` folder where all your uploaded images and files are stored will also be protected. No one will be able to see and browse the content on that folder anymore.

> #### Prevent Direct Access Gold Version
> Our [PDA Gold](https://preventdirectaccess.com/features/?utm_source=wp.org&utm_medium=plugin_desc_link&utm_campaign=pda_lite&utm_content=premium-after-gold-heading) offers more advanced features:
>
>* Protect unlimited files and all file types
>* Protect new file uploads automatically or on the fly
>* Restrict protected file access to logged-in users or custom user roles
>* Search and replace unprotected URLs in content
>* Create & customize unlimited Private Download Links
>* Expire Private Download Links by days and clicks
>* Protect all files under specific folders on WordPress root and uploads directory using [Folder Access Restriction](https://preventdirectaccess.com/extensions/wordpress-restrict-page-file-access/?utm_source=wp.org&utm_medium=plugin-desc&utm_campaign=pda_lite&utm_content=premium-after-gold-features)
>* Restrict access to WooCommerce order page by IP addresses using [WooCommerce Integration](https://preventdirectaccess.com/extensions/woocommerce-integration/?utm_source=wp.org&utm_medium=plugin-desc&utm_campaign=pda_lite&utm_content=premium-after-gold-features) extension
>* Integrate with Multisite, Amazon S3, and top membership plugins
>* [Integrate with LearnDash plugin](https://preventdirectaccess.com/docs/grant-learndash-courses-access-enrolled-students/?utm_source=wp.org&utm_medium=plugin-desc&utm_campaign=pda_lite&utm_content=premium-after-gold-features) to grant course materials access to enrolled students only
>* Protect multiple files at once and many other premium features
>
> Check out our [Prevent Direct Access (PDA) Gold](https://preventdirectaccess.com/features/?utm_source=wp.org&utm_medium=plugin-desc&utm_campaign=pda_lite&utm_content=premium-after-gold-features) now.

= Documentation and support =

* For documentation and tutorials go to our [Documentation](https://preventdirectaccess.com/docs/?utm_source=wp.org&utm_medium=guide-link&utm_campaign=prevent-direct-access-lite)
* Check out [compatible hosting, themes, and plugins](https://preventdirectaccess.com/docs/compatible-wordpress-plugins/?utm_source=wp.org&utm_medium=guide-link&utm_campaign=prevent-direct-access-lite) with PPWP
* If you have any more questions or want to request new features, contact us through [this form](https://preventdirectaccess.com/contact/?utm_source=wp.org&utm_medium=plugin_desc_link&utm_campaign=pda_lite&utm_content=contact-after-gold-features) or drop us an email at [hello@preventdirectaccess.com](mailto:hello@preventdirectaccess.com)


== Installation ==

There are 2 easy ways to install our plugin:

1.The standard way

- In your Admin, go to menu Plugins > Add

- Search for "Prevent Direct Access"

- Click to install

- Activate the plugin

- Protect your files under `Media` list view

2.The nerdy way

- Download the plugin (.zip file) on the right column of this page

- In your Admin, go to menu Plugins > Add

- Select the tab "Upload"

- Upload the .zip file you just downloaded

- Activate the plugin

- Protect your files under `Media` list view

== Frequently Asked Questions ==

= Why do I get this "Plugin could not be activated because it triggered a fatal error"? =
It's likely that you're using an outdated version of PHP. Please check and upgrade the PHP version on your server to 5.6 or greater.

In fact, WordPress itself even recommends your host supports PHP version 7.2 or greater for security purposes.

= Why nothing happens after I activate the plugin? =
Prevent Direct Access supports websites hosted on Apache servers out of the box.

In case you're using WP Engine or other NGINX servers, please [check out this instruction](https://preventdirectaccess.com/docs/nginx-support/?utm_source=wp.org&utm_medium=plugin_desc_link&utm_campaign=pda_lite&utm_content=wpengine-on-faq) on how to update the server configuration so that our plugin (both Free & Gold version) will work correctly as expected.

= Why do I see a warning message on top after activating the plugin? =
The plugin needs to add some mod_rewrite rules to your website .htaccess file (located on your website root folder) to prevent direct access to your files on the server.

So it's likely that your .htaccess is not writable (with at least 644 permission; whose owner must be also accessible by your apache server such as `www-data`). If that's the case, you must either make it writable or manually update your .htaccess with the mod_rewrite rules found under Settings > Permalinks.

= Why do I see the popup box that says I can protect only 9 files? =
= Why can’t I protect more files? =
The Lite version of this plugin offers protection up to 9 files only. Please [check out PDA Gold](https://preventdirectaccess.com/features/?utm_source=wp-plugin-repo&utm_medium=plugin-desc&utm_campaign=premium-on-faq) which offers unlimited protected files and many more premium features.



== Screenshots ==
1. Once you have installed the plugin, click Activate
2. Go to Media to protect your files. Prevent Direct Access works best on List View.
3. You will notice there an extra column called "Prevent Direct Access" auto-generated by our plugin. Click on "Configure file protection" and start protecting your private file.
4. Click on "Protect this file" button to make the file private .
5. The file is now "protected". Its File Access Permission is set to "The file's author", which means it's accessible to the file's author only. Other users are able to access your protected file using a private download link.
6. The free version of Prevent Direct Access allows you to protect up to 9 files. A notification will show up when the number of protected files reaches the limit. Check out our PDA Gold version which offers unlimited file protection, custom file access permission and many other premium features.

== Changelog ==

= 2.7.1 August 24, 2020 =
* Fix PHP notices with WP 5.5

= 2.7.0 June 16, 2020 =
* PDA Gold requires PDA Lite
* Un-protecting files don't update _pda_protection value
* Remove unused files & folders
* Hide "upgrade to PDA Gold" notice if PDA Gold is active
* Change the domain of translation
* Do not support in multisite mode

= 2.6.0 April 3, 2020 =
* Improve UI: compatible with WordPress 5.3
* Allow the file's author to access protected file by default
* Allow to protect up to 9 files

= 2.5.1.2 February 5, 2020 =
* Improve UI: hide Like Plugin column in the settings page

= 2.5.1.1 November 16, 2019 =
* Fix add_submenu_page PHP notice issue

= 2.5.1 November 7, 2019 =
* Add feature "Prevent Image Hotlinking"
* Prevent Google Indexing for private links
* Fix file access permission when filename contains size

= 2.5.0.4 October 4, 2019 =
* Improve UI under settings page

= 2.5.0.3 August 9, 2019 =
* Update switch button under settings page
* Show notification when saving settings successfully

= 2.5.0.2 May 16, 2019 =
* Fix get lucky button

= 2.5.0.1 December 04, 2018 =
* Fix typo

= 2.5.0 November 18, 2018 =
* Revamp UI

= 2.4.0.1 August 10, 2018 =
* Hot fix [] array declaration cannot work under PHP version < 5.4

= 2.4.0 June 14, 2018 =
* Fix cannot remove rewrite rules when deactivate plugin

= 2.3.9 Tue, April 17, 2018 =
* Fix "This plugin is not properly prepared for localization"

= 2.3.8 Thu, April 12, 2018 =
* Apply localisation

= 2.3.7 Wed, February 28, 2018 =
* Test Wordpress 4.9.4

= 2.3.6 Wed, January 31, 2018 =
* Fix undefined index when get option FREE_PDA_SETTINGS

= 2.3.5 Fri, January 26, 2018 =
* Improve UI for settings page

= 2.3.4 Tue, January 23, 2018 =
* Improve UI on settings page by revamping checkbox option
* Integrate stop image hotlinking feature
* Show information in order to know whether the file is protected

= 2.3.3 Mon, January 8, 2018 =
* Revamp settings page

= 2.3.2 Wed, November 15, 2017 =
* Fix wp::prepare warning messages when using in WordPress version 4.8.3.

= 2.3.1: Sat, November 4, 2017 =
* Add warning messages when users are using deprecated wp api plugin.

= 2.3: Thu, August 17, 2017 =
* Protect files from search engine's index

= 2.2: Wed, June 14, 2017 =
* Add settings page

= 2.1.5: Thu, June 1, 2017 =
* Notify users to upgrade to Gold version
* Update plugin's data after users remove media files

= 2.1.4: Mon, May 22, 2017 =
* Change the way to get non-protected URL
* Redirect to default 404 page if the file is protected
* Support websites hosted on WP Engine

= 2.1.3: February 25, 2017 =
* Tweak: Change the plugin's logic to cater for those files that couldn't be found in the _postmeta table

= 2.1.2 =
* Fix Twitter, Google Plus and Facebook open graph issue

= 2.1.1 =
* Fix .htaccess rules to recognize the special characters
* Find in _postmeta table in case of cropped images via wordpress

== Upgrade Notice ==
N/A
