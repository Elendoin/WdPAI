let browseContainer = document.querySelector(".browse-container");

function toggleStats() {
    let stats = document.querySelector(".stats");
    console.log(stats.style.display);
    if(stats.style.display === "flex") {
        stats.style.display = "none";
        browseContainer.style.filter = "brightness(100%)";
    }
    else{
        stats.style.display = "flex";
        browseContainer.style.filter = "brightness(25%)";
    }
}

document.addEventListener("click", function(event) {
    let stats = document.querySelector(".stats");
    let button = document.getElementById("stats-button");
    if (event.target === button) {
        toggleStats();
    }
    else if (event.target !== button && !stats.contains(event.target)) {
        stats.style.display = "none";
        browseContainer.style.filter = "brightness(100%)";
    }
});