<?php

// Enqueue scripts for front user
function mb_register_assets()
{
    //
}

// Enqueue scripts for admin dashboard
function mb_register_assets_admin()
{
    //
}

// Register hooks
add_action('wp_enqueue_scripts', 'mb_register_assets');
add_action('admin_enqueue_scripts', 'mb_register_assets_admin');

echo "include";