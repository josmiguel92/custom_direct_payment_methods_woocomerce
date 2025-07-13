// Function to monitor WooCommerce order total and split into currency and amount
function monitorOrderTotal() {
    // Function to extract and update the values
    function updatePriceElements() {
      // Find the order total price element
      const orderTotalElement = document.querySelector('tr.order-total .woocommerce-Price-amount.amount');
      
      if (orderTotalElement) {
        // Get the currency symbol element
        const currencyElement = orderTotalElement.querySelector('.woocommerce-Price-currencySymbol');
        
        if (currencyElement) {
          // Extract the currency symbol (e.g., '$')
          const currencySymbol = currencyElement.textContent;
          
          // Get the full price text and remove the currency symbol to get just the amount
          const fullPriceText = orderTotalElement.textContent;
          const amountText = fullPriceText.replace(currencySymbol, '').trim();
          
          // Process the amount for the third class (no commas, optional decimals)
          const numericAmount = parseFloat(amountText.replace(/,/g, ''));
          let simplifiedAmount;
          
          // Check if decimals are .00 and remove them if so
          if (numericAmount % 1 === 0) {
            // It's a whole number, no decimals needed
            simplifiedAmount = Math.floor(numericAmount).toString();
          } else {
            // Has meaningful decimals, keep them
            simplifiedAmount = numericAmount.toString();
          }
          
          // Find all elements with our custom classes
          const currencyElements = document.querySelectorAll('.digages-woodp-order-currency');
          const amountElements = document.querySelectorAll('.digages-woodp-order-amount');
          const simplifiedAmountElements = document.querySelectorAll('.digages-woodp-order-amount-simplified');
          
          // Update all currency elements
          if (currencyElements.length > 0) {
            currencyElements.forEach(element => {
              if (element.textContent !== currencySymbol) {
                element.textContent = currencySymbol;
              }
            });
          } else {
            // Create an element if none exist
            const newCurrencyElement = document.createElement('span');
            newCurrencyElement.className = 'digages-woodp-order-currency';
            newCurrencyElement.textContent = currencySymbol;
            document.body.appendChild(newCurrencyElement);
          }
          
          // Update all amount elements
          if (amountElements.length > 0) {
            amountElements.forEach(element => {
              if (element.textContent !== amountText) {
                element.textContent = amountText;
              }
            });
          } else {
            // Create an element if none exist
            const newAmountElement = document.createElement('span');
            newAmountElement.className = 'digages-woodp-order-amount';
            newAmountElement.textContent = amountText;
            document.body.appendChild(newAmountElement);
          }
          
          // Update all simplified amount elements
          if (simplifiedAmountElements.length > 0) {
            simplifiedAmountElements.forEach(element => {
              if (element.textContent !== simplifiedAmount) {
                element.textContent = simplifiedAmount;
              }
            });
          } else {
            // Create an element if none exist
            const newSimplifiedElement = document.createElement('span');
            newSimplifiedElement.className = 'digages-woodp-order-amount-simplified';
            newSimplifiedElement.textContent = simplifiedAmount;
            document.body.appendChild(newSimplifiedElement);
          }
        }
      }
    }
    
    // Initial update
    updatePriceElements();
    
    // Set up a MutationObserver to detect changes in the DOM
    const observer = new MutationObserver(function(mutations) {
      updatePriceElements();
    });
    
    // Start observing the document with the configured parameters
    observer.observe(document.body, { 
      childList: true,
      subtree: true,
      characterData: true
    });
    
    // Additionally, check every millisecond (though this is very resource-intensive)
    // This is a fallback in case the MutationObserver misses something
    setInterval(updatePriceElements, 1);
  }
  
  // Run the function when the DOM is fully loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', monitorOrderTotal);
  } else {
    monitorOrderTotal();
  }