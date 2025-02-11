const search = document.querySelector('input[placeholder = "Search for a suggestion"]');
const suggestionContainer = document.getElementById('suggestions');


search.addEventListener('keyup', function(event){
    if(event.key === "Enter"){
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (suggestions) {
            suggestionContainer.innerHTML = "";
            loadSuggestions(suggestions)
        });
    }
})

function loadSuggestions(suggestions) {
    suggestions.forEach((suggestion) => {
        console.log(suggestion);
        createSuggestion(suggestion);
    })
}

function createSuggestion(suggestion) {
    const template = document.querySelector('#suggestion-template');

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector('img');
    image.src = `/public/uploads/${suggestion.image}`;
    const title = clone.querySelector('h2');
    title.innerHTML = suggestion.title;

    suggestionContainer.appendChild(clone);
}