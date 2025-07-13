jQuery(document).ready(function($) {
    $('.digages-onboard-checkbox-containerdataus input[type="checkbox"]').on('change', function() {
        let data_usage = $(this).is(':checked') ? 'yes' : 'no';

        $.ajax({
            url: digages_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'digages_update_data_usage_woodp',
                data_usage: data_usage,
                _ajax_nonce: digages_ajax.nonce
            },
            success: function(response) {
                if (!response.success) {
                    alert('Failed to update preference. Please try again.');
                }
            }
        });
    });
});
