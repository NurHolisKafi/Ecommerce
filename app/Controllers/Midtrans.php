<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
class Midtrans extends BaseController
{
    use ResponseTrait;
    public function index()
    {

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-PbLjRJXsMGxuGw0hh0B9u2Ur';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // Populate items
    $items = array(
        array(
            'id'       => 'item1',
            'price'    => 100000,
            'quantity' => 1,
            'name'     => 'Adidas f50'
        ),
        array(
            'id'       => 'item2',
            'price'    => 50000,
            'quantity' => 1,
            'name'     => 'nike90'
        ),
        array(
            'id'       => 'ongkir',
            'price'    => 20000,
            'quantity' => 1,
            'name'     => 'Pengiriman'
        )
    );

    // Populate customer's shipping address
    $shipping_address = array(
        'first_name'   => "John",
        'last_name'    => "Watson",
        'address'      => "Bakerstreet 221B.",
        'city'         => "Jakarta",
        'postal_code'  => "51162",
        'phone'        => "081322311801",
        'country_code' => 'IDN'
    );

    // Populate customer's info
    $customer_details = array(
        'first_name'       => "Andri",
        'last_name'        => "Setiawan",
        'email'            => "test@test.com",
        'phone'            => "081322311801",
        'shipping_address' => $billing_address
    );

    

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
            ),
            'item_details'        => $items,
            'customer_details'    => $customer_details,
        );
         
        
        $data =[
            'snapToken' => \Midtrans\Snap::getSnapToken($params)
        ];

        return view('test',$data);
    }

    public function hasil()
    {
        
        $status = \Midtrans\Transaction::status('1891786488');

        // $hasil = (array) json_decode($this->request->getpost('jason'));
        
        // $data = [
        //     'teks' => $hasil 
        // ];

        
        dd($status);
        // foreach ($hasil as $key) {
        //     echo "{$key->pdf_url}";
        // }
    }
}