<?php
/**
 * Header resources
 *
 * @return void
 */
function get_mb_header() { ?>
<link rel="stylesheet" href="<?= MB_PLUGIN_URL . 'assets/css/bootstrap.css' ?>">
<link rel="stylesheet" href="<?= MB_PLUGIN_URL . 'assets/css/style.css' ?>">
<script src='/wp-includes/js/jquery/jquery.min.js?ver=3.7.0' id='jquery-core-js'></script>
<script src='/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1' id='jquery-migrate-js'></script>
<?php } ?>

<?php
/**
 * Footer resources
 *
 * @return void
 */
function get_mb_footer() {  ?>

<?php $mb_ajax = [
    // Localizes ajax and nonce
    'ajaxurl' => admin_url('admin-ajax.php'),
    '_nonce' => wp_create_nonce() ] ?>
<script><?= json_encode($mb_ajax) ?></script>
<script src="<?= MB_PLUGIN_URL . 'assets/js/ajax.js' ?>"></script>
<script id="global-auth" src="<?= MB_PLUGIN_URL . 'assets/js/global.js' ?>"></script>
<?php } ?>
