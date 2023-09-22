<?php
/**
 * Header resources
 *
 * @return void
 */
function get_mb_header() { ?>
<link rel="stylesheet" href="<?= MB_PLUGIN_URL . 'assets/css/bootstrap.css' ?>">
<link rel="stylesheet" href="<?= MB_PLUGIN_URL . 'assets/css/style.css' ?>">
<script src='/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1' id='jquery-migrate-js'></script>
<?php } ?>

<?php
/**
 * Footer resources
 *
 * @return void
 */
function get_mb_footer() { ?>
<script src="<?= MB_PLUGIN_URL . 'assets/js/global.js' ?>"></script>
<script src="<?= MB_PLUGIN_URL . 'assets/js/ajax.js' ?>"></script>
<?php } ?>
