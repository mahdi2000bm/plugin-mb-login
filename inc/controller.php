<?php
/**
 * This document handles wp_ajax requests
 */

defined("ABSPATH") || exit();

add_action('wp_ajax_nopriv_mb_login_via_email', "mb_login_via_email");
add_action('wp_ajax_nopriv_mb_login_via_password', "mb_login_via_password");
add_action('wp_ajax_nopriv_mb_login_via_phone', "mb_login_via_phone");

function mb_login_via_email() {
	if (! mb_check_nonce())
		mb_response(403, false);

	$email = $_POST['input'] ?? "";
	$email = mb_sanitize( $email, "email" );

	$user = get_user_by_email($email);
	if (! $user)
		mb_response(200, 'register');

	mb_response(200, "password");
}

function mb_login_via_password() {
	if (! mb_check_nonce())
		mb_response(403, false);

	$email = $_POST['email'] ?? "";
	$password = $_POST['password'] ?? "";

	$email = mb_sanitize( $email, "email" );
	$password = mb_sanitize( $password, "text" );

	$user = get_user_by_email($email);
	$user_login = $user->user_login;
	$user_login = mb_sanitize($user_login, 'text');

	$certs = [
		'user_login' => $user_login,
		'user_password' => $password,
		'remember' => true
	];

	$logged = wp_signon($certs, false);
	print_r($logged);
}

function mb_login_via_phone() {
	$phone = $_POST['input'];
	wp_send_json($phone, 200);
}

