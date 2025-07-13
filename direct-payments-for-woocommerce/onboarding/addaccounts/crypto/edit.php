<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class="digages-onboard-addacnt-popup-container-adjust">

<div class="digages-onboard-addacnt-popup-overlay"></div>
    
    <div class="digages-onboard-addacnt-popup-container" id="editcrypto">
        <div class="digages-onboard-addacnt-popup-header">
                <div class="digages-onboard-addacnt-popup-headtxt">Edit Account</div>
                <div>
                    <span class="digages-onboard-addacnt-popup-required">
                        <span class="digages-onboard-addacnt-popup-required-red">*</span> are required
                    </span>
                    <span class="digages-onboard-addacnt-popup-close">&times;</span>
                </div>
        </div>
        <div class="digages-onboard-addacnt-popup-content"> 

            <!-- currency -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Cryptocurrency <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="edit_crypto_name" name="crypto_name" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">Your cryptocurrency e.g. BTC, USDT, ETH</span>
            </div>

            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Network <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="edit_account_namec" name="account_name" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">Network associated with your wallet address</span>
            </div>

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Wallet Address <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="edit_phone_numberc" name="phone_number" />
            </div>

            
            <div class="digages-onboard-addacnt-popup-input-containpdm"></div>
            
        </div>
        <div class="digages-onboard-addacnt-popup-footer">
                <div>
                <?php wp_nonce_field('save_crypto_transfer_settings', 'crypto_transfer_nonce'); ?>
                    <button class="digages-onboard-addacnt-popup-save" id="edit_crypto_account_button">Update</button>
                </div>
                <div class="">
                    <button class="digages-onboard-addacnt-popup-cancel">Cancel</button>
                </div>
        </div>
    </div>
    
</div>