document.addEventListener("DOMContentLoaded", function () {
    function movePopupToBody() {
        let popup = document.querySelector(".digages_popup");
        if (popup && popup.parentNode !== document.body) {
            popup.parentNode.removeChild(popup);
            document.body.appendChild(popup);
        }
    }
    
    // Run initially
    movePopupToBody();
    
    // Observe DOM changes in case the popup is moved
    const observer = new MutationObserver(movePopupToBody);
    observer.observe(document.documentElement, { childList: true, subtree: true });
});

