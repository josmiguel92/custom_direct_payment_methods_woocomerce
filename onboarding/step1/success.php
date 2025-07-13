<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$logo = plugins_url('../assets/img/logo1.svg', __FILE__); 
$thumb = plugins_url('../assets/img/thumb.svg', __FILE__); 
$settings = plugins_url('../assets/img/settings.svg', __FILE__); 
?>
<div class="digages-onboard-main-container" id="digages-content">
<div class="digages-onboard-progress5"></div>
<div class="digages-onboard-container-topme">
    
        <div class="">
        <div class="digages-onboard-logo-part-container">
        <div class=""><?php
        // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
        ?>
        <img class="digages-onboard-logo-top" src="<?php echo esc_url($logo) ?>" alt="logo">
        <?php
        // phpcs:enable
        ?></div>
        <div class="digages-onboard-logo-part">Direct Payments</div>
        </div>
        </div>

<div class="">
    <a href='admin.php?page=wc-settings&tab=checkout&section=digages_direct_payments' class="digages-onboard-skip-setup-top">Return to Dashboard</a>
</div>
</div>

 

<div class="digages-onboard-mainnewconta">
<div>
    
<?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($thumb) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
</div> 

<div class="digages-onboard-headertxt">
Success! Direct Payments for Woocommerce is enabled
</div>
<div class="digages-onboard-newconta">
<div class="digages-onboard-newtxt">
Congratulations! You can now start receiving direct payments. You can order to test the checkout process or customize further in settings.
</div> 

<!-- choose interest -->

    <div class="digages-intrest-check-container3">
    <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" target="_blank" class="digages-success-btn-checkouta">
        <button class="digages-success-btn-checkout">Test Checkout</button>
    </a>
    <a href="admin.php?page=wc-settings&tab=checkout&section=digages_direct_payments" target="_blank" class="digages-success-btn-checkouta">
        <button class="digages-success-btn-other">
        <?php
        // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
        ?>
        <img src="<?php echo esc_url($settings) ?>" >
        <?php
        // phpcs:enable
        ?> Settings</button></a>
        <?php
            $nonce = wp_create_nonce('digages_direct_payments_nonce');
            echo '<a href="' . esc_url(add_query_arg(['page' => 'direct-payments-about', '_wpnonce' => $nonce], admin_url('admin.php'))) . '" target="_blank" class="digages-success-btn-checkouta" ><button class="digages-success-btn-other">Help Center</button></a>';
        ?>
    </div>

    <div class="digages-intrest-check-container3">
        <div class="digages-success-txts">
        <a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=cheb2o4" target="_blank">Write a review</a> <span class="digages-intrest-methods-wall-txtp2">★</span>  &nbsp;|&nbsp;  
        by <a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=chef3u9" target="_blank">Digages</a>  &nbsp;|&nbsp;  
        <a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=chdzu49" target="_blank">How to Confirm or Cancel Direct Payments</a>  &nbsp;|&nbsp;  
        <a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=chdztm8" target="_blank">Free vs PRO</a>  &nbsp;|&nbsp;  
        <a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=chdzm95" target="_blank">How to Fix Website Compatibility Issues</a>  &nbsp;|&nbsp;  
        <a href="https://digages.com/docs/" target="_blank">Docs</a>
        </div>
    </div>


    <div class="digages-intrest-methods-wall">
        <div class="digages-intrest-methods-wall-txtp">
        Unlock the full power of Direct Payments for WooCommerce. Get <b>10% off</b> your PRO upgrade today.
        </div> 
        <a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank" class="digages-success-btn-checkouta">
            <button class="digages-success-btn-off">Get 10% off</button> </a>
    </div>

    <!-- Continue button -->

<!-- <div>
    <button class="digages-onboard-continuebtn" data-page='available'>Continue</button>
</div>  -->
    
</div>



    

</div>