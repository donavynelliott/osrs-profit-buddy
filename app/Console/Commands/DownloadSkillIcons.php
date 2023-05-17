<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadSkillIcons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-skill-icons';

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
        // Create skills folder under images if doesn't already exist
        if (!file_exists(public_path('images/skills'))) {
            mkdir(public_path('images/skills'));
        }

        // A list of all skill names in osrs
        $skills = [
            'attack',
            'defence',
            'strength',
            'hitpoints',
            'ranged',
            'prayer',
            'magic',
            'cooking',
            'woodcutting',
            'fletching',
            'fishing',
            'firemaking',
            'crafting',
            'smithing',
            'mining',
            'herblore',
            'agility',
            'thieving',
            'slayer',
            'farming',
            'runecraft',
            'hunter',
            'construction',
        ];

        // The base url for the skill icons
        $baseUrl = 'https://oldschool.runescape.wiki/images/';
        $extension = '_icon_%28detail%29.png?a4903';

        // Create a guzzle http client with a unique user agent
        $client = new \GuzzleHttp\Client([
            'headers' => [
                'User-Agent' => 'OSRS Profit Buddy',
            ],
        ]);

        // Download each skill icon
        foreach ($skills as $skill) {
            $url = $baseUrl . ucfirst($skill) . $extension;
            $path = public_path('images/skills/' . $skill . '.png');
            // if image already exists then skip it
            if (file_exists($path)) {
                continue;
            }
            // use guzzle to download the image and save it to the path
            $client->get($url, ['sink' => $path]);

            // Display the status of the loop to the console and wait 1 second before continuing
            $this->info('Downloaded ' . $skill . ' skill icon');
            sleep(1);
        }
    }
}
