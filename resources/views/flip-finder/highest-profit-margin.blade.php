@extends('layouts.app')

@section('title', 'Highest Profit Margins')

@section('content')
<ul>
    <form id="filter-form" method="GET" action="{{ route('flip-finder.highest-profit-margin') }}">
        <div class="row mb-3">
            <label for="min-hourly-volume" class="form-label col-form-label col-sm-3">Minimum Hourly Volume:</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="min-hourly-volume" name="min-hourly-volume" value="{{ request()->input('min-hourly-volume', 10) }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="min-hourly-volume" class="form-label col-form-label col-sm-3">Maximum Price:</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" id="max-item-price" name="max-item-price" value="{{ request()->input('max-item-price', 100000000) }}">
            </div>
        </div>
        <div class="row mb-3 justify-content-end">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
</ul>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
    </div>
    <div class="card-body">
        <table id="items-table" class="datatable">
            <thead>
                <tr>
                    <th scope="col">Item Name</th>
                    <th scope="col">Low</th>
                    <th scope="col">High</th>
                    <th scope="col">Margin</th>
                    <th scope="col">Profit</th>
                    <th scope="col">Hourly Volume</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <?php $marginData = $item->getProfitMarginWithTax(); ?>
                <tr>
                    <td scope="row">
                        <div class="d-flex align-items-center">
                            <img src="{{ $item->getLocalItemImage() }}" class="img-fluid rounded me-2" alt="{{ $item->name }}" style="width: 24px; height: 24px;">
                            <a href="{{ route('items.show', $item->item_id) }}">{{ $item->name }}</a>
                        </div>
                    </td>
                    <td>{{ number_format($item->low) }}</td>
                    <td>{{ number_format($item->high) }}</td>
                    <td>{{ number_format($marginData['margin']) }}</td>
                    <td>{{ number_format($marginData['profit']) }}</td>
                    <td>{{ number_format($item->getHourlyVolume()) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    //Enable datatables
    $(document).ready(function() {
        $('#items-table').DataTable({
            "order": [
                [4, "desc"]
            ] // 4 is the index of the Profit column
        });
    });
</script>
@endsection