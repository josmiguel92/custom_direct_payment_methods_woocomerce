<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
function digages_plugin_notice_home() {
    if (get_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_home', true)) {
        return;
    }
$logo = plugins_url('img/logo.svg', __FILE__);  
$dismiss = plugins_url('img/dismiss.svg', __FILE__); 
$crown = plugins_url('img/crown.svg', __FILE__);   
$current_page = get_option('digages_current_page');
$valid_pages = ['success', 'interests', 'available', 'addaccountsmain', 'methods'];

if (!in_array($current_page, $valid_pages, true)) 
    {
    ?>
    
<div class="digages-plugin-notice notice is-dismissible " style="border-left-color:  #533582 !important;padding:0 !important;">
<div class="digages-notice-container">

<div class="digages-notice-container-item1 digages-notice-container-item1ss">

<div class="digages-notice-container-item1-txt">
Direct Payments for Woocommerce Configuration • <span class="digages-notice-blue">0/5</span>
</div>
<div class="">
We’re thrilled to have you on board! Follow the setup wizard, and you’ll be ready to start receiving direct payments in no time.
</div>

<div class="digages-notice-container-item1-btn">

<div class="">
<a href="admin.php?page=digages-woodp-onboarding"><button class="btn1">Continue Setup</button></a>
</div>
<div class="digages-notice-container-item1-btn-dismiss">
<a href="#" class="digages-dismiss-notice-home">
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
add_action('admin_notices', 'digages_plugin_notice_home');


function digages_dismiss_notice_home() {
    check_ajax_referer('digages-dismiss-notice', 'security');
    update_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_home', true);
    wp_die();
}
add_action('wp_ajax_digages_dismiss_notice_home', 'digages_dismiss_notice_home');


?>
