<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$nonce = wp_create_nonce('digages_add_order_to_cart_nonce');
?>
<div class="conta step digage_stylenone" id="step4" ><!-- side bar -->
<div class="rowt rowt-colts-auto"><!-- side tab -->
<div class="colt yusd digages_popmodal allbtn digages_hidden"> 
<div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1 btnx">
<div class="colt d-sm-none"> 
<div class="modal-headerx modhe">
<div class="container text-center">
<div class="rowt">
<div class="colt-10 text-start urtmidkk">Pagos directos</div>
<div class="colt-2t xcsxt"><i class="bi bi-x ticonduzs tumaz_closeModalIcon" data-bs-dismiss="modal" aria-label="Close"></i></div>
</div>
</div> 
</div>
</div>
<div class="colt ppsjzzx trstxt d-sm-none">Usa uno de los métodos de pago a continuación para pagar <b><span class="digages-woodp-order-currency"></span><span class="digages-woodp-order-amount"></span></b> para el pedido #<b><span class="orderNumberDisplay"></span></b></div>
<div class="colt rsdsd text-start lpllx d-none d-sm-block">PAGAR CON</div>
<div class="colt nav-pills tab-contentm" id="myTab" role="tablist">
<div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
<?php if (isset($options['enable_bank_transfers']) && $options['enable_bank_transfers'] === 'yes') { ?>
<div class="colt">
<a class="nav-linkt active" id="tab-bank" data-bs-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="true">
<div class="rowt">
<div class="colt">
<div class="tumaz_mob_tab_menu">Bank Transfer<span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span></div>
</div> 
</div>
</a>
</div>
<?php } ?>
<?php if (isset($options['enable_mobile_money']) && $options['enable_mobile_money'] === 'yes') { ?>
<div class="colt">
<a class="nav-linkt" id="tab-mobile" data-bs-toggle="tab" href="#mobile" role="tab" aria-controls="mobile" aria-selected="false">
<div class="rowt">
<div class="colt">
<div class="tumaz_mob_tab_menu">Mobile Money<span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span></div>
</div> 
</div> 
</a>
</div>
<?php } ?> 
<?php if (isset($options['enable_crypto_money']) && $options['enable_crypto_money'] === 'yes') { ?>
<div class="colt">
<a class="nav-linkt" id="tab-crypto" data-bs-toggle="tab" href="#crypto" role="tab" aria-controls="crypto" aria-selected="false">
<div class="rowt">
<div class="colt">
<div class="tumaz_mob_tab_menu">Crypto<span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span></div>
</div> 
</div> 
</a>
</div>
<?php } ?> 
<?php if (isset($options['enable_p2p_payments']) && $options['enable_p2p_payments'] === 'yes') { ?> 
<div class="colt">
<?php
 $p2pAccounts = get_option('digages_direct_p2p_accounts');
 if (is_array($p2pAccounts) && !empty($p2pAccounts)) {
 foreach ($p2pAccounts as $p2p) {
echo '<a class="nav-linkt" id="tab-p2p-' . esc_attr($p2p['p2p_name']) . '" data-bs-toggle="tab" href="#p2p-' . esc_attr($p2p['p2p_name']) . '" role="tab" aria-controls="p2p-' . esc_attr($p2p['p2p_name']) . '" aria-selected="false">';
?>
<div class="rowt">
<div class="colt">
<div class="tumaz_mob_tab_menu"><?php echo esc_html($p2p['p2p_name']); ?><span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span></div>
</div> 
</div></a>
<?php
}
}
?>
</div> 
<?php } ?>
</div>
</div>
</div> 
</div><!-- side tab ends --><!-- Content section --> 
<div class="colt digages_popmodal2 llks">
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
</div><!-- Top details -->
<div class="colt dvvcsb">
<div class="rowt">
<div class="colt-12 text-center xzzs">
<div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
<div class="colt tumaz_paaeer">Pagar <span class="ppurl"><span class="digages-woodp-order-currency"></span><span class="digages-woodp-order-amount"></span></span></div>
<div class="colt dvvcs text-truncate"><span class="tumaz_displayEmail"></span></div>
</div>
</div>
</div>
</div> 
<div class="lpll"></div><!-- Top details ends --><!-- Payment details -->
<div class="colt tab-content" id="myTabContent"><!-- Bank transfer content --> 
<div class="ppsj trstxt">Elige tu método de pago preferido <span class="digagechangepay"></span> para realizar el pago</div> 
<div class="text-start ppsjq"> 
<div class="custom-select"><select id="changeSelectionSelect" class="qaarr pp"></select></div>
</div> 
</div>
<div class="colt text-center kfls"><!-- Navigation Buttons for Step 2 -->
<button type="button" class="ppopbtnzza" id="proceedToStep1"><span class="digagechangepaybtn"></span></button></div> 
</div>
<div class="colt text-center d-sm-none"><span class="chaaanqaz goback"><i class="bi bi-arrow-repeat"></i> Cambiar método de pago</span></div>
</div> 
</div>
</div> 