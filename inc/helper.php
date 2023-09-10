<?php
// Otp
function wp_mb_helper_generate_verification_code(){
    return rand(100000,999999);
}

// Validates form entries
function wp_mb_helper_validate_input($email, $password) {
    if (empty($email) && empty($password)) {
        wp_mb_helper_response_validate('لطفا ایمیل و رمز عبور خود را وارد نمایید.', 0);
    } elseif (empty($email)) {
        wp_mb_helper_response_validate('لطفا ایمیل خود را وارد نمایید.', 0);
    } elseif (empty($password)) {
        wp_mb_helper_response_validate('لطفا رمز عبور خود را وارد نمایید.', 0);
    } elseif (!is_email($email)) {
        wp_mb_helper_response_validate('لطفا ایمیل معتبر وارد نمایید.', 0);
    }
}

// Returns only validation responses
function wp_mb_helper_response_validate($message, bool $status) {

    if ($status) {
        $response = ['success' => true];
        $statusCode = 200;
    } else {
        $response = ['error' => true];
        $statusCode = 403;
    }

    $response['message'] = $message;

    wp_send_json($response, $statusCode);
}
