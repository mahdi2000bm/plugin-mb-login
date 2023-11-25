<?php
/**
 * This document bootstrap requires
 */

defined("ABSPATH") || exit();

/**
 * Prerequisites document
 */
// Server side
require_once MB_PLUGIN_DIR . 'inc/helper.php';
require_once MB_PLUGIN_DIR . 'inc/controller.php';

// Client side
// require_once MB_PLUGIN_DIR . 'inc/assets.php';
require_once MB_PLUGIN_DIR . 'inc/view.php';

/**
 * Activate the plugin.
 */
function mb_activate() {
	// create template doc in active theme
	create_login_template();
}

register_activation_hook( __FILE__, 'mb_activate' );