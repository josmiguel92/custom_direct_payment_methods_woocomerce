<?php

if (!defined('ABSPATH')) {
    exit;
}

// AJAX handler for activating plugin
add_action('wp_ajax_digages_woodp_activate_plugin', 'digages_woodp_activate_plugin');
function digages_woodp_activate_plugin() {
    check_ajax_referer('woodp_nonce', 'nonce');
    
    if (!current_user_can('activate_plugins')) {
        wp_send_json_error('Insufficient permissions');
    }

    $plugin_path = isset($_POST['path']) ? sanitize_text_field(wp_unslash($_POST['path'])) : '';
    if (empty($plugin_path)) {
        wp_send_json_error('Invalid plugin path');
    }
    
    // Verify the plugin path exists
    if (!digages_woodp_is_plugin_installed($plugin_path)) {
        wp_send_json_error('Plugin file does not exist');
    }
    
    $result = activate_plugin($plugin_path);
    
    if (is_wp_error($result)) {
        wp_send_json_error($result->get_error_message());
    }
    
    wp_send_json_success();
}
?>