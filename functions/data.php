

<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
// phpcs:disable

// Function to log errors
function digages_log_error($message) {
   // error_log("[Digages Plugin] " . $message);
}

// Create a custom table upon plugin activation
function digages_save_info_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'digages_site_order_info';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        site_name VARCHAR(255),
        admin_email VARCHAR(255),
        business_name VARCHAR(255),
        country VARCHAR(255),
        theme VARCHAR(255),
        order_id BIGINT UNSIGNED,
        order_status VARCHAR(100),
        amount DECIMAL(10,2),
        currency VARCHAR(10),
        order_date DATETIME,
        payment_method VARCHAR(255),
        plugintype VARCHAR(255),
        siteurl VARCHAR(255),
        sent TINYINT(1) DEFAULT 0
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    digages_log_error("Table created or updated: $table_name");

    // Save site info and send existing orders
    digages_send_existing_orders();
}
register_activation_hook(__FILE__, 'digages_save_info_create_table');

// Function to send existing orders upon activation
function digages_send_existing_orders() {
    if (!class_exists('WooCommerce')) {
        return;
    }
    global $wpdb;
    $table_name = $wpdb->prefix . 'digages_site_order_info';
    $valid_statuses = ["on-hold", "processing", "completed", "cancelled"];

    $site_info = [
        'site_name' => get_bloginfo('name'),
        'admin_email' => get_option('admin_email'),
        'business_name' => get_option('blogname'),
        'country' => get_option( 'woocommerce_default_country' ),
        'siteurl' => get_site_url(),
        'theme' => wp_get_theme()->get('Name')
    ];

    $orders = wc_get_orders([
        'limit' => -1,
        'status' => $valid_statuses,
        'payment_method' => 'digages_direct_payments'
    ]);

    foreach ($orders as $order) {
        $order_data = [
            'order_id' => $order->get_id(),
            'order_status' => $order->get_status(),
            'amount' => $order->get_total(),
            'currency' => !empty($order->get_currency()) ? $order->get_currency() : get_woocommerce_currency(),
            'order_date' => $order->get_date_created()->format('Y-m-d H:i:s'),
            'payment_method' => $order->get_payment_method(),
            'plugintype' => 'Free',
            'sent' => 0
        ];

        $full_data = array_merge($site_info, $order_data);
        digages_log_error("Saving order ID: " . $order->get_id()); 
        $wpdb->insert($table_name, $full_data);
    }
    digages_send_data_to_api();
}

// Send data to remote API
function digages_send_data_to_api() {
    
    // If you want to disable the API call, uncomment the line above
    return;
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'digages_site_order_info';
    $api_url = 'https://digages.com/dp-api-activate/data.php'; 
    $data = $wpdb->get_results("SELECT * FROM $table_name WHERE sent = 0", ARRAY_A);
    if (empty($data)) {
        digages_log_error("No new data to send to API.");
        return;
    }

    digages_log_error("Sending data to API: " . json_encode($data));
    
    $response = wp_remote_post($api_url, [
        'method'    => 'POST',
        'body'      => json_encode($data),
        'headers'   => ['Content-Type' => 'application/json']
    ]);

    if (is_wp_error($response)) {
        digages_log_error("API request failed: " . $response->get_error_message());
    } elseif (wp_remote_retrieve_response_code($response) === 200) { 
        $wpdb->query("UPDATE $table_name SET sent = 1 WHERE sent = 0");
        digages_log_error("Data successfully sent to API and marked as sent.");
    } else {
        digages_log_error("Unexpected API response: " . wp_remote_retrieve_body($response));
    }
}

// 

add_action('woocommerce_order_status_changed', 'digages_capture_order_on_status_change', 10, 3);

function digages_capture_order_on_status_change($order_id, $old_status, $new_status) {
    if (!class_exists('WooCommerce')) {
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'digages_site_order_info';

    $order = wc_get_order($order_id);
    if (!$order) {
        return;
    }

    // Define valid statuses
    $valid_statuses = ["on-hold", "processing", "completed", "cancelled"];
    if (!in_array($new_status, $valid_statuses)) {
        return; // Ignore irrelevant statuses
    }

    // Get site details
    $site_info = [
        'site_name' => get_bloginfo('name'),
        'admin_email' => get_option('admin_email'),
        'business_name' => get_option('blogname'),
        'country' => get_option( 'woocommerce_default_country' ),
        'siteurl' => get_site_url(),
        'theme' => wp_get_theme()->get('Name')
    ];

    // Get order details
    $order_data = [
        'order_status' => $new_status,
        'amount' => $order->get_total(),
        'currency' => !empty($order->get_currency()) ? $order->get_currency() : get_woocommerce_currency(),
        'order_date' => $order->get_date_created()->format('Y-m-d H:i:s'),
        'payment_method' => $order->get_payment_method(),
        'plugintype' => 'Free',
        'sent' => 0 // Mark as not sent
    ];
 
    $existing_order = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE order_id = %d", $order_id));

    if ($existing_order) { 
        $wpdb->update($table_name, $order_data, ['order_id' => $order_id]);
        digages_log_error("Order ID $order_id updated to status: $new_status");
    } else {
        // Insert new order if not found
        $order_data['order_id'] = $order_id;
        $full_data = array_merge($site_info, $order_data); 
        $wpdb->insert($table_name, $full_data);
        digages_log_error("New order ID $order_id added with status: $new_status");
    }

    // Send updated order data to the API
    digages_send_data_to_api();
}


// 
// phpcs:enable
?>

