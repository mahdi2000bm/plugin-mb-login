<?php
/**
 * This document bootstrap requires
 */

defined("ABSPATH") || exit();

// Definition of constants
define('MB_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MB_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Prerequisites document
 */
// Server side
require_once MB_PLUGIN_DIR . 'inc/controller.php';

// User side
require_once MB_PLUGIN_DIR . 'inc/view.php';