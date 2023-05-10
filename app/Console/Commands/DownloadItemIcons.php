<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadItemIcons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-item-icons';

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
        $client = new \GuzzleHttp\Client();
        // Get all items from database
        $items = \App\Models\Item::all();

        // Download up to 50 items per minute
        $items_per_minute = 50;
        $pause_time = 60 / $items_per_minute;

        // Create the directory if it does not exist
        if (!is_dir(public_path('images/items'))) {
            mkdir(public_path('images/items'), 0755, true);
        }

        if (!$magic_number = $this->getMagicNumber())
            return $this->error('Error getting magic number');

        // For each item, download the icon and save to a local folder.
        foreach ($items as $index => $item) {
            $item_url = "https://secure.runescape.com/m=itemdb_oldschool/${magic_number}_obj_big.gif?id=" . $item->item_id;

            $response = $client->request('GET', $item_url);

            if ($response->getStatusCode() == 200) {
                $item_icon = $response->getBody()->getContents();
                $item_icon_path = public_path('images/items/' . $item->item_id . '.gif');
                file_put_contents($item_icon_path, $item_icon);

                $this->info('Downloaded icon for ' . $item->name . ' (' . ($index + 1) . '/' . $items->count() . ')');
            } else {
                $this->error('Error downloading icon for ' . $item->name);
            }

            // Pause for the specified time between downloads
            sleep($pause_time);
        }
    }

    private function getMagicNumber()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://secure.runescape.com/m=itemdb_oldschool/api/catalogue/detail.json?item=2');

        if ($response->getStatusCode() == 200) {
            $response_body = json_decode($response->getBody()->getContents());
            $icon_url = $response_body->item->icon_large;
            $regex = "/(?<=\/)\d+(?=\_obj\_big\.gif)/";
            preg_match($regex, $icon_url, $matches);
            $magic_number = $matches[0];
            return $magic_number;
        } else {
            return null;
        }
    }
}
