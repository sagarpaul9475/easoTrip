document.getElementById("ladakh").addEventListener("click", function() {
    window.location.href = "holiday/places/loader.html";
});

document.getElementById("shimla").addEventListener("click", function() {
    window.location.href = "holiday/places/shimla-loader.html";
});

document.getElementById("darjeeling").addEventListener("click", function() {
    window.location.href = "holiday/places/darjeeling-loader.html";
});

function manali(){
    window.open('holiday/places/manali-loader.html');
}


    function updateNightsValue() {
        const nightsRange = document.getElementById('nightsRange');
        const nightsValue = document.getElementById('nightsValue');
        nightsValue.textContent = nightsRange.value + ' Nights'; // Updates the nights display
    }

    function updateBudgetValue() {
        const budgetRange = document.getElementById('budgetRange');
        const budgetValue = document.getElementById('budgetValue');
        budgetValue.textContent = '₹' + Number(budgetRange.value).toLocaleString(); // Updates the budget display
    }

// script.js
function searchPackages() {
    // Get the search input value and convert it to lowercase for case-insensitive search
    let input = document.getElementById('searchInput').value.toLowerCase();

    // Get all the package elements
    let packages = document.getElementsByClassName('package');

    // Loop through all packages and show/hide based on search input
    for (let i = 0; i < packages.length; i++) {
        // Get the title of the package
        let packageTitle = packages[i].getElementsByTagName('h3')[0].textContent.toLowerCase();
        
        // Check if the package title contains the search input
        if (packageTitle.includes(input)) {
            packages[i].style.display = "";  // Show the package if it matches
        } else {
            packages[i].style.display = "none";  // Hide the package if it doesn't match
        }
    }
}



