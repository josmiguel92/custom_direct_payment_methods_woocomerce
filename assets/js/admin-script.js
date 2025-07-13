document.addEventListener("DOMContentLoaded", function () {
    function loadPage(page) {
        fetch(digages_admin_ajax.ajax_url + "?action=digages_load_page&digages_page=" + page)
            .then(response => response.text())
            .then(data => {
                document.getElementById("digages-content").innerHTML = data;
            })
            .catch(error => console.error("Error loading page:", error));
    }

    // Function to delegate click event inside #digages-content
    document.getElementById("digages-content").addEventListener("click", function (event) {
        let target = event.target;
        if (target.tagName === "A" && target.hasAttribute("data-page")) {
            event.preventDefault();
            loadPage(target.getAttribute("data-page"));
        }
    });
});
