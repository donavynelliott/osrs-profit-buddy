@extends('layouts.app')

@section('title', 'Create Account')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3 row">
        <label for="name" class="col-form-label col-sm-2">Username</label>
        <div class="col-sm-10">
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-form-label col-sm-2">Email</label>
        <div class="col-sm-10">
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password" class="col-form-label col-sm-2">Password</label>
        <div class="col-sm-10">
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password_confirmation" class="col-form-label col-sm-2">Confirm Password</label>
        <div class="col-sm-10">
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary mb-3">Register</button>
        <a href="{{ route('login') }}">
            <button type="button" class="btn btn-light mb-3">Back to Login</button>
        </a>
    </div>

    <div>
        @endsection