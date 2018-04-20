<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class CompendiumController extends Controller
{
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

        $body = json_decode($res->getBody());
        return response()->json($body);
    }

    public function products()
    {
        $auth = json_decode($this->token());
        $client = new Client();
        $res = $client->request('GET', 'http://api.tcgplayer.com/catalog/products', [
            'headers' => [
                'Accept'    => 'application/json',
                'Authorization' => 'bearer '.$auth->access_token
            ]
        ]);

        $body = json_decode($res->getBody());
        return response()->json($body);
    }
}