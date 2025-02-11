document.addEventListener("DOMContentLoaded", function() {
    const paragraph = document.querySelector(".dailyQuiz > p");
    const maxChars = 200;

    if (paragraph.textContent.length > maxChars) {
        paragraph.textContent = paragraph.textContent.substring(0, maxChars) + "...";
    }
});