<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
add_action('wp_ajax_digages_update_data_usage_woodp', 'digages_update_data_usage_woodp');
function digages_update_data_usage_woodp() {
    //check_ajax_referer('digages_data_usage_nonce');
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized access');
    }

    // phpcs:ignore WordPress.Security.NonceVerification.Missing
    $data_usage = isset($_POST['data_usage']) && $_POST['data_usage'] === 'yes' ? 'yes' : 'no';

    update_option('digages_wdpp_data_usage', $data_usage);

    wp_send_json_success();
}

?>