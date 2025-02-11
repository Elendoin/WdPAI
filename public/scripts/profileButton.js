function togglePopup() {
    let popup = document.getElementById("popup");
    console.log(popup.style.display);
    popup.style.display = (popup.style.display === "flex") ? "none" : "flex";
}

document.addEventListener("click", function(event) {
    let stats = document.getElementById("popup");
    let button = document.getElementById("profile-button");
    if (event.target === button) {
        togglePopup();
    }
    else if (event.target !== button && !stats.contains(event.target)) {
        stats.style.display = "none";
    }
});