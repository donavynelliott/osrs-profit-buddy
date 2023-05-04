<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemQueryController extends Controller
{
    /**
     * Get the top items with the highest profit margin
     * 
     * @return \Illuminate\Support\Collection
     */
     public static function getTopItemsWithHighestProfitMargin($limit = 100, $minHourlyVolume = 10)
     {
        $items = Item::selectRaw('*, (high - low - LEAST(FLOOR(high*0.01), 5000000)) AS profit_margin')
        ->havingRaw('highPriceVolume + lowPriceVolume >= ?', [$minHourlyVolume])
        ->orderByDesc('profit_margin')
        ->limit($limit)
        ->get();

        return view('flip-finder.highest-profit-margin', compact('items'));
     }
}
