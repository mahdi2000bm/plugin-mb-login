<?php
/**
 * Create template in active theme
 *
 * @return void
 */
function mb_create_login_template() {
    $page_template = get_template_directory();
    $file_name = "mb_auth_template.php";

    $file_contents = '';
    // init $file_contents
    require_once MB_PLUGIN_DIR . 'view/template-login.php';

    if (!file_exists($page_template . "/mb_auth_template.php")) {
        $template = fopen($page_template . "/" . $file_name, "w+");
        fwrite($template, $file_contents);
        fclose($template);
    }
} ?>