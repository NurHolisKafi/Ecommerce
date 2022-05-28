<?php

namespace App\Controllers;


class UserController extends BaseController
{
    //VIEW HOME PAGE
    public function index(){
        return view('Pages/User/Main_page/home');
    }

    public function Keranjang(){
        return view('Pages/User/Main_page/keranjang');
    }
    
    public function Checkout(){
        return view('Pages/User/Main_page/order');
    }
    
    public function Single_produk(){
        return view('Pages/User/Main_page/single_produk');
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
}