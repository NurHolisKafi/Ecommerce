<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use \App\Models\AdminModel;
class AdminController extends BaseController
{
    use ResponseTrait;
    protected $model;
    protected $RO_api;


    function __construct() {
        helper('form');
        $this->model = new AdminModel();
        $this->RO_api = \Config\Services::curlrequest([
            'baseURI' => 'https://api.rajaongkir.com/starter/',
            'headers' => [
                'key' => 'fb456c59e23859f60ef66b8c599081de',
            ],
        ]);

    }

    public function test(){
        $data = [
            'category' => $this->model->data_category(1)
        ];
        return $this->respond($data,200);
    }


    //token Midtrans
    public function SnapToken($param){
        $token = \Midtrans\Snap::getSnapToken($params);
        return $token;
    }

    //View
    public function index(){
        echo view('pages/Admin/dashboard');
    }

    public function login(){
        return view('pages/Admin/login');
    }

    public function order(){
        return view('pages/Admin/order');
    }

    public function account(){
        $result = [
            'data' => $this->model->view_user()
        ];
        return view('pages/Admin/account',$result);
    }


    //Delete
    public function DeleteUser($id){
        $result = $this->model->delete_user($id);
        return redirect()->to('/a/account');
    }


}
