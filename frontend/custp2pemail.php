<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
echo '<h2>Pagos Peer-to-Peer</h2>';
echo '<ul>';
echo '<li><strong>Nombre de la Plataforma:</strong> ' . esc_html($p2p['p2p_name']) . '</li>';
echo '<li><strong>' . esc_html($p2p['account_type']) . ':</strong> ' . esc_html($p2p['account_id']) . '</li>';
echo '<li><strong>Nombre de la Cuenta:</strong> ' . esc_html($p2p['account_name']) . '</li>';
echo '</ul>';
?>
 