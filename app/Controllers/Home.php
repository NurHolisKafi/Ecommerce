<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use \App\Models\AdminModel;
class Home extends BaseController
{
    use ResponseTrait;
    function __construct() {
        $this->model = new AdminModel();
        helper('form');
    }

    public function insertProduk(){
        try{
            if(!$this->validate([
                'nama' => 'required|is_unique[produk.nama]',
                'category' => 'required',
                'harga' => 'required',
                'ukuran' => 'required',
                'deskripsi' => 'required',
                'berat' => 'required',
                'harga' => 'required',
                // 'gambar' => 'uploaded[produk.gambar]|is_image[produk.gambar]',
            ])){
                echo 'gagal';
            }else{
                echo 'berhasil';
            };
            dd($this->validation->listErrors());
        }catch(Exception $e){
            echo $e;
        }
    }

    public function test(){
        return view('Pages/User/Main_page/home');
    }

    
    public function index()
    {
        echo view('pages/Admin/dashboard');
    }

    public function edit(){
        $data = [
            'id' => '12345',
            'category' => '2',
            'deskripsi' => 'KSDchSd',
            'input' =>["id","nama","harga","ukuran","berat","ww.jpg"]
        ];

        return $this->respond($data, 200);

    }
    public function category(){
        return view('pages/Admin/category');
    }
    

    public function produk(){
        return view('pages/Admin/produk');
    }

    public function Addproduk(){
        return view('pages/Admin/Produk/tambah');
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

    public function delete_account($id){
        $result = $this->model->delete_user($id);
        return redirect()->to('/Home/account');
    }


}
