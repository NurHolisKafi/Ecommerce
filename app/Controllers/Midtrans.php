<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
class Midtrans extends BaseController
{
    use ResponseTrait;
    protected $model;
    public function __construct(Type $var = null) {
        $this->model = new \App\Models\UserModel;
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-PbLjRJXsMGxuGw0hh0B9u2Ur';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
    public function index()
    {
        $id = $this->request->getPost('id');
        $jumlah = $this->request->getPost('jumlah');
        $item = array();
        for ($i=0; $i < count($id) ; $i++) {
            $produk =  $this->model->view_produkById($id[$i]); 
            $data = [
                'id' => 'item'.($i+1),
                'price' => $produk['harga'],
                'quantity' => $jumlah[$i],
                'name' => $produk['nama'],
            ];
            array_push($item,$data);
        }
        array_push($item,[
            'id' => 'ongkir',
            'price' => $this->request->getPost('subtotal_pengiriman'),
            'quantity' => 1,
            'name' => 'ongkos pengiriman'
        ]);
        $shipping_address = array(
            'address'      => $this->request->getPost('alamat_lengkap'),
            'city'         => $this->request->getPost('city'),
            'postal_code'  => $this->request->getPost('postal_code'),
            'country_code' => 'IDN'
        );

        $customer_details = array(
            'first_name'       => $this->request->getPost('nama'),
            'email'            => $this->request->getPost('email'),
            'phone'            => $this->request->getPost('nohp'),
            'shipping_address' => $shipping_address,
            'billing_address'  => $shipping_address,            
        );
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
            ),
            'item_details'        => $item,
            'customer_details'    => $customer_details,
        );
        
        $data =[
            'snapToken' => \Midtrans\Snap::getSnapToken($params)
        ];

        return $this->respond($data);
    }

    public function hasil()
    {
        
        $id_produk = $this->request->getPost('id');
        $jumlah = $id_produk = $this->request->getPost('jumlah');
        $respond_pembayaran = json_decode($this->request->getPost('data'),true);
        for ($i=0; $i < count($id_produk); $i++) { 
            $this->model->add_detailOrder($respond_pembayaran['order_id'],$id_produk[$i],$jumlah[$i]);
        }
        $this->model->add_order($respond_pembayaran['order_id'],$this->session->get('data')['id_user'],$respond_pembayaran['gross_amount'],$respond_pembayaran['transaction_time'],$respond_pembayaran['payment_type'],$respond_pembayaran['transaction_status']);
        echo 'sukses';
        // $status = \Midtrans\Transaction::status('1891786488');

        // $hasil = (array) json_decode($this->request->getpost('jason'));
        
        // $data = [
        //     'teks' => $hasil 
        // ];

        
        // dd($status);
        // foreach ($hasil as $key) {
        //     echo "{$key->pdf_url}";
        // }
    }
}