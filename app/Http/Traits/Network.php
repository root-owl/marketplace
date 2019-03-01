<?php

namespace App\Http\Traits;
use GuzzleHttp\Client;

trait Network
{
    /**
     * Create or update the token
     */
    public static function hitAPI($url, $method='post', $parameters = [])
    {
        $client = new Client;
        $data['http_errors'] = false;
        $data['headers'] = ['Content-Type' => "application/json"];
        $data['json'] = $parameters;
        $response = $client->request($method, $url, $data);

        if ($response->getStatusCode() == 201) {
            $response = json_decode($response->getBody());
            return $response;
        }
        return [];
    }
}