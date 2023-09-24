<?php
/**
 * This document handles wp_ajax requests
 */

defined("ABSPATH") || exit();

add_action('wp_ajax_nopriv_mb_login_via_email', "mb_login_via_email");
add_action('wp_ajax_nopriv_mb_login_via_phone', "mb_login_via_phone");

function mb_login_via_email() {
	if (! mb_check_nonce())
		response(403);

	response(200);
}
function mb_login_via_phone() {
	$phone = $_POST['input'];
	wp_send_json($phone, 200);
}

