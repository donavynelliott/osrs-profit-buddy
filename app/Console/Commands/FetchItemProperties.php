<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use GuzzleHttp\Client;

class FetchItemProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-item-properties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'RuneScape-Profit-Buddy/1.0 - HODL#0583'
            ]
        ]);
        $response = $client->get('https://prices.runescape.wiki/api/v1/osrs/mapping');
        $items = json_decode($response->getBody(), true);

        $existingItems = Item::whereIn('item_id', array_column($items, 'id'))->get();
        $existingItemsMap = $existingItems->keyBy('item_id');

        $count = 0;

        foreach ($items as $itemData) {
            $this->info("Processing item #{$count}/" . count($items) . " - ({$itemData['name']})");
            $count++;

            $item = $existingItemsMap->get($itemData['id']);

            if (!$item) {
                // If the item doesn't exist, create a new one.
                $item = new Item();
                $item->item_id = $itemData['id'];
            }

            // Update the item's properties
            $item->name = $itemData['name'];
            $item->examine = $itemData['examine'];
            $item->members = $itemData['members'];
            $item->lowalch = isset($itemData['lowalch']) ? $itemData['lowalch'] : 0;
            $item->highalch = isset($itemData['highalch']) ? $itemData['highalch'] : 0;
            $item->limit = isset($itemData['limit']) ? $itemData['limit'] : 0;
            $item->value = isset($itemData['value']) ? $itemData['value'] : 0;

            // Save the item to the database
            $item->save();
        }
    }
}
