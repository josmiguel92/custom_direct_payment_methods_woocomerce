<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$logo = plugins_url('../../assets/img/logo1.svg', __FILE__); 
$bank= plugins_url('../../assets/img/bank.svg', __FILE__); 
$crypto = plugins_url('../../assets/img/crypto.svg', __FILE__); 
$mobile = plugins_url('../../assets/img/mobile.svg', __FILE__); 
$p2p = plugins_url('../../assets/img/p2p.svg', __FILE__);


$banklimits = count($saved_bank_accounts); 
$mobilelimits = count($saved_mobile_accounts);
$cryptolimits = count($saved_crypto_accounts);
$p2plimits = count($saved_p2p_accounts);

$bankclass = '';

if($banklimits > 0)
{
    $bankclass = 'class="digages-onboard-addacnt-popup-paywall-acnt-optact2"';
}
else
{
    $bankclass = 'class="digages-onboard-addacnt-popup-paywall-acnt-optact digages-onboard-addacnt-popup-trigger" data-target="banktransfer"';
}

if($mobilelimits > 0)
{
    $mobileclass = 'class="digages-onboard-addacnt-popup-paywall-acnt-optact2"';
}
else
{
    $mobileclass = 'class="digages-onboard-addacnt-popup-paywall-acnt-optact digages-onboard-addacnt-popup-trigger" data-target="mobile"';
}

if($cryptolimits > 0)
{
    $cryptoclass = 'class="digages-onboard-addacnt-popup-paywall-acnt-optact2"';
}
else
{
    $cryptoclass = 'class="digages-onboard-addacnt-popup-paywall-acnt-optact digages-onboard-addacnt-popup-trigger" data-target="crypto"';
}

if($p2plimits > 0)
{
    $p2pclass = 'class="digages-onboard-addacnt-popup-paywall-acnt-optact2"';
}
else
{
    $p2pclass = 'class="digages-onboard-addacnt-popup-paywall-acnt-optact digages-onboard-addacnt-popup-trigger" data-target="peer"';
}


?>
<div class="digages-onboard-addacnt-popup-container-adjust">

<div class="digages-onboard-addacnt-popup-overlay"></div>
    
    <div class="digages-onboard-addacnt-popup-container" id="paywall">
        <div class="digages-onboard-addacnt-popup-header">
                <div class="digages-onboard-addacnt-popup-headtxt">Add Account</div>
                <div>
                    <span class="digages-onboard-addacnt-popup-required">
                        <span class="digages-onboard-addacnt-popup-required-red">*</span> are required
                    </span>
                    <span class="digages-onboard-addacnt-popup-close">&times;</span>
                </div>
        </div>
        <div class="digages-onboard-addacnt-popup-content2 ">

            <div class="digages-onboard-addacnt-popup-input-containtxt1 digages-onboard-addacnt-popup-content3"> 
            Free users can add <b>one (1) wallet address.</b> <a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank">Upgrade to PRO</a> for unlimited accounts. Add other payment methods below.
            </div>
            
            <div class="digages-onboard-addacnt-popup-content4">

            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-paywall-acnt digages-onboard-addacnt-popup-content3">
                <div <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $bankclass;?>>
                <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($bank) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
                    <div> Bank Transfers </div>
                </div> 

                
                <div <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $mobileclass;?>>
                <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($mobile) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
                    <div> Mobile Money </div>
                </div>

            </div>
            
            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-paywall-acnt">
                <div <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $cryptoclass;?>>
                <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($crypto) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
                    <div> Crypto </div>
                </div>

                
                <div <?php  
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $p2pclass;?>>
                <?php
                    // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                    ?>
                    <img src="<?php echo esc_url($p2p) ?>" alt="logo">
                    <?php
                    // phpcs:enable
                    ?>
                    <div> P2P Platform </div>
                </div>
                
            </div>

</div>


<div class="digages-onboard-addacnt-popup-content3">
            <!-- currency -->
            <div class="digages-onboard-paywallbold">
            Upgrade to PRO:
            </div>

            <!-- platform name -->
            <div class="digages-onboard-paywallboltxt">
            Add unlimited accounts and unlock more features like:
            </div>
            

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-footer2">
            <span><i class="bi bi-check-circle-fill digages-onboard-addacntgreen"></i> </span>  
            <span class="digages-onboard-addacnt-popup-input-containtxt2">Unlimited Payment Methods</span>
            </div>

            
            <div class="digages-onboard-addacnt-popup-footer2">
            <span><i class="bi bi-check-circle-fill digages-onboard-addacntgreen"></i> </span>   
            <span class="digages-onboard-addacnt-popup-input-containtxt2">Email Payment Confirmation</span>
            </div>

            
            <div class="digages-onboard-addacnt-popup-footer2">
            <span><i class="bi bi-check-circle-fill digages-onboard-addacntgreen"></i> </span>    
            <span class="digages-onboard-addacnt-popup-input-containtxt2">Customize Payment Popup Colors</span>
            </div>

            
            <div class="digages-onboard-addacnt-popup-footer2">
            <span><i class="bi bi-check-circle-fill digages-onboard-addacntgreen"></i> </span>  
            <span class="digages-onboard-addacnt-popup-input-containtxt2">Premium Support - 
                Fix all compatibility issues, request features e.t.c
                </span>
            </div>
      
            <div class="digages-onboard-addacnt-popup-input-containpdm"></div>
</div>
            
        </div>
        <div class="digages-onboard-addacnt-popup-footer">
                <div>
                <a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank" style="text-decoration: none;"> <button class="digages-onboard-addacnt-popup-save">Upgrade to PRO</button></a>
                </div>
                <div class="">
                    <button class="digages-onboard-addacnt-popup-cancel digages-onboard-addacnt-popup-close">Close</button>
                </div>
        </div>
    </div>
    
</div>