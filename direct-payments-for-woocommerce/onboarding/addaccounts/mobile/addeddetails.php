<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php if (!empty($saved_mobile_accounts)): ?>
            <?php foreach ($saved_mobile_accounts as $index => $account): ?>

<div class="digages-onboard-addacnt-details">
    <div class="digages-onboard-addacnt-details-left">
    <?php echo esc_html($account['mobile_name']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['phone_number']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['account_name']); ?>
    </div>
    <div class="digages-onboard-addacnt-details-right">
        
    <?php include(plugin_dir_path(__FILE__) . 'menu.php'); ?>
    </div>

</div>



<?php endforeach; ?>
        <?php else: ?> 
            <div class="digages-onboard-addacnt-accnttxt">Start by adding a mobile money account below</div>
            
        <?php endif; ?>

        
        <?php 
        if($mobilelimits > 0)
        {
            echo '<button class="digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger"  data-target="paywall">+ Add account</button>';
        }
        else
        {
            echo '<button class="digages-onboard-addacnt-add-btn digages-onboard-addacnt-popup-trigger"  data-target="mobile">+ Add account</button>';
        }
?>  


