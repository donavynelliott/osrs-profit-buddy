<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'item_id',
        'name',
        'examine',
        'members',
        'lowalch',
        'highalch',
        'limit',
        'value',
        'high',
        'low',
        'highTime',
        'lowTime',
        'avgHighPrice',
        'highPriceVolume',
        'avgLowPrice',
        'lowPriceVolume'
    ];

    /**
     * Get the image of the item from the local filesystem.
     */
    public function getLocalItemImage()
    {
        $item_icon_path = public_path('images/items/' . $this->item_id . '.gif');

        if (file_exists($item_icon_path)) {
            return asset('images/items/' . $this->item_id . '.gif');
        } else {
            return "https://via.placeholder.com/36";
        }
    }

    /**
     * Get the indexable data array for the model.
     */
    public function toSearchableArray(): array
    {
        return [
            'item_id' => $this->item_id,
            'name' => $this->name,
        ];
    }

    /**
     * Get the value used to index the model
     * 
     * @return mixed
     */
    public function getScoutKey(): mixed
    {
        return $this->item_id;
    }

    /**
     * Get the key name used to index the model
     * 
     * @return string
     */
    public function getScoutKeyName(): mixed
    {
        return 'item_id';
    }

    /**
     * Get the profit margin of the item
     * 
     * @return array
     */
    public function getProfitMarginWithTax(): array
    {
        // Calculate the difference between the high and low price
        $margin = $this->high - $this->low;
        // Calculate whether or not the item needs to be taxed
        $tax = $this->high >= 100 ? $this->high * 0.01 : 0;
        //Round tax down to nearest integer limited to 5 million
        $tax = min(floor($tax), 5000000);
        // Subtract the tax from the profit
        $profit = $margin - $tax;

        return [
            'margin' => $margin,
            'tax' => $tax,
            'profit' => $profit
        ];
    }

    /**
     * Get the hourly volume of the item
     * 
     * @return int
     */
    public function getHourlyVolume(): int
    {
        return $this->highPriceVolume + $this->lowPriceVolume;
    }

    /**
     * Get the top items with the highest profit margin.
     *
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    public static function getTopItemsWithHighestProfitMargin(int $limit = 10)
    {
        return static::selectRaw('*, (high - low - LEAST(FLOOR(high*0.01), 5000000)) AS profit_margin')
        ->orderByDesc('profit_margin')
        ->limit($limit)
            ->get();
    }
}
