<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$logo = plugins_url('../assets/img/logo1.svg', __FILE__); 
?>
<div class="digages-onboard-main-container digages-fade-in" id="digages-content">
<div>
<?php
// phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
?>
<img class="digages-onboard-logo" src="<?php echo esc_url($logo) ?>" alt="logo">
<?php
// phpcs:enable
?>
</div>

<div class="digages-onboard-mainnewconta">

<div class="digages-onboard-headertxt">
Welcome to Direct Payments for Woocommerce
</div>
<div class="digages-onboard-newconta">
<div class="digages-onboard-newtxt">
We’re thrilled to have you on board! Follow the setup wizard, and you’ll be ready to start receiving direct payments in no time.
</div>
<div>
    <button class="digages-onboard-launchbtn" data-page='interests'>Launch Setup Wizard</button> 
</div>

<div class="digages-onboard-skip-setup">
<a href='./plugins.php' class="digages-onboard-skip-setup">Skip guided setup</a>
</div>


</div>

<div class="digages-onboard-agree">

    <label class="digages-onboard-checkbox-container digages-onboard-checkbox-containerdataus">
        <input type="checkbox" id="digages_data_usage_checkbox" checked>
        <span class="digages-onboard-checkmark"></span>
        <span class="digages-onboard-text">
            I agree to share my usage data to help improve Direct Payments for WooCommerce for everyone.
        </span>
    </label>

</div>




    

</div>