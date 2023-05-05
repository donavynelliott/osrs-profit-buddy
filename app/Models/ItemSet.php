<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'set_item_id',
        'item_ids'
    ];

    /**
     * Get the set item that owns the item set.
     * 
     * @return \App\Models\Item
     */
    public function setItem(): Item
    {
        return Item::where('item_id', $this->set_item_id)->first();
    }

    /**
     * Get the items that belong to the item set.
     * 
     * @return \Illuminate\Support\Collection
     */
    public function items(): \Illuminate\Support\Collection
    {
        $item_ids = explode(',', $this->item_ids);
        return Item::whereIn('item_id', $item_ids)->get();
    }

    /**
     * Get the profit margin of the item set.
     */
    public function getProfitMargin(): int
    {
        $items = $this->items();
        $set_item = $this->setItem();

        $total_cost = $items->sum('low');
        $total_value = $set_item->high;

        return $total_value - $total_cost;
    }

    /**
     * Get the profit margin with tax
     * 
     * @return array
     */
    public function getProfitMarginWithTax(): array
    {
        $items = $this->items();
        $set_item = $this->setItem();

        $total_cost = $items->sum('low');
        $total_value = $set_item->high;

        $margin = $total_value - $total_cost;
        // Calculate whether or not the item needs to be taxed
        $tax = $set_item->high > 100 ? $set_item->high * 0.01 : 0;
        //Round tax down to nearest integer limited to 5 million
        $tax = min(floor($tax), 5000000);

        return [
            'margin' => $margin,
            'tax' => $tax,
            'profit' => $margin - $tax
        ];
    }
}
