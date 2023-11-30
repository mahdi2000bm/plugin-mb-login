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
require_once MB_PLUGIN_DIR . 'view/page-login.php';

/**
 * Hook plugin activation
 *
 * @return void
 */
function mb_activate() {
    // Create template doc in active theme
    mb_create_login_template();
}

