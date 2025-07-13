<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$logo = plugins_url('../assets/img/logo1.svg', __FILE__); 
$bank= plugins_url('../assets/img/bank.svg', __FILE__); 
$crypto = plugins_url('../assets/img/crypto.svg', __FILE__); 
$mobile = plugins_url('../assets/img/mobile.svg', __FILE__); 
$p2p = plugins_url('../assets/img/p2p.svg', __FILE__); 
?>
<div class="digages-onboard-main-container" id="digages-content">
<div class="digages-onboard-progress2"></div>
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

<div class=""><a href='#' data-page='addaccountsmain' class="digages-onboard-skip-setup-top">Skip guided setup</a></div>
</div>

 

<div class="digages-onboard-mainnewconta">

<div class="digages-onboard-headertxt">
Payment methods available
</div>
<div class="digages-onboard-newconta">
<div class="digages-onboard-newtxt">
With Direct Payments for Woocommerce, you can receive payments via bank transfer, mobile money, crypto and peer-to-peer (P2P) platforms.
</div> 

<!-- choose interest -->

<div class="digages-onboard-table-container">
        <table>
            <tr>
                <th>  <span class="digages-onboard-table-item"> <span class="icon"><?php
        // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
        ?>
        <img src="<?php echo esc_url($bank) ?>" alt="logo">
        <?php
        // phpcs:enable
        ?></span> Bank Transfers </span></th>
                <td>International & Local Banks supported</td>
            </tr>
            <tr>
                <th>  <span class="digages-onboard-table-item"> <span class="icon"><?php
        // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
        ?>
        <img src="<?php echo esc_url($mobile) ?>" alt="logo">
        <?php
        // phpcs:enable
        ?></span> Mobile Money </span></th>
                <td>MTN MoMo, M-Pesa, Airtel, Vodafone, and many more</td>
            </tr>
            <tr>
                <th>  <span class="digages-onboard-table-item"> <span class="icon"><?php
        // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
        ?>
        <img src="<?php echo esc_url($crypto) ?>" alt="logo">
        <?php
        // phpcs:enable
        ?></span> Crypto </span></th>
                <td>BTC, ETH, USDT, SOL, BNB, ADA, and many more</td>
            </tr>
            <tr>
                <th>  <span class="digages-onboard-table-item"> <span class="icon"><?php
        // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
        ?>
        <img src="<?php echo esc_url($p2p) ?>" alt="logo">
        <?php
        // phpcs:enable
        ?></span> P2P Platforms </span></th>
                <td>Zelle, Venmo, PayPal, GCash, Cash App, Apple Pay, Skrill, Payoneer, Paytm, Wise, and many more</td>
            </tr>
        </table>
    </div>

    

    


    <!-- Continue button -->

<div>
    <button class="digages-onboard-continuebtn" data-page='addaccountsmain'>Continue</button>
</div> 
    

</div>



    

</div>