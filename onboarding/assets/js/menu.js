document.addEventListener('DOMContentLoaded', function () {
    // Handle dropdown button clicks using delegation
    document.addEventListener('click', function (event) {
        const button = event.target.closest('.digages-onboard-addacnt-menudropdown-button');
        
        // If a dropdown button was clicked
        if (button) {
            event.stopPropagation(); // Prevent the click from bubbling up

            const dropdown = button.closest('.digages-onboard-addacnt-menudropdown');
            
            // Close all other dropdowns
            document.querySelectorAll('.digages-onboard-addacnt-menudropdown').forEach(d => {
                if (d !== dropdown) {
                    d.classList.remove('digages-onboard-addacnt-menuactive');
                }
            });

            // Toggle the current dropdown
            dropdown.classList.toggle('digages-onboard-addacnt-menuactive');
        } else {
            // If clicking outside, close all dropdowns
            document.querySelectorAll('.digages-onboard-addacnt-menudropdown').forEach(dropdown => {
                dropdown.classList.remove('digages-onboard-addacnt-menuactive');
            });
        }
    });
});