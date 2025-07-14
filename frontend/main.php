<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

add_action('woocommerce_review_order_before_submit', 'digages_add_bank_transfer_modal_to_checkout');

function digages_add_bank_transfer_modal_to_checkout()
{
    $nonce = wp_create_nonce('digages_add_order_to_cart_nonce');

    // Temporarily remove auto-format filters
    remove_filter('the_content', 'wpautop');
    remove_filter('the_content', 'wptexturize');

    // Start output buffer
//ob_start();
    ?>

    <!-- Modal -->
    <div id="exampleModal" class="digages_popup" style="z-index: 999999 !important;">
        <div class="digagesmaincontainer">
            <div class="digages_popup-contentw depopmet lsastum digagesmaincenter"
                style="background-color: transparent;border-color:transparent;border-radius: 0px !important;">
                <div class="digages-container" style="z-index: 9999;display: flex; justify-content: center;">
                    <div class="rowt">
                        <div class="colt-12 colt-sm-11 colt-md-11 colt-lg-11" style="z-index: 9999;">
                            <div class="digages_popmodal3k"><?php digages_display_enabled_payment_methods(); ?></div>
                        </div>
                        <div class="colt-12 colt-sm-1 colt-md-1 colt-lg-1 d-none d-sm-block"><i
                                class="bi bi-x digage_stylecursor digages_add-order-to-cart-button digagesclosex"
                                style="color: #fff;" data-nonce="<?php echo esc_attr($nonce); ?>"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    //ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
}
?>