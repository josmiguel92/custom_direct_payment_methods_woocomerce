<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php

$logo = plugins_url('../assets/img/logo1.svg', __FILE__); 
$bank= plugins_url('../assets/img/bank.svg', __FILE__); 
$crypto = plugins_url('../assets/img/crypto.svg', __FILE__); 
$mobile = plugins_url('../assets/img/mobile.svg', __FILE__); 
$p2p = plugins_url('../assets/img/p2p.svg', __FILE__); 

// Fetch saved bank accounts from the database or settings
$saved_bank_accounts = get_option('digages_direct_bank_accounts', array());
$saved_crypto_accounts = get_option('digages_direct_crypto_accounts', array());
$saved_mobile_accounts = get_option('digages_direct_mobile_accounts', array());
$saved_p2p_accounts = get_option('digages_direct_p2p_accounts', array());
$limits = count($saved_bank_accounts) + count($saved_mobile_accounts) + count($saved_crypto_accounts) + count($saved_p2p_accounts);

if($limits == 1)
{
    $bg1 = '1';
    $bg2 = '0';
    $bg3 = '0';
    $bg4 = '0';
}
elseif($limits == 2)
{
    $bg1 = '1';
    $bg2 = '2';
    $bg3 = '0';
    $bg4 = '0'; 
}
elseif($limits == 3)
{
    $bg1 = '1';
    $bg2 = '2';
    $bg3 = '3';
    $bg4 = '0'; 
}
elseif($limits >= 4)
{
    $bg1 = '1';
    $bg2 = '2';
    $bg3 = '3';
    $bg4 = '4'; 
}
else
{
    $bg1 = '0';
    $bg2 = '0';
    $bg3 = '0';
    $bg4 = '0'; 
}
include(plugin_dir_path(__FILE__) . 'bank/paywall.php'); 

?>
<div class="digages-onboard-main-container" id="digages-content">
<div class="digages-onboard-progress3"></div>
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
Add your accounts
</div>
<div class="digages-onboard-newconta">
<div class="digages-onboard-newtxt">
Click the <span class="digages-onboard-addacntbold">Add account</span> button to add your bank account, mobile money, crypto wallet address, and P2P account.
</div> 

<!-- choose interest -->


    <style>
    </style>

    <div> 

        <div class="digages-onboard-addacnt-info">
            <span>Type: <strong>Free</strong></span>
            <span>
        <div class="digages-onboard-addacnt-infofill" >
            <div class="digages-onboard-addacnt-infofillitemfr"></div> 
            <div class="digages-onboard-addacnt-infofillitem digages-onboard-addacnt-infofillitembg<?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $bg1;?> digages-onboard-addacnt-infofillitemfr"></div> 
            <div class="digages-onboard-addacnt-infofillitem digages-onboard-addacnt-infofillitembg<?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $bg2;?>"></div> 
            <div class="digages-onboard-addacnt-infofillitem digages-onboard-addacnt-infofillitembg<?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $bg3;?>"></div> 
            <div class="digages-onboard-addacnt-infofillitem2 digages-onboard-addacnt-infofillitembg<?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $bg4;?>"></div>
        </div></span>
            <span>Limits: <strong><?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $limits;?>/4 accounts</strong></span>
        </div>
        
        <details class="digages-onboard-addacnt-checked" open>
            <summary> 
                <div class="digages-onboard-addacnt-summarytxtalign"><div class="digages-onboard-addacnt-radio" onclick="toggleRadio(event, this)"></div> <div>Bank Accounts</div></div> 
                <div class="digages-onboard-addacnt-summarytxtalign2"><div class="digages-onboard-addacnt-count"><?php echo count($saved_bank_accounts);?></div><div class="digages-onboard-addacnt-chevron"></div></div> 
                </summary> 
            <?php include(plugin_dir_path(__FILE__) . 'bank/addeddetails.php'); ?>
            <?php include(plugin_dir_path(__FILE__) . 'bank/add.php'); ?>
            <?php include(plugin_dir_path(__FILE__) . 'bank/edit.php'); ?>
            
        </details>
        
        <details>
            <summary> 
                <div class="digages-onboard-addacnt-summarytxtalign"><div class="digages-onboard-addacnt-radio" onclick="toggleRadio(event, this)"></div> <div>Mobile Money Accounts</div></div> 
                <div class="digages-onboard-addacnt-summarytxtalign2"><div class="digages-onboard-addacnt-count"><?php echo count($saved_mobile_accounts);?></div><div class="digages-onboard-addacnt-chevron"></div></div> 
            </summary>
            <?php include(plugin_dir_path(__FILE__) . 'mobile/addeddetails.php'); ?>
            <?php include(plugin_dir_path(__FILE__) . 'mobile/add.php'); ?>
            <?php include(plugin_dir_path(__FILE__) . 'mobile/edit.php'); ?>
        </details>
        
        <details>
            <summary> 
                <div class="digages-onboard-addacnt-summarytxtalign"><div class="digages-onboard-addacnt-radio" onclick="toggleRadio(event, this)"></div> <div>Crypto Wallet Addresses</div></div> 
                <div class="digages-onboard-addacnt-summarytxtalign2"><div class="digages-onboard-addacnt-count"><?php echo count($saved_crypto_accounts);?></div><div class="digages-onboard-addacnt-chevron"></div></div> 
            </summary>
            
            <?php include(plugin_dir_path(__FILE__) . 'crypto/addeddetails.php'); ?>
            <?php include(plugin_dir_path(__FILE__) . 'crypto/add.php'); ?>
            <?php include(plugin_dir_path(__FILE__) . 'crypto/edit.php'); ?>
        </details>
        
        <details>
            <summary> 
                <div class="digages-onboard-addacnt-summarytxtalign"><div class="digages-onboard-addacnt-radio" onclick="toggleRadio(event, this)"></div> <div>Peer-to-Peer (P2P) Accounts</div></div> 
                <div class="digages-onboard-addacnt-summarytxtalign2"><div class="digages-onboard-addacnt-count"><?php echo count($saved_p2p_accounts);?></div><div class="digages-onboard-addacnt-chevron"></div></div> 
            </summary>
            
            <?php include(plugin_dir_path(__FILE__) . 'p2p/addeddetails.php'); ?>
            <?php include(plugin_dir_path(__FILE__) . 'p2p/add.php'); ?>
            <?php include(plugin_dir_path(__FILE__) . 'p2p/edit.php'); ?>
        </details>
        
    </div> 

    
    
    

    <!-- Continue button -->

<div>
    <button class="digages-onboard-continuebtn" data-page='methods'>Continue</button>
</div> 
    

</div>


    

</div>
