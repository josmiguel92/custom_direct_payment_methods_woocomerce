(function() {
    'use strict';
    
    //console.log('Script initialized');
    
    // Function to check if element exists and is clickable
    function isElementReady(selector) {
        const element = document.querySelector(selector);
        return element && element.offsetParent !== null;
    }
    
    // Debounce function to prevent multiple rapid clicks
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Enhanced media query check with fallback
    function isMobileView() {
        if (window.matchMedia) {
            return window.matchMedia("(max-width: 767px)").matches;
        }
        // Fallback for older browsers
        return window.innerWidth <= 767;
    }
    
    // Main initialization function
    function initializeHandlers() {
        //console.log('Initializing handlers');
        
        // Handle .btnx clicks with debouncing
        const handleBtnxClick = debounce(function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            //console.log('btnx clicked - handler triggered');
            
            try {
                if (isMobileView()) {
                    //console.log('Mobile view detected - executing mobile actions');
                    
                    // Hide .allbtn with multiple methods for reliability
                    const allBtnElements = document.querySelectorAll('.allbtn');
                    allBtnElements.forEach(el => {
                        el.style.display = 'none';
                        el.style.visibility = 'hidden';
                        el.setAttribute('aria-hidden', 'true');
                    });
                    
                    // Show .allclass with multiple methods
                    const allClassElements = document.querySelectorAll('.allclass');
                    allClassElements.forEach(el => {
                        el.classList.remove('hidden');
                        el.classList.add('show');
                        el.style.display = 'block';
                        el.style.visibility = 'visible';
                        el.setAttribute('aria-hidden', 'false');
                    });
                    
                    //console.log('Mobile actions completed');
                } else {
                    //console.log('Desktop view - no action needed');
                }
            } catch (error) {
                console.error('Error in btnx click handler:', error);
            }
        }, 200);
        
        // Handle .goback clicks with debouncing
        const handleGobackClick = debounce(function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            //console.log('goback clicked - handler triggered');
            
            try {
                // Hide .allclass with multiple methods
                const allClassElements = document.querySelectorAll('.allclass');
                allClassElements.forEach(el => {
                    el.classList.remove('show');
                    el.classList.add('hidden');
                    el.style.display = 'none';
                    el.style.visibility = 'hidden';
                    el.setAttribute('aria-hidden', 'true');
                });
                
                // Show .allbtn with multiple methods
                const allBtnElements = document.querySelectorAll('.allbtn');
                allBtnElements.forEach(el => {
                    el.style.display = 'block';
                    el.style.visibility = 'visible';
                    el.setAttribute('aria-hidden', 'false');
                });
                
                //console.log('Goback actions completed');
            } catch (error) {
                console.error('Error in goback click handler:', error);
            }
        }, 200);
        
        // Use multiple event delegation methods for maximum compatibility
        
        // Method 1: Document event delegation
        document.addEventListener('click', function(e) {
            if (e.target.matches('.btnx') || e.target.closest('.btnx')) {
                handleBtnxClick(e);
            }
            if (e.target.matches('.goback') || e.target.closest('.goback')) {
                handleGobackClick(e);
            }
        }, true);
        
        // Method 2: Body event delegation (fallback)
        document.body.addEventListener('click', function(e) {
            if (e.target.matches('.btnx') || e.target.closest('.btnx')) {
                handleBtnxClick(e);
            }
            if (e.target.matches('.goback') || e.target.closest('.goback')) {
                handleGobackClick(e);
            }
        });
        
        // Method 3: jQuery delegation (if jQuery is available)
        if (typeof $ !== 'undefined' && $.fn) {
            $(document).off('click.btnhandler').on('click.btnhandler', '.btnx', handleBtnxClick);
            $(document).off('click.gobackhandler').on('click.gobackhandler', '.goback', handleGobackClick);
        }
        
        //console.log('All handlers initialized successfully');
    }
    
    // Multiple initialization methods to ensure the script runs
    
    // Method 1: Immediate execution if DOM is already ready
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        setTimeout(initializeHandlers, 10);
    }
    
    // Method 2: DOMContentLoaded event
    document.addEventListener('DOMContentLoaded', initializeHandlers);
    
    // Method 3: Window load event (fallback)
    window.addEventListener('load', initializeHandlers);
    
    // Method 4: jQuery ready (if available)
    if (typeof $ !== 'undefined' && $.fn) {
        $(document).ready(initializeHandlers);
    }
    
    // Method 5: Fallback timer (last resort)
    setTimeout(function() {
        if (document.body) {
            initializeHandlers();
        }
    }, 1000);
    
    // Add resize handler to update mobile view detection
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            //console.log('Window resized - mobile view:', isMobileView());
        }, 250);
    });
    
    //console.log('Robust button handler script loaded');
})();
