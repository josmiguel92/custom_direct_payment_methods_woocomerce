<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$logo = plugins_url('../assets/img/logo1.svg', __FILE__); 
?>
<div class="digages-onboard-main-container" id="digages-content">
<div class="digages-onboard-progress1"></div>
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

<div class=""><a href='#' data-page='available' class="digages-onboard-skip-setup-top">Skip guided setup</a></div>
</div>

 

<div class="digages-onboard-mainnewconta">

<div class="digages-onboard-headertxt">
What features of Direct Payments for WooCommerce drive your interest?
</div>
<div class="digages-onboard-newconta">
<div class="digages-onboard-newtxt">
Select the features that interest you most. This helps us understand what matters most to you and improve your experience.
</div> 

<!-- choose interest -->

    <div class="digages-intrest-check-container digages-intrest-check-containeryyt">
        <div class="digages-intrest-check-option">
            <input type="checkbox" id="p2p" name="p2p" >
            <label class="digages-intrest-check-label" for="p2p">
                <div class="digages-intrest-check-custom-checkbox"></div>
                Peer-to-Peer (P2P) Payments
            </label>
        </div>
        <div class="digages-intrest-check-option">
            <input type="checkbox" id="quick" name="quick">
            <label class="digages-intrest-check-label" for="quick">
                <div class="digages-intrest-check-custom-checkbox"></div>
                Quick setup
            </label>
        </div>
        <div class="digages-intrest-check-option">
            <input type="checkbox" id="mobile" name="mobile">
            <label class="digages-intrest-check-label" for="mobile">
                <div class="digages-intrest-check-custom-checkbox"></div>
                Mobile Money
            </label>
        </div>
        
        <div class="digages-intrest-check-option">
            <input type="checkbox" id="bank" name="bank">
            <label class="digages-intrest-check-label" for="bank">
                <div class="digages-intrest-check-custom-checkbox"></div>
                Bank Transfers
            </label>
        </div>
        
        <div class="digages-intrest-check-option">
            <input type="checkbox" id="crypto" name="crypto">
            <label class="digages-intrest-check-label" for="crypto">
                <div class="digages-intrest-check-custom-checkbox"></div>
                Crypto Payments
            </label>
        </div>



        <div class="digages-intrest-check-option">
            <input type="checkbox" id="no-api" name="no-api" >
            <label class="digages-intrest-check-label" for="no-api">
                <div class="digages-intrest-check-custom-checkbox"></div>
                No API Keys
            </label>
        </div>


        
        <div class="digages-intrest-check-option">
            <input type="checkbox" id="recurring" name="recurring" >
            <label class="digages-intrest-check-label" for="recurring">
                <div class="digages-intrest-check-custom-checkbox"></div>
                Recurring Payments
            </label>
        </div>
        <div class="digages-intrest-check-option">
            <input type="checkbox" id="zero-fee" name="zero-fee">
            <label class="digages-intrest-check-label" for="zero-fee">
                <div class="digages-intrest-check-custom-checkbox"></div>
                0.0% Transaction Fees
            </label>
        </div>
        
    </div>


    <!-- Continue button -->

<div>
    <button class="digages-onboard-continuebtn digages-onboard-continuebtnweq" data-page='available'>Continue</button>
</div> 
    
</div>



    

</div>