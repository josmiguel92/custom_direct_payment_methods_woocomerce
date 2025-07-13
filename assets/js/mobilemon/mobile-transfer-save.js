jQuery(document).ready(function($) {
    // Modal controls (utility function, no delegation needed)
    function toggleModal(show, action, index = null) {
        $('#add_account_modal').toggle(show);
        $('#save_mobile_account_button').data('action', action).data('index', index);
        if (show && action === 'add') {
            $('#add_account_modal form')[0].reset(); // Reset form for adding new account
        }
    }

    // Populate form fields with account data for editing (utility function, no delegation)
    function populateForm(account) {
        $('#mobile_name').val(account.mobile_name);
        $('#account_namem').val(account.account_name);
        $('#phone_numberm').val(account.phone_number); 
    }

    // Client-side form validation (utility function, no delegation)
    function validateForm() {
        const requiredFields = ['#mobile_name', '#account_namem', '#phone_numberm'];
        let isValid = true;
        requiredFields.forEach(function(field) {
            if (!$(field).val()) {
                isValid = false;
                alert('Please fill in all required fields: Mobile Name, Account Name, and Account Number.');
            }
        });
        return isValid;
    }

    // Save account via AJAX (utility function, no delegation)
    function saveAccount(action, index) {
        const accountData = {
            action: action === 'edit' ? 'edit_mobile_account' : 'save_mobile_account',
            mobile_name: $('#mobile_name').val(),
            account_name: $('#account_namem').val(),
            phone_number: $('#phone_numberm').val(), 
            index: index,
            mobile_transfer_nonce: mobileTransferData.nonce // Use localized nonce
        };

        $.post(mobileTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('Mobile account saved successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while saving the mobile account: ' + response.data.message);
            }
        });
    }

    // Delete account via AJAX (utility function, no delegation)
    function deleteAccount(index) {
        const accountData = {
            action: 'delete_mobile_account',
            index: index,
            mobile_transfer_nonce: mobileTransferData.nonce // Use localized nonce
        };

        $.post(mobileTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('Mobile account deleted successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while deleting the mobile account: ' + response.data.message);
            }
        });
    }

    // Event delegation for checkbox changes
    $(document).on('change', 'input[type="checkbox"][name="status"]', function() {
        var $checkbox = $(this);
        var accountIndex = $checkbox.data('account');
        var isEnabled = $checkbox.is(':checked') ? 1 : 0;

        // AJAX request to toggle the mobile account status
        $.ajax({
            url: mobileTransferData.ajaxUrl, // Use localized AJAX URL
            method: 'POST',
            data: {
                action: 'toggle_mobile_account_status',
                mobile_transfer_nonce: mobileTransferData.nonce, // Use localized nonce
                index: accountIndex,
                enabled: isEnabled
            },
            success: function(response) {
                if (response.success) {
                    alert('Mobile account status updated successfully.');
                } else {
                    alert('Failed to update mobile account status: ' + response.data.message);
                }
            },
            error: function() {
                alert('An error occurred while updating the mobile account status.');
            }
        });
    });

    // Event delegation for all click events
    $(document).on('click', function(e) {
        const $target = $(e.target);

        // Add mobile account button
        if ($target.is('#add_account_button')) {
            toggleModal(true, 'add'); // Show modal for adding a new account
        }

        // Edit account button
        if ($target.hasClass('edit-account')) {
            const index = $target.data('index');
            populateForm(savedmobileAccounts[index]);
            toggleModal(true, 'edit', index); // Show modal for editing the account
        }

        // Save mobile account button
        if ($target.is('#save_mobile_account_button')) {
            if (validateForm()) {
                const action = $target.data('action');
                const index = $target.data('index');
                saveAccount(action, index);
                toggleModal(false); // Hide modal after saving
            }
        }

        // Delete account button
        if ($target.hasClass('delete-account-mobile')) {
            const index = $target.data('index');
            if (confirm('Are you sure you want to delete this mobile account?')) {
                deleteAccount(index); // Delete account
            }
        }
    });
});