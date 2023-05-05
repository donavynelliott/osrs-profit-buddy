@extends('layouts.app')

@section('title', 'Potential Item Set Profits')

@section('content')
<p>
    This page is for finding sets that can be profited from packing/unpacking and reselling.
</p>
<table id="item-set-table">
    <thead>
        <tr>
            <th>Item Set</th>
            <th>Items</th>
            <th>Pack Margin</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($itemSets as $set_item_id => $itemSet)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <a href="{{ route('items.show', $set_item_id) }}">{{ $itemSet['set_item']->name }}</a>
                </div>
            </td>
            <td>
                @foreach ($itemSet['items'] as $item)
                <a style="text-decoration: none;" href="{{ route('items.show', $item->item_id) }}">
                    <img src="{{ $item->getLocalItemImage() }}" class="img-fluid rounded me-2" alt="{{ $item->name }}" style="width: 48px; height: 48px;">
                </a>
                @endforeach
            </td>
            <td>{{ number_format($itemSet['profit_margin']['margin']) }}</td>
            <td>{{ number_format($itemSet['profit_margin']['profit']) }}</td>
        </tr>
        @endforeach
</table>
<script>
    $(document).ready(function() {
        $('#item-set-table').DataTable();
    });
</script>
@endsection