@extends('layouts.app')

@section('title', 'Highest Profit Margins')

@section('content')
<ul>

    <table id="items-table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Margin</th>
                <th>Profit</th>
                <th>Hourly Volume</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <?php $marginData = $item->getProfitMarginWithTax(); ?>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="{{ $item->getLocalItemImage() }}" class="img-fluid rounded me-2" alt="{{ $item->name }}" style="width: 24px; height: 24px;">
                        <a href="{{ route('items.show', $item->item_id) }}">{{ $item->name }}</a>
                    </div>
                </td>
                <td>{{ number_format($marginData['margin']) }}</td>
                <td>{{ number_format($marginData['profit']) }}</td>
                <td>{{ number_format($item->getHourlyVolume()) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</ul>

<script>
    //Enable datatables
    $(document).ready(function() {
        $('#items-table').DataTable({
            "order": [
                [2, "desc"]
            ] // 2 is the index of the Profit column
        });
    });
</script>
@endsection