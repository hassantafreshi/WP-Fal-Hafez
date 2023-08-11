<?php
/*
Plugin Name:  WP Fal Hafez
Plugin URI: https://yerib.com/wp-plugin/hafez/
Description: The Hafez Poetry Randomizer is a delightful WordPress plugin that brings the enchanting world of Hafez's poetry to your website. With just a simple shortcode, you can easily display random verses of Hafez's timeless poetry to your visitors, adding a touch of cultural elegance to your site's content.
Version: 0.1
Author:  Hassan Tafreshi ,Farshid Mahmudi
Author URI: https://yerib.com
License: GPLv2 or later
Text Domain: hafez-wsteam


*/

/** Prevent this file from being accessed directly */
if (!defined('ABSPATH')) {
    die("Direct access of plugin files is not allowed.");
}
 
/** Define WSteam_PLUGIN_FILE */
if (!defined('WSteam_PLUGIN_FILE')) {
    define('WSteam_PLUGIN_FILE', __FILE__);
}

/** Constant pointing to the root directory path of the plugin */
if (!defined("WSteam_PLUGIN_DIRECTORY")) {
    define("WSteam_PLUGIN_DIRECTORY", plugin_dir_path(__FILE__));
}

/** Constant pointing to the root directory URL of the plugin */
if (!defined("WSteam_PLUGIN_URL")) {
    define("WSteam_PLUGIN_URL", plugin_dir_url(__FILE__));
}

/** Constant defining the textdomain for localization */
if (!defined("WSteam_PLUGIN_TEXTDOMAIN")) {
    define("WSteam_PLUGIN_TEXTDOMAIN", "WSteam");
}

/** Load main class */
require 'includes/class-WSteam.php';

/** Main instance of plugin */
$WSteam = new WSteam();