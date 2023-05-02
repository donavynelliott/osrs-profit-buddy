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
}
