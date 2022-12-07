<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;

class GuzzleService
{

    /**
     * @return RedirectResponse|mixed
     */
    public function callSmileAPI()
    {
        try {
            $client = new Client();
            $response = $client->request('GET', 'https://marcconrad.com/uob/smile/api.php');
            return json_decode($response->getBody()->getContents());
        } catch (GuzzleException $e) {
            return redirect()->back();
        }
    }

}
