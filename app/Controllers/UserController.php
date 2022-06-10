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
        // $id = $this->request->getPost('id');
        // $jumlah = $this->request->getPost('jumlah');
        
        // $a = array();
        dd(\Midtrans\Transaction::status('1973127621'));
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
    
    public function Login(){
        return view('Pages/User/Main_page/login');
    }
    
    public function Register(){

        return view('Pages/User/Main_page/register',['validation' => $this->validation]);
    }

    public function Single_produk(){
        $id = $this->request->getGet('id');
        $result = [
            'img' => $this->model->view_img($id),
            'detail' => $this->model->detail_produk($id)
        ];
        return view('Pages/User/Main_page/single_produk',$result);
    }

    public function Keranjang(){
        $result = [
            'data' => $this->model->view_keranjang($this->session->get('data')['id_user'])
        ];
        return view('Pages/User/Main_page/keranjang',$result);
    }
    
    public function Checkout(){
        
        $id = $this->request->getPost('id');
        $total_harga = 0;
        $berat = 0;
        if ($this->request->getPost('status') != null) {
            $produk =  $this->model->view_produkById($id);
            $jumlah = $this->request->getPost("jumlah");
            $total_harga += $produk['harga'] * $jumlah;
            $berat += $produk['berat'];
            $data_pesanan = [
                [
                    'id' => $produk['id_produk'],
                    'nama' => $produk['nama'],
                    'jumlah' => $jumlah,
                    'total' => $produk['harga'] * $jumlah
                ]
            ];
            $result = [
                'data_pesanan' => $data_pesanan,
                'provinsi' => $this->model->getAddress("province"),
                'total_harga' => $total_harga,
                'berat' => $berat,
            ];
    
            return view('Pages/User/Main_page/order',$result);
        }else {

            if ($id == null) {
                return redirect()->back()->with('error','Checkbox tidak boleh kosong');
            }
            $data_pesanan = array();
            for ($b=0; $b<count($id); $b++){
                $produk =  $this->model->view_keranjangCheckout($id[$b]);
                $jumlah = $this->request->getPost("jumlah".$produk['id_keranjang']);
                $total_harga += $produk['harga'] * $jumlah;
                $berat += $produk['berat'];
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
                'berat' => $berat,
            ];
    
            return view('Pages/User/Main_page/order',$result);
        }
    }
    
    

    // VIEW AKUN PAGE
    public function Profile(){
        return view('Pages/User/Profile_page/home');
    }

    public function History(){
        return view('Pages/User/Profile_page/history');
    }

    public function Order_list(){
        // dd();
        $data =[
            'order' => $this->model->view_order($this->session->get('data')['id_user']),
        ];
        return view('Pages/User/Profile_page/order',$data);
    }

    public function Edit_profile(){
        return view('Pages/User/Profile_page/form_profile');
    }

    public function Edit_pass(){
        return view('Pages/User/Profile_page/change_pass');
    }


    //Insert
    public function Add_User(){
        if(!$this->validate([
            'username' => [
                'rules' => 'is_unique[users.nama]',
                'errors' => [
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'email' => [
                'rules' => 'valid_emails',
                'errors' => [
                    'valid_emails' => '{field} tidak valid'
                ]
            ]
        ])){
            return redirect()->back()->withInput();
        };

        $nama = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $notelp = $this->request->getPost('notelp');
        $pass = $this->request->getPost('pass');
        $this->model->add_User($nama,$email,$notelp,$pass);
        return redirect()->to('/login');
    }

    public function Add_keranjang(){
        $id_produk = $this->request->getPost('id');
        $total = $this->request->getPost('jumlah');
        $id_user = $this->session->get('data')['id_user'];
        $hasil = $this->model->add_keranjang($id_produk,$total,$id_user);
        return redirect()->back()->with('success','Berhasil ditambahkan ke keranjang');
    }

    //DELETE
    public function Delete_keranjang(){
        $id = $this->request->getGet('id');
        $this->model->delete_keranjang($id);
        return redirect()->back();
    }

    //Data
    public function DataCity(){
        $id = $this->request->getPost('id');
        $data = $this->model->getAddress("city?province=" . $id);
        
        echo "<option selected='selected' disabled>-- Pilih --</option>";
        foreach ($data as $key) {
            echo "<option value=".$key['city_id']." postal_code=".$key['postal_code']." nama=".$key['city_name'].">";
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

    public function Data_detailOrder($id_order){
        $detail = $this->model->view_detailOrder($id_order);
        $no=1;
        foreach ($detail as $key) {
            echo "<tr>
                  <td>".$no."</td>
                  <td>".$key['nama']."</td>
                  <td>".$key['jumlah']."</td>
                </tr>";
            $no++;
        }
    }

    public function Data_statusOrder($id_order){
        $result = [
            'status' => \Midtrans\Transaction::status($id_order)->transaction_status,
        ];

        return $this->respond($result);
    }
}