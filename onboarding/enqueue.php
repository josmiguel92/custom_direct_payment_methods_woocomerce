<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

 
wp_enqueue_style('digages-admin-woodp-remove-onboarding', plugin_dir_url(__FILE__) . 'assets/css/removewordpress.css', array(), '2.0.8', 'all'); 
    
wp_enqueue_style('digages-admin-woodp-onboarding', plugin_dir_url(__FILE__) . 'assets/css/styles.css', array(), '2.0.8', 'all'); 
wp_enqueue_style('digages-admin-woodp-onboarding-form', plugin_dir_url(__FILE__) . 'assets/css/forms.css', array(), '2.0.8', 'all'); 
wp_enqueue_style('digages-admin-woodp-onboarding-table', plugin_dir_url(__FILE__) . 'assets/css/table.css', array(), '2.0.8', 'all'); 
wp_enqueue_style('digages-admin-woodp-onboarding-addaccount', plugin_dir_url(__FILE__) . 'assets/css/addaccount.css', array(), '2.0.8', 'all'); 
wp_enqueue_style('digages-admin-woodp-onboarding-menu', plugin_dir_url(__FILE__) . 'assets/css/menu.css', array(), '2.0.8', 'all'); 
wp_enqueue_style('digages-admin-woodp-onboarding-popup', plugin_dir_url(__FILE__) . 'assets/css/popup.css', array(), '2.0.8', 'all'); 
wp_enqueue_style('bootstrap-font', plugin_dir_url(__FILE__) . '../assets/css/bootstrap-icons.min.css', array(), '2.0.8', 'all');
    
    
wp_enqueue_script(
    'digages-admin-script-onboaard-freeon',
    plugin_dir_url(__FILE__) . 'assets/js/freeon.js',
    array('jquery'), 
    '2.0.8', 
    true
);


wp_enqueue_script(
        'digages-interest-settings-onboard',
        plugins_url('assets/js/digages-interest-settings.js', __FILE__), 
        array('jquery'), 
        '2.0.8', 
        true
    );

    wp_localize_script(
        'digages-interest-settings-onboards',
        'digages_ajax',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('digages_interest_nonce')
        )
    );

    
wp_enqueue_script(
        'digages-data-usage-woodp-onboard',
        plugins_url('assets/js/digages-data-usage.js', __FILE__), 
        array('jquery'), 
        '2.0.8', 
        true
    );

    wp_localize_script(
        'digages-data-usage-woodp-onboard',
        'digages_ajax',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('digages_data_usage_nonce')
        )
    );

    
// Enqueue the script
    wp_enqueue_script(
        'digages-admin-script-onboaard-methods',
        plugins_url('assets/js/methods.js', __FILE__), 
        array('jquery'), 
        '2.0.8', 
        true
    );

    // Localize script to pass AJAX URL and nonce
    wp_localize_script(
        'digages-admin-script-onboaard-methods',
        'digages_ajax',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('digages_update_settings_nonce')
        )
    );



wp_enqueue_script(
    'digages-admin-script-onboaard-popadj',
    plugin_dir_url(__FILE__) . 'assets/js/popadj.js',
    array('jquery'), 
    '2.0.8', 
    true
);

wp_enqueue_script(
    'digages-admin-script-onboaard-popup',
    plugin_dir_url(__FILE__) . 'assets/js/popup.js',
    array('jquery'), 
    '2.0.8', 
    true
);

wp_enqueue_script(
    'digages-admin-script-onboaard-menu',
    plugin_dir_url(__FILE__) . 'assets/js/menu.js',
    array('jquery'), 
    '2.0.8', 
    true
);

wp_enqueue_script(
    'digages-admin-script-onboaard-addaccount',
    plugin_dir_url(__FILE__) . 'assets/js/addaccount.js',
    array('jquery'), 
    '2.0.8', 
    true
);


wp_enqueue_script(
    'digages-admin-script-onboaard-overlaywait',
    plugin_dir_url(__FILE__) . 'assets/js/overlaywait.js',
    array('jquery'), 
    '2.0.8', 
    true
);

wp_enqueue_script(
    'digages-admin-script-onboaard',
    plugin_dir_url(__FILE__) . 'assets/js/allpages.js',
    array('jquery'), 
    '2.0.8', 
    true
);

wp_localize_script('digages-admin-script-onboaard', 'digages_admin_ajax', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('digages_nonce')
));


$site_url = site_url();
    // Pass the SVG path to JavaScript
    wp_localize_script('custom-digages-mobilemoney-modal', 'loadersvg', array(
        'svgPath' => plugins_url('../assets/img/poploader.svg', __FILE__),
        'siteUrl' => $site_url
    ));

    
// Function to enqueue custom JavaScript for the admin
function digages_enqueue_woodp_onboarding_scripts() {
    // Get the current screen
    $screen = get_current_screen();
    
    // Array of allowed page parameters
    $allowed_pages = array(
        'digages-woodp-onboarding'
    );
    
    // // Check if we're on an admin page and on one of our specific pages
    // if (is_admin() && $screen && ( 
    //     (isset($_GET['page']) && in_array($_GET['page'], $allowed_pages))
    // )) {
        // Enqueue Bootstrap CSS and JS
        wp_enqueue_style('digages-admin-woodp_onboarding', plugin_dir_url(__FILE__) . 'assets/css/styles.css', array(), '2.0.8', 'all'); 
    // }
}

// Hook into the admin_enqueue_scripts action for admin scripts only
add_action('admin_enqueue_scripts', 'digages_enqueue_woodp_onboarding_scripts');

?>
