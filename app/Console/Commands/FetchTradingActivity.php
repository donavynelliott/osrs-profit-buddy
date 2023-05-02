<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class FetchTradingActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-trading-activity';

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
            $this->info('Fetching latest trading activity data from the OSRS wiki API...');

            $tradingActivitySnapshots = $this->fetchTradingActivityData();
            $itemsToUpdate = $this->mapTradingActivitySnapshotsToItems($tradingActivitySnapshots);
            $this->updateTradingActivityData($itemsToUpdate);

            $this->info('Successfully updated trading activity data for ' . count($itemsToUpdate) . ' items.');
        } catch (\Exception $e) {
            $this->error('Error fetching trading activity data. Check log for more info.');
            Log::error('Error fetching trading activity data' . $e->getMessage());
            return;
        }
    }

    private function fetchTradingActivityData()
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'RuneScape-Profit-Buddy/1.0 - HODL#0583'
            ]
        ]);

        $response = $client->get('https://prices.runescape.wiki/api/v1/osrs/1h');
        return json_decode($response->getBody(), true);
    }

    private function updateTradingActivityData($itemsToUpdate)
    {
        $chunkedItems = array_chunk($itemsToUpdate, 1000);
        foreach ($chunkedItems as $chunk) {
            Item::query()->upsert($chunk, ['item_id'], ['avgHighPrice', 'highPriceVolume', 'avgLowPrice', 'lowPriceVolume']);
        }
    }

    private function mapTradingActivitySnapshotsToItems($tradingActivitySnapshots)
    {
        $items = Item::whereIn('item_id', array_keys($tradingActivitySnapshots['data']))->get();
        $itemMap = $items->keyBy('item_id');

        $itemsToUpdate = [];
        foreach ($tradingActivitySnapshots['data'] as $itemId => $itemData) {
            $item = $itemMap->get($itemId);
            if (!$item) {
                $this->alert('Item not found for item_id: ' . $itemId);
                continue;
            }

            $tradingActivitySnapshot = [
                'item_id' => $itemId,
                'avgHighPrice' => isset($itemData['avgHighPrice']) ? $itemData['avgHighPrice'] : null,
                'highPriceVolume' => isset($itemData['highPriceVolume']) ? $itemData['highPriceVolume'] : 0,
                'avgLowPrice' => isset($itemData['avgLowPrice']) ? $itemData['avgLowPrice'] : null,
                'lowPriceVolume' => isset($itemData['lowPriceVolume']) ? $itemData['lowPriceVolume'] : 0,
            ];

            $itemsToUpdate[] = $tradingActivitySnapshot;
        }

        return $itemsToUpdate;
    }
}
