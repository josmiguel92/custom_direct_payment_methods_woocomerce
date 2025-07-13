<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
// phpcs:disable
add_action('wp_ajax_digages_update_interest_woodp', 'digages_update_interest_woodp');
function digages_update_interest_woodp() {
    //check_ajax_referer('digages_interest_nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized access');
    }
    //error_log('post data is:');
    //error_log(print_r($_POST, true)); // Check what data is received

    // phpcs:ignore WordPress.Security.NonceVerification.Missing
    $interests = isset($_POST['interests']) ? $_POST['interests'] : [];

    update_option('digages_wdpp_onboard_interest', $interests);

    wp_send_json_success();
}

// phpcs:enable
?>