<?php
function wp_mb_send_sms($args,$to,$bodyId){

    $username =  get_option('_sms_username');
    $password =  get_option('_sms_password');

    $data = array('username' => $username, 'password' => $password,'text' => "$args",'to' =>$to ,"bodyId"=>$bodyId );
    $post_data = http_build_query($data);
    $handle = curl_init('https://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber');
    curl_setopt($handle, CURLOPT_HTTPHEADER, array(
        'content-type' => 'application/x-www-form-urlencoded'
    ));

    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_POST, true);
    curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
    $response = curl_exec($handle);
    return json_decode($response);
}