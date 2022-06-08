<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use \App\Models\AuthModel;

class AuthController extends BaseController
{
    use ResponseTrait;
    protected $model;
    public function __construct() {
        $this->model = new AuthModel();
    }



    public function login($id){
        $data = [
            'session' => $this->session,
            'id' => $id
        ];
        if($id == 1){
            return view('pages/admin/login',$data);
        }else{
            return view('pages/User/Main_page/login',$data);
        }
    }

    public function Auth()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('username');
        $pass = $this->request->getPost('pass');
        if($id == 1){
            $login = $this->model->login($nama,$pass,$id);
            if ($login != null) {
                $data = [
                    'data' => $login,
                    'status' => 'admin'
                ];
                $this->session->set($data);
                return redirect()->to('/a/');
            }else{
                return redirect()->back()->with('gagal','A problem has been occurred while submitting your data.');
            }
        }else{
            $login = $this->model->login($nama,$pass,$id);
            if ($login != null) {
                $data = [
                    'data' => $login,
                    'status' => 'user'
                ];
                $this->session->set($data);
                return redirect()->to('/');
            }else{
                return redirect()->back()->with('gagal','A problem has been occurred while submitting your data.');
            }
        }

    }
    
}
