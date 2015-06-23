=== Multisite User Sync ===
Contributors: shamim51
Tags: multisite,multisite user sync,user sync
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=4HKBQ3QFSCPHJ&lc=US&item_name=Front%20End%20PM&item_number=Front%20End%20PM&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 2.8
Tested up to: 4.2.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Multisite User Sync will automatically synchronize users to all sites in multisite. Roles of users will be same on everysite.

== Description ==

Multisite User Sync will automatically synchronize users to all sites in multisite. Roles of users will be same on every site. If Role change in one site it will also synchronize to all site. If new user/site created it will also add to all site/users.

In one of my website it was needed to sepatae them fully for every product. So i use multisite. But it also needed to use same users (including role) for everysite. So i write one plugin. I have searched for this type of plugins and i found none. So i upload it to wordpress plugin directory if somebody need it. This plugin works out of the box, No settings required.


== Installation ==
1. Upload "front-end-pm" to the "/wp-content/plugins/" directory.
1. Activate the plugin through the "Plugins" menu in WordPress.
1. **Network Activate** this plugin if you want to sync all users in all sites.
1. Activate in Individual sites if you want to sync only users created/Change in those sites.


== Frequently Asked Questions ==
= How This Plugin Works? =
Whene a new site is created it loop through all sites and add all users to new sites in same role. When a new user is created it loop through all sites and add this new user to all sites in same role. When a role is changed in one site it loop through all sites and chnage this role to all sites.

= Can i sync users created/chnaged in perticular site(s)? =
Yes. In that case do not activate this in Network Activate. Just activate this plugin for that perticular site(s).

== Screenshots ==

1. Activate

== Changelog ==

= 1.1 =

* Initial release.

== Upgrade Notice ==

= 1.1 =

* Initial release.