<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
function digages_plugin_notice_tenpay() {
    return ;
    
    if (get_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_tenpay', true)) {
        return;
    }
$logo = plugins_url('img/logo.svg', __FILE__);  
$dismiss = plugins_url('img/dismiss.svg', __FILE__); 
$crown = plugins_url('img/crown.svg', __FILE__);   



// Include WooCommerce functions if not already included
if ( ! function_exists( 'wc_get_orders' ) ) {
    return;
}

// Get the installation time from options
$install_time = get_option( 'digages_woodp_install_time' );

// Convert to timestamp for comparison
$install_timestamp = strtotime( $install_time );

// Define statuses and payment method
$statuses = array( 'wc-pending', 'wc-processing', 'wc-completed', 'wc-on-hold', 'wc-cancelled' );
$payment_method = 'digages_direct_payments';

// Set up arguments for order query
$args = array(
    'status' => $statuses,
    'payment_method' => $payment_method,
    'date_created' => '>=' . $install_timestamp, // Only get orders after install time
    'return' => 'ids',
    'limit' => -1
);

// Get orders
$orders = wc_get_orders( $args );

// Count orders
$count = count( $orders );

// Uncomment to output count
// echo $count;

    if ($count == 10) {
    ?>
    

<?php
    }

}
//add_action('admin_notices', 'digages_plugin_notice_tenpay');



function digages_dismiss_notice_tenpay() {
    check_ajax_referer('digages-dismiss-notice', 'security');
    update_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_tenpay', true);
    wp_die();
}
//add_action('wp_ajax_digages_dismiss_notice_tenpay', 'digages_dismiss_notice_tenpay');



?>
