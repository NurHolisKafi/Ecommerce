<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController
{
    use ResponseTrait;
    protected $model;
    public function __construct() {
        $this->model = new UserModel();
        helper('form');
    }

    public function tes(){
        
        $id = $this->request->getPost('id');
        $jumlah = $this->request->getPost('jumlah');
        
        $a = array();
        // for ($i=0; $i<3; $i++){
        //     $data = [
        //         'id' => $i,
        //         'nama' => 'ah'
        //     ];
        //     array_push($a,$data);
        // };

        // for ($b=0; $b<count($id); $b++){
        //     $data = [
        //         'id' => $id[$b],
        //         'jumlah' => $jumlah[$b],
        //         'total' => $this->model->harga_produk($id[$b])['harga'] * $jumlah[$b]
        //     ];
        //     array_push($a,$data);
        // };
        dd($this->model->view_produkById(1));
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
        $id = $this->request->getPost('id');
        $data_pesanan = array();
        $total_harga = 0;
         for ($b=0; $b<count($id); $b++){
            $produk =  $this->model->view_produkById($id[$b]);
            $jumlah = $this->request->getPost("jumlah".$produk['id_produk']);
            $total_harga += $produk['harga'] * $jumlah;
            $data = [
                'id' => $produk['id_produk'],
                'nama' => $produk['nama'],
                'jumlah' => $jumlah,
                'total' => $produk['harga'] * $jumlah
            ];
            array_push($data_pesanan,$data);
        };
        $result = [
            'data_pesanan' => $data_pesanan,
            'provinsi' => $this->model->getAddress("province"),
            'total_harga' => $total_harga,
        ];
        return view('Pages/User/Main_page/order',$result);
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

    //Insert
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
        $hasil = $this->model->add_keranjang($id_produk,$total);
        echo "sukses";
    }

    //Data
    public function DataCity(){
        $id = $this->request->getPost('id');
        $data = $this->model->getAddress("city?province=" . $id);
        
        echo "<option selected='selected' disabled>-- Pilih --</option>";
        foreach ($data as $key) {
            echo "<option value=".$key['city_id'].">";
            echo $key['type']." ".$key['city_name'];
            echo "</option>";
        }
    }

    public function DataKurir(){
        echo"<option selected='selected' disabled>-- Pilih --</option>
        <option value='jne'>JNE</option>
        <option value='pos'>POS Indonesia</option>
        <option value='tiki'>TIKI</option>";
    }

    public function DataCost(){
        $tujuan = $this->request->getPost('tujuan');
        $berat = $this->request->getPost('berat');
        $kurir = $this->request->getPost('kurir');
        $data = $this->model->getCost($tujuan,$berat,$kurir);
        foreach ($data['costs'] as $key) {
            echo "<div class='col-sm-6 mb-3'>
                    <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>".$key['description']. "</h5>
                        <p class='card-text value'>".$key['cost'][0]['value']."</p>
                        <p class='card-text'>Estimasi : ";
            if ($data['code'] == 'pos'){
                echo $key['cost'][0]['etd']."</p>";
            }else{
                echo $key['cost'][0]['etd']." Hari </p>";
            }
            
            echo "</div>
                    </div>
                  </div>";
        }
    }
}