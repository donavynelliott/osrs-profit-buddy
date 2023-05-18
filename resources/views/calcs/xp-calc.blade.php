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

                <!-- Display the level value to the right -->
                <div>
                    <input type="number" class="form-control" id="level-goal" name="level-goal" min="0" max="99" value="0">
                </div>
            </div>
        </div>

        <div class="mt-3">
            <p>
                <label for="current-experience">Current Experience</label>
                <strong id="current-experience">0</strong> |
                <label for="experience-to-goal">Experience To Goal</label>
                <strong id="experience-to-goal">0</strong>
            </p>
        </div>

    </div>


    <!-- Display a 3x8 grid that contains a cell for each skill that mimics the style of osrs -->
    <div class="col-xl-6">
        <div class="container-fluid">
            <div class="row">

                @foreach ($skills as $index => $skill)
                <div class="skill-col col-3 mb-4">
                    <div class="card bg-light" id="skill-{{ $index }}">
                        <div class="card-body align-items-center">
                            <img src="{{ asset('images/skills/' . $skill . '.png') }}" alt="{{ $skill }} icon" class="img-fluid">
                            <!-- Set the default value to 1 unless the skill is hitpoints, in which case 10 -->
                            <span class="level-value">{{ $skill == 'hitpoints' ? 10 : 1 }}</span>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Display one more card for total level -->
                <div class="skill-col col-4 col-md-3 mb-4">
                    <div class="card bg-light">
                        <div class="card-body align-items-center">
                            Total Level:
                            <!-- Set to default total level in osrs -->
                            <span class="level-value">32</span>
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