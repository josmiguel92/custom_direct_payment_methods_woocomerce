jQuery(document).ready(function($) {
    // Function to populate the edit form with the selected account data (no delegation needed)
    function populateEditForm(account) {
        $('#edit_bank_name').val(account.bank_name);
        $('#edit_account_name').val(account.account_name);
        $('#edit_account_number').val(account.account_number);
        $('#edit_sort_code').val(account.sort_code);
        $('#edit_iban').val(account.iban);
        $('#edit_bic_swift').val(account.bic_swift);
        $('#edit_routing_number').val(account.routing_number);
    }

    // Event delegation for all click events
    $(document).on('click', function(e) {
        const $target = $(e.target);

        // Edit account button
        if ($target.hasClass('edit-account-bank')) {
            // Ensure the savedBankAccounts data is parsed correctly from the localized object
            var savedBankAccounts = JSON.parse(bank_transfer_object.savedBankAccounts); 
            const index = $target.data('index');
            populateEditForm(savedBankAccounts[index]);  // Populate the form with the account data
            $('#edit_bank_account_button').data('index', index);  // Store the index in the button for later use
        }

        // Save edited account button
        if ($target.is('#edit_bank_account_button')) {
            const index = $target.data('index');
            const editedAccountData = {
                action: 'edit_bank_account',
                bank_name: $('#edit_bank_name').val(),
                account_name: $('#edit_account_name').val(),
                account_number: $('#edit_account_number').val(),
                sort_code: $('#edit_sort_code').val(),
                iban: $('#edit_iban').val(),
                bic_swift: $('#edit_bic_swift').val(),
                routing_number: $('#edit_routing_number').val(),
                index: index,
                bank_transfer_nonce: $('#bank_transfer_nonce').val()
            };

            // Send the edited data via AJAX
            $.post(ajaxurl, editedAccountData, function(response) {
                if (response.success) {
                    alert('Bank account updated successfully.');
                    location.reload();  // Reload to update the account list
                } else {
                    alert('An error occurred while updating the account.');
                }
            });
        }
    });
});