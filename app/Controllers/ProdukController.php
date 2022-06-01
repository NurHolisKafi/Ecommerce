<?php

namespace App\Controllers;
use App\Models\ProdukModel;
use CodeIgniter\API\ResponseTrait;

class ProdukController extends BaseController
{
    use ResponseTrait;
    protected $model;
    function __construct() {
        helper('form');
        $this->model = new ProdukModel();
    }

    public function View(){
        
        $result = [
            'session' => $this->session,
            'validate' => $this->validation,
            'data_produk' => $this->model->view_produk(),
            'data_category' => $this->model->view_category(),
            'jumlah' => $this->model->Jumlah()
        ];
        return view('pages/Admin/produk',$result);
    }

    public function Insert(){
        if(!$this->validate([
            'nama' => [
                'rules' => 'is_unique[produk.nama]',
                'errors' => [
                    'is_unique' => '{field} produk sudah ada'
                ]
            ]
        ])){
            return redirect()->to('/a/produk/')->withInput();
        };

        $nama = $this->request->getpost('nama');
        $harga = $this->request->getpost('harga');
        $ukuran = $this->request->getpost('stok');
        $berat = $this->request->getpost('berat');
        $deskripsi = $this->request->getpost('deskripsi');
        $id_category = $this->request->getpost('category');
        $hasil = $this->model->insertData($nama,$harga,$ukuran,$deskripsi,$id_category,$berat);
        return redirect()->to('/a/produk/')->with('success','Data Berhasil Ditambahkan');

    }
    
    public function Edit(){
        $id = $this->request->getpost('id_produk');
        $nama = $this->request->getpost('nama');
        $harga = $this->request->getpost('harga');
        $ukuran = $this->request->getpost('stok');
        $berat = $this->request->getpost('berat');
        $deskripsi = $this->request->getpost('deskripsi');
        $id_category = $this->request->getpost('category');
        $hasil = $this->model->updateData($id,$nama,$harga,$ukuran,$deskripsi,$id_category,$berat);
        return redirect()->to('/a/produk/');
    }

    public function Delete($id){
        $result = $this->model->deleteById($id);
        return redirect()->to('/a/produk/');
    }
    
    public function Data($id){
        $result = $this->model->dataById($id)[0];
        $data = [
            'input' => [$result['id_produk'],$result['nama'],$result['harga'],$result['stok'],$result['berat']],
            'category' => $result['id_category'],
            'deskripsi' => $result['deskripsi'],
        ];
        return $this->respond($data,200);
    }



    //Gambar Produk
    public function View_img(){
        $id = $this->request->getGet('id');
        $nama = $this->request->getGet('nama');
        $result = [
            'session' => $this->session,
            'validate' => $this->validation,
            'data' => $this->model->view_gambar($id),
            'nama' => $nama,
            'id' => $id
        ];
        return view('pages/Admin/gambar',$result);
    }

    public function Insert_img(){
        if(!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,5120]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Gambar tidak boleh kosong',
                    'is_image' => 'File upload bukan gambar',
                    'nime_in' => 'File upload bukan gambar',
                    'max_size' => 'Ukuran gambar terlalu besar'
                ]
            ]
        ])){
            // dd($this->validation);
            return redirect()->back()->withInput();
        };
        $id = $this->request->getpost('id_produk');
        $gambar = $this->request->getfile('gambar');
        $nama = $gambar->getName();
        $gambar->move('assets/img',$nama);
        $hasil = $this->model->insertData_img($nama,$id);
        return redirect()->back()->with('success','Gambar Berhasil Ditambahkan');
    }

    public function Delete_img($id){
        $nama = $this->model->data_gambar($id)[0]['nama'];
        unlink('assets/img/' .$nama);
        $result = $this->model->delete_img($id);
        return redirect()->back();
    }

    public function g(){
        dd($this->model->data_gambar(1));
    }
}