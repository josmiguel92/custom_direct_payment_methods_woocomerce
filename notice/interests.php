<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
function digages_plugin_notice_interests() {
    if (get_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_interests', true)) {
        return;
    }
$logo = plugins_url('img/logo.svg', __FILE__);  
$dismiss = plugins_url('img/dismiss.svg', __FILE__); 
$crown = plugins_url('img/crown.svg', __FILE__);   
$current_page = get_option('digages_current_page');
$valid_pages = ['interests'];

if (in_array($current_page, $valid_pages, true)) 
    {
    ?>
    
<div class="digages-plugin-notice notice is-dismissible " style="border-left-color:  #533582 !important;padding:0 !important;">
<div class="digages-notice-container">

<div class="digages-notice-container-item1 digages-notice-container-item1ss">

<div class="digages-notice-container-item1-txt digages-notice-container-item1ss">
Direct Payments for Woocommerce Configuration • <span class="digages-notice-blue">1/5</span>
</div>
<div class="">
Select the features that interest you most. This helps us understand what matters most to you and improve your experience.
</div>

<div class="digages-notice-container-item1-btn">

<div class="">
<a href="admin.php?page=digages-woodp-onboarding"><button class="btn1">Continue Setup</button></a>
</div>
<div class="digages-notice-container-item1-btn-dismiss">
<a href="#" class="digages-dismiss-notice-interests">
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
add_action('admin_notices', 'digages_plugin_notice_interests');



function digages_dismiss_notice_interests() {
    check_ajax_referer('digages-dismiss-notice', 'security');
    update_user_meta(get_current_user_id(), 'digages_plugin_notice_dismissed_interests', true);
    wp_die();
}
add_action('wp_ajax_digages_dismiss_notice_interests', 'digages_dismiss_notice_interests');


?>
