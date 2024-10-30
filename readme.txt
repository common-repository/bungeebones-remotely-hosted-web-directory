=== BungeeBones Remotely Hosted-Web Directory ===
Author: Robert Lefebure
Support link: http://bungeebones.com/feedback.php

Tags: remote hosted web directory, web directory, adsense alternative, link exchange, web ring, listings, 
free links, web promotion, SEO, donate web traffic to charity
Tested up to: 3.21
 Contributors: Robert Lefebure
Donate link: n/a
Stable tag:  stable 2.1


==Changelog == 

= Version: 2.1 = Minor change to fix "header" error message during activation.
= Version: 2.0 = Major revision of install process AND registratopn policy. Installation no longer requires any user inputs and is practically automatic. On the former policy requiring users to register they no longer need to (but they forfeit income earning potential by not registering).
= Version: 1.3 = Updated install instructions
= Version: 1.2 = Changed default of debugging to off - now needs to be turned on manually
= Version: 1.1 = Enabled use of permalinks. Inserted debugging that is active at install and aides BungeeBones support to troubleshoot user's settings and configurations during installation.
= Version: 1 = Complete update of configuration procedure allowing easier installation and editing. Updated the online instructions with clearer, more precise instructions and some graphics and debugged the dynamic header functionality.
= Version: 0.1 = Change version numbering, changes in readme
= Version: 0.0.3 =
*renamed "config.php" file to "bunbones_config.php" to avoid potential conflicts
*Added an optional dynamic header feature that adds unique title, description, and keyword meta tags to the head of every category and link page (over 1600) Not only is each of the 1600 pages unique, they are also unique to the installed website also and use user supplied configurations to make them unique to the website. The feature is optional and it does reuire some coding in the themes header.php page. Installation involves copying and pasting a few lines into the file and removal of four or five lines. The procedure is documented in the bunbones_config.php file.
*Added id tags to some images for better customisation and branding to installers website design
* changed rating star images to transparent 

= Version: 0.0.2 =
*Fixes Permalink Problem and now BungeeBones Distributed web Directory is functional with all the permalink options. It has not been tested with custom permalinks but should work fine with them also
*Moved the location of the two, small configuration settings at install to their own separate config.php file to make them easier to locate
*Made some minor code adjustments and got pluggin to pass W3C Validator (Note it validates at the top level but some submitted links text causes problems with validator)

= Version: 0.0.1.1 Beta=
* Users need to be aware that this plugin only works under the default permalink setting. A fix is being developed that will hopefully make it available to the rest of the permalink types
* This script may not work on MicroSoft servers without serious coding. 

Upgrade Notice == 2.0 Now installation is practically automatic and no longer requires registration at BungeeBones

Upgrade Notice == 0.0.2  Fixed Permalink issue so that it now works regardless what permalink your site runs. Also added a "config" file so that the configuations at install are in their own file

Upgrade Notice == 0.0.1.1 Added small amount of code to enable use of plugin in WPs installed in root directory (formerly required it be in a sub_folder to root)

A web directory on steroids

== Description ==

The BungeeBones Remotely Hosted Web Directory plugin for Wordpress provides a "Collaborative" web directory for your Wordpress site. It comes complete with links and categories. It is designed to share the links submitted at every installation so the number of links in it becomes larger and more comprehensive to the end user. Collaborating is an easy way to operate and maintain a directory page for your users because all the category and link maintenance is provided by BungeeBones (free). Your "webmaster" users still get to submit a listing through your web directory but because of the collaboration their link shows up on your blog and also on all the other blogs and websites (BungeeBones is available for multiple platforms besides WordPress) that have installed the directory too. The amount of web traffic viewing the links is, as a result, increased with each new install and that is a great advantage to the lister. In addition, their link will continue to be added to all newly installed directories as they join so the amount of advertising it receives keeps growing. 

