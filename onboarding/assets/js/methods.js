jQuery(document).ready(function($) {
    // Function to check if at least one checkbox is checked
    function isAtLeastOneChecked() {
        return $('#enable_bank_transfers').is(':checked') || 
               $('#enable_mobile_money').is(':checked') || 
               $('#enable_crypto_money').is(':checked') || 
               $('#enable_p2p_payments').is(':checked');
    }
    
    // Function to update button class based on checkbox state
    function updateButtonClass() {
        if (isAtLeastOneChecked()) {
            $('.digages-onboard-continuebtn2')
                .removeClass('digages-onboard-continuebtn2')
                .addClass('digages-onboard-continuebtn woocommerce-save-button digages-onboard-continuebtnsave')
                .attr('data-page', 'success');
        } else {
            $('.digages-onboard-continuebtnsave')
                .removeClass('digages-onboard-continuebtn woocommerce-save-button digages-onboard-continuebtnsave')
                .removeAttr('data-page')
                .addClass('digages-onboard-continuebtn2');
        }
    }
    
    // Run once on page load to set initial state
    updateButtonClass();
    
    // Monitor all relevant checkboxes for changes
    $(document).on('change', '#enable_bank_transfers, #enable_mobile_money, #enable_crypto_money, #enable_p2p_payments', function() {
        updateButtonClass();
    });
    
    // Handle continue button click
    $(document).on('click', '.digages-onboard-continuebtnsave', function(e) {
        e.preventDefault();
        let settings = {
            enable_bank_transfers: $('#enable_bank_transfers').is(':checked') ? 'yes' : 'no',
            enable_mobile_money: $('#enable_mobile_money').is(':checked') ? 'yes' : 'no',
            enable_crypto_money: $('#enable_crypto_money').is(':checked') ? 'yes' : 'no',
            enable_p2p_payments: $('#enable_p2p_payments').is(':checked') ? 'yes' : 'no'
        };
        $.ajax({
            url: digages_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'digages_admin_script_onboaard_methods_update',
                settings: settings,
                // Fix: Use the correct nonce parameter name
                _ajax_nonce: digages_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    //window.location.href = 'https://digages.com';
                    //alert('save settings.');
                } else {
                    alert('Failed to save settings. Please try again.');
                }
            }
        });
    });
});