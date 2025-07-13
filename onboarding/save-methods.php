<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
// phpcs:disable
add_action('wp_ajax_digages_admin_script_onboaard_methods_update', 'digages_admin_script_onboaard_methods_update');
function digages_admin_script_onboaard_methods_update() {
    check_ajax_referer('digages_update_settings_nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized access');
    }

    $settings = isset($_POST['settings']) ? $_POST['settings'] : [];

    $updated_settings = get_option('woocommerce_digages_direct_payments_settings', []);

    // Update settings with defaults if not checked
    $updated_settings['enable_bank_transfers'] = isset($settings['enable_bank_transfers']) ? $settings['enable_bank_transfers'] : 'no';
    $updated_settings['enable_mobile_money'] = isset($settings['enable_mobile_money']) ? $settings['enable_mobile_money'] : 'no';
    $updated_settings['enable_crypto_money'] = isset($settings['enable_crypto_money']) ? $settings['enable_crypto_money'] : 'no';
    $updated_settings['enable_p2p_payments'] = isset($settings['enable_p2p_payments']) ? $settings['enable_p2p_payments'] : 'no';

    // Set enabled to yes
    $updated_settings['enabled'] = 'yes';
    
    update_option('woocommerce_digages_direct_payments_settings', $updated_settings);

    wp_send_json_success();
}

// phpcs:enable
?>