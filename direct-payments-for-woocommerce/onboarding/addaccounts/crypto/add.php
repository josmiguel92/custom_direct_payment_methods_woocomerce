<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class="digages-onboard-addacnt-popup-container-adjust">

<div class="digages-onboard-addacnt-popup-overlay"></div>
    
    <div class="digages-onboard-addacnt-popup-container" id="crypto">
        <div class="digages-onboard-addacnt-popup-header">
                <div class="digages-onboard-addacnt-popup-headtxt">Add Account</div>
                <div>
                    <span class="digages-onboard-addacnt-popup-required">
                        <span class="digages-onboard-addacnt-popup-required-red">*</span> are required
                    </span>
                    <span class="digages-onboard-addacnt-popup-close">&times;</span>
                </div>
        </div>
        <div class="digages-onboard-addacnt-popup-content">

            <div class="digages-onboard-addacnt-popup-input-containtxt1"> 
                Fill in your crypto wallet details below and click the <span class="digages-onboard-addacntbold">Add</span> button.
            </div>

            <!-- currency -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Cryptocurrency <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="crypto_name" name="crypto_name" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">Your cryptocurrency e.g. BTC, USDT, ETH</span>
            </div>

            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Network <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="account_namec" name="account_name" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">Network associated with your wallet address</span>
            </div>

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Wallet Address <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="phone_numberc" name="phone_number" />
            </div>

            
            <div class="digages-onboard-addacnt-popup-input-containpdm"></div>
            
        </div>
        <div class="digages-onboard-addacnt-popup-footer">
                <div>
                    <button class="digages-onboard-addacnt-popup-save" id="save_crypto_account_button">Save</button>
                </div>
                <div class="">
                    <button class="digages-onboard-addacnt-popup-cancel digages-onboard-addacnt-popup-close">Cancel</button>
                </div>
        </div>
    </div>
    

</div>