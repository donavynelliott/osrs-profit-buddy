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
    <div class="col-xl-6 mb-3">
        <!-- Display an input where a play may enter their username -->
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-primary" id="fetch-stats">Fetch Stats</button>
        </div>
        <!-- Display a card like the ones below that shows the currently selected skill -->
        <h6>Currently Selected Skill</h6>
        <div class="card bg-light" id="selected-skill-card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <!-- Display the image and level value to the left -->
                <div>
                    <img src="{{ asset('images/skills/attack.png') }}" class="img-fluid selected-card-img">
                    <span class="level-value">0</span>
                </div>

                <!-- Display arrow pointing right in the middle of the card -->
                <span>
                    <i class="fas fa-arrow-right"></i>
                </span>

                <!-- Display the image and level value to the right -->
                <div>
                    <img src="{{ asset('images/skills/attack.png') }}" class="img-fluid selected-card-img">
                    <span class="level-goal-value">0</span>
                </div>
            </div>
        </div>

    </div>


    <!-- Display a 3x8 grid that contains a cell for each skill that mimics the style of osrs -->
    <div class="col-xl-6">
        <div class="container-fluid">
            <div class="row">

                @foreach ($skills as $skill)
                <div class="skill-col col-3 mb-4">
                    <div class="card bg-light" id="{{ $skill }}">
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

<!-- Include the vite resource xp-calc.js -->
@vite('resources/js/xp-calc.js')

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

    .skill-col .card:hover {
        background-color: #e9ecef !important;
        cursor: pointer;
    }

    .skill-col .active {
        background-color: #e9ecef !important;
    }

    .level-value {
        margin-left: 3px;
        font-size: 1.5rem;
    }

    #selected-skill-card {
        max-width: 20rem;
        ;
    }
</style>
@endsection