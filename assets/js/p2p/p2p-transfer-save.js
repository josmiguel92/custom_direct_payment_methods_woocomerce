jQuery(document).ready(function($) {
    // Modal controls (utility function, no delegation needed)
    function toggleModal(show, action, index = null) {
        $('#add_account_modal').toggle(show);
        $('#save_p2p_account_button').data('action', action).data('index', index);
        if (show && action === 'add') {
            $('#add_account_modal form')[0].reset(); // Reset form for adding new account
        }
    }

    // Populate form fields with account data for editing (utility function, no delegation)
    function populateForm(account) {
        $('#p2p_name').val(account.p2p_name);
        $('#account_namep').val(account.account_name);
        $('#account_id').val(account.account_id);
        $('#account_type').val(account.account_type); 
    }

    // Client-side form validation (utility function, no delegation)
    function validateForm() {
        const requiredFields = ['#p2p_name', '#account_namep', '#account_id'];
        let isValid = true;
        requiredFields.forEach(function(field) {
            if (!$(field).val()) {
                isValid = false;
                alert('Please fill in all required fields: P2P Platform, Account Name, and ID.');
            }
        });
        return isValid;
    }

    // Save account via AJAX (utility function, no delegation)
    function saveAccount(action, index) {
        const accountData = {
            action: action === 'edit' ? 'edit_p2p_account' : 'save_p2p_account',
            p2p_name: $('#p2p_name').val(),
            account_name: $('#account_namep').val(),
            account_id: $('#account_id').val(),
            account_type: $('#account_type').val(), 
            index: index,
            p2p_transfer_nonce: p2pTransferData.nonce // Use localized nonce
        };

        $.post(p2pTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('P2P account saved successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while saving the P2P account: ' + response.data.message);
            }
        });
    }

    // Delete account via AJAX (utility function, no delegation)
    function deleteAccount(index) {
        const accountData = {
            action: 'delete_p2p_account',
            index: index,
            p2p_transfer_nonce: p2pTransferData.nonce // Use localized nonce
        };

        $.post(p2pTransferData.ajaxUrl, accountData, function(response) {
            if (response.success) {
                alert('P2P account deleted successfully.');
                location.reload(); // Reload page to refresh the account list
            } else {
                alert('An error occurred while deleting the P2P account: ' + response.data.message);
            }
        });
    }

    // Event delegation for checkbox changes
    $(document).on('change', 'input[type="checkbox"][name="status"]', function() {
        var $checkbox = $(this);
        var accountIndex = $checkbox.data('account');
        var isEnabled = $checkbox.is(':checked') ? 1 : 0;

        // AJAX request to toggle the P2P account status
        $.ajax({
            url: p2pTransferData.ajaxUrl, // Use localized AJAX URL
            method: 'POST',
            data: {
                action: 'toggle_p2p_account_status',
                p2p_transfer_nonce: p2pTransferData.nonce, // Use localized nonce
                index: accountIndex,
                enabled: isEnabled
            },
            success: function(response) {
                if (response.success) {
                    alert('P2P account status updated successfully.');
                } else {
                    alert('Failed to update P2P account status: ' + response.data.message);
                }
            },
            error: function() {
                alert('An error occurred while updating the P2P account status.');
            }
        });
    });

    // Event delegation for all click events
    $(document).on('click', function(e) {
        const $target = $(e.target);

        // Add P2P account button
        if ($target.is('#add_account_button')) {
            toggleModal(true, 'add'); // Show modal for adding a new account
        }

        // Edit account button
        if ($target.hasClass('edit-account')) {
            const index = $target.data('index');
            populateForm(savedp2pAccounts[index]);
            toggleModal(true, 'edit', index); // Show modal for editing the account
        }

        // Save P2P account button
        if ($target.is('#save_p2p_account_button')) {
            if (validateForm()) {
                const action = $target.data('action');
                const index = $target.data('index');
                saveAccount(action, index);
                toggleModal(false); // Hide modal after saving
            }
        }

        // Delete account button
        if ($target.hasClass('delete-account-p2p')) {
            const index = $target.data('index');
            if (confirm('Are you sure you want to delete this P2P account?')) {
                deleteAccount(index); // Delete account
            }
        }
    });
});