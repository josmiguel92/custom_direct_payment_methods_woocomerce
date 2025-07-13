jQuery(document).ready(function($) {
    // Function to populate the edit form with the selected account data (no delegation needed)
    function populateEditForm(account) {
        $('#edit_mobile_name').val(account.mobile_name);
        $('#edit_account_namem').val(account.account_name);
        $('#edit_phone_numberm').val(account.phone_number);
        $('#edit_sort_code').val(account.sort_code);
        $('#edit_iban').val(account.iban);
        $('#edit_bic_swift').val(account.bic_swift);
    }

    // Event delegation for all click events
    $(document).on('click', function(e) {
        const $target = $(e.target);

        // Edit account button
        if ($target.hasClass('edit-account-mobile')) {
            var savedmobileAccounts = JSON.parse(mobile_transfer_object.savedMobileAccounts); 
            const index = $target.data('index');
            populateEditForm(savedmobileAccounts[index]);  // Populate the form with the account data
            $('#edit_mobile_account_button').data('index', index);  // Store the index in the button for later use
        }

        // Save edited account button
        if ($target.is('#edit_mobile_account_button')) {
            const index = $target.data('index');
            const editedAccountData = {
                action: 'edit_mobile_account',
                mobile_name: $('#edit_mobile_name').val(),
                account_name: $('#edit_account_namem').val(),
                phone_number: $('#edit_phone_numberm').val(), 
                index: index,
                mobile_transfer_nonce: $('#mobile_transfer_nonce').val()
            };

            // Send the edited data via AJAX
            $.post(ajaxurl, editedAccountData, function(response) {
                if (response.success) {
                    alert('Mobile account updated successfully.');
                    location.reload();  // Reload to update the account list
                } else {
                    alert('An error occurred while updating the account.');
                }
            });
        }
    });
});