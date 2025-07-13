<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
function digages_plugin_notice_addaccountsmain() {
    if (get_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_addaccountsmain', true)) {
        return;
    }
$logo = plugins_url('img/logo.svg', __FILE__);  
$dismiss = plugins_url('img/dismiss.svg', __FILE__); 
$crown = plugins_url('img/crown.svg', __FILE__);   
$current_page = get_option('digages_current_page');
$valid_pages = ['addaccountsmain'];

if (in_array($current_page, $valid_pages, true)) 
    {
    ?>
    
<div class="digages-plugin-notice notice is-dismissible " style="border-left-color:  #533582 !important;padding:0 !important;">
<div class="digages-notice-container">

<div class="digages-notice-container-item1 digages-notice-container-item1ss">

<div class="digages-notice-container-item1-txt">
Direct Payments for Woocommerce Configuration • <span class="digages-notice-blue">3/5</span>
</div>
<div class="">
Click the <span class="digages-notice-blue">Add account</span> button to add your bank account, mobile money, crypto wallet address, and P2P account.
</div>

<div class="digages-notice-container-item1-btn">

<div class="">
<a href="admin.php?page=digages-woodp-onboarding"><button class="btn1">Continue Setup</button></a>
</div>
<div class="digages-notice-container-item1-btn-dismiss">
<a href="#" class="digages-dismiss-notice-addaccountsmain">
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
add_action('admin_notices', 'digages_plugin_notice_addaccountsmain');


function digages_dismiss_notice_addaccountsmain() {
    check_ajax_referer('digages-dismiss-notice', 'security');
    update_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_addaccountsmain', true);
    wp_die();
}
add_action('wp_ajax_digages_dismiss_notice_addaccountsmain', 'digages_dismiss_notice_addaccountsmain');


?>
