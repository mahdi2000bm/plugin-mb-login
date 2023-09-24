<?php
/**
 * This document handles requests
 */

defined("ABSPATH") || exit();

add_action('wp_ajax_nopriv_mb_login_via_email', "mb_login_via_email");
add_action('wp_ajax_nopriv_mb_login_via_phone', "mb_login_via_phone");

function mb_login_via_email() {
	$email = $_POST['input'];
	wp_send_json(json_encode([200 => "email"]), 200);
}
function mb_login_via_phone() {
	$phone = $_POST['phone'];
	wp_send_json(json_encode([200 => "phone"]), 200);
}