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
            const skillIndex = this.skills !== null ? this.currentlySelectedSkillCard.id.replace('skill-', '') : 0;
            if (this.skills !== null) 
            {
                console.log("Current Skill in table: ", this.skills[skillIndex])
                this.currentLevel = this.skills[skillIndex][1]
                this.currentXP = this.skills[skillIndex][2]
            }
            // Set the level goal to the current level + 1
            document.querySelector('#level-goal').value = Math.min(parseInt(this.currentlySelectedSkillCard.querySelector('.level-value').innerHTML) + 1, 99)

            // Set the current experience
            document.querySelector('#current-experience').innerHTML = parseInt(this.currentXP).toLocaleString()

            this.calculateExperience()
        },
        calculateExperience: function() {
            // Calculate the experience needed to reach the goal level
            const currentExperience = this.currentXP;
            const goalExperience = this.calculateTotalExperience(document.querySelector('#level-goal').value);

            const experienceToGoalLevel = goalExperience - currentExperience;

            // Set the experience to goal
            this.setExperienceToGoal(experienceToGoalLevel);
        },
        calculateTotalExperience(level) {
            var xp = 0;
    
            for (var i = 1; i < level; i++)
                xp += Math.floor(i + 300 * Math.pow(2, i / 7));
    
            return Math.floor(xp / 4);
        },
        setExperienceToGoal(exp) {
            if (exp < 0) {
                document.querySelector('#experience-to-goal').innerHTML = Math.abs(exp).toLocaleString();
                document.querySelector('label[for="experience-to-goal"]').innerHTML = "Experience over Goal";
            } else {
                document.querySelector('#experience-to-goal').innerHTML = exp.toLocaleString();
                document.querySelector('label[for="experience-to-goal"]').innerHTML = "Experience to Goal";
            }
        },
        skills: null,
        currentlySelectedSkillCard: null,
        currentLevel: 0,
        currentXP: 0,
    });

    // Calculate the experience needed to reach the goal level when the level goal is changed
    document.querySelector('#level-goal').addEventListener('change', () => {
        window.Alpine.store('xpCalc').calculateExperience();
    })
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
