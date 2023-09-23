<?php

/**
 * This document Enqueue scripts & assets
 */

defined("ABSPATH") || exit();

/**
 * Registration of assets on the user side
 *
 * @return void
 */
function mb_register_assets()
{
    wp_register_style('mb-auth-global', MB_PLUGIN_URL . 'assets/css/style.css', "", '1.0.0');
    wp_register_script('mb-auth-global', MB_PLUGIN_URL . 'assets/js/global.js', "","", true);
    wp_register_script('mb-auth-ajax', MB_PLUGIN_URL . 'assets/js/ajax.js', ["jquery"],"", true);

    wp_enqueue_style('mb-auth-global');
    wp_enqueue_script('mb-auth-global');
    wp_enqueue_script('mb-auth-ajax');
}

// Register hooks
 add_action('wp_enqueue_scripts', 'mb_register_assets');