<?php

if (!defined('ABSPATH')) {
    exit;
}

// AJAX handler for installing plugin
add_action('wp_ajax_digages_woodp_install_plugin', 'digages_woodp_install_plugin');
function digages_woodp_install_plugin() {
    check_ajax_referer('woodp_nonce', 'nonce');
    
    if (!current_user_can('install_plugins')) {
        wp_send_json_error('Insufficient permissions');
    }
    
    $plugin_url = isset($_POST['url']) ? esc_url_raw(wp_unslash($_POST['url'])) : '';
    $plugin_slug = isset($_POST['slug']) ? sanitize_text_field(wp_unslash($_POST['slug'])) : '';
    $plugin_path = isset($_POST['path']) ? sanitize_text_field(wp_unslash($_POST['path'])) : '';

    if (empty($plugin_url) || empty($plugin_slug) || empty($plugin_path)) {
        wp_send_json_error('Invalid plugin data');
    }
    
    // Include required WordPress files for plugin installation
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader-skin.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    
    // Define the Quiet_Skin class
    if (!class_exists('Quiet_Skin')) {
        class Quiet_Skin extends WP_Upgrader_Skin {
            public function feedback($string, ...$args) {}
            public function header() {}
            public function footer() {}
        }
    }
    
    $upgrader = new Plugin_Upgrader(new Quiet_Skin());
    $installed = $upgrader->install($plugin_url);
    
    if (is_wp_error($installed)) {
        wp_send_json_error($installed->get_error_message());
    }
    
    // Clear the plugin cache to ensure the new plugin is recognized
    wp_cache_delete('plugins', 'plugins');
    
    // Verify the plugin is installed and get the correct path
    if (digages_woodp_is_plugin_installed($plugin_path)) {
        wp_send_json_success(array('plugin_path' => $plugin_path));
    } else {
        wp_send_json_error('Plugin installed but path not found');
    }
}
?>