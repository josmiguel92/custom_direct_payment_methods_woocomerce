<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}     
?>

<!-- Display bank transfer records -->
        <?php if (!empty($saved_bank_accounts)): ?>
            <?php foreach ($saved_bank_accounts as $index => $account): ?>
 
                    <?php echo esc_html($account['bank_name']); ?> &nbsp;|&nbsp;  <?php echo esc_html($account['account_number']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['account_name']); ?>
                   
    <?php endforeach; ?>
        <?php else: ?>
No account    
            <?php endif; ?>

            