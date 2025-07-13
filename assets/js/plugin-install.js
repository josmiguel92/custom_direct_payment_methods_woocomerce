jQuery(document).ready(function($) {
    // Handle install button click
    $(document).on('click', '.woodp-install', function(e) {
        e.preventDefault();
        var button = $(this);
        var slug = button.data('slug');
        var url = button.data('url');
        var path = button.data('path'); // Get the path from the button's data attribute
        
        button.html('<span class="icon-loader1"></span>').prop('disabled', true);
        
        $.ajax({
            url: woodpAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'digages_woodp_install_plugin',
                nonce: woodpAjax.nonce,
                slug: slug,
                url: url,
                path: path // Send the path to the server
            },
            success: function(response) {
                if (response.success) {
                    // Update the button to "Activate" and set the correct path
                    button.removeClass('woodp-install').addClass('woodp-activate')
                        .html('<i class="bi bi-check-circle-fill"></i>').prop('disabled', false)
                        .data('path', response.data.plugin_path); // Update the data-path attribute
                } else {
                    alert('Error installing plugin: ' + response.data);
                    button.text('Install').prop('disabled', false);
                }
            },
            error: function() {
                alert('Error installing plugin');
                button.html('<i class="bi bi-download"></i>').prop('disabled', false);
            }
        });
    });

    // Handle activate button click
    $(document).on('click', '.woodp-activate', function(e) {
        e.preventDefault();
        var button = $(this);
        var slug = button.data('slug');
        var path = button.data('path');
        
        button.html('<span class="icon-loader1"></span>').prop('disabled', true);
        
        $.ajax({
            url: woodpAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'digages_woodp_activate_plugin',
                nonce: woodpAjax.nonce,
                slug: slug,
                path: path
            },
            success: function(response) {
                if (response.success) {
                    button.removeClass('woodp-activate').addClass('woodp-deactivate')
                        .text('<i class="bi bi-gear-fill"></i>').prop('disabled', false);
                } else {
                    alert('Error activating plugin: ' + response.data);
                    button.html('<i class="bi bi-check-circle-fill"></i>').prop('disabled', false);
                }
            },
            error: function() {
                alert('Error activating plugin');
                button.html('<i class="bi bi-check-circle-fill"></i>').prop('disabled', false);
            }
        });
    });

    

});