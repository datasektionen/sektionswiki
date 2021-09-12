<?php
# This file was automatically generated by the MediaWiki 1.30.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Konglig Datasektionen";
$wgMetaNamespace = "Konglig_Datasektionen";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wiki.datasektionen.se";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/skold_svart_thumb.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "info@d.kth.se";
$wgPasswordSender = "no-reply@datasektionen.se";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
preg_match("/postgres:\/\/(.*):(.*)@(.*):([0-9]+)\/(.*)/", getenv('DATABASE_URL'), $output_array);
$wgDBtype = "postgres";
$wgDBserver = $output_array[3];
$wgDBname = $output_array[5];
$wgDBuser = $output_array[1];
$wgDBpassword = $output_array[2];

# Postgres specific settings
$wgDBport = "5432";
$wgDBmwschema = "mediawiki";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = false;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "sv";

$wgSecretKey = getenv('SECRET_KEY');;

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = false;

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );


# End of automatically generated settings.
# Add more configuration options below.

require_once "$IP/extensions/ConfirmAccount/ConfirmAccount.php";

$wgMakeUserPageFromBio = false;
$wgAutoWelcomeNewUsers = false;
$wgConfirmAccountRequestFormItems = array(
	'UserName'        => array( 'enabled' => true ),
	'RealName'        => array( 'enabled' => true ),
	'Biography'       => array( 'enabled' => false, 'minWords' => 50 ),
	'AreasOfInterest' => array( 'enabled' => false ),
	'CV'              => array( 'enabled' => false ),
	'Notes'           => array( 'enabled' => true ),
	'Links'           => array( 'enabled' => false ),
	'TermsOfService'  => array( 'enabled' => true ),
);

# Notify Kommunikator incase user applies for account
$wgConfirmAccountContact = "info@d.kth.se";

# Disable reading by anonymous users
$wgGroupPermissions['*']['read'] = false;

# Disable anonymous editing
$wgGroupPermissions['*']['edit'] = false;

# Whitelist request acount
$wgWhitelistRead = array( 'Special:Begär_konto', 'Huvudsida', 'Konglig_Datasektionen:Användningsvillkor', 'GDPR');

# GDPR stuff
$wgGroupPermissions['sysop']['deletelogentry'] = true;
$wgGroupPermissions['sysop']['deleterevision'] = true;
$wgGroupPermissions['oversight']['hideuser'] = true;
$wgGroupPermissions['oversight']['suppressrevision'] = true;
$wgGroupPermissions['oversight']['suppressionlog'] = true;
$wgGroupPermissions['observers']['viewsuppressed'] = true;

wfLoadExtension("SesMailer");
$wgSesMailerRegion = "eu-west-1"; // AWS Region
$wgSesMailerKey = getenv('AWS_ACCESS_KEY_ID'); // Access Key ID for IAM user with ses:SendEmail permission
$wgSesMailerSecret = getenv('AWS_SECRET_ACCESS_KEY'); // Secret Access Key

