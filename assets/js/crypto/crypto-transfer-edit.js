jQuery(document).ready(function($) {
    // Function to populate the edit form with the selected account data (no delegation needed)
    function populateEditForm(account) {
        $('#edit_crypto_name').val(account.crypto_name);
        $('#edit_account_namec').val(account.account_name);
        $('#edit_phone_numberc').val(account.phone_number);
        $('#edit_sort_code').val(account.sort_code);
        $('#edit_iban').val(account.iban);
        $('#edit_bic_swift').val(account.bic_swift);
    }

    // Event delegation for all click events
    $(document).on('click', function(e) {
        const $target = $(e.target);

        // Edit account button
        if ($target.hasClass('edit-account-crypto')) {
            var savedcryptoAccounts = JSON.parse(crypto_transfer_object.savedcryptoAccounts); 
            const index = $target.data('index');
            populateEditForm(savedcryptoAccounts[index]);  // Populate the form with the account data
            $('#edit_crypto_account_button').data('index', index);  // Store the index in the button for later use
        }

        // Save edited account button
        if ($target.is('#edit_crypto_account_button')) {
            const index = $target.data('index');
            const editedAccountData = {
                action: 'edit_crypto_account',
                crypto_name: $('#edit_crypto_name').val(),
                account_name: $('#edit_account_namec').val(),
                phone_number: $('#edit_phone_numberc').val(), 
                index: index,
                crypto_transfer_nonce: $('#crypto_transfer_nonce').val()
            };

            // Send the edited data via AJAX
            $.post(ajaxurl, editedAccountData, function(response) {
                if (response.success) {
                    alert('Cryptocurrency updated successfully.');
                    location.reload();  // Reload to update the account list
                } else {
                    alert('An error occurred while updating the account.');
                }
            });
        }
    });
});