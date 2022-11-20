<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleService
{

    /**
     * @throws GuzzleException
     */
    public function callSmileAPI()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://marcconrad.com/uob/smile/api.php');
            return json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            throw $e;
        }

    }


}
