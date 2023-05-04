<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

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

}
