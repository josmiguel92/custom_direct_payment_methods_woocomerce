jQuery(document).ready(function($) {
    // Modal controls (utility function, no delegation needed)
    function toggleModal(show, action, index = null) {
        $('#add_account_modal').toggle(show);
        $('#save_crypto_account_button').data('action', action).data('index', index);
        if (show && action === 'add') {
            $('#add_account_modal form')[0].reset(); // Reset form for adding new account
        }
    }

    // Populate form fields with account data for editing (utility function, no delegation)
    function populateForm(account) {
        $('#crypto_name').val(account.crypto_name);
        $('#account_namec').val(account.account_name);
        $('#phone_numberc').val(account.phone_number); 
    }

    // Client-side form validation (utility function, no delegation)
    function validateForm() {
        const requiredFields = ['#crypto_name', '#account_namec', '#phone_numberc'];
        let isValid = true;
        requiredFields.forEach(function(field) {
            if (!$(field).val()) {
                isValid = false;
                alert('Please fill in all required fields: Crypto Name, Account Name, and Account Number.');
            }
        });
        return isValid;
    }

    // Save account via AJAX (utility function, no delegation)
    function saveAccount(action, index) {
        const accountData = {
            action: action === 'edit' ? 'edit_crypto_account' : 'save_crypto_account',
            crypto_name: $('#crypto_name').val(),
            account_name: $('#account_namec').val(),
            phone_number: $('#phone_numberc').val(), 
            index: index,
            crypto_transfer_nonce: cryptoTransferData.nonce // Use localized nonce
        };

        $.post(cryptoTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('Cryptocurrency saved successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while saving the Cryptocurrency: ' + response.data.message);
            }
        });
    }

    // Delete account via AJAX (utility function, no delegation)
    function deleteAccount(index) {
        const accountData = {
            action: 'delete_crypto_account',
            index: index,
            crypto_transfer_nonce: cryptoTransferData.nonce // Use localized nonce
        };

        $.post(cryptoTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('Cryptocurrency deleted successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while deleting the Cryptocurrency: ' + response.data.message);
            }
        });
    }

    // Event delegation for checkbox changes
    $(document).on('change', 'input[type="checkbox"][name="status"]', function() {
        var $checkbox = $(this);
        var accountIndex = $checkbox.data('account');
        var isEnabled = $checkbox.is(':checked') ? 1 : 0;

        // AJAX request to toggle the Cryptocurrency status
        $.ajax({
            url: cryptoTransferData.ajaxUrl, // Use localized AJAX URL
            method: 'POST',
            data: {
                action: 'toggle_crypto_account_status',
                crypto_transfer_nonce: cryptoTransferData.nonce, // Use localized nonce
                index: accountIndex,
                enabled: isEnabled
            },
            success: function(response) {
                if (response.success) {
                    alert('Cryptocurrency status updated successfully.');
                } else {
                    alert('Failed to update Cryptocurrency status: ' + response.data.message);
                }
            },
            error: function() {
                alert('An error occurred while updating the Cryptocurrency status.');
            }
        });
    });

    // Event delegation for all click events
    $(document).on('click', function(e) {
        const $target = $(e.target);

        // Add crypto account button
        if ($target.is('#add_crypto_account_button')) {
            toggleModal(true, 'add'); // Show modal for adding a new account
        }

        // Edit account button
        if ($target.hasClass('edit-account')) {
            const index = $target.data('index');
            populateForm(savedcryptoAccounts[index]);
            toggleModal(true, 'edit', index); // Show modal for editing the account
        }

        // Save crypto account button
        if ($target.is('#save_crypto_account_button')) {
            if (validateForm()) {
                const action = $target.data('action');
                const index = $target.data('index');
                saveAccount(action, index);
                toggleModal(false); // Hide modal after saving
            }
        }

        // Delete account button
        if ($target.hasClass('delete-account-crypto')) {
            const index = $target.data('index');
            if (confirm('Are you sure you want to delete this Cryptocurrency?')) {
                deleteAccount(index); // Delete account
            }
        }
    });
});