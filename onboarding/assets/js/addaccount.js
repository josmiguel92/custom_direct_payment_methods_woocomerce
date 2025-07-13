// Keep your original radio toggle function
function toggleRadio(event, element) {
    //console.log('Radio toggle clicked', element);
    event.stopPropagation(); // Prevents <summary> toggle
    const details = element.closest('details');
    //console.log('Found parent details for radio:', details);
    details.classList.toggle('digages-onboard-addacnt-checked'); // Toggle only the clicked item
    //console.log('Toggled checked class on details');
}

// Optional: Explicit chevron toggle
document.querySelectorAll('.digages-onboard-addacnt-chevron').forEach(chevron => {
    chevron.addEventListener('click', (event) => {
        //console.log('Chevron clicked', chevron);
        const details = chevron.closest('details');
        //console.log('Toggling details open state from', details.open, 'to', !details.open);
        details.open = !details.open;
        event.stopPropagation(); // Added to prevent event bubbling
    });
});

// Function to ensure only one details is open and has the checked class
document.addEventListener('DOMContentLoaded', function() {
    //console.log('DOM fully loaded');
    const allDetails = document.querySelectorAll('details');
    //console.log('Found', allDetails.length, 'details elements:', allDetails);
    
    // Add event listeners for handling accordion behavior
    allDetails.forEach((details, index) => {
        //console.log('Setting up listeners for details #', index);
        
        // Track the toggle event which fires when open state changes
        details.addEventListener('toggle', function(event) {
            //console.log('Toggle event fired on details #', index);
            //console.log('Current open state:', details.open);
            
            if (details.open) {
                //console.log('This details was opened, closing others');
                // Close all other details and remove checked class
                allDetails.forEach((otherDetails, otherIndex) => {
                    if (otherDetails !== details) {
                        if (otherDetails.open) {
                            //console.log('Closing details #', otherIndex);
                            otherDetails.open = false;
                        }
                        // Remove checked class from all other details
                        if (otherDetails.classList.contains('digages-onboard-addacnt-checked')) {
                            //console.log('Removing checked class from details #', otherIndex);
                            otherDetails.classList.remove('digages-onboard-addacnt-checked');
                        }
                    }
                });
                
                // Add checked class to the current details if it doesn't have it
                if (!details.classList.contains('digages-onboard-addacnt-checked')) {
                    //console.log('Adding checked class to details #', index);
                    details.classList.add('digages-onboard-addacnt-checked');
                }
            }
        });
    });
});

// Add click listener to document to ensure proper class management on summary clicks
document.addEventListener('click', function(event) {
    const clickedSummary = event.target.closest('summary');
    
    if (clickedSummary) {
        //console.log('Summary element clicked');
        const clickedDetails = clickedSummary.closest('details');
        
        // Wait a tiny bit for the default toggle behavior to complete
        setTimeout(function() {
            const allDetails = document.querySelectorAll('details');
            
            allDetails.forEach((details) => {
                // If details is open but not the clicked one, close it and remove class
                if (details !== clickedDetails && details.open) {
                    details.open = false;
                    details.classList.remove('digages-onboard-addacnt-checked');
                }
                
                // If it's the clicked details and it's open, ensure it has the class
                if (details === clickedDetails && details.open) {
                    details.classList.add('digages-onboard-addacnt-checked');
                }
            });
        }, 10);
    }
});