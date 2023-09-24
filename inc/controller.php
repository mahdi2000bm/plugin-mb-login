<?php
/**
 * This document handles wp_ajax requests
 */

defined("ABSPATH") || exit();

add_action('wp_ajax_nopriv_mb_login_via_email', "mb_login_via_email");
add_action('wp_ajax_nopriv_mb_login_via_phone', "mb_login_via_phone");

function mb_login_via_email() {
	if (! mb_check_nonce())
		mb_response(403, false);

	$mail = $_POST['input'] ?? "";
	$email = mb_sanitize( $mail, "email" );

	$user = get_user_by_email($email);
	if (! $user)
		mb_response(200, 'register');

	mb_response(200, "password");
}

function mb_login_via_phone() {
	$phone = $_POST['input'];
	wp_send_json($phone, 200);
}

