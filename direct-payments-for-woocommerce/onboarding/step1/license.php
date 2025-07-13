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
Activate your license
</div>
<div class="digages-onboard-newconta">
<div class="digages-onboard-newtxt">
Enter the license key from your 
<a href="https://digages.com/my-account/license/" target="_blank">License</a> 
page below. If you can’t find the key after your PRO purchase, 
<a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=chdzxb" target="_blank">
    please create a support ticket.</a>
</div> 

<!-- choose interest -->

    <div class="digages-intrest-check-containerm">
        <div>
            <input type="text" class="digages-licensekey-input" id="p2p" name="p2p" >
        </div>


    <!-- Continue button -->

<div>
    <button class="digages-onboard-continuebtn digages-onboard-continuebtnweq" data-page='available'>Continue</button>
</div> 
    
</div>



    

</div>