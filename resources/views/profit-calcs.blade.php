@extends('layouts.app')

@section('title', 'RS Profit Buddy')

@section('content')
<div class="card bg-dark" style="width: 20rem;">
    <a class="text-white" style="text-decoration: none;" href=" {{ route('profit-calcs.item-sets') }}">
        <div class="card-body pb-5 pt-5 text-center">
            <h4 class="card-title">Item sets</h4>
        </div>
    </a>
</div>
@endsection