<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php if (!empty($saved_crypto_accounts)): ?>
            <?php foreach ($saved_crypto_accounts as $index => $account): ?>
                    <?php echo esc_html($account['crypto_name']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['account_name']); ?> &nbsp;|&nbsp; <?php echo esc_html($account['phone_number']); ?>
                
    <?php endforeach; ?>
        <?php else: ?>
No account
        <?php endif; ?>

        