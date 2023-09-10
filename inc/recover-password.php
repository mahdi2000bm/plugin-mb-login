<?php
add_action('wp_ajax_nopriv_wp_mb_recover_password','wp_mb_recover_password');
function wp_mb_recover_password(){
    if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
        die('Access Denied!!!');
    }
    $email = sanitize_text_field($_POST['email']);
    wp_mb_validate_email($email);
    $recover_email_link = wp_mb_generate_recover_email_link($email);
    wp_mb_send_recover_password_email($email,$recover_email_link);
}

function wp_mb_generate_recover_email_link($email){
    $token = date('Ymd').md5($email).rand(100000,999999);
    /*return $recover_link = site_url('recover-password').'?recoverToken='.$token;*/
    return add_query_arg(['recoverToken'=>$token,],site_url('recover-password'));
}

function wp_mb_validate_email($email){
    if ($email == '') {
        wp_send_json([
            'error' => true,
            'message' => 'ایمیل خود را وارد نمایید!'
        ], 403);
    }
    if (!is_email($email)) {
        wp_send_json([
            'error' => true,
            'message' => 'ایمیل معتبر خود را وارد نمایید!'
        ], 403);
    }
    if(!email_exists($email)){
        wp_send_json([
            'error' => true,
            'message' => 'کاربری با ایمیل مورد نظر شما یافت نشد!'
        ], 403);
    }
}

function wp_mb_send_recover_password_email($email,$recover_email_link){
    $header =['Content-Type:text/html;charset=UTF-8'];
    $send_recover_email =wp_mail($email,'بازیابی کلمه عبور',$recover_email_link,$header);
    if($send_recover_email){
    wp_mb_add_recover_token($email,$recover_email_link);
        wp_send_json([
            'success'=>true,
            'message'=>'لینک بازیابی کلمه به ایمیل شما ارسال گردید.'
        ],200);
    }else{
        wp_send_json([
            'error'=>true,
            'message'=>'خطایی در ارسال ایمیل صورت گرفته است!'
        ],403);
    }
}

function wp_mb_add_recover_token($email,$recover_email_link){
    global $wpdb;
    $table = $wpdb->prefix.'mb_recover_password_verify';
    $token = explode('=',$recover_email_link);
    $data=[
        'token' =>$token[1],
        'email'=>$email
    ];
    $format = ['%s','%s'];
    $wpdb->insert($table,$data,$format);
}

function find_recover_token($token){
    global $wpdb;
    $table = $wpdb->prefix.'mb_recover_password_verify';
    return $wpdb->get_row($wpdb->prepare("SELECT token FROM {$table} WHERE token ='%s'", $token));
}







