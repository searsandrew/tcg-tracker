<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class CompendiumController extends Controller
{
    public function token()
    {
        $client = new Client();
        $res = $client->request('POST', 'https://api.tcgplayer.com/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('TCG_PUBLIC_KEY'),
                'client_secret' => env('TCG_PRIVATE_KEY')
            ]
        ]);

        return $res->getBody();
    }
}