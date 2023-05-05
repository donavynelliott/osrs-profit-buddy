<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemSet;

class ItemSetController extends Controller
{
    /**
     * Return a list of all item sets and the items contained within them.
     */
    public function index()
    {
        $itemSets = ItemSet::all();
        $itemSets = $itemSets->filter(function ($itemSet) {
            return $itemSet->setItem()->getHourlyVolume() > 1;
        })->mapWithKeys(function ($itemSet) {
            return [$itemSet->set_item_id => [
                'set_item' => $itemSet->setItem(),
                'items' => $itemSet->items(),
                'profit_margin' => $itemSet->getProfitMarginWithTax(),
            ]];
        });

        return view('profit-calcs.item-sets', compact('itemSets'));
    }
}
