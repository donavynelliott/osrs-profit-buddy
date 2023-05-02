<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class FetchLatestPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-latest-prices';

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
        try {
            $this->info('Fetching latest price data from the OSRS wiki API...');

            $priceSnapshots = $this->fetchLatestPriceData();
            $itemsToUpdate = $this->mapLatestPriceSnapshotsToItems($priceSnapshots);
            $this->updateLatestPriceData($itemsToUpdate);

            $this->info('Successfully updated latest price data for ' . count($itemsToUpdate) . ' items.');
        } catch (\Exception $e) {
            $this->error('Error fetching latest price data. Check log for more info.');
            Log::error('Error fetching latest price data' . $e->getMessage());
            return;
        }
    }

    private function fetchLatestPriceData()
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'RuneScape-Profit-Buddy/1.0 - HODL#0583'
            ]
        ]);

        $response = $client->get('https://prices.runescape.wiki/api/v1/osrs/latest');
        return json_decode($response->getBody(), true);
    }

    private function updateLatestPriceData($itemsToUpdate)
    {
        $chunkedItems = array_chunk($itemsToUpdate, 1000);
        foreach ($chunkedItems as $chunk) {
            Item::query()->upsert($chunk, ['item_id'], ['high', 'low', 'highTime', 'lowTime']);
        }
    }

    private function mapLatestPriceSnapshotsToItems($priceSnapshots)
    {
        $items = Item::whereIn('item_id', array_keys($priceSnapshots['data']))->get();
        $itemMap = $items->keyBy('item_id');

        $itemsToUpdate = [];
        foreach ($priceSnapshots['data'] as $itemId => $itemData) {
            $item = $itemMap->get($itemId);
            if (!$item) {
                $this->alert('Item not found for item_id: ' . $itemId);
                continue;
            }

            $priceSnapshot = [
                'item_id' => $itemId,
                'high' => $itemData['high'],
                'low' => $itemData['low'],
                'highTime' => $itemData['highTime'] != null ? Carbon::createFromTimestamp($itemData['highTime']) : null,
                'lowTime' => $itemData['lowTime'] != null ? Carbon::createFromTimestamp($itemData['lowTime']) : null,
            ];

            $itemsToUpdate[] = $priceSnapshot;
        }

        return $itemsToUpdate;
    }
}
