<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$logo = plugins_url('../../notice/img/logo.svg', __FILE__);  
$dismiss = plugins_url('../../notice/img/dismiss.svg', __FILE__); 
$crown = plugins_url('../../notice/img/crown.svg', __FILE__);   
?>

<div class="digages-plugin-notice notice is-dismissible " style="border-left-color:  #533582 !important;padding:0 !important;">
<div class="digages-notice-container">

<div class="digages-notice-container-item1">

<div class="digages-notice-container-item1-txt">
🔥 Last Call for Liberty Savings: Save 50% Now!
</div>
<div class="">
Celebrate the 4th of July with 50% off. Enjoy multiple payment methods, email payment confirmations, and so much more. Upgrade to PRO today at an unbeatable rate!
</div>

<div class="digages-notice-container-item1-btn">
<div class="">
<a href="https://digages.com/?fluentcrm=1&route=smart_url&slug=cl67vd8" target="_blank">
<button type="button" class="btn1">
<div>
Get 50% Discount
</div>
</button></a>
</div>
<div class="">
<a href="<?php echo esc_url($skip_url);?>" ><button class="btn2">Maybe Later</button></a>
</div>
<div class="digages-notice-container-item1-btn-dismiss">
<a href="<?php echo esc_url($dismiss_url);?>" class="digages-dismiss-notice-firstpay">
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


<!--  -->
 