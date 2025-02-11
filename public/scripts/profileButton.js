function togglePopup() {
    popup = document.getElementById("popup");
    popup.style.display = (popup.style.display === "flex") ? "none" : "flex";
}

document.addEventListener("click", function(event) {
    popup = document.getElementById("popup");
    profileButton = document.querySelector(".profileButton");
    button = document.querySelector(".logout-button");
    if (!popup.contains(event.target) && event.target !== button) {
        popup.style.display = "none";
    }
});

document.addEventListener("click", function(event) {
    button = document.getElementById("profileButton");
    if (event.target === button) {
        togglePopup();
    }
});