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
 