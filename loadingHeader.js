document.addEventListener("DOMContentLoaded", function() {
    fetch('header.html')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('header-placeholder').innerHTML = data;

            // Apply consistent font styling to dynamically loaded header
            const headerElement = document.getElementById('header-placeholder');
            if (headerElement) {
                headerElement.style.fontFamily = "'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif";
            }
        })
        .catch(error => {
            console.error('Error fetching header.html:', error);
        });
});

