@extends('layouts.app')

@section('title', 'RS Profit Buddy - Search Results')

@section('content')
@if ($items->count())
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
    </div>
    <div class="card-body">
        <table id="items-table" class="datatable">
            <thead>
                <tr>
                    <th scope="col">Item Name</th>
                    <th scope="col">High</th>
                    <th scope="col">Low</th>
                    <th scope="col">Margin</th>
                    <th scope="col">Profit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <?php $marginData = $item->getProfitMarginWithTax(); ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ $item->getLocalItemImage() }}" class="img-fluid rounded me-2" alt="{{ $item->name }}" style="width: 24px; height: 24px;">
                            <a href="{{ route('items.show', $item->item_id) }}">{{ $item->name }}</a>
                        </div>
                    </td>
                    <td>{{ number_format($item->high) }}</td>
                    <td>{{ number_format($item->low) }}</td>
                    <td>{{ number_format($marginData['margin']) }}</td>
                    <td>{{ number_format($marginData['profit']) }}</td>
                </tr>
                @endforeach
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

@else
<p>No items found.</p>
@endif
@endsection