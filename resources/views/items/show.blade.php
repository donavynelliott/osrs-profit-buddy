@extends('layouts.app')

@section('title', $item->name)

<?php $marginData = $item->getProfitMarginWithTax(); ?>

@section('content')

<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-circle-info"></i>
                Item Details
            </div>
            <div class="card-body">
                <img src="{{ $item->getLocalItemImage() }}" class="img-fluid rounded mx-auto d-block" alt="{{ $item->name }}">
                <h5 class="card-title">{{ $item->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $item->examine }}</h6>
                <!-- Display the margin, profit, and tax -->
                <p class="card-text">
                    Margin: {{ number_format($marginData['margin']) }}
                    Profit: {{ number_format($marginData['profit']) }}
                    Tax: {{ number_format($marginData['tax']) }}
                </p>
                <p class="card-text">
                    <a href="{{ $item->getWikiLink() }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">View on Wiki</a>
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-circle-info"></i>
                Pricing Details
            </div>
            <table class="table table-striped mb-0">
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
            </table>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Price History
    </div>
    <div class="card-body" id="graph-container">
        @include('items.graph', ['item_id' => $item->item_id])
    </div>
</div>

@endsection