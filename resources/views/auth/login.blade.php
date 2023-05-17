@extends('layouts.app')

@section('title', 'Login')

@section('content')

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3 row">
        <label for="email" class="col-form-label col-sm-2">Email</label>
        <div class="col-sm-10">
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password" class="col-form-label col-sm-2">Password</label>
        <div class="col-sm-10">
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">Remember Me</label>
            </div>
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Login</button>

        <a href="{{ route('register') }}">
            <button type="button" class="btn btn-light">Register</button>
        </a>
    </div>
</form>

<form method="POST" action="{{ route('login') }}" class="mt-4">
    @csrf
    <!-- Add a button for demo login -->
    <button type="submit" name="demo_login" class="btn btn-primary">Demo Login</button>
</form>
@endsection