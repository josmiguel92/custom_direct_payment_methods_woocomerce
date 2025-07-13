jQuery(document).ready(function($) {
// first pay
    $(document).on('click', '.digages-dismiss-notice-firstpay', function(e) {
        e.preventDefault();
        $.post(digagesAdmin.ajaxurl, {
            action: 'digages_dismiss_notice_firstpay',
            security: digagesAdmin.security
        });
        $(this).closest('.digages-plugin-notice').fadeOut();
    });


    // tenth pay

    $(document).on('click', '.digages-dismiss-notice-tenpay', function(e) {
        e.preventDefault();
        $.post(digagesAdmin.ajaxurl, {
            action: 'digages_dismiss_notice_tenpay',
            security: digagesAdmin.security
        });
        $(this).closest('.digages-plugin-notice').fadeOut();
    });


    //interests
    $(document).on('click', '.digages-dismiss-notice-interests', function(e) {
        e.preventDefault();
        $.post(digagesAdmin.ajaxurl, {
            action: 'digages_dismiss_notice_interests',
            security: digagesAdmin.security
        });
        $(this).closest('.digages-plugin-notice').fadeOut();
    });

//available
$(document).on('click', '.digages-dismiss-notice-available', function(e) {
    e.preventDefault();
    $.post(digagesAdmin.ajaxurl, {
        action: 'digages_dismiss_notice_available',
        security: digagesAdmin.security
    });
    $(this).closest('.digages-plugin-notice').fadeOut();
});

//addaccount

$(document).on('click', '.digages-dismiss-notice-addaccountsmain', function(e) {
    e.preventDefault();
    $.post(digagesAdmin.ajaxurl, {
        action: 'digages_dismiss_notice_addaccountsmain',
        security: digagesAdmin.security
    });
    $(this).closest('.digages-plugin-notice').fadeOut();
});


//home
$(document).on('click', '.digages-dismiss-notice-home', function(e) {
    e.preventDefault();
    $.post(digagesAdmin.ajaxurl, {
        action: 'digages_dismiss_notice_home',
        security: digagesAdmin.security
    });
    $(this).closest('.digages-plugin-notice').fadeOut();
});



});