Pagination of links is automatic, displaying 20 links per page.
category display is paginated also, showing 30 categories per page.
Category pagination also has "alphabetcial" pagination so you know what category names are under each 30 item page.

This is a program that DOES NOT require you to register at BungeeBone.com UNLESS you wish to participate in BungeeBones' commission program.

Link listings include Website Title, a short description, link, address (where applicable), and AJAX quick nav feature for both categories and regional location. 

When your site visitors submit a link to the directory
it is also placed on every other installed remote directory as well (once it is reviewed and approved - No links go "live" without review). 
With one submission they get to advertise on many sites.  


Premium listing opportunities are available.  A listing upgrade to a paid higher page position by one of your free link customers earns you commissions for the entire time they are a paying advertiser. If any of your signups add a directory and make sales themselves you also earn 
override commissions on their sales as well (if you are registered). It is a new great way for a blogger to monetize their writing! 

BungeeBones is also available for Joomla and for custom php sites.  

BungeeBones has a cross-platform mobile version.

== Frequently Asked Questions ==

= Where can I find out more? =

<a href="http://BungeeBones.com">At the BungeeBones.Com website</a>

= Is there documentation? =

A complete series including a number of screenshots is available from your BungeeBones.com User Control Panel after you registered and added your link (click the "Add A Widget" button in right column to get started).

= Where can I see it? =

A WordPress Plugin Demo is installed <a href="http://bungeebones.com/blog/?page_id=276">HERE</a>

== Screenshots ==
Remotely_hosted_web_directory.png


== Known Issues ==
Regional filters (which limits query results to specific area selected from dropdown) is buggy. Regional filters are non-critical. Fixes are in development.

== Installation ==
<h3>Please read all directions prior to use!</h3>
<strong>1.</strong> Create a page in your blog that will display the web directory. To do that use the "Pages" feature of your WordPress Dashboard. Click "Add New" to begin to create the page. Type the short tag "<font color="red">[bungeebones_directory]"</font> (without the quotes) somewhere on the page. <br /><br />
<strong>2.</strong> Decide whether you wish to participate in the income earning aspects of BungeeBones as an registered affiliate. It is recommended (but not required) by BungeeBones that you do. All that you need to do to make your installation eligible to earn income is to register and add the site information at BungeeBones.com. Visit <a target="_blank" href="http://www.BungeeBones.com/articles/add_a_link.php">www.BungeeBones.com</a> to register as a user and add your link to the web directory. As you register, BungeeBones will report your Link ID/Affiliate Number. Please write that number down for future reference. The BungeeBones system offers free or paid positions that advertise a website on all the other installations and make it eligible to receive their own directory and commissions on sales a site makes.<br /><br />
		<strong>3.</strong> If you decided to register and have, indeed, registered then click the "Registered" link (in the left menu) and submit the form by clicking the button at the bottom of that page. The plugin should find your site's registration in the BungeeBones database and get your installation connected to the BungeeBones server<br /><br />
		<strong>4.</strong> If you have <b>NOT</b> registered then click the "Non_Registered" link (in the left menu) and submit the form by clicking the button at the bottom of that page. The plugin will add your site's registration itself (automatically) into the BungeeBones database as a non-affiliated and unadvertised  website. It, too, will get your installation connected to the BungeeBones server<br /><br />
	<strong>5.</strong> Go to your blog page with your web browser. You should now have a link in your nav bar to the directory page. Click that and inspect the install. It should have all the categories and links. Click a category and make sure the links are loading properly. Links to advertising websites should be displayed and there should be an "Add A Link" button at the bottom of it. Clicking that will open a popup that forewarns users that they will be leaving your site but if you are registered then the number in the page's URL should match the number you got in step 2 above. If not, BungeeBones requests that you please contact their tech support.  <br /><br />
<strong>6.</strong> Go to the Styles page and set the directory's CSS style information.<br /><br />
		
Note: If you change your permalink settings you may need to re-configure the plugin (i.e. run step 3 or 4 again).
