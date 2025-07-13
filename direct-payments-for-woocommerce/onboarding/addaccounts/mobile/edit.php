<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class="digages-onboard-addacnt-popup-container-adjust">
<div class="digages-onboard-addacnt-popup-overlay"></div>
    
    <div class="digages-onboard-addacnt-popup-container" id="editmobile">
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
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Mobile Money Provider <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="edit_mobile_name" name="mobile_name" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">Your service provider e.g. M-Pesa, MTN</span>
            </div>

            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Account Name <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="edit_account_namem" name="account_name" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">The name associated with the account</span>
            </div>

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Phone Number <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="edit_phone_numberm" name="phone_number" />
            </div>

            
            <div class="digages-onboard-addacnt-popup-input-containpdm"></div>
            
        </div>
        <div class="digages-onboard-addacnt-popup-footer">
                <div>
                <?php wp_nonce_field('save_mobile_transfer_settings', 'mobile_transfer_nonce'); ?>
                    <button class="digages-onboard-addacnt-popup-save" id="edit_mobile_account_button">Update</button>
                </div>
                <div class="">
                    <button class="digages-onboard-addacnt-popup-cancel digages-onboard-addacnt-popup-close">Cancel</button>
                </div>
        </div>
    </div>
    

</div>