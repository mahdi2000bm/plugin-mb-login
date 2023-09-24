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
	wp_enqueue_script('mb-ajax-js', MB_PLUGIN_URL . 'assets/js/global.js', ['jquery'], '', 'true');

	// Works only if the `mb-ajax-js` has already been registered.
	wp_localize_script('mb-ajax-js', 'mb_ajax', [
		'ajaxurl' => admin_url('admin-ajax.php'),
		'_nonce' => wp_create_nonce()
	]);
}

// Register hooks
 add_action('wp_enqueue_scripts', 'mb_register_assets');