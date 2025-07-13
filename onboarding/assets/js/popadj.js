document.addEventListener("DOMContentLoaded", function () {
    function movePopupToBodyrr() {
        let popuprr = document.querySelector(".digages-onboard-addacnt-popup-container-adjust");
        if (popuprr && popuprr.parentNode !== document.body) {
            popuprr.parentNode.removeChild(popuprr);
            document.body.appendChild(popuprr);
        }
    }
    
    // Run initially
    movePopupToBodyrr();
    
    // Observe DOM changes in case the popup is moved
    const observer = new MutationObserver(movePopupToBodyrr);
    observer.observe(document.documentElement, { childList: true, subtree: true });
});

