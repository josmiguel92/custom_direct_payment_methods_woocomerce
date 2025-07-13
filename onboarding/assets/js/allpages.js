document.addEventListener("DOMContentLoaded", function () {
    
    // Debug log function
    function debugLog(message, data) {
        //console.log(message, data);
    }

    // Function to load a page
    function loadPage(page) {
        
        debugLog("Loading page:", page);
        fetch(digages_admin_ajax.ajax_url + "?action=digages_load_page&digages_page=" + page)
            .then(response => response.text())
            .then(data => {
                document.getElementById("digages-content").innerHTML = data; 
                
                // Only save the page if it's not already loading from saved state
                if (!window.digages_initial_load) {
                    savePage(page);
                }
            })
            .catch(error => {
                console.error("Error loading page:", error); 
            });
    }

    // Function to save the current page to wp_options
    function savePage(page) {
        debugLog("Saving page:", page);
        const formData = new FormData();
        formData.append('action', 'digages_save_page');
        formData.append('page', page);
        formData.append('security', digages_admin_ajax.nonce);

        fetch(digages_admin_ajax.ajax_url, {
            method: 'POST',
            credentials: 'same-origin',
            body: formData
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            debugLog("Save response data:", data);
        })
        .catch(error => console.error("Error saving page:", error));
    }

    // Flag to track initial load status
    window.digages_initial_load = true;

    // Get the current page from wp_options
    debugLog("Fetching saved page", null);
    fetch(digages_admin_ajax.ajax_url, {
        method: 'POST',
        credentials: 'same-origin',
        body: new URLSearchParams({
            'action': 'digages_get_current_page',
            'security': digages_admin_ajax.nonce
        })
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        debugLog("Get page response data:", data);
        
        // After loading completes, turn off initial load flag
        setTimeout(() => {
            window.digages_initial_load = false;
            debugLog("Initial load completed", null);
        }, 1000);
        
        // FIXED: WordPress wraps the response in a data property
        if (data && data.success === true && data.data && data.data.page) {
            debugLog("SUCCESS condition met. Loading saved page:", data.data.page);
            const savedPage = data.data.page;
            loadPage(savedPage === 'success' ? 'home' : savedPage);
        } else {
            debugLog("FAILURE condition. Details:", {
                "data exists": !!data,
                "success property": data ? data.success : "no data",
                "data.data exists": data && !!data.data,
                "page property": data && data.data ? data.data.page : "no data.data"
            });
            loadPage('home');
        }
    })
    .catch(error => {
        console.error("Error getting saved page:", error);
        window.digages_initial_load = false;
        loadPage('home');
        
    });

    // Event delegation for links and buttons inside #digages-content
    document.getElementById("digages-content").addEventListener("click", function (event) {
        let target = event.target;

        // Check if the clicked element is a button with data-page
        if (target.tagName === "BUTTON" && target.hasAttribute("data-page")) {
            event.preventDefault();
            loadPage(target.getAttribute("data-page"));
        }

        // Check if the clicked element is a link with data-page
        if (target.tagName === "A" && target.hasAttribute("data-page")) {
            event.preventDefault();
            loadPage(target.getAttribute("data-page"));
        }
    });

    
});