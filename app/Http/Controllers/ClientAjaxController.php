<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client as ClientGuz;
class ClientAjaxController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($ruc)
    {
        $token = 'apis-token-6336.pOW5TOgLGm1G2kg3G0cHS1DaJml2td3-';
        $number = $ruc;

        $client = new ClientGuz(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);

        $parameters = [
            'http_errors' => false,
            'connect_timeout' => 5,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Referer' => 'https://apis.net.pe/api-consulta-ruc',
                'User-Agent' => 'laravel/guzzle',
                'Accept' => 'application/json',
            ],
            'query' => ['numero' => $number]
        ];
        // Para usar la versión 1 de la api, cambiar a /v1/ruc
        $res = $client->request('GET', '/v2/sunat/ruc', $parameters);
        return response()->json(
            json_decode($res->getBody()->getContents(), true)
        );
        
    }
}
