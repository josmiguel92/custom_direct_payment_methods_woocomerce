// Create this file as js/payment-method-handler.js in your plugin directory
//console.log('payment-method-handler.js loaded');

// Event delegation for payment method checkbox changes
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('payment-method-checkbox')) {
        const checkbox = e.target;
        if (checkbox.checked) {
            // Uncheck all other payment method checkboxes
            document.querySelectorAll('.payment-method-checkbox').forEach(otherCheckbox => {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });

            // Enable the WooCommerce save button (if present)
            const saveButton = document.querySelector('.woocommerce-save-button');
            if (saveButton) {
                saveButton.disabled = false;
            }
        }
    }
});

// Initialize on page load - ensure only one checkbox is checked
function initializeCheckboxes() {
    const checkedCheckboxes = document.querySelectorAll('.payment-method-checkbox:checked');
    if (checkedCheckboxes.length > 1) {
        // Keep only the first checked checkbox
        checkedCheckboxes.forEach((checkbox, index) => {
            if (index > 0) {
                checkbox.checked = false;
            }
        });
    }
}

// Run initialization when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', initializeCheckboxes);