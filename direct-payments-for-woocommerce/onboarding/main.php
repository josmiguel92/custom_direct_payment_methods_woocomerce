<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


// Redirect to onboarding page after activation
function digages_plugin_redirect_on_activation() {
    if (get_option('digages_plugin_onboarding_redirect', false)) {
        delete_option('digages_plugin_onboarding_redirect');
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
        if (is_admin() && !isset($_GET['activate-multi'])) {
            wp_safe_redirect(admin_url('admin.php?page=digages-woodp-onboarding'));
            exit;
        }
    }
}

// Add onboarding page to the admin menu
function digages_woodp_add_onboarding_page() {
    add_menu_page(
        'Woodp',
        'Woodp',
        'manage_options',
        'digages-woodp-onboarding',
        'digages_woodp_onboarding_content',
        plugin_dir_url(__FILE__) . '../assets/img/logo.svg', 
        2
    );
}
add_action('admin_menu', 'digages_woodp_add_onboarding_page');

// Onboarding page content
function digages_woodp_onboarding_content() {
      
     include_once(plugin_dir_path(__FILE__) . 'enqueue.php'); //this line adds the wordpress enqueue function
   
    include_once(plugin_dir_path(__FILE__) . 'allpages.php'); //this line adds the wordpress enqueue function

    include_once(plugin_dir_path(__FILE__) . 'step1/setup.php'); //this line adds the wordpress enqueue function

    //include_once(plugin_dir_path(__FILE__) . 'addaccounts/main.php'); //this line adds the wordpress enqueue function 
    //include_once(plugin_dir_path(__FILE__) . 'step1/license.php'); //this line adds the wordpress enqueue function 

}
 
// <div class="wrap"></div>
    
