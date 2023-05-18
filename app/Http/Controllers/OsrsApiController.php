<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OsrsApiController extends Controller
{
    public function getPlayerHiscores(string $playerName)
    {
        // Create a new Guzzle client instance
        $client = new \GuzzleHttp\Client();

        // Send a GET request to the hiscores API
        $response = $client->request('GET', 'https://secure.runescape.com/m=hiscore_oldschool/index_lite.ws?player=' . $playerName);

        // Get the body of the response
        $body = $response->getBody();

        // Convert the body to a string
        $string = (string) $body;

        // Explode the string into an array
        $array = explode("\n", $string);

        // Delete all entries after the 24th element
        array_splice($array, 24);

        // Loop through each element in the array
        foreach ($array as $key => $value) {
            // Explode the element into an array
            $array[$key] = explode(',', $value);
        }

        // Move the first element to the end
        $firstElement = array_shift($array);
        array_push($array, $firstElement);

        // Return the data array
        return $array;
    }
}
