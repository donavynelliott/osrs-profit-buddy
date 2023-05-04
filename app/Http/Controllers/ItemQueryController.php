<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemQueryController extends Controller
{
    /**
     * Get the top items with the highest profit margin
     * 
     * @param  int  $limit
     * @param  int  $minHourlyVolume
     * @return \Illuminate\Support\Collection
     */
    public static function getTopItemsWithHighestProfitMargin($limit = 100, $minHourlyVolume = 10, $maxItemPrice = 100000000)
    {
        $minHourlyVolume = request()->input('min-hourly-volume', $minHourlyVolume);
        $maxItemPrice = request()->input('max-item-price', $maxItemPrice);

        $items = Item::selectRaw('*, (high - low - LEAST(FLOOR(high*0.01), 5000000)) AS profit_margin')
            ->havingRaw('highPriceVolume + lowPriceVolume >= ?', [$minHourlyVolume])
            ->havingRaw('avgLowPrice <= ?', [$maxItemPrice])
            ->orderByDesc('profit_margin')
            ->limit($limit)
            ->get();

        return view('flip-finder.highest-profit-margin', compact('items'));
    }
}
