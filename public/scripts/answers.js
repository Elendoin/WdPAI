const quizForm = document.querySelector(".quizOptions");
const correctAnswer = quizForm.getAttribute("data-correct");
let correct = false;

quizForm.querySelectorAll("button").forEach(button => {
    button.addEventListener("click", function(event) {
        event.preventDefault();

        quizForm.querySelectorAll("button").forEach(btn => btn.disabled = true);
        const selectedOption = button.getAttribute("data-option");

        if (selectedOption === correctAnswer) {
            button.style.borderColor = "green";
            button.style.backgroundColor = "darkgreen";
            correct = true;
            sendStats();

        } else {
            button.style.borderColor = "red";
            correct = false;
            sendStats();
        }
        turnOffAllButtons();
    });
});


function turnOffAllButtons() {
    quizForm.querySelectorAll("button").forEach(button => {
        const selectedOption = button.getAttribute("data-option");

        if (selectedOption === correctAnswer) {
            button.style.borderColor = "green";
            button.style.backgroundColor = "darkgreen";
            button.style.pointerEvents = "none";
            button.style.transition = "none";
        } else {
            button.style.borderColor = "red";
            button.style.pointerEvents = "none";
            button.style.transition = "none";
        }
    })
}

function sendStats(){
    if(correct === true) {
        fetch('/win', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(response => {
            return response.json();
        })
    }
    if(correct === false) {
        fetch('/lose', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
            .then(response => {
                return response.json();
            })
    }
}

document.addEventListener("DOMContentLoaded", function() {
    fetch("/playedToday", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({})})
        .then(response => response.json())
        .then(data => {
        if (data.played) {
            turnOffAllButtons();
        } else {
            console.log("playable");
        }
        })
        .catch(error => console.error("Error fetching play status:", error));
})