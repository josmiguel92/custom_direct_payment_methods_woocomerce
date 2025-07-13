<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php if (!empty($saved_p2p_accounts)): ?>
            <?php foreach ($saved_p2p_accounts as $index => $account): ?>
    <?php echo esc_html($account['p2p_name']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['account_id']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['account_name']); ?>
    
            <?php endforeach; ?>
        <?php else: ?>
No account            
        <?php endif; ?>
