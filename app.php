<?php
/**
 * Plugin Name: MB Login & Register
 * Description: Custom login and register.
 * Author: mhdibaqri
 * Version: 1.0.0
 * License: MIT
 * Author URI: https://github.com/mahdi2000bm
 */

defined('ABSPATH') || exit;

class App
{
    // private $table_verify_sms;

    // private $table_recover_password_verify;

    public function __construct() {
        // Define constants
        define('MB_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('MB_PLUGIN_URL', plugin_dir_url(__FILE__));

        // Initialize table names
        global $wpdb;
        $this->table_verify_sms = $wpdb->prefix.'mb_sms_verify_code';
        $this->table_recover_password_verify = $wpdb->prefix.'mb_recover_password_verify';

        // Register hooks
        add_action('wp_enqueue_scripts', array($this, 'register_assets'));
        add_action('admin_enqueue_scripts', array($this, 'register_assets_admin'));

        // Include necessary files
        include_once MB_PLUGIN_DIR . 'inc/helper.php';
        include_once MB_PLUGIN_DIR . 'classes/MbAuth.php';
        include_once MB_PLUGIN_DIR . 'view/front/login.php';
        //include_once MB_PLUGIN_DIR . 'inc/register.php';
        //include_once MB_PLUGIN_DIR . 'inc/recover-password.php';
        //include_once MB_PLUGIN_DIR . 'inc/change-password.php';
        //include_once MB_PLUGIN_DIR . 'inc/sendSms.php';
        //include_once MB_PLUGIN_DIR . 'inc/sendMail.php';
        //include_once MB_PLUGIN_DIR . 'inc/sms_functions.php';
        include_once (ABSPATH . 'wp-includes/pluggable.php');

        // Activate and deactivate hooks (optional)
        // register_activation_hook(__FILE__, array($this, 'activate'));
        // register_deactivation_hook(__FILE__, array($this, 'deactivate'));

        // Other initialization tasks
        // $this->create_tables();
    }

    // Register and enqueue CSS and JavaScript assets
    public function register_assets() {
        //CSS
        // wp_register_style('mb-style', MB_PLUGIN_URL . 'assets/css/front/style.css', '', '1.0.0');
        wp_register_style('mb-style', MB_PLUGIN_URL . 'assets/css/front/style.css', '', '1.0.0');
        wp_register_style('mb-material-design-iconic', MB_PLUGIN_URL . 'assets/fonts/material-icon/css/material-design-iconic-font.min.css', '', '1.0.0');
        wp_register_style('mb-toast', MB_PLUGIN_URL . 'assets/css/front/toast.css', '', '1.0.0');

        wp_enqueue_style('mb-material-design-iconic');
        wp_enqueue_style('mb-toast');
        wp_enqueue_style('mb-style');

        //JS
        wp_register_script('toast-js', 'https://cdn.jsdelivr.net/npm/toastify-js', ['jquery'], '1.0.0', 'true');
        wp_register_script('mb-main-js', MB_PLUGIN_URL . 'assets/js/front/main.js', ['jquery'], '1.0.0', 'true');

        wp_enqueue_script('mb-ajax-js', MB_PLUGIN_URL . 'assets/js/front/ajax.js', ['jquery'], rand(0,999), 'true');

        // Works only if the `mb-ajax-js` has already been registered.
        wp_localize_script('mb-ajax-js', 'mb_ajax', [
            'ajaxurl' => admin_url('admin-ajax.php'),
            '_nonce' => wp_create_nonce()
        ]);

        wp_enqueue_script('toast-js');
        wp_enqueue_script('mb-main-js');
    }

    // Register and enqueue CSS and JavaScript assets Admin Role
    public function register_assets_admin() {
        //CSS
        wp_register_style('mb-admin-style', MB_PLUGIN_URL . 'assets/css/admin/admin-style.css', '', '1.0.0');
        wp_enqueue_style('mb-admin-style');
        //JS
        wp_register_script('mb_admin_main-js', MB_PLUGIN_URL . 'assets/js/admin/admin-js.js', ['jquery'], '1.0.0', 'true');
        wp_enqueue_script('mb_admin_main-js');
    }
}

// Instantiate the plugin class
new App();
