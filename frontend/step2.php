<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$nonce = wp_create_nonce('digages_add_order_to_cart_nonce');
$image_upl = plugins_url('../assets/img/uploimg.svg', __FILE__); 
?>
<div class="conta step digage_stylenone" id="step2" ><!-- side bar -->
<div class="rowt rowt-colts-auto">
<div class="colt yusd digages_popmodal allbtn digages_hidden"> <!-- side tab -->
<div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1 btnx">
<div class="colt d-sm-none"> 
<div class="modal-headerx modhe">
<div class="container text-center">
<div class="rowt">
<div class="colt-10 text-start urtmidkk">Direct Payments</div>
<div class="colt-2t xcsxt"><i class="bi bi-x ticonduzs digages_add-order-to-cart-button" data-nonce="<?php echo esc_attr($nonce); ?>"></i></div>
</div>
</div> 
</div>
</div>
<div class="colt ppsjzzx trstxt d-sm-none">Usa uno de los métodos de pago a continuación para pagar <b><span class="digages-woodp-order-currency"></span><span class="digages-woodp-order-amount"></span></b> para el pedido #<b><span class="orderNumberDisplay"></span></b></div>
<div class="colt rsdsd text-start lpllx d-none d-sm-block">PAGAR CON</div>
<div class="colt nav-pills tab-contentm" id="myTab" role="tablist">
<div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
<?php 
$activeSet = false; // Track if an active option has been set
// Bank Transfer
if (isset($options['enable_bank_transfers']) && $options['enable_bank_transfers'] === 'yes') { 
$activeSet = true; // Set active since Bank Transfer is enabled
?>
<div class="colt">
<a class="nav-linkt active" id="tab-bank" data-bs-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="true">
<div class="rowt">
<div class="colt">
<div class="tumaz_mob_tab_menu">Bank Transfer<span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span>
</div>
</div> 
</div>
</a>
</div>
<?php } 
//<!-- Mobile Money -->
?>
<?php if (isset($options['enable_mobile_money']) && $options['enable_mobile_money'] === 'yes') { ?>
<div class="colt">
<a class="nav-linkt <?php echo !$activeSet ? 'active' : ''; ?>" id="tab-mobile" data-bs-toggle="tab" href="#mobile" role="tab" aria-controls="mobile" aria-selected="<?php echo !$activeSet ? 'true' : 'false'; ?>">
<div class="rowt"> 
<div class="colt">
<div class="tumaz_mob_tab_menu">Mobile Money<span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span></div>
</div> 
</div>
</a>
</div>
<?php 
if (!$activeSet) $activeSet = true; // Set as active if Bank Transfer isn't available
} 
//<!-- crypto Money -->
?>
<?php if (isset($options['enable_crypto_money']) && $options['enable_crypto_money'] === 'yes') { ?>
<div class="colt">
<a class="nav-linkt <?php echo !$activeSet ? 'active' : ''; ?>" id="tab-crypto" data-bs-toggle="tab" href="#crypto" role="tab" aria-controls="crypto" aria-selected="<?php echo !$activeSet ? 'true' : 'false'; ?>">
<div class="rowt"> 
<div class="colt">
<div class="tumaz_mob_tab_menu">Crypto<span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span></div>
</div> 
</div>
</a>
</div>
<?php 
if (!$activeSet) $activeSet = true; // Set as active if Bank Transfer isn't available
} 
//<!-- P2P Payments -->
?>
<?php if (isset($options['enable_p2p_payments']) && $options['enable_p2p_payments'] === 'yes') { ?>
<div class="colt">
<?php
$p2pAccounts = get_option('digages_direct_p2p_accounts');
if (is_array($p2pAccounts) && !empty($p2pAccounts)) {
foreach ($p2pAccounts as $p2p) { 
?>
<a class="nav-linkt <?php echo !$activeSet ? 'active' : ''; ?>" id="tab-p2p-<?php echo esc_attr(str_replace(' ', '-', $p2p['p2p_name'])); ?>" data-bs-toggle="tab" href="#p2p-<?php echo esc_attr(str_replace(' ', '-', $p2p['p2p_name'])); ?>" role="tab" aria-controls="p2p-<?php echo esc_attr(str_replace(' ', '-', $p2p['p2p_name'])); ?>" aria-selected="<?php echo !$activeSet ? 'true' : 'false'; ?>">
<div class="rowt">
<div class="colt">
<div class="tumaz_mob_tab_menu">
<?php echo esc_html($p2p['p2p_name']); ?>
<span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span>
</div>
</div>
</div>
</a>
<?php 
if (!$activeSet) $activeSet = true; // Set as active if no previous method was active
}
} ?>
</div>
<?php } ?>
</div>
</div>
</div> 
</div> 
<div class="colt digages_popmodal2 llks"><!-- side tab ends --><!-- Content section -->
<div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
<div class="colt d-sm-none"> 
<div class="modal-headerx modheq">
<div class="rowt">
<div class="colt-10 text-start urtmidkk">
<span class="mobhedtumaz">
<?php
// Determine the active payment method name
$activePaymentMethod = null;
if (isset($options['enable_bank_transfers']) && $options['enable_bank_transfers'] === 'yes') {
$activePaymentMethod = 'Bank Transfer';
} elseif (isset($options['enable_mobile_money']) && $options['enable_mobile_money'] === 'yes') {
$activePaymentMethod = 'Mobile Money';
}
 elseif (isset($options['enable_crypto_money']) && $options['enable_crypto_money'] === 'yes') {
$activePaymentMethod = 'Cryptocurrency';
}
elseif (isset($options['enable_p2p_payments']) && $options['enable_p2p_payments'] === 'yes') {
// For P2P, get the exact account name
$p2pAccounts = get_option('digages_direct_p2p_accounts');
if (is_array($p2pAccounts) && !empty($p2pAccounts)) {
$activePaymentMethod = $p2pAccounts[0]['p2p_name']; // Use the first P2P account's name
}
}
// Print the active payment method name
echo esc_html($activePaymentMethod);
?>
</span>
</div>
<div class="colt-2t xcsxt text-center ticonduzs"><i class="bi bi-x digages_add-order-to-cart-button" data-nonce="<?php echo esc_attr($nonce); ?>"></i></div>
</div>
</div> 
</div>
<div class="colt dvvcsb"><!-- Top details -->
<div class="rowt">
<div class="colt-12 text-center xzzs">
<div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
<div class="colt tumaz_paaeer">Pay <span class="ppurl"><span class="digages-woodp-order-currency"></span><span class="digages-woodp-order-amount"></span></span></div>
<div class="colt dvvcs text-truncate"><span class="tumaz_displayEmail"></span></div>
</div>
</div>
</div>
</div> 
<div class="lpll"></div>
<div class="colt tab-content" id="myTabContent"><!-- Top details ends --><!-- Payment details --><!-- Bank transfer content --> 
<div class="ppsj trstxt">Sube  tu comprobante de pago a continuación - recibo o captura de pantalla. Verificaremos y confirmaremos tu pago pronto.</div> 
<div class="text-start kflsqq ppsj2">
<div class="trstxt rettds" id="file-upload-error"></div>
<div class="upload-container">
<div class="image-placeholder kfls" id="imagePreviewi">
<?php
// phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
?>
<img class="kfls digage_popimgsize" src="<?php echo esc_url($image_upl) ?>" alt="Placeholder">
<?php
// phpcs:enable
?>
</div>
<div class="rowt">
<!-- show uploaded img -->
<div class="colt-2t">
<div class="image-placeholder kflsqq" id="imagePreview">
<?php
// phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
?>
<img class="kfls digagagesuploadimg" id="previewImage" src="">
<?php
// phpcs:enable
?>
</div>
</div>
<div class="colt-10 d-flex align-items-center" id="uploadDetails" style="display: none;"><!-- show uploaded image --><!-- Image details -->
<div class="rowt uploaddetailsww"><!-- Image name -->
<div class="colt-11 text-start digages-leftpad">
<span id="fileName" style="font-weight: 400;font-size: 12px;line-height: 20px;color: #2C3338;"></span>
</div>
<div class="colt-1"></div><!-- Progress bar and x -->
<div class="colt-12 digages-leftpad" id="progressWrapper" style="display: none;">
<div class="rowt"> 
<div class="colt-10 text-start">
<progress id="uploadProgress" value="10" max="100" style=" border-radius: 6px;height: 6px;"></progress>
</div>
<div class="colt-2t d-flex align-items-center">
<span id="cancelUpload" class="cancel-icon" style="cursor: pointer;margin-top:-15px;"><i class="bi bi-x-lg"></i></span>
</div>
</div> 
</div><!-- Progress bar and x --><!-- after upload image size and delete icon -->
<div class="colt-12 digages-leftpad">
<div class="rowt"> 
<div class="colt-10 text-start">
<div id="fileSize" style="display: none;font-weight: 400;font-size: 12px;line-height: 16px;color: #8C8F94;"></div>
</div>
<div class="colt-2t d-flex align-items-center">
<span id="deleteUpload" class="delete-icon" style="display: none; cursor: pointer;margin-top:-15px;"><span class="icon-trash"></span></span>
</div>
</div> 
</div><!-- after upload image size and delete icon -->
</div>
</div><!-- image details -->
</div><!---->
<label class="file-input-container" for="screenshotFile">
<input type="file" class="form-control digage_stylenone" id="screenshotFile" accept="image/*" required>
<div class="text-center iiopsimg">
<div class="rowt">
<div class="colt">
<div class="tumaz_mob_tab_menu2">
<span class="tumaz_mob_tab_menu_start2">
<i class="bi bi-arrow-bar-up"></i>
<span class="chtxtdrc">Elegir archivo&nbsp;&nbsp;&nbsp;</span>
</span>
<span class="tumaz_mob_tab_menu_end2 text-end">Tamaño máximo: 10MB</span>
</div>
</div>
</div>
</div>
</label><!---->
</div>
</div> 
</div>
<div class="colt kflsm imageprocess"><!-- Navigation Buttons for Step 2 -->
<button type="button" class="ppopbtnq" id="sendimagedetails" disabled>Enviar para confirmación</button></div>
</div>
<div class="colt text-center qqwqm">
<span class="trstxt crtts digage_stylecursor" id="backToStep1" >Mostrar detalles de la cuenta</span> 
</div> 
<div class="colt text-center qqwqm kllftyesp ppsjqq"> 
<div class="trstxt rettds digagesuploaderror"></div>
</div> 
</div>
</div>
</div>