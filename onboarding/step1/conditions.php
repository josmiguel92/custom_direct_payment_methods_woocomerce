<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
$banklimits = count($saved_bank_accounts); 
$mobilelimits = count($saved_mobile_accounts);
$cryptolimits = count($saved_crypto_accounts);
$p2plimits = count($saved_p2p_accounts);

$bankmclass = '';

if($banklimits > 0)
{
    $bankmclass = 'digages-intrest-check-label2';
    $bankminp ='<div class="digages-intrest-check-custom-checkbox"></div>';
    $bankform ='<input type="checkbox" class="payment-method-checkbox" id="enable_bank_transfers" name="enable_bank_transfers">';
}
else
{
    $bankmclass = 'digages-intrest-check-label3';
    $bankminp ='<div class="digages-intrest-check-custom-checkbox2"></div>';
    $bankform = '';
}

if($mobilelimits > 0)
{
    $mobilemclass = 'digages-intrest-check-label2';
    $mobileminp ='<div class="digages-intrest-check-custom-checkbox"></div>';
    $mobileform ='<input type="checkbox" class="payment-method-checkbox" id="enable_mobile_money" name="enable_mobile_money">';
}
else
{
    $mobilemclass = 'digages-intrest-check-label3';
    $mobileminp ='<div class="digages-intrest-check-custom-checkbox2"></div>';
    $mobileform = '';
}

if($cryptolimits > 0)
{
    $cryptomclass = 'digages-intrest-check-label2';
    $cryptominp ='<div class="digages-intrest-check-custom-checkbox"></div>';
    $cryptoform ='<input type="checkbox" class="payment-method-checkbox" id="enable_crypto_money" name="enable_crypto_money">';
}
else
{
    $cryptomclass = 'digages-intrest-check-label3';
    $cryptominp ='<div class="digages-intrest-check-custom-checkbox2"></div>';
    $cryptoform = '';
}

if($p2plimits > 0)
{
    $p2pmclass = 'digages-intrest-check-label2';
    $p2pminp ='<div class="digages-intrest-check-custom-checkbox"></div>';
    $p2pform ='<input type="checkbox" class="payment-method-checkbox" id="enable_p2p_payments" name="enable_p2p_payments">';
}
else
{
    $p2pmclass = 'digages-intrest-check-label3';
    $p2pminp ='<div class="digages-intrest-check-custom-checkbox2"></div>';
    $p2pform ='';
}
?>

