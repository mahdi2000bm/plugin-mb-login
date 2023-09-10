<?php defined('ABSPATH') || exit;

class MbAuth
{
    public function __construct() {
        add_action('wp_ajax_nopriv_wp_mb_auth_login', array($this, 'auth_login'));
        // add_filter('auth_cookie_expiration', array($this, 'wp_mb_set_cookie'), 1);
    }

    public function auth_login() {
        if (isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
            wp_send_json([
                'success' => true,
                'message' => 'غیرمجاز'
            ], 401);
        }

        $email = sanitize_text_field($_POST['email']);
        $password = sanitize_text_field($_POST['password']);
        $remember_me = rest_sanitize_boolean($_POST['remember_me']);

        wp_mb_helper_validate_input($email, $password);

        $user_login = get_user_by_email($email);
        $user_login = $user_login->user_login;

        $credentials = [
            'user_login' => $user_login,
            'user_password' => $password,
            'remember' => $remember_me
        ];
        $user = wp_signon($credentials, false);

        if (! is_wp_error($user)) {
            // Changes the current user by ID or name.
            wp_set_current_user($user->ID, $user->user_login);

            $message = 'درحال ورود';
            $status = 1;
        } else {
            $message = '!نام کاربری یا رمز عبور اشتباه است';
            $status = 0;
        }

        // Send response
        wp_mb_helper_response_validate($message, $status);
    }

    /**
     * @return void
     * @version 1.1.0
     */
    public function auth_register() {
       //
    }

    function set_cookie($expiration) {
        return $expiration = 60 * 60 * 48;
    }
}

// Instantiate the plugin class
new MbAuth();