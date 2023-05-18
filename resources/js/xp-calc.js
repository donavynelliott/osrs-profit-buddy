import Alpine from 'alpinejs';
window.Alpine = Alpine;

// Get the players hiscores from the API
function getPlayerHiscores(playerName) {
    // Create a new promise
    return new Promise((resolve, reject) => {
        // Create a new XMLHttpRequest instance
        const xhr = new XMLHttpRequest();

        // Set the request URL
        const url = '/api/osrs/hiscores/' + playerName;

        // Open a new GET request
        xhr.open('GET', url);

        // Set the response type
        xhr.responseType = 'json';

        // Set the onload function
        xhr.onload = () => {
            // Check if the status code is 200
            if (xhr.status === 200) {
                // Resolve the promise with the response
                resolve(xhr.response);
            } else {
                // Reject the promise with the status text
                reject(xhr.statusText);
            }
        };

        // Send the request
        xhr.send();
    });
}

// Get the username input
const usernameInput = document.getElementById('username');

// Get the fetch stats button
const fetchStatsButton = document.getElementById('fetch-stats');

// Add an event listener for when the DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
  Alpine.start();
});

// Add an event listener for when alpine is initialized
document.addEventListener('alpine:init', () => {
    console.log('Alpine initialized')
    window.Alpine.store('xpCalc', {
        init: function() {      
            this.setCurrentSkillCard(document.getElementsByClassName('skill-col')[0].firstElementChild);
        },
        setCurrentSkillCard: function(skillCard) {
            this.currentlySelectedSkillCard = skillCard
            document.querySelector('#selected-skill-card .level-value').innerHTML = this.currentlySelectedSkillCard.querySelector('.level-value').innerHTML
            document.querySelectorAll('.selected-card-img').forEach((selectedSkillImg) => {
                selectedSkillImg.src = this.currentlySelectedSkillCard.querySelector('img').src
            })
        },
        skills: null,
        currentlySelectedSkillCard: null,
    });
})

// Add an event listener for when the button is clicked
fetchStatsButton.addEventListener('click', () => {
    // Get the username from the input
    const username = usernameInput.value;

    // Get the players hiscores
    getPlayerHiscores(username)
        .then((data) => {
            // Update the alpine store with the skills
            window.Alpine.store('xpCalc').skills = data;

            // Loop through each skill
            data.forEach((skill, index) => {
                // Get the skill card
                const skillCard = document.getElementsByClassName('skill-col')[index].firstElementChild;

                // Replace the value in level-value with the new level
                skillCard.querySelector('.level-value').innerHTML = skill[1];
            });
            
            window.Alpine.store('xpCalc').setCurrentSkillCard(window.Alpine.store('xpCalc').currentlySelectedSkillCard)
        })
        .catch((error) => {
            // Log the error
            console.log(error);
        });
});

// Add an event listener for when a skill card is clicked
document.querySelectorAll('.skill-col').forEach((skillCol) => {
    skillCol.addEventListener('click', () => {
        // Update the currently selected card in the store
        window.Alpine.store('xpCalc').setCurrentSkillCard(skillCol.querySelector('.card'));
    });
});
