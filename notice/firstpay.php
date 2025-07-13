<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
function digages_plugin_notice_firstpay() {
    if (get_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_firstpay', true)) {
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
$install_time = get_option( 'digages_woodp_install_time');

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

if ($count == 1) {
    ?>
    
<div class="digages-plugin-notice notice is-dismissible " style="border-left-color:  #533582 !important;padding:0 !important;">
<div class="digages-notice-container">

<div class="digages-notice-container-item1">

<div class="digages-notice-container-item1-txt">
🎉🎉 Congrats on your 1st Payment! Here’s What to Do Next
</div>
<div class="">
You can now confirm or cancel the payment directly from your dashboard. Need help? Check out our 
<a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=chdzu49" target="_blank">step-by-step guide</a> 
for detailed instructions.
</div>

<div class="digages-notice-container-item1-btn">

<div class="">
<a href="admin.php?page=digages-direct-payments"><button class="btn1">Manage Payments</button></a>
</div>
<div class="">
<a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank">
<button class="btn2">
<div>
<?php
// phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
?> 
<img src="<?php echo esc_url($crown) ?>" />
<?php
// phpcs:enable
?>
</div>
<div>
Buy PRO
</div>
</button></a>
</div>
<div class="">
<a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=cheb2o4" target="_blank"><button class="btn2">Leave a Review</button></a>
</div>
<div class="digages-notice-container-item1-btn-dismiss">
<a href="#" class="digages-dismiss-notice-firstpay">
<div>
<?php
// phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
?> 
<img src="<?php echo esc_url($dismiss) ?>" />
<?php
// phpcs:enable
?>
</div>
<div>
Dismiss
</div>
</a>
</div>

</div>
</div>


<div class="digages-notice-container-item2">
<?php
// phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
?> 
<img src="<?php echo esc_url($logo) ?>" />
<?php
// phpcs:enable
?>
</div>


</div>
</div> 
<?php
    }

}
add_action('admin_notices', 'digages_plugin_notice_firstpay');


function digages_dismiss_notice_firstpay() {
    check_ajax_referer('digages-dismiss-notice', 'security');
    update_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_firstpay', true);
    wp_die();
}
add_action('wp_ajax_digages_dismiss_notice_firstpay', 'digages_dismiss_notice_firstpay');

?>
