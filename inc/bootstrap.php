<?php

// Register hooks
add_action('wp_enqueue_scripts', 'register_assets');
add_action('admin_enqueue_scripts', 'register_assets_admin');

echo "include";