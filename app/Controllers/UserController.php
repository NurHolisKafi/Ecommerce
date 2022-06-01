<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $model;
    public function __construct() {
        $this->model = new UserModel();
        helper('form');
    }

public function tes(){
    $id = $this->request->getPost('total');
    $a = array();
    for ($i=0; $i<3; $i++){
        $data = [
            'id' => $i,
            'nama' => 'ah'
        ];
        array_push($a,$data);
    };
    dd($this->model->view_keranjang());
}



    //VIEW HOME PAGE
    public function index(){
        $result = [
            'all_produk' => $this->model->view_produk(),
            'featured_produk' => $this->model->view_featuredproduk(),
            'category' => $this->model->view_category()
        ];
        return view('Pages/User/Main_page/home',$result);
    }

    public function Keranjang(){
        $result = [
            'data' => $this->model->view_keranjang()
        ];
        return view('Pages/User/Main_page/keranjang',$result);
    }
    
    public function Checkout(){
        return view('Pages/User/Main_page/order');
    }
    
    public function Single_produk(){
        $id = $this->request->getGet('id');
        $result = [
            'img' => $this->model->view_img($id),
            'detail' => $this->model->detail_produk($id)
        ];
        return view('Pages/User/Main_page/single_produk',$result);
    }
    
    public function Login(){
        return view('Pages/User/Main_page/login');
    }
    
    public function Register(){
        return view('Pages/User/Main_page/register');
    }

    // VIEW AKUN PAGE
    public function Profile(){
        return view('Pages/User/Profile_page/home');
    }

    public function History(){
        return view('Pages/User/Profile_page/history');
    }

    public function Order_list(){
        return view('Pages/User/Profile_page/order');
    }

    public function Edit_profile(){
        return view('Pages/User/Profile_page/form_profile');
    }

    public function Edit_pass(){
        return view('Pages/User/Profile_page/change_pass');
    }

    public function Add_keranjang(){
        if(!$this->validate([
            'id_produk' => [
                'rules' => 'is_unique[keranjang.id_produk]',
                'errors' => [
                    'is_unique' => '{field} produk sudah ada'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        };
        $id_produk = $this->request->getPost('id_produk');
        $total = $this->request->getPost('jumlah');
        $harga = $this->request->getPost('harga');
        $hasil = $this->model->add_keranjang($id_produk,$total,$harga);
        echo "sukses";
    }
}