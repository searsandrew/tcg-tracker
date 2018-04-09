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

    public function categories()
    {
        $auth = json_decode($this->token());
        $client = new Client();
        $res = $client->request('GET', 'http://api.tcgplayer.com/catalog/categories', [
            'headers' => [
                'Accept'    => 'application/json',
                'Authorization' => 'bearer '.$auth->access_token
            ]
        ]);

        return $res->getBody();
    }
}



