<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php if (!empty($saved_mobile_accounts)): ?>
            <?php foreach ($saved_mobile_accounts as $index => $account): ?>
    <?php echo esc_html($account['mobile_name']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['phone_number']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['account_name']); ?>

<?php endforeach; ?>
        <?php else: ?> 
No account            
        <?php endif; ?>

        