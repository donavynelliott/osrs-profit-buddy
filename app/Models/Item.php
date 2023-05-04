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
     * Get the image URL for the item.
     * 
     * @return string
     */
    function getOSRSItemImage()
    {
        $item_url = "https://secure.runescape.com/m=itemdb_oldschool/1683109788382_obj_big.gif?id=" . $this->item_id;

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $item_url);

        if ($response->getStatusCode() == 200) {
            return $item_url;
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
}
