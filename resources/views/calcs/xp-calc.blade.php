@extends('layouts.app')

@section('title', 'XP Calculator')

@section('content')
<?php $skills = [
    'attack',
    'defence',
    'strength',
    'hitpoints',
    'ranged',
    'prayer',
    'magic',
    'cooking',
    'woodcutting',
    'fletching',
    'fishing',
    'firemaking',
    'crafting',
    'smithing',
    'mining',
    'herblore',
    'agility',
    'thieving',
    'slayer',
    'farming',
    'runecraft',
    'hunter',
    'construction',
]; ?>

<div class="row">
    <div class="col-xl-6">
        <!-- Display an input where a play may enter their username -->
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" id="fetch-stats">Fetch Stats</button>
        </div>
    </div>


    <!-- Display a 3x8 grid that contains a cell for each skill that mimics the style of osrs -->
    <div class="col-xl-6">
        <div class="container-fluid">
            <div class="row">

                @foreach ($skills as $skill)
                <div class="skill-col col-3 mb-4">
                    <div class="card bg-light">
                        <div class="card-body align-items-center">
                            <img src="{{ asset('images/skills/' . $skill . '.png') }}" alt="{{ $skill }} icon" class="img-fluid">
                            <span class="level-value">0</span>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Display one more card for total level -->
                <div class="skill-col col-4 col-md-3 mb-4">
                    <div class="card bg-light">
                        <div class="card-body align-items-center">
                            Total Level: 
                            <span class="level-value">0</span>
                        </div>
                    </div>
                </div>

            </div> <!-- End of row -->
        </div>
    </div>

</div>


<script>
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

    // Add an event listener for when the button is clicked
    fetchStatsButton.addEventListener('click', () => {
        // Get the username from the input
        const username = usernameInput.value;

        // Get the players hiscores
        getPlayerHiscores(username)
            .then((data) => {
                // Loop through each skill
                data.forEach((skill, index) => {
                    // Get the skill card
                    const skillCard = document.getElementsByClassName('skill-col')[index].firstElementChild;

                    // Remove existing badges
                    skillCard.querySelectorAll('.badge').forEach((badge) => {
                        badge.remove();
                    });

                    // Replace the value in level-value with the new level
                    skillCard.querySelector('.level-value').innerHTML = skill[1];
                });
            })
            .catch((error) => {
                // Log the error
                console.log(error);
            });
    });
</script>


<style>
    .card-body.align-items-center {
        display: flex;
        align-items: center;
        height: 100px;
    }

    .skill-col {
        padding: 3px;
    }

    .skill-col .card-body img {
        margin: auto;
        max-width: 48px;
    }

    .skill-col .card {}

    .level-value {
        margin-left: 3px;
        font-size: 1.5rem;
    }
</style>
@endsection