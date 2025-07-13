<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$logo = plugins_url('../assets/img/logo1.svg', __FILE__); 
$bank= plugins_url('../assets/img/bank.svg', __FILE__); 
$crypto = plugins_url('../assets/img/crypto.svg', __FILE__); 
$mobile = plugins_url('../assets/img/mobile.svg', __FILE__); 
$p2p = plugins_url('../assets/img/p2p.svg', __FILE__); 
$saved_bank_accounts = get_option('digages_direct_bank_accounts', array());
$saved_crypto_accounts = get_option('digages_direct_crypto_accounts', array());
$saved_mobile_accounts = get_option('digages_direct_mobile_accounts', array());
$saved_p2p_accounts = get_option('digages_direct_p2p_accounts', array());

include(plugin_dir_path(__FILE__) . 'conditions.php');
?>
<div class="digages-onboard-main-container" id="digages-content">
<div class="digages-onboard-progress4"></div>
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

<div class=""><a href='admin.php?page=wc-settings&tab=checkout&section=digages_direct_payments' class="digages-onboard-skip-setup-top">Skip guided setup</a></div>
</div>

 

<div class="digages-onboard-mainnewconta">


<div class="digages-onboard-headertxt">
Choose payment methods
</div>
<div class="digages-onboard-newconta">
<div class="digages-onboard-newtxt">
Choose the payment methods you'd like to enable to start accepting direct payments on your WooCommerce store.
</div> 

<!-- choose interest -->

    <div class="digages-intrest-check-container2">

        <div class="digages-intrest-check-option2">
            <?php 
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $bankform;?>
            <label class="<?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $bankmclass;?>" for="enable_bank_transfers">
            <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $bankminp;?>
                <div class="digages-intrest-check-label2deta">
                <div class="digages-intrest-check-label2detatxt">
                    Bank Transfers
                </div>
                <?php include(plugin_dir_path(__FILE__) . 'methods/bank.php'); ?>
                </div>
               <div class="digages-intrest-check-label2detaimg">
                        <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($bank) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
                </div>

            </label>
        </div>

        
        <div class="digages-intrest-check-option2">
        <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $mobileform;?>
            <label class="<?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $mobilemclass;?>" for="enable_mobile_money">
            <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $mobileminp;?>
                <div class="digages-intrest-check-label2deta">
                <div class="digages-intrest-check-label2detatxt">
                    Mobile Money
                </div>
                <?php include(plugin_dir_path(__FILE__) . 'methods/mobile.php'); ?>
                </div>
               <div class="digages-intrest-check-label2detaimg">
                        <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($mobile) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
                </div>

            </label>
        </div>


        
        <div class="digages-intrest-check-option2">
        <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $cryptoform;?>
            <label class="<?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $cryptomclass;?>" for="enable_crypto_money">
            <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $cryptominp;?>
                <div class="digages-intrest-check-label2deta">
                <div class="digages-intrest-check-label2detatxt">
                    Crypto
                </div>
                <?php include(plugin_dir_path(__FILE__) . 'methods/crypto.php'); ?>
                </div>
               <div class="digages-intrest-check-label2detaimg">
                        <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($crypto) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
                </div>

            </label>
        </div>


        
        <div class="digages-intrest-check-option2">
        <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $p2pform;?>
            <label class="<?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $p2pmclass;?>" for="enable_p2p_payments">
            <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $p2pminp;?>
                <div class="digages-intrest-check-label2deta">
                <div class="digages-intrest-check-label2detatxt">
                Peer-to-Peer Platform
                </div>
                <?php include(plugin_dir_path(__FILE__) . 'methods/p2p.php'); ?>
                </div>
               <div class="digages-intrest-check-label2detaimg">
                        <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($p2p) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
                </div>

            </label>
        </div>

        
    </div>

    <div class="digages-intrest-methods-wall">
        <div>
        Only <b>one (1)</b> payment method can be enabled in the Free version. 
        <a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank"> Upgrade to PRO</a> to unlock unlimited payment methods and more features.
        </div>
    </div>

    <!-- Continue button -->

<div>

<button class="digages-onboard-continuebtn2">Continue</button>

</div> 
    
</div>



    

</div>