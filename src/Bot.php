<?php

namespace App;

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

class Bot
{
    const API_URL = 'https://api.telegram.org/bot';
    public $client;
    public $token;

    public function __construct()
    {

        $this->token = $_ENV['TELEGRAM_TOKEN'];
        $this->client = new Client([
            'base_uri' => self::API_URL . $this->token . '/',
            'timeout'  => 2.0,
        ]);
    }

    public function makeRequest($method, $data = [])
    {
        $response = $this->client->request('POST', $method, [
            'json' => $data,
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}