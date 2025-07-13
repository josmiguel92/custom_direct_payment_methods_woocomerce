<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class="digages-onboard-addacnt-popup-container-adjust">

<div class="digages-onboard-addacnt-popup-overlay"></div>
    
    <div class="digages-onboard-addacnt-popup-container" id="peer">
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
                Fill in your peer-to-peer account details below and click the <span class="digages-onboard-addacntbold">Add</span> button.
            </div>

            <!-- currency -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">P2P Platform <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="p2p_name" name="p2p_name" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">P2P platform e.g. Venmo, Zelle, PayPal e.t.c</span>
            </div>

            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">Account Name <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="account_namep" name="account_name" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">The name associated with the P2P account</span>
            </div>

            <!-- platform name -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">ID <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <input type="text" class="digages-onboard-addacnt-popup-input" id="account_id" name="account_id" />
                <span class="digages-onboard-addacnt-popup-input-containtxt">Email, username, or phone number</span>
            </div>

            <!-- address -->
            <div class="digages-onboard-addacnt-popup-input-contain">
                <span class="digages-onboard-addacnt-popup-input-containtxt2">ID Type <span class="digages-onboard-addacnt-popup-required-red">*</span></span>
                <select class="digages-onboard-addacnt-popup-input" id="account_type" name="account_type" >
                <option>Select</option>
                <option value="Username">Username</option>
                <option value="Email address">Email address</option>
                <option value="Phone number">Phone number</option>
                <option value="Tag">Tag</option>
                </select>
            </div>

            
            <div class="digages-onboard-addacnt-popup-input-containpdm"></div>
            
        </div>
        <div class="digages-onboard-addacnt-popup-footer">
                <div>
                    <button class="digages-onboard-addacnt-popup-save" id="save_p2p_account_button">Save</button>
                </div>
                <div class="">
                    <button class="digages-onboard-addacnt-popup-cancel digages-onboard-addacnt-popup-close">Cancel</button>
                </div>
        </div>
    </div>
    

</div>