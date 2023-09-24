<?php
/**
 * This document handles requests
 */

defined("ABSPATH") || exit();

add_action('wp_ajax_nopriv_mb_login_via_email', "mb_login_via_email");

function mb_login_via_email() {
	wp_send_json(json_encode([200 => "ok"]), 200);
}