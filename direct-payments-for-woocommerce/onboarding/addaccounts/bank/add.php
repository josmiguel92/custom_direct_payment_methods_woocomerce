<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class="digages-onboard-addacnt-popup-container-adjust">

<div class="digages-onboard-addacnt-popup-overlay"></div>
    
    <div class="digages-onboard-addacnt-popup-container" id="banktransfer">
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
                Fill in your bank account details below and click the <span class="digages-onboard-addacntbold">Add</span> button.
            </div>

            <!-- currency -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Bank Name <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="bank_name" name="bank_name" />
            </div>

            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Account Name <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="account_name" name="account_name" />
            </div>
            
            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Account Number <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="account_number" name="account_number" />
            </div>

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Sort Code</span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="sort_code" name="sort_code" />
            </div>

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">IBAN</span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="iban" name="iban" />
            </div>

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">BIC / Swift</span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="bic_swift" name="bic_swift" />
            </div>

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Routing Number</span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="routing_number" name="routing_number" />
            </div>
             

            <div class="digages-onboard-addacnt-popup-input-containpdm"></div>
            
        </div>
        <div class="digages-onboard-addacnt-popup-footer">
                <div>
                    <button class="digages-onboard-addacnt-popup-save" id="save_bank_account_button" >Save</button>
                </div>
                <div class="">
                    <button class="digages-onboard-addacnt-popup-cancel digages-onboard-addacnt-popup-close">Cancel</button>
                </div>
        </div>
    </div>
    
</div>