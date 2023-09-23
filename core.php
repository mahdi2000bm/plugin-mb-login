<?php
/**
 * Plugin Name: MB Custom Login & Register
 * Description: Custom login and register.
 * Author: mhdibaqri
 * Version: 1.0.0
 * License: MIT
 * Author URI: https://github.com/mahdi2000bm
 */

defined("ABSPATH") || exit();

// Definition of root constants
define('MB_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MB_PLUGIN_URL', plugin_dir_url(__FILE__));

// Bootstrap
require_once MB_PLUGIN_DIR . "inc/boot.php";

