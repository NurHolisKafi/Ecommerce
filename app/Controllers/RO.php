<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use Steevenz\Rajaongkir;

class RO extends BaseController
{
    use ResponseTrait;
    public function index(){
        $client = \Config\Services::curlrequest([
            'baseURI' => 'https://api.rajaongkir.com/starter/',
            'headers' => [
                'key' => 'fb456c59e23859f60ef66b8c599081de',
            ],
        ]);

        $provinsi = json_decode($client->get('province')->getBody());
        
        dd($provinsi);
    }
}