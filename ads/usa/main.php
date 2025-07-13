<?php
// add_action('admin_notices', 'digages_july_notice_display');
// add_action('admin_init', 'digages_july_notice_handle_action');

function digages_july_notice_display() {
    if (!is_admin() || !is_user_logged_in()) return;

    $user_id = get_current_user_id();
    $today = date('m-d');
    $year = date('Y');

    switch ($today) {
        case '07-03':
            $notice_key = 'digages_july_notice_0703';
            $skip_until = get_user_meta($user_id, $notice_key . '_skip', true);
            if ($skip_until && strtotime($skip_until) > current_time('timestamp')) return;
            if (get_transient($notice_key . '_dismiss_' . $user_id)) return;

            $dismiss_url = add_query_arg(['digages_july_action' => 'dismiss', 'notice' => '0703']);
            $skip_url = add_query_arg(['digages_july_action' => 'skip', 'notice' => '0703']); 
            include_once(plugin_dir_path(__FILE__) . 'day1.php'); 
            break;

        case '07-04':
            $notice_key = 'digages_july_notice_0704';
            $skip_until = get_user_meta($user_id, $notice_key . '_skip', true);
            if ($skip_until && strtotime($skip_until) > current_time('timestamp')) return;
            if (get_transient($notice_key . '_dismiss_' . $user_id)) return;

            $dismiss_url = add_query_arg(['digages_july_action' => 'dismiss', 'notice' => '0704']);
            $skip_url = add_query_arg(['digages_july_action' => 'skip', 'notice' => '0704']);
            include_once(plugin_dir_path(__FILE__) . 'day3.php'); 
            break;

        case '07-05':
            $notice_key = 'digages_july_notice_0705';
            $skip_until = get_user_meta($user_id, $notice_key . '_skip', true);
            if ($skip_until && strtotime($skip_until) > current_time('timestamp')) return;
            if (get_transient($notice_key . '_dismiss_' . $user_id)) return;

            $dismiss_url = add_query_arg(['digages_july_action' => 'dismiss', 'notice' => '0705']);
            $skip_url = add_query_arg(['digages_july_action' => 'skip', 'notice' => '0705']);
            include_once(plugin_dir_path(__FILE__) . 'day2.php'); 
            break;

        case '07-06':
            $notice_key = 'digages_july_notice_0706';
            $skip_until = get_user_meta($user_id, $notice_key . '_skip', true);
            if ($skip_until && strtotime($skip_until) > current_time('timestamp')) return;
            if (get_transient($notice_key . '_dismiss_' . $user_id)) return;

            $dismiss_url = add_query_arg(['digages_july_action' => 'dismiss', 'notice' => '0706']);
            $skip_url = add_query_arg(['digages_july_action' => 'skip', 'notice' => '0706']);
            include_once(plugin_dir_path(__FILE__) . 'day4.php'); 
            break;

        default:
        
            // Not July 2–5
            return;
    }
}

function digages_july_notice_handle_action() {
    if (!is_admin() || !is_user_logged_in()) return;

    $user_id = get_current_user_id();
    $action = isset($_GET['digages_july_action']) ? sanitize_text_field($_GET['digages_july_action']) : '';
    $notice_day = isset($_GET['notice']) ? sanitize_text_field($_GET['notice']) : '';

    $valid_days = ['0703', '0704', '0705', '0706'];
    if (!in_array($notice_day, $valid_days, true)) return;

    $notice_key = 'digages_july_notice_' . $notice_day;

    if ($action === 'dismiss') {
        // Temporary dismiss until next page load (or short timeout)
        set_transient($notice_key . '_dismiss_' . $user_id, true, 60 * 10); // 10 mins
        wp_redirect(remove_query_arg(['digages_july_action', 'notice']));
        exit;
    }

    if ($action === 'skip') {
        // Skip until the same day next year
        $next_year_date = (date('Y') + 1) . '-' . substr($notice_day, 0, 2) . '-' . substr($notice_day, 2);
        update_user_meta($user_id, $notice_key . '_skip', $next_year_date);
        wp_redirect(remove_query_arg(['digages_july_action', 'notice']));
        exit;
    }
}
