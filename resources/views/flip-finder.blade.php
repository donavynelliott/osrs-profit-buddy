@extends('layouts.app')

@section('title', 'Types of Flips')

@section('content')
<div class="card bg-dark" style="width: 20rem;">
    <a class="text-white" style="text-decoration: none;" href=" {{ route('flip-finder.highest-profit-margin') }}">
        <div class="card-body pb-5 pt-5 text-center">
            <h4 class="card-title">Highest Profit Margins</h4>
        </div>
    </a>
</div>
@endsection