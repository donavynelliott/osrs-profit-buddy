@extends('layouts.app')

@section('title', 'RS Profit Buddy - Search Results')

@section('content')
@if ($items->count())

<div class="list-group list-group-flush">
    @foreach ($items as $item)
    <div class="list-group-item list-group-item-action">
        <img src="{{ $item->getLocalItemImage() }}" style="max-width: 3rem;" alt="{{ $item->name }}">
        <a href=" {{ route('items.show', $item->item_id) }}">{{ $item->name }}</a>
    </div>
    @endforeach
</div>

@else
<p>No items found.</p>
@endif
@endsection