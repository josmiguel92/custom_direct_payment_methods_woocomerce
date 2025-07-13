<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
// phpcs:disable
// Save the current page to wp_options
function digages_save_page_callback() {
    // Verify nonce for security
    if (!check_ajax_referer('digages_nonce', 'security', false)) {
        //error_log('Nonce verification failed in save_page');
        wp_send_json_error(array('message' => 'Security check failed'));
        wp_die();
    }
    
    // Get and sanitize the page parameter
    $page = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : 'home';
    //error_log('Saving page: ' . $page);
    
    // Store page preference globally with autoload set to 'yes'
    $updated = update_option('digages_current_page', $page, true);
    
    if ($updated) {
        //error_log('Page updated successfully: ' . $page);
        wp_send_json_success(array('message' => 'Page saved successfully', 'page' => $page));
    } else {
        //error_log('Page already exists with same value: ' . $page);
        wp_send_json_success(array('message' => 'Page already saved with same value', 'page' => $page));
    }
    
    wp_die();
}
add_action('wp_ajax_digages_save_page', 'digages_save_page_callback');

// Get the current page from wp_options
function digages_get_current_page_callback() {
    // Verify nonce for security
    if (!check_ajax_referer('digages_nonce', 'security', false)) {
        //error_log('Nonce verification failed in get_current_page');
        wp_send_json_error(array('message' => 'Security check failed'));
        wp_die();
    }
    
    // Get the saved page
    $page = get_option('digages_current_page', 'home');
    
    // Debug info
    //error_log('Retrieved saved page: ' . $page);
    
    // Always set success to true and include the page
    wp_send_json_success(array('page' => $page, 'message' => 'Page retrieved successfully'));
    wp_die();
}
add_action('wp_ajax_digages_get_current_page', 'digages_get_current_page_callback');

// Make sure nonce is properly added to script localization
function digages_ensure_nonce() {
    // Check if this has already been localized
    if (!wp_script_is('digages-admin-script-onboaard', 'localized')) {
        wp_localize_script('digages-admin-script-onboaard', 'digages_admin_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('digages_nonce')
        ));
        //error_log('Added missing nonce to script');
    }
}
add_action('admin_footer', 'digages_ensure_nonce', 99);

// phpcs:enable
?>