<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
function digages_notice_enqueue_admin_scripts($hook) {
    // if ($hook !== 'index.php') {
    //     return;
    // }

    wp_enqueue_style('digages-notice-css', plugin_dir_url(__FILE__) . 'css/notice.css', array(), '2.0.8', 'all');
    wp_enqueue_script('digages-admin-script', plugin_dir_url(__FILE__) . 'js/digages-admin.js', ['jquery'], '2.0.8', true);
    wp_localize_script('digages-admin-script', 'digagesAdmin', [
        'ajaxurl'  => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('digages-dismiss-notice')
    ]);
}
add_action('admin_enqueue_scripts', 'digages_notice_enqueue_admin_scripts');
?>