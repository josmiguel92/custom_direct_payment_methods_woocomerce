jQuery(document).ready(function($) { 
    // Modal controls (no event delegation needed here, as it's a utility function)
    function toggleModal(show, action, index = null) {
        $('#add_account_modal').toggle(show);
        $('#save_bank_account_button').data('action', action).data('index', index);
        if (show && action === 'add') {
            $('#add_account_modal form')[0].reset(); // Reset form for adding new account
        }
    }

    // Populate form fields with account data for editing (utility function, no delegation)
    function populateForm(account) {
        $('#bank_name').val(account.bank_name);
        $('#account_name').val(account.account_name);
        $('#account_number').val(account.account_number);
        $('#sort_code').val(account.sort_code);
        $('#iban').val(account.iban);
        $('#bic_swift').val(account.bic_swift);
        $('#routing_number').val(account.routing_number);
    }

    // Client-side form validation (utility function, no delegation)
    function validateForm() {
        const requiredFields = ['#bank_name', '#account_name', '#account_number'];
        let isValid = true;
        requiredFields.forEach(function(field) {
            if (!$(field).val()) {
                isValid = false;
                alert('Please fill in all required fields: Bank Name, Account Name, and Account Number.');
            }
        });
        return isValid;
    }

    // Save account via AJAX (utility function, no delegation)
    function saveAccount(action, index) {
        const accountData = {
            action: action === 'edit' ? 'edit_bank_account' : 'save_bank_account',
            bank_name: $('#bank_name').val(),
            account_name: $('#account_name').val(),
            account_number: $('#account_number').val(),
            sort_code: $('#sort_code').val(),
            iban: $('#iban').val(),
            bic_swift: $('#bic_swift').val(),
            routing_number: $('#routing_number').val(),
            index: index,
            bank_transfer_nonce: bankTransferData.nonce // Use localized nonce
        };

        $.post(bankTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('Bank account saved successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while saving the bank account: ' + response.data.message);
            }
        });
    }

    // Delete account via AJAX (utility function, no delegation)
    function deleteAccount(index) {
        const accountData = {
            action: 'delete_bank_account',
            index: index,
            bank_transfer_nonce: bankTransferData.nonce // Use localized nonce
        };

        $.post(bankTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('Bank account deleted successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while deleting the bank account: ' + response.data.message);
            }
        });
    }

    // Event delegation for checkbox changes
    $(document).on('change', 'input[type="checkbox"][name="status"]', function() {
        var $checkbox = $(this);
        var accountIndex = $checkbox.data('account');
        var isEnabled = $checkbox.is(':checked') ? 1 : 0;

        // AJAX request to toggle the bank account status
        $.ajax({
            url: bankTransferData.ajaxUrl, // Use localized AJAX URL
            method: 'POST',
            data: {
                action: 'toggle_bank_account_status',
                bank_transfer_nonce: bankTransferData.nonce, // Use localized nonce
                index: accountIndex,
                enabled: isEnabled
            },
            success: function(response) {
                if (response.success) {
                    alert('Bank account status updated successfully.');
                } else {
                    alert('Failed to update bank account status: ' + response.data.message);
                }
            },
            error: function() {
                alert('An error occurred while updating the bank account status.');
            }
        });
    });

    // Event delegation for all click events
    $(document).on('click', function(e) {
        const $target = $(e.target);

        // Add account button
        if ($target.is('#add_account_button')) {
            toggleModal(true, 'add'); // Show modal for adding a new account
        }

        // Edit account button
        if ($target.hasClass('edit-account')) {
            const index = $target.data('index');
            populateForm(savedBankAccounts[index]);
            toggleModal(true, 'edit', index); // Show modal for editing the account
        }

        // Save bank account button
        if ($target.is('#save_bank_account_button')) {
            if (validateForm()) {
                const action = $target.data('action');
                const index = $target.data('index');
                saveAccount(action, index);
                toggleModal(false); // Hide modal after saving
            }
        }

        // Delete account button
        if ($target.hasClass('delete-account-bank')) {
            const index = $target.data('index');
            if (confirm('Are you sure you want to delete this bank account?')) {
                deleteAccount(index); // Delete account
            }
        }
    });
});