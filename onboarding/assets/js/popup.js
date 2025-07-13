

document.addEventListener('click', function(e) {
    // Popup trigger
    if (e.target.classList.contains('digages-onboard-addacnt-popup-trigger')) {
        const targetId = e.target.getAttribute("data-target");
        document.getElementById(targetId).classList.add("active");
        document.querySelector(".digages-onboard-addacnt-popup-overlay").classList.add("active");
        document.body.classList.add("no-scroll");
    }

    // Popup close
    if (e.target.classList.contains('digages-onboard-addacnt-popup-close')) {
        e.target.closest(".digages-onboard-addacnt-popup-container").classList.remove("active");
        document.querySelector(".digages-onboard-addacnt-popup-overlay").classList.remove("active");
        document.body.classList.remove("no-scroll");
    }

    // Overlay close
    if (e.target.classList.contains('digages-onboard-addacnt-popup-overlay')) {
        document.querySelectorAll(".digages-onboard-addacnt-popup-container.active").forEach(sidebar => {
            sidebar.classList.remove("active");
        });
        e.target.classList.remove("active");
        document.body.classList.remove("no-scroll");
    }
});