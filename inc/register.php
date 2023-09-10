<?php
add_action('wp_ajax_nopriv_wp_mb_auth_send_verification_code', 'wp_mb_auth_send_verification_code');
add_action('wp_ajax_nopriv_wp_mb_auth_verify_verification_code', 'wp_mb_auth_verify_verification_code');
add_action('wp_ajax_nopriv_wp_mb_register_user', 'wp_mb_register_user');

function wp_mb_auth_send_verification_code()
{
    if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
        die('Access Denied!!!');
    }
    $user_phone = sanitize_text_field($_POST['user_phone']);
    wp_mb_validate_phone($user_phone);
    wp_mb_is_phone_exist($user_phone);
    $verification_code = generate_varification_code();
    /* var_dump($verification_code);*/
    $send_sms = wp_ls_send_sms($verification_code, $user_phone, '122865');
    if($send_sms->StrRetStatus =='Ok'){
        wp_mb_add_verification_code_phone($user_phone, $verification_code);
        wp_send_json([
            'success'=>true,
            'message'=>'کد تاییدیه به شماره موبایل شما ارسال شد.'
        ],200);
    }
}

function wp_mb_is_phone_exist($user_phone){
    $args=[
        'meta_key' => '_mb_user_phone',
        'meta_value' => $user_phone,
        'compare'=>'='
        ];
    $user_phone = new WP_User_Query($args);
    if($user_phone->get_total() == 1){
        wp_send_json([
            'error' => true,
            'message' => 'شماره موبایل مورد نظر شما قبلا ثبت شده است!'
        ], 403);
    }
}

function wp_mb_auth_verify_verification_code()
{
    if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
        die('Access Denied!!!');
    }
    $verification_code = sanitize_text_field($_POST['verification_code']);
    wp_mb_validate_verification_code($verification_code);
    wp_mb_check_user_verfication_code($verification_code);
}

function wp_mb_register_user()
{
    if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
        die('Access Denied!!!');
    }
    p_mb_validate_user_register($_POST);
    
    $user_login = explode('@', $_POST['email']);
    $user_login = $user_login[0] . rand(10, 99);
    $user_name_family = explode(' ', $_POST['display_name']);
    $data = [
        'user_login' => apply_filters('pre_user_login', sanitize_text_field($user_login)),
        'user_pass' => apply_filters('per_user_pass', sanitize_text_field($_POST['password'])),
        'first_name' => apply_filters('pre_user_first_name', sanitize_text_field($user_name_family[0])),
        'last_name' => apply_filters('pre_user_last_name', sanitize_text_field($user_name_family[1])),
        'user_email' => apply_filters('pre_user_email', sanitize_text_field($_POST['email'])),
/*        'display_name' => apply_filter('pre_user_display_name', sanitize_text_field($_POST['display_name']))*/
    ];
    $user_id = wp_insert_user($data);
    add_user_meta($user_id,'_mb_user_phone',$_SESSION['current_user_phone']);
   
    if (!is_wp_error($user_id)) {
        wp_ls_send_sms("{$data['first_name']};{$data['user_email']};{$data['user_pass']}",$_SESSION['current_user_phone'],'123305');
        unset($_SESSION['current_user_phone']);
        wp_send_json([
            'success' => true,
            'message' => 'ثبت نام شما با موفقیت صورت گرفت'
        ], 200);
    } else {
        wp_send_json([
            'success' => true,
            'message' => 'خطایی در ثبت نام شما صورت گرفته است!'
        ], 403);
    }
    
}


function wp_mb_check_user_verfication_code($verification_code)
{
    global $wpdb;
    $table = $wpdb->prefix . 'mb_sms_verify_code';
    $stmt = $wpdb->get_row($wpdb->prepare("SELECT verification_code,phone FROM {$table} WHERE verification_code = '%d'", $verification_code));
    if ($stmt) {
        $_SESSION['current_user_phone'] = $stmt->phone;
    } else {
        wp_send_json([
            'error' => true,
            'message' => 'کد تاییدیه معتبر نمی باشد!'
        ], 403);
    }
}

function wp_mb_validate_verification_code($verification_code)
{
    if ($verification_code == '') {
        wp_send_json([
            'error' => true,
            'message' => 'کد تاییدیه دریافتی را وارد نمایید!'
        ], 403);
    }
    if (strlen($verification_code) != 6) {
        wp_send_json([
            'error' => true,
            'message' => 'کد تاییده باید شامل 6 رقم باشد!'
        ], 403);
    }
}

function wp_mb_validate_phone($phone)
{
    if (!preg_match('/^(00|09|\+)[0-9]{8,12}$/', $phone)) {
        wp_send_json([
            'error' => true,
            'message' => 'لطفا شماره موبایل معتبر وارد نمایید!'
        ], 403);
    }
}

function p_mb_validate_user_register($data)
{
    if ($data['display_name'] == '') {
        wp_send_json([
            'error' => true,
            'message' => 'نام و نام خانوادگی خود را وارد نمایید!'
        ], 403);
    }
    if(substr_count($data['display_name'],' ')==0){
        wp_send_json([
            'error' => true,
            'message' => 'بین نام و نام خانوادگی فاصله قرار دهید!'
        ], 403);
    }
    if ($data['email'] == '') {
        wp_send_json([
            'error' => true,
            'message' => 'ایمیل خود را وارد نمایید!'
        ], 403);
    }
    if (!is_email($data['email'])) {
        wp_send_json([
            'error' => true,
            'message' => 'ایمیل معتبر خود را وارد نمایید!'
        ], 403);
    }
    if(email_exists($data['email'])){
        wp_send_json([
            'error' => true,
            'message' => 'ایمیل مورد نظر شما قبلا ثبت شده است!'
        ], 403);
    }
    if ($data['password'] == '') {
        wp_send_json([
            'error' => true,
            'message' => 'کلمه عبور خود را وارد نمایید!'
        ], 403);
    }
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%^&*])(?=.{8,})/', $data['password'])) {
        wp_send_json([
            'error' => true,
            'message' => 'کلمه عبور باید شامل حداقل 8 کارکتر و ترکیبی از حروف کوچک, بزرگ, اعداد و کارکترهای ویژه باشد!'
        ], 403);
    }
    
}

