document.addEventListener('DOMContentLoaded', function() {
    // Function to check if the target element exists
    const checkForTargetElement = () => {
      // Use mutation observer to detect when elements with digages-fade-in class appear
      const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
          if (mutation.addedNodes && mutation.addedNodes.length > 0) {
            // Check each added node
            mutation.addedNodes.forEach((node) => {
              // Check if the node itself has the class
              if (node.classList && node.classList.contains('digages-fade-in')) {
                showLoading();
              }
              
              // Also check for child elements with the class
              if (node.querySelectorAll) {
                const fadeInElements = node.querySelectorAll('.digages-fade-in');
                if (fadeInElements.length > 0) {
                  showLoading();
                }
              }
            });
          }
        });
      });
  
      // Start observing the document with the configured parameters
      observer.observe(document.body, { childList: true, subtree: true });
      
      // Also check if target elements already exist on page load
      const existingElements = document.querySelectorAll('.digages-fade-in');
      if (existingElements.length > 0) {
        showLoading();
      }
    };
  
    // Loading screen functions
    function showLoading() {
      // Check if loading overlay already exists to prevent duplicates
      if (!document.getElementById('loading-overlay')) {
        const overlay = document.createElement('div');
        overlay.id = 'loading-overlay';
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.background = '#F7F7FD';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.zIndex = '9999';
        
        const loaderContainer = document.createElement('div');
        
        const loaderImg = document.createElement('img');
        loaderImg.src = '../wp-content/plugins/direct-payments-for-woocommerce/assets/img/poploaderr.svg'; 
        loaderImg.width = 30;
        loaderImg.height = 30;
        
        loaderContainer.appendChild(loaderImg);
        overlay.appendChild(loaderContainer);
        
        document.body.appendChild(overlay);
        
        // Automatically hide the overlay after 3 seconds
        setTimeout(hideLoading, 3000);
      }
    }
  
    function hideLoading() {
      const loadingOverlay = document.getElementById('loading-overlay');
      if (loadingOverlay) {
        loadingOverlay.remove();
      }
    }
  
    // Initialize the element checking
    checkForTargetElement();
    
    // Add event listener for buttons to hide the overlay when clicked
    document.addEventListener('click', function(event) {
      if (event.target.classList.contains('digages-onboard-launchbtn') || 
          event.target.classList.contains('digages-onboard-skip-setup')) {
        // Hide loading immediately when buttons are clicked
        hideLoading();
      }
    });
  });