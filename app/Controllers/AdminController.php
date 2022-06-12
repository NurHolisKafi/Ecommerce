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

    //View
    public function index(){
        $data = [
            'produk' => $this->model->get_JumProduk(),
            'order' => $this->model->get_JumOrder(),
            'user' => $this->model->get_JumUser(),
        ];
        return view('pages/Admin/dashboard',$data);
    }

    public function login(){
        return view('pages/Admin/login');
    }

    public function order(){
        $result = [
            'data' => $this->model->view_order(),
            'status' => $this->model->view_status(),
        ];
        return view('pages/Admin/order',$result);
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

    //UPDATE
    public function UpdateOrder(){
        $id_order = $this->request->getPost('id_order');
        $resi = $this->request->getPost('noresi');
        $id_status = $this->request->getPost('status');
        $this->model->update_order($id_order,$resi,$id_status);
        return redirect()->back();
    }


}
