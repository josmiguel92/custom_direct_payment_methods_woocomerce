<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
add_action('admin_enqueue_scripts', 'digages_enqueue_admin_allpages_scripts');

function digages_enqueue_admin_allpages_scripts($hook) {
    // if ($hook !== 'toplevel_page_digages-admin-page') {
    //     return;
    // }

    
wp_enqueue_script(
    'digages-admin-script-onboaard-overlaywait',
    plugin_dir_url(__FILE__) . 'onboading/assets/js/overlaywait.js',
    array('jquery'), 
    '2.0.8', 
    true
);
    wp_enqueue_script(
        'digages-admin-script-allpages',
        plugin_dir_url(__FILE__) . 'onboarding/assets/js/allpages.js',
        array('jquery'), 
        '2.0.8', 
        true
    );

    // Localize script for AJAX 
    wp_localize_script('digages-admin-script-allpages', 'digages_admin_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('digages_nonce')
    ));

}
