@extends('layouts.app')

@section('title', 'RS Profit Buddy')

@section('content')
<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Money Making Tools</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">
            Welcome to RS Profit Buddy! We are dedicated to providing you with the best tools and resources to help you find profitable trades and easy money makers in Old School RuneScape. Our site features real-time market data. Whether you're a seasoned veteran or a new player, our platform is designed to help you make the most out of your time in the game. Join our community today and start trading like a pro!
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            @if (!Auth::check())
            <a href="{{ route('login') }}">
                <button type="button" class="btn btn-outline-primary btn-lg px-4 gap-3">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button type="button" class="btn btn-outline-secondary btn-lg px-4 gap-3">Register</button>
            </a>
            @else
            <a href="{{ route('flip-finder') }}">
                <button type="button" class="btn btn-outline-primary btn-lg px-4 gap-3">Flip Finder</button>
            </a>
            <a href="{{ route('profit-calcs') }}">
                <button type="button" class="btn btn-outline-secondary btn-lg px-4 gap-3">Profit Calculators</button>
            </a>
            @endif
        </div>
    </div>
</div>
@endsection