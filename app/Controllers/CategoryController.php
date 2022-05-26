<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use CodeIgniter\API\ResponseTrait;
class CategoryController extends BaseController
{
    use ResponseTrait;
    protected $model;
    function __construct() {
        helper('form');
        $this->model = new CategoryModel();
    }

    public function View(){
        $result = [
            'data' => $this->model->view(),
            'session' => $this->session,
            'validate' => $this->validation,
        ];
        return view('pages/Admin/category',$result);
    }

    public function Insert(){
        if(!$this->validate([
            'nama' => [
                'rules' => 'is_unique[category.nama]',
                'errors' => [
                    'is_unique' => '{field} category sudah ada'
                ]
            ]
        ])){
            return redirect()->to('/a/category/')->withInput();
        };
        $nama = $this->request->getpost('nama');
        $insert = $this->model->insertData($nama);
        return redirect()->to('/a/category/')->with('success','Data Berhasil Ditambahkan');
    }
    
    public function Edit(){
        $id = $this->request->getpost('id_category');
        $nama = $this->request->getpost('nama');
        $edit = $this->model->updateData($id,$nama);
        return redirect()->to('/a/category/');
    }

    public function Delete($id){
        $result = $this->model->deleteById($id);
        return redirect()->to('/a/category/')->with('delete','Data Berhasil Dihapus');
        dd($this->session->get('delete'));
    }
    
    public function Data($id){
        $result = $this->model->dataById($id);
        $data = [
            'input' => [$result[0]['id_category'],$result[0]['nama']]
        ];
        return $this->respond($data,200);
    }
}