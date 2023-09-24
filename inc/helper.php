<?php
/**
 * This document declared helper functions
 */

defined("ABSPATH") || exit();

/**
 * returned sanitized param
 *
 * @return false|string
 */
function mb_sanitize($value, $type) {
	return match ($type) {
		"text" => sanitize_text_field( $value ),
		"email" => sanitize_email( $value ),
		default => false,
	};
}

/**
 * Check nonce field from api
 *
 * @return bool
 */
function mb_check_nonce () {
	$nonce = $_POST["_nonce"] ?? "";

	if (wp_verify_nonce(  $nonce ))
		return true;

	return false;
}

function mb_response($status, $action) {

	$message = match ($status) {
		403 => "دسترسی رد شد.",
		200 => "موفقیت آمیز بود.",
		401 => "مقادیر ورودی نادرست است.",
		default => 'خطای ناشناس.',
	};

	$response = [
		"status" => $status,
		"action" => $action,
		"message" => $message
	];

	wp_send_json($response, $status);
}