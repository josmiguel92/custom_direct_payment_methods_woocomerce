<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}     
?>

<!-- Display bank transfer records -->
        <?php if (!empty($saved_bank_accounts)): ?>
            <?php foreach ($saved_bank_accounts as $index => $account): ?>


                <div class="digages-onboard-addacnt-details">
                    <div class="digages-onboard-addacnt-details-left">
                    <?php echo esc_html($account['bank_name']); ?> &nbsp;|&nbsp;  <?php echo esc_html($account['account_number']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['account_name']); ?>
                    </div>
                    <div class="digages-onboard-addacnt-details-right">
                        
                    <?php include(plugin_dir_path(__FILE__) . 'menu.php'); ?>
                    </div>

                </div>
                
    <?php endforeach; ?>
        <?php else: ?>
            <div class="digages-onboard-addacnt-accnttxt">Start by adding a bank account below</div>
           
    <!-- Start by adding a bank account below to accept payments via bank transfer. -->
    
            <?php endif; ?>

        <?php 
        if($banklimits > 0)
        {
            echo '<button class="digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger"  data-target="paywall">+ Add account</button>';
        }
        else
        {
            echo '<button class="digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger" data-target="banktransfer">+ Add account</button>';
        }
?>            
           
        
            
 

<!-- Add Account Button -->






