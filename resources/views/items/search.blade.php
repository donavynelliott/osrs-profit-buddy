@extends('layouts.app')

@section('title', 'RS Profit Buddy - Search Results')

@section('content')
@if ($items->count())

<div class="list-group list-group-flush">
    @foreach ($items as $item)
    <?php $marginData = $item->getProfitMarginWithTax(); ?>
    <div class="list-group-item list-group-item-action">
        <img src="{{ $item->getLocalItemImage() }}" style="max-width: 3rem;" alt="{{ $item->name }}">
        <a href=" {{ route('items.show', $item->item_id) }}">{{ $item->name }}</a>
        <span class="badge bg-primary rounded-pill">Margin: {{ number_format($marginData['margin']) }}</span>
        <span class="badge bg-success rounded-pill">Profit: {{ number_format($marginData['profit']) }}</span>

    </div>
    @endforeach
</div>

@else
<p>No items found.</p>
@endif
@endsection