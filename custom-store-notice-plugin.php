<?php
/*
Plugin Name: Custom Store Notice
Plugin URI: #
Description: Adds a custom store notice to Woocommerce
Version: 1.0.0
Author: robmccormack89
Author URI: #
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE
Text Domain: custom-store-notice
Domain Path: /languages/
*/

// don't run if someone access this file directly
defined('ABSPATH') || exit;

// define some constants
if (!defined('CUSTOM_STORE_NOTICE_PATH')) define('CUSTOM_STORE_NOTICE_PATH', plugin_dir_path( __FILE__ ));

// require the composer autoloader
if (file_exists($composer_autoload = __DIR__.'/vendor/autoload.php')) require_once $composer_autoload;

// then require the main plugin class. this class extends Timber/Timber which is required via composer
new Rmcc\CustomStoreNotice;