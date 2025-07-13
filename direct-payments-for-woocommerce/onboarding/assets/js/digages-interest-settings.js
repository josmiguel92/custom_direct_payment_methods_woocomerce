jQuery(document).ready(function($) {
    // Attach event to the parent container using event delegation
    $(document).on('change', '.digages-intrest-check-containeryyt input[type="checkbox"]', function() {
        let selected_interests = [];

        // Find all checked checkboxes inside the container
        $('.digages-intrest-check-containeryyt input[type="checkbox"]:checked').each(function() {
            selected_interests.push($(this).attr('id')); // Get checked checkbox IDs
        });

        // Send AJAX request
        $.ajax({
            url: digages_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'digages_update_interest_woodp',
                interests: selected_interests,
                _ajax_nonce: digages_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    //console.log("Interests saved successfully:", response);
                } else {
                    //console.error("Error saving interests:", response);
                }
            }
        });
    });
});
