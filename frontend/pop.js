jQuery(document).ready(function($) { 

    function digagespoppay() {
        
       
        jQuery(document).ready(function ($) {
    

            
    //   document.addEventListener('DOMContentLoaded', function () {
    //     const container = document.querySelector('.tumaz-direct-container');
    //     const contentZIndex = parseInt(window.getComputedStyle(document.querySelector('#Content')).zIndex, 10) || 0;
    //     const newZIndex = contentZIndex + 1;
    
    //     if (container) {
    //         // Apply new z-index to all children of .tumaz-direct-container
    //         container.querySelectorAll('*').forEach((element) => {
    //             element.style.zIndex = newZIndex;
    //             element.style.position = 'relative'; // Ensure positioning for z-index to work
    //         });
    //     }
    // });


            let selectedMethod = '';
            let selectedOption = null;
            let uploadedFile = null;
            let createdOrderId = null; // Declare it here to be accessible globally 
            // Define a global variable
            let redirectUrl = '';
            // dfdsd
            // $(document).ready(function() {
            
            //   // Check screen width before handling the click events 
            //     $(document).on('click', '.btnx', function() {
            //         console.log('yes clicked');
            //     //if (window.matchMedia("(max-width: 767px)").matches) {
            //       // For mobile view, hide .allbtn and show .allclass
            //       $(".allbtn").hide();
            //       $(".allclass").removeClass("hidden").addClass("show");
            //     //} else {
            //     //}
            //   });
        
            //   // Hide .allclass when .goback is clicked, show .allbtn again 
            //     $(document).on('click', '.goback', function() {
            //     $(".allclass").removeClass("show").addClass("hidden");
            //     $(".allbtn").show();
            //   });
              
            // });
            // // dsjdbjb
            
            jQuery(document).ready(function ($) {
                // Remove any previously attached handler before adding a new one
                $(document).off('click', '.digages_add-order-to-cart-button').on('click', '.digages_add-order-to-cart-button', function (e) {
                   // console.log('.digages_add-order-to-cart-button clicked'); // Debugging log
                    e.preventDefault();
            
                    if (confirm("Do you want to cancel this payment?")) {
                        var nonce = $(this).data('nonce');
                        var orderId = $('.orderNumberDisplay').first().text().trim();
                        var currentUrl = window.location.href;
            
                        $.ajax({
                            url: ajax_object.ajaxurl,
                            type: 'POST',
                            data: {
                                action: 'digages_add_order_to_cart',
                                nonce: nonce,
                                order_id: orderId,
                                return_url: currentUrl
                            },
                            success: function (response) {
                                if (response.success) {
                                    // Redirect to our virtual page
                                    window.location.href = ajax_object.site_url + '/digages-order-canceledl';
                                } else {
                                    $('#order-cart-message').text(response.data || 'Error adding products to cart.');
                                }
                            },
                            error: function () {
                                $('#order-cart-message').text('An error occurred while adding products to the cart.');
                            }
                        });
                    } else {
                        //console.log("User canceled the action.");
                    }
                });
            });

            
            // Use event delegation for the nextToStep2 button
            $(document).on('click', '.nav-linkt', function() {
                //console.log('.nav-linkt clicked'); // Debugging log

                let tabId = $(this).attr('href');
                let isP2pTab = $(this).attr('id').startsWith('tab-p2p');
                
                if (isP2pTab) {
                    // Get the data for this specific P2P tab
                    let p2pName = $(tabId + ' .ppname').text();
                    let p2pType = $(tabId + ' .ppityp').text();
                    let p2pId = $(tabId + ' .ppid').text();
                    let p2pAccount = $(tabId + ' .ppcnme').text();
            
                    // Update the hidden fields if they exist
                    if ($(tabId).find('.rec1n').length) {
                        $('.rec1n').text(p2pName);
                        $('.rec2t').text(p2pType);
                        $('.rec3i').text(p2pId);
                        $('.rec4a').text(p2pAccount);
                    }
                }

                selectedMethod = $(this).text().trim();
                //console.log(selectedMethod);
            // Update the HTML element with id "output" to display the selected method
            $('.mobhedtumaz').text(selectedMethod); 
            
            });

            
        
         
        
            // Use event delegation for the nextToStep2 button
            $(document).on('click', '#nextToStep2', function() {
                
    $('.digagagesuploadimg').hide();
               // console.log('#nextToStep2 clicked'); // Debugging log
 
            let selectedMethod = $('.nav-linkt.active').attr('id');  // Get the active tab's ID
    let selectedValue = '';
    let isValid = false;  // Add a validation flag

        
            // Handle the selected payment method
            if (selectedMethod.startsWith('tab-bank')) {
                let btDetails = $('.tab-pane.active .bankt').html();  // Fetch P2P details from the active tab
                selectedValue = btDetails ? 'Bank transfer Payment Selected' : '';  // Ensure it's not empty 
        
                selectedValue = $('#bankTransferSelect').val();
                
                isValid = true;
            } else if (selectedMethod.startsWith('tab-mobile')) {
                
                let mmDetails = $('.tab-pane.active .mmt').html();  // Fetch P2P details from the active tab
                selectedValue = mmDetails ? 'Mobile Money Payment Selected' : '';  // Ensure it's not empty
        
                selectedValue = $('#mobileMoneySelect').val(); 
                
                isValid = true;
            }  
            else if (selectedMethod.startsWith('tab-crypto')) {
                
                let crDetails = $('.tab-pane.active .cet').html();  // Fetch P2P details from the active tab
                selectedValue = crDetails ? 'crypto Money Payment Selected' : '';  // Ensure it's not empty
        
                selectedValue = $('#cryptoMoneySelect').val(); 
                isValid = true;
                //console.log(crDetails);
                //console.log(selectedValue);
                
            }
             else if (selectedMethod.startsWith('tab-p2p')) {
            // For P2P, check if the active tab has the required elements
            let activePane = $('.tab-pane.active');
            let hasRequiredElements = activePane.find('.ppname').length > 0 && 
                                    activePane.find('.ppityp').length > 0 && 
                                    activePane.find('.ppid').length > 0;
            
            if (hasRequiredElements) {
                selectedValue = 'P2P Payment Selected';
                isValid = true;
                
                // Get the details from the active tab
             
                // No dropdown for P2P, so fetch details directly from the P2P content section
                let p2pDetails = $('.tab-pane.active .rec').html();  // Fetch P2P details from the active tab
                let p2pName = $('.tab-pane.active .rec1n').html();  // Fetch P2P details from the active tab
                let p2pType = $('.tab-pane.active .rec2t').html();  // Fetch P2P details from the active tab
                let p2pId = $('.tab-pane.active .rec3i').html();  // Fetch P2P details from the active tab
                let p2pAccount = $('.tab-pane.active .rec4a').html();  // Fetch P2P details from the active tab
                selectedValue = p2pDetails ? 'P2P Payment Selected' : '';  // Ensure it's not empty 
                $('.tumazp2pname').text(p2pName);
                $('.tumazp2ptype').text(p2pType);
                $('.tumazp2pid').text(p2pId);
                $('.tumazp2paccount').text(p2pAccount); 
        
            }
        }        
        // else if (selectedMethod.startsWith('tab-p2p')) {
        //         // No dropdown for P2P, so fetch details directly from the P2P content section
        //         let p2pDetails = $('.tab-pane.active .rec').html();  // Fetch P2P details from the active tab
        //         let p2pName = $('.tab-pane.active .rec1n').html();  // Fetch P2P details from the active tab
        //         let p2pType = $('.tab-pane.active .rec2t').html();  // Fetch P2P details from the active tab
        //         let p2pId = $('.tab-pane.active .rec3i').html();  // Fetch P2P details from the active tab
        //         let p2pAccount = $('.tab-pane.active .rec4a').html();  // Fetch P2P details from the active tab
        //         selectedValue = p2pDetails ? 'P2P Payment Selected' : '';  // Ensure it's not empty 
        //         $('.tumazp2pname').text(p2pName);
        //         $('.tumazp2ptype').text(p2pType);
        //         $('.tumazp2pid').text(p2pId);
        //         $('.tumazp2paccount').text(p2pAccount); 
        
        //     } 
            
            else { 
                selectedValue = '';
            }
        
            // Check if a valid payment method has been selected
            if (selectedValue && selectedValue !== '') { 
        
                // Update the payment method title
        
            // Handle the selected payment method
            if (selectedMethod.startsWith('tab-bank')) {
                // Use the hidden select to get the selected bank details
                let bankName = $('#bankTransferSelect option:selected').text();  // Fetch the selected bank name from the hidden select
                let accountNumber = $('.numb').text().trim();  // Get account number from the DOM
                let accountName = $('.accntnamv').text().trim();  // Get account name from the DOM
                let orderId = $('.orderNumberDisplay').first().text().trim();  // Get order ID 
                
                $('.tumazbankname').text(bankName);
                $('.tumazbanknumber').text(accountNumber);
                $('.tumazbankaccount').text(accountName);
        
                // Check if all bank details are available
                
                
            }
        
        
            
            // Handle the selected payment method
            if (selectedMethod.startsWith('tab-mobile')) {
                // Use the hidden select to get the selected bank details
                let bankName = $('#mobileMoneySelect option:selected').text();  // Fetch the selected bank name from the hidden select
                let phoneNumber = $('.ssns').text().trim();  // Get account number from the DOM
                let accountName = $('.accntnam').text().trim();  // Get account name from the DOM
                let orderId = $('.orderNumberDisplay').first().text().trim();  // Get order ID
         
                $('.tumazmobname').text(bankName);
                $('.tumazmobnumber').text(phoneNumber);
                $('.tumazmobaccount').text(accountName);
         
                // Check if all bank details are available
                
            }
            
            // Handle the selected payment method
            if (selectedMethod.startsWith('tab-crypto')) {
                // Use the hidden select to get the selected bank details
                let bankName = $('#cryptoMoneySelect option:selected').text();  // Fetch the selected bank name from the hidden select
                let phoneNumber = $('.cryptossns').text().trim();  // Get account number from the DOM
                let accountName = $('.cryptoaccntnam').text().trim();  // Get account name from the DOM
                let orderId = $('.orderNumberDisplay').first().text().trim();  // Get order ID
         
                $('.tumazcrypname').text(bankName);
                $('.tumazcrypnumber').text(phoneNumber);
                $('.tumazcrypaccount').text(accountName);
                
        
                // Check if all bank details are available
                
            }
        
             
        
                // Update the payment method title
                  
            let selectedMethodTitle = $('.nav-linkt.active').first().text().trim();
            
                let paymentMethodTitle = selectedMethodTitle;
                let orderId = $('.orderNumberDisplay').first().text().trim();
        //console.log(paymentMethodTitle);
                // $('#step1').hide();
                // $('#step2').show();
            } else {
                // alert('Please select a payment option.');
            }


              // Check if a valid payment method has been selected
    if (isValid) {
        // Get the selected method title for display
        let selectedMethodTitle = $('.nav-linkt.active').first().text().trim();
        let orderId = $('.orderNumberDisplay').first().text().trim();

        $('#step1').hide();
        $('#step2').show();
    } else {
        alert('Please select a payment option.');
    }

    
        });
        
         
        
            // Function to handle "Change" button click for all payment methods
            function handleChangeButtonClick(paymentMethod) {
                $('#step1').hide();  // Hide Step 1
                $('#step4').show();  // Show Step 4 for changing selection
                
                // Update the select dropdown in Step 4 based on the payment method
                switch(paymentMethod) {
                    case 'bank':
                        populateSelect('#changeSelectionSelect', window.bankTransfersData);
                        $('.digagechangepay').text('bank account');
                        $('.digagechangepaybtn').text('Choose bank');
                        break;
                    case 'mobile':
                        populateSelect('#changeSelectionSelect', window.mobileMoneyData);
                        $('.digagechangepay').text('mobile money');
                        $('.digagechangepaybtn').text('Choose provider');
                        break;
                        case 'crypto':
                            populateSelect('#changeSelectionSelect', window.cryptoMoneyData);
                            $('.digagechangepay').text('cryptocurrency');
                            $('.digagechangepaybtn').text('Choose currency');
                            break;
                    case 'p2p':
                        populateSelect('#changeSelectionSelect', window.p2pPaymentsData);
                        break;
                }
            }
        
            // Handle the "Change" button click for Bank Transfer
            $(document).on('click', '.changeSelection', function() {
                handleChangeButtonClick('bank');
            });    
        
            // Handle the "Change" button click for Mobile Money
            $(document).on('click', '.mobmonchangeSelection', function() {
                handleChangeButtonClick('mobile');
            });
        
            // Handle the "Change" button click for crypto Money
            $(document).on('click', '.crymonchangeSelection', function() {
                handleChangeButtonClick('crypto');
            });
        
            // Handle the "Change" button click for P2P
            $(document).on('click', '.p2pchangeSelection', function() {
                handleChangeButtonClick('p2p');
            });
        
            // Handle the "Proceed" button click (go back to Step 1 with updated selection)
            
            // Use event delegation for the nextToStep2 button
            $(document).on('click', '#proceedToStep1', function() {
                //console.log('#proceedToStep1 clicked'); // Debugging log 

                const selectedValue = $('#changeSelectionSelect').val();
                const selectedText = $('#changeSelectionSelect option:selected').text();
        
                // Determine which payment method is active
                let activeMethod = $('.nav-linkt.active').attr('id');
                
                // Update the appropriate select dropdown in Step 1
                switch(activeMethod) {
                    case 'tab-bank':
                        $('#bankTransferSelect').val(selectedValue).trigger('change');
                        break;
                    case 'tab-mobile':
                        $('#mobileMoneySelect').val(selectedValue).trigger('change');
                        break;
                        case 'tab-crypto':
                            $('#cryptoMoneySelect').val(selectedValue).trigger('change');
                            break;
                    case 'tab-p2p':
                        $('#p2pSelect').val(selectedValue).trigger('change');
                        break;
                }
        
                $('#step4').hide();  // Hide Step 4
                $('#step1').show();  // Show Step 1 again
            });
         
            // Use event delegation for the nextToStep2 button
            $(document).on('click', '#backToStep1', function() {
                //console.log('#backToStep1 clicked'); // Debugging log 


                $('#step2').hide();
                $('#step1').show();
            });
        
            
            // Use event delegation for the nextToStep2 button

            // Handle file selection and upload
// Handle file selection and upload
$(document).on('change', '#screenshotFile', function (e) {
    if (!this.value) {
        $('#file-upload-error').text('Please select a file to upload');
        return;
    }
    $('#file-upload-error').text('');

    const uploadedFile = e.target.files[0];
    if (uploadedFile) {
        // Hide initial placeholder and show preview
        $('#imagePreviewi').hide();
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImage').attr('src', e.target.result);
            $('#imagePreview').show();
            $('.digagagesuploadimg').show();
            
        };
        reader.readAsDataURL(uploadedFile);

        // Show file name and progress bar
        // Show file name (truncate to 30 characters with "..." if longer)
        const fileName = uploadedFile.name;
        const maxLength = 31;
        const truncatedFileName = fileName.length > maxLength 
            ? fileName.substring(0, maxLength - 3) + '...' 
            : fileName;
        $('#fileName').text(truncatedFileName);

        // $('#fileName').text(uploadedFile.name);
        $('#uploadDetails').show();
        $('.uploaddetailsww').show();
        $('.digagagesuploadimg').show();
        $('#progressWrapper').show();
        $('#fileSize').hide();
        $('#deleteUpload').hide();

        // Prepare FormData for upload
        const formData = new FormData();
        formData.append('action', 'digages_upload_screenshot');
        formData.append('order_id', $('.orderNumberDisplay').first().text().trim());
        formData.append('payment_method_title', $('.nav-linkt.active').first().text().trim());
        formData.append('status', 'on-hold');
        formData.append('nonce', ajax_object.nonce);
        formData.append('screenshot', uploadedFile);

        // AJAX upload with progress and cancel
        const xhr = new XMLHttpRequest();
        xhr.open('POST', ajax_object.ajaxurl, true);

        // Progress bar
        xhr.upload.onprogress = function (e) {
            if (e.lengthComputable) {
                const percentComplete = (e.loaded / e.total) * 100;
                $('#uploadProgress').val(percentComplete);
            }
        };

        // Cancel upload
        let isCancelled = false;
        $('#cancelUpload').on('click', function () {
            xhr.abort();
            isCancelled = true;
            resetUploadUI();
        });

        // On upload complete
        xhr.onload = function () {
            if (xhr.status === 200 && !isCancelled) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    let redirectUrl = response.data.redirect; // Store the redirect value from backend
                    $('#progressWrapper').hide();
                    $('#fileSize').text(`${(uploadedFile.size / 1024).toFixed(2)} KB`).show();
                    $('#deleteUpload').show();
                    $('.imageprocess').html(`<button type="button" class="ppopbtnq" id="nextToStep3">Submit for confirmation</button>`);

                    // Store redirectUrl globally or pass it via data attribute
                    window.redirectUrl = redirectUrl; // Store globally for later use
                } else {
                    $('#file-upload-error').text('Upload failed: ' + (response.data.message || 'Unknown error'));
                    resetUploadUI();
                }
            }
        };

        xhr.onerror = function () {
            $('#file-upload-error').text('Upload error occurred.');
            resetUploadUI();
        };

        xhr.send(formData);

        // Delete uploaded file
        $('#deleteUpload').on('click', function () {
            resetUploadUI();
        });
    }
});

// Handle "Submit for confirmation" button click
$(document).on('click', '#nextToStep3', function () {
    let redirectUrl = window.redirectUrl; // Retrieve the redirect URL set during upload

    // Fetch order ID and payment method title
    const orderId = $('.orderNumberDisplay').first().text().trim();
    const selectedMethodTitle = $('.nav-linkt.active').first().text().trim();

    // Countdown logic (optional UI feedback)
    let countdown = 5;
    const countdownInterval = setInterval(function () {
        $('.digages_countdownDisplay').text(countdown); // Update countdown display if element exists
        countdown--;
        if (countdown < 1) {
            clearInterval(countdownInterval);
        }
    }, 1000);

    // Update order status via AJAX
    $.ajax({
        url: ajax_object.ajaxurl,
        method: 'POST',
        data: {
            action: 'digages_update_order_status',
            order_id: orderId,
            status: 'on-hold',
            nonce: ajax_object.nonce
        },
        success: function (response) {
            if (!response.success) {
                console.error('Failed to update order status:', response.data);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error updating order status:', error);
        }
    });

    // Handle P2P payment details if applicable
    if ($('.nav-linkt.active').attr('id').startsWith('tab-p2p')) {
        const p2pDetails = $('.tab-pane.active .rec').html();
        const p2pName = $('.tab-pane.active .rec1n').html();
        const p2pType = $('.tab-pane.active .rec2t').html();
        const p2pId = $('.tab-pane.active .rec3i').html();
        const p2pAccount = $('.tab-pane.active .rec4a').html();
        const custp2pDetails = $('.tab-pane.active .custp2p').html();
        const userEmail = $('.tumaz_displayEmail').first().text().trim();
        const woodpcurrency = $('.digages-woodp-order-currency').text().trim();
        const woodpcurrencyamount = $('.digages-woodp-order-amount').text().trim();
        const dtumamount = digagesData.dtumamount;

        const emailFormData = {
            action: 'digages_send_p2p_confirmation',
            order_id: orderId,
            user_email: userEmail,
            bankName: p2pName || '',
            phoneNumber: p2pId || '',
            accountName: p2pAccount || '',
            p2p_details: p2pDetails || '',
            p2p_cusdetails: custp2pDetails || '',
            dtum_amount: dtumamount,
            woodpcurrency: woodpcurrency,
            woodpcurrencyamount: woodpcurrencyamount,
            nonce: ajax_object.nonce
        };

        if (p2pDetails) {
            sendEmailAndRedirect(emailFormData, redirectUrl);
        }
    }

    // Handle Bank Transfer payment details
    if ($('.nav-linkt.active').attr('id').startsWith('tab-bank')) {
        const btDetails = $('.tab-pane.active .bankt').html();
        const custbtDetails = $('.tab-pane.active .custbankt').html();
        const userEmail = $('.tumaz_displayEmail').first().text().trim();
        const bankName = $('.tumazbankname').text().trim();
        const accountNumber = $('.tumazbanknumber').text().trim();
        const accountName = $('.tumazbankaccount').text().trim();
        const woodpcurrency = $('.digages-woodp-order-currency').text().trim();
        const woodpcurrencyamount = $('.digages-woodp-order-amount').text().trim();
        const dtumamount = digagesData.dtumamount;

        const emailFormData = {
            action: 'digages_send_p2p_confirmation',
            order_id: orderId,
            user_email: userEmail,
            bankName: bankName,
            phoneNumber: accountNumber,
            accountName: accountName,
            p2p_details: btDetails || '',
            p2p_cusdetails: custbtDetails || '',
            dtum_amount: dtumamount,
            woodpcurrency: woodpcurrency,
            woodpcurrencyamount: woodpcurrencyamount,
            nonce: ajax_object.nonce
        };

        if (btDetails) {
            sendEmailAndRedirect(emailFormData, redirectUrl);
        }
    }

    // Handle Mobile Money payment details
    if ($('.nav-linkt.active').attr('id').startsWith('tab-mobile')) {
        const mmDetails = $('.tab-pane.active .mmt').html();
        const custmmDetails = $('.tab-pane.active .custmmt').html();
        const userEmail = $('.tumaz_displayEmail').first().text().trim();
        const bankName = $('.tumazmobname').text().trim();
        const phoneNumber = $('.tumazmobnumber').text().trim();
        const accountName = $('.tumazmobaccount').text().trim();
        const woodpcurrency = $('.digages-woodp-order-currency').text().trim();
        const woodpcurrencyamount = $('.digages-woodp-order-amount').text().trim();
        const dtumamount = digagesData.dtumamount;

        const emailFormData = {
            action: 'digages_send_p2p_confirmation',
            order_id: orderId,
            user_email: userEmail,
            bankName: bankName,
            phoneNumber: phoneNumber,
            accountName: accountName,
            p2p_details: mmDetails || '',
            p2p_cusdetails: custmmDetails || '',
            dtum_amount: dtumamount,
            woodpcurrency: woodpcurrency,
            woodpcurrencyamount: woodpcurrencyamount,
            nonce: ajax_object.nonce
        };

        if (mmDetails) {
            sendEmailAndRedirect(emailFormData, redirectUrl);
        }
    }

    // Handle Crypto payment details
    if ($('.nav-linkt.active').attr('id').startsWith('tab-crypto')) {
        const crDetails = $('.tab-pane.active .cet').html();
        const custcrDetails = $('.tab-pane.active .custcrt').html();
        const userEmail = $('.tumaz_displayEmail').first().text().trim();
        const bankName = $('.tumazcrypname').text().trim();
        const phoneNumber = $('.tumazcrypnumber').text().trim();
        const accountName = $('.tumazcrypaccount').text().trim();
        const woodpcurrency = $('.digages-woodp-order-currency').text().trim();
        const woodpcurrencyamount = $('.digages-woodp-order-amount').text().trim();
        const dtumamount = digagesData.dtumamount;

        const emailFormData = {
            action: 'digages_send_p2p_confirmation',
            order_id: orderId,
            user_email: userEmail,
            bankName: bankName,
            phoneNumber: phoneNumber,
            accountName: accountName,
            p2p_details: crDetails || '',
            p2p_cusdetails: custcrDetails || '',
            dtum_amount: dtumamount,
            woodpcurrency: woodpcurrency,
            woodpcurrencyamount: woodpcurrencyamount,
            nonce: ajax_object.nonce
        };

        if (crDetails) {
            sendEmailAndRedirect(emailFormData, redirectUrl);
        }
    }

    // Resend order email and redirect
    $.ajax({
        url: ajax_object.ajaxurl,
        method: 'POST',
        data: {
            action: 'digages_resend_order_email',
            order_id: orderId,
            nonce: ajax_object.nonce
        },
        success: function (response) {
            if (response.success) {
                redirectUrl = response.data.redirect || redirectUrl; // Update redirect URL if provided
                setTimeout(() => {
                    window.location.href = redirectUrl;
                }, 5000);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error resending order email:', error);
        }
    });

    // Transition to step 3 (if applicable)
    $('#step2').hide();
    $('#step3').show();
});

// Reset UI function
function resetUploadUI() {
    $('#imagePreview').hide();
    $('#imagePreviewi').show();
    $('#uploadDetails').hide();
    $('.digagagesuploadimg').hide();
    $('.uploaddetailsww').hide();
    $('#screenshotFile').val('');
    $('.imageprocess').html(`<button type="button" class="ppopbtnq" id="sendimagedetails" disabled>Submit for confirmation</button>`);
}

// Helper function to send email and redirect
function sendEmailAndRedirect(emailFormData, redirectUrl) {
    $.ajax({
        url: ajax_object.ajaxurl,
        method: 'POST',
        data: emailFormData,
        success: function (response) {
            if (response.success) {
                redirectUrl = response.data.redirect || redirectUrl; // Update redirect URL if provided
                setTimeout(() => {
                    window.location.href = redirectUrl;
                }, 5000);
            } else {
                console.error('Email sending failed:', response.data);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error sending email:', error);
        }
    });
}

// Handle manual redirect button (if needed)
$(document).on('click', '#nextToStepm3', function (e) {
    e.preventDefault();
    const redirectUrl = window.redirectUrl; // Retrieve stored redirect URL
    if (redirectUrl) {
        window.location.href = redirectUrl;
    } else {
        console.error('Redirect URL is not set');
    }
});
         
            
         
                // Use event delegation for the nextToStep2 button
                $(document).on('click', '#customButton', function(e) {
                    //console.log('#customButton clicked'); // Debugging log  
                    
                $('#screenshotFile').click();
            });



 // Add the copy functionality using jQuery
 $(document).on('click', '.copybank', function(e) {
    e.preventDefault();
    
    // Store reference to the clicked button
    let $copyButton = $(this);
    
    // Store original text
    let originalText = $copyButton.html();
    
    // Find the related accounnumber div
    let $accountNumberDiv = $(this).closest('.account-container').find('.accounnumber');
    
    if ($accountNumberDiv.length) {
        let textToCopy = $accountNumberDiv.text().trim();
        
        // Try using Clipboard API
        if (navigator.clipboard) {
            navigator.clipboard.writeText(textToCopy)
                .then(() => {
                    // Show check icon
                    $copyButton.html('<i class="bi bi-check-circle-fill tumaz_copied_pop"></i>');
                    
                    // Revert back to original text after 2 seconds
                    setTimeout(() => {
                        $copyButton.html(originalText);
                    }, 2000);
                })
                .catch(err => {
                    console.error('Failed to copy: ', err);
                    // Fallback method
                    fallbackCopyText(textToCopy, $copyButton, originalText);
                });
        } else {
            // Fallback for older browsers
            fallbackCopyText(textToCopy, $copyButton, originalText);
        }
    } else {
        console.error('Account number element not found');
    }
});


            
        });
        
    }

    
    
    // Fallback method for older browsers
    function fallbackCopyText(text, $button, originalText) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        textArea.style.position = 'fixed';
        textArea.style.top = '0';
        textArea.style.left = '0';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        
        try {
            const successful = document.execCommand('copy');
            // Show check icon
            $button.html('<i class="bi bi-check-circle-fill tumaz_copied_pop"></i>');
            
            // Revert back to original text after 2 seconds
            setTimeout(() => {
                $button.html(originalText);
            }, 2000);
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
        }
        
        document.body.removeChild(textArea);
    }

        // Call a function that does something
        //digagespoppay();


   // Function to trigger click and run main function
   function triggerClickAndRun() {
    $('.your-button-class').trigger('click');
    digagespoppay();
    
}
 

// Set timeout for 3 seconds, then trigger click and run main function
setTimeout(triggerClickAndRun, 3000); 

});


