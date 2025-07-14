<?php
/*
Plugin Name: Custom Direct Payments for Woocommerce
Description: Enable instant payments from your customers via bank transfers, mobile money, cryptocurrency and popular P2P platforms like PayPal, Venmo, Zelle, GCash e.t.c—all with zero transaction fees. No API keys or KYC required.
Version: 2.0.8
Author: Digages
Author URI: http://digages.com/
Plugin URI: https://digages.com/direct-payments-for-woocommerce/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
ob_start(); // Start output buffering

include_once(plugin_dir_path(__FILE__) . 'functions/enqueue.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/frontadminenqueue.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/submenu.php'); //this line adds submenu to WooCommerce menu
include_once(plugin_dir_path(__FILE__) . 'directpayment/direct-payment.php'); //this line adds the direct payment orders to woocommerce submenu
include_once(plugin_dir_path(__FILE__) . 'directpayment/orderdetails.php'); //this line displays the desktop orders

include_once(plugin_dir_path(__FILE__) . 'functions/otherpages.php'); 
include_once(plugin_dir_path(__FILE__) . 'functions/subtab.php'); 
include_once(plugin_dir_path(__FILE__) . 'functions/pages.php');  
include_once(plugin_dir_path(__FILE__) . 'settings/gateway.php'); // General Settings page

// Bank transfer, Mobile Money and P2P settings 

include_once(plugin_dir_path(__FILE__) . 'settings/pages/banktransfer/bank_transfer_common.php');  // Checks if Bank transfer is selected from General settings, then shows options in frontend payment
include_once(plugin_dir_path(__FILE__) . 'settings/pages/mobilemoney/mobile_transfer_common.php');  // Checks if Mobile Money is selected from General settings, then shows options in frontend payment
include_once(plugin_dir_path(__FILE__) . 'settings/pages/crypto/crypto_transfer_common.php');  // Checks if Mobile Money is selected from General settings, then shows options in frontend payment
include_once(plugin_dir_path(__FILE__) . 'settings/pages/p2p/p2p_transfer_common.php');  // Checks if P2P is selected from General settings, then shows options in frontend payment

include_once(plugin_dir_path(__FILE__) . 'settings/pages/banktransfer/bank_transfer_backend.php'); // Calls Bank transfer Backend Processing
include_once(plugin_dir_path(__FILE__) . 'settings/pages/mobilemoney/mobile_transfer_backend.php'); // Calls Mobile Money Backend Processing
include_once(plugin_dir_path(__FILE__) . 'settings/pages/crypto/crypto_transfer_backend.php'); // Calls Mobile Money Backend Processing
include_once(plugin_dir_path(__FILE__) . 'settings/pages/p2p/p2p_transfer_backend.php'); // Calls P2P Backend Processing

include_once(plugin_dir_path(__FILE__) . 'functions/bankenqueue.php'); //this line adds the Bank transfer enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/mobilequeue.php'); //this line adds the Mobile Money enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/cryptoqueue.php'); //this line adds the Mobile Money enqueue function
include_once(plugin_dir_path(__FILE__) . 'functions/p2penqueue.php'); //this line adds the P2P enqueue function 

//Frontend Popup payment codes
include_once(plugin_dir_path(__FILE__) . 'functions/popupenqueue.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'frontend/main.php'); // popup entry file
include_once(plugin_dir_path(__FILE__) . 'frontend/paymentpopup.php'); // frontend popup interface entry file
include_once(plugin_dir_path(__FILE__) . 'frontend/paymethods.php'); // Gets the Bank transfer and Mobile Money details

include_once(plugin_dir_path(__FILE__) . 'others.php'); // Calls functions of frontend pop after step 3
include_once(plugin_dir_path(__FILE__) . 'functions/initialorder.php'); // Calls the first order trigger
include_once(plugin_dir_path(__FILE__) . 'functions/sendmail.php'); // Calls order emails, confirm and cancel function 

include_once(plugin_dir_path(__FILE__) . 'functions/titles.php'); // sets custom page titles for all the admin pages

include_once(plugin_dir_path(__FILE__) . 'functions/canceledpage.php'); // sets custom page titles for all the admin pages





// Add custom links to the plugin row
function digages_dpwcm_plugin_custom_meta($links, $file) { 
    if ($file === plugin_basename(__FILE__)) {
        $links[] = '<a href="https://digages.com/docs/" target="_blank">Docs</a>'; 
        $links[] = '<a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=chdzxb1" target="_blank">Support</a>';
    }
    return $links;
}

add_filter('plugin_row_meta', 'digages_dpwcm_plugin_custom_meta', 10, 2);


 
// Add custom links to the plugin row
function digages_dpwcm_settings_custom_links($links) {
    $custom_links = array(
        '<a href="./admin.php?page=wc-settings&tab=checkout&section=digages_direct_payments">Settings</a>',
    );
    
    return array_merge($links, $custom_links);
}

// Replace 'your-plugin-slug' with the correct plugin slug
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'digages_dpwcm_settings_custom_links');


// Add this code to your theme's functions.php file or a custom plugin.
add_filter('woocommerce_email_subject_customer_completed_order', 'digages_custom_completed_order_email_subject', 10, 2);
add_filter('woocommerce_email_subject_customer_processing_order', 'digages_custom_completed_order_email_subject', 10, 2);

function digages_custom_completed_order_email_subject($subject, $order) {
    if (!is_object($order)) {
        return $subject;
    }
    return sprintf('Thank You! Your order #%s has been confirmed', $order->get_order_number());
}


// Hook for plugin activation
function digages_plugin_on_activation() {
    update_option('digages_wdpp_data_usage', 'yes'); 
    update_option('digages_wdpp_onboard_interest', 'none'); 
    add_option('digages_plugin_onboarding_redirect', true);
}
register_activation_hook(__FILE__, 'digages_plugin_on_activation');

add_action('admin_init', 'digages_plugin_redirect_on_activation');



include_once(plugin_dir_path(__FILE__) . 'onboarding/main.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/allpages.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/jsenqueue/bank.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/jsenqueue/crypto.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/jsenqueue/mobile.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/jsenqueue/p2p.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/save-methods.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/data-usage.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/save-interests.php'); //this line adds the wordpress enqueue function
include_once(plugin_dir_path(__FILE__) . 'onboarding/current-page.php'); //this line adds the wordpress enqueue function


register_activation_hook(__FILE__, 'digages_save_info_create_table');
include_once(plugin_dir_path(__FILE__) . 'functions/data.php'); //this line adds the wordpress enqueue function


include_once(plugin_dir_path(__FILE__) . 'settings/pages/install_plugin.php');
include_once(plugin_dir_path(__FILE__) . 'settings/pages/activate_plugin.php');


// All notifications
include_once(plugin_dir_path(__FILE__) . 'notice/enqueue.php');

include_once(plugin_dir_path(__FILE__) . 'notice/firstpay.php');
include_once(plugin_dir_path(__FILE__) . 'notice/tenpay.php');
include_once(plugin_dir_path(__FILE__) . 'notice/home.php');
include_once(plugin_dir_path(__FILE__) . 'notice/interests.php');
include_once(plugin_dir_path(__FILE__) . 'notice/available.php');
include_once(plugin_dir_path(__FILE__) . 'notice/addaccountsmain.php');

function digages_woodp_check_install_time_option() {
    if ( get_option( 'digages_woodp_install_time' ) === false ) {
        $current_time = current_time('mysql'); // Get current time in site timezone
        add_option( 'digages_woodp_install_time', $current_time );
    }
}
add_action('admin_init', 'digages_woodp_check_install_time_option');


// allow users to upload files
function add_upload_capability_to_subscribers() {
    $role = get_role('subscriber');
    if ($role && ! $role->has_cap('upload_files')) {
        $role->add_cap('upload_files');
    }
}
add_action('init', 'add_upload_capability_to_subscribers');

//USA Ads
include_once(plugin_dir_path(__FILE__) . 'ads/usa/main.php');



ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering

?>