@extends('layouts.app')

@section('title', $item->name)

<?php $marginData = $item->getProfitMarginWithTax(); ?>

@section('content')
<div class="container" id="item-container">
    <div class="row">
        <div class="col">
            <img src="{{ $item->getLocalItemImage() }}" class="img-fluid rounded mx-auto d-block" alt="{{ $item->name }}">
            <p class="lead">
                {{ $item->examine }}
            </p>
            <p>
                <a href="{{ $item->getWikiLink() }}" target="_blank" rel="noopener noreferrer">View on OSRS Wiki</a>
            </p>
            <!-- Display the margin, profit, and tax -->
            <p>
                Margin: {{ number_format($marginData['margin']) }}
                Profit: {{ number_format($marginData['profit']) }}
                Tax: {{ number_format($marginData['tax']) }}
            </p>
        </div>
        <div class="col">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Members</th>
                        <td>{{ $item->members ? "Yes" : "No" }}</td>
                    </tr>
                    <tr>
                        <th scope="row">High</th>
                        <td>{{ number_format($item->high) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Low</th>
                        <td>{{ number_format($item->low) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">High Alch</th>
                        <td>{{ number_format($item->highalch) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Low Alch</th>
                        <td>{{ number_format($item->lowalch) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Limit</th>
                        <td>{{ number_format($item->limit) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Value</th>
                        <td>{{ number_format($item->value) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Avg High Price</th>
                        <td>{{ number_format($item->avgHighPrice) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Avg Low Price</th>
                        <td>{{ number_format($item->avgLowPrice) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Sold in 1 Hour</th>
                        <td>{{ number_format($item->highPriceVolume) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Bought in 1 Hour</th>
                        <td>{{ number_format($item->lowPriceVolume) }}</td>
                    </tr>
                </tbody>
        </div>
    </div>
</div>

@include('items.graph', ['item_id' => $item->item_id])
@endsection