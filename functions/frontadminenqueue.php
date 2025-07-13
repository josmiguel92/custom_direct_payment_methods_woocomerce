<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
 
// Function to enqueue custom JavaScript for the admin
function digages_enqueue_frontadmin_scripts() { 
    // Only enqueue on WooCommerce checkout page or digages-logs page
    if (is_checkout() || is_page('digages-logs')) {
        //Bootstrap js
        
        // Enqueue Bootstrap CSS and JS
        wp_enqueue_style('digages-admin-direct-payments', plugin_dir_url(__FILE__) . '../assets/css/digages-direct-payments.css', array(), '2.0.8', 'all');
        wp_enqueue_style('bootstrap-css', plugin_dir_url(__FILE__) . '../assets/css/bootstrap.min.css', array(), '2.0.8', 'all');
        wp_enqueue_style('bootstrap-font', plugin_dir_url(__FILE__) . '../assets/css/bootstrap-icons.min.css', array(), '2.0.8', 'all');
        wp_enqueue_script('bootstrap-js', plugin_dir_url(__FILE__) . '../assets/js/bootstrap.bundle.min.js', array('jquery'), '2.0.8', true);
        wp_enqueue_style('icomoon-css', plugin_dir_url(__FILE__) . '../assets/css/icomoon.css', array(), '2.0.8', 'all');
        
        // Enqueue popup CSS and JS
        wp_enqueue_style('digages-new-popup-css', plugin_dir_url(__FILE__) . '../assets/css/popup.css', array(), '2.0.8', 'all');
        wp_enqueue_script('digages-new-popup-js', plugin_dir_url(__FILE__) . '../assets/js/popup.js', array('jquery'), '2.0.8', true);
        wp_enqueue_script('digages-new-getamount-js', plugin_dir_url(__FILE__) . '../assets/js/get-amount.js', array('jquery'), '2.0.8', true);
        wp_enqueue_script('digages-auto-adjust-popup-js', plugin_dir_url(__FILE__) . '../assets/js/adjustpopup.js', array('jquery'), '2.0.8', true);
        wp_enqueue_style('digages-new-grid-css', plugin_dir_url(__FILE__) . '../assets/css/grid.css', array(), '2.0.8', 'all');
        wp_enqueue_script('digages-mobile-option-change', plugin_dir_url(__FILE__) . '../assets/js/mobile-option-change.js', array('jquery'), '2.0.8', true);
    }
}

// Hook into the wp_enqueue_scripts action for frontend scripts
add_action('wp_enqueue_scripts', 'digages_enqueue_frontadmin_scripts'); // Frontend 

// Function to enqueue custom JavaScript for the admin
function digages_enqueue_frontadminw_scripts() {
    // Get the current screen
    $screen = get_current_screen();
    
    // Array of allowed page parameters
    $allowed_pages = array(
        'direct-payments-p2p',
        'direct-payments-bank-transfer',
        'direct-payments-mobile-money',
        'direct-payments-cryptocurrency',
        'direct-payments-about',
        'digages-direct-payments', 
    );
    
    // Check if we're on an admin page and on one of our specific pages

    if (is_admin() && $screen && (
        in_array($screen->base, array('toplevel_page_digages-direct-payments')) || 
    
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        (isset($_GET['page']) && in_array($_GET['page'], $allowed_pages)) ||
    
        ($screen->id === 'woocommerce_page_wc-settings' && 
    
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended
            isset($_GET['tab']) && $_GET['tab'] === 'checkout' && 
    
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended
            isset($_GET['section']) && $_GET['section'] === 'digages_direct_payments')
    ))
        {
        // Enqueue Bootstrap CSS and JS
        wp_enqueue_style('digages-admin-direct-payments', plugin_dir_url(__FILE__) . '../assets/css/digages-direct-payments.css', array(), '2.0.8', 'all');
        wp_enqueue_style('bootstrap-css', plugin_dir_url(__FILE__) . '../assets/css/bootstrap.min.css', array(), '2.0.8', 'all');
        wp_enqueue_style('bootstrap-font', plugin_dir_url(__FILE__) . '../assets/css/bootstrap-icons.min.css', array(), '2.0.8', 'all');
        wp_enqueue_script('bootstrap-js', plugin_dir_url(__FILE__) . '../assets/js/bootstrap.bundle.min.js', array('jquery'), '2.0.8', true);
        wp_enqueue_style('icomoon-css', plugin_dir_url(__FILE__) . '../assets/css/icomoon.css', array(), '2.0.8', 'all');
        
        // Enqueue popup CSS and JS
        wp_enqueue_style('digages-new-popup-css', plugin_dir_url(__FILE__) . '../assets/css/popup.css', array(), '2.0.8', 'all');
        wp_enqueue_script('digages-new-popup-js', plugin_dir_url(__FILE__) . '../assets/js/popup.js', array('jquery'), '2.0.8', true);
        wp_enqueue_style('digages-new-grid-css', plugin_dir_url(__FILE__) . '../assets/css/grid.css', array(), '2.0.8', 'all');


        wp_enqueue_script('digages-woodp-script', plugin_dir_url(__FILE__) . '../assets/js/plugin-install.js', array('jquery'), '2.0.8', true);
    
        // Localize script for AJAX
        wp_localize_script('digages-woodp-script', 'woodpAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('woodp_nonce')
        ));


    }
}

// Hook into the admin_enqueue_scripts action for admin scripts only
add_action('admin_enqueue_scripts', 'digages_enqueue_frontadminw_scripts');
?>