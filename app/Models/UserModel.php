<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    //VIEW

    public function view_produk(){
        $table = $this->db->table('produk');
        $table->select('produk.id_produk,produk.nama as nama,harga,gambar.nama as gambar');
        $table->join('gambar', 'gambar.id_produk = produk.id_produk');
        $table->groupBy("produk.id_produk");
        $query = $table->get()->getResultArray();
        return $query;
    }

    public function view_produkById($id){
        $table = $this->db->table('produk');
        $table->select('produk.id_produk,produk.nama as nama,harga,berat');
        $table->where('id_produk',$id);
        return $table->get()->getRowArray();
    }

    public function view_category(){
        $table = $this->db->table('category');
        return $table->get()->getResultArray();
    }

    public function view_featuredproduk(){
        $table = $this->db->table('produk');
        $table->select('produk.id_produk,produk.nama as nama,harga,gambar.nama as gambar');
        $table->join('gambar', 'gambar.id_produk = produk.id_produk');
        $table->groupBy("produk.id_produk");
        $table->limit(5);
        $query = $table->get()->getResultArray();
        return $query;
    }

    public function view_img($id){
        $table = $this->db->table('gambar');
        $table->select('id_gambar,nama');
        $table->where('id_produk',$id);
        $query = $table->get()->getResultArray();
        return $query;
    }

    public function view_keranjang(){
        $table = $this->db->table('keranjang');
        $table->select('produk.id_produk,produk.nama as nama,gambar.nama as gambar,jumlah, produk.harga as harga');
        $table->join('produk','keranjang.id_produk = produk.id_produk');
        $table->join('gambar', 'gambar.id_produk = produk.id_produk');
        $table->groupBy("produk.id_produk");
        $query = $table->get()->getResultArray();
        return $query;
    }

    public function detail_produk($id){
        $table = $this->db->table('produk');
        $table->select('id_produk,nama,harga,stok,deskripsi');
        $table->where('id_produk',$id);
        $query = $table->get()->getRowArray();
        return $query;
    }

    public function view_order(){
        return 'halo';
    }

    // INSERT
    public function add_keranjang($id,$jumlah){
        $table = $this->db->table('keranjang');
        $data = [
            'id_produk' => $id,
            'jumlah' => $jumlah,
        ];
        $table->set($data);
        $query = $table->insert();
        return $query;
    }

    public function add_detailOrder($id_order,$id_produk,$jum){
        $table = $this->db->table('detail_order');
        $data = [
            'id_order' => $id_order,
            'id_produk' => $id_produk,
            'jumlah' => $jum
        ];
        $table->set($data);
        return $table->insert();
    }
    //DATA
    public function getAddress($param){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/" . $param,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: fb456c59e23859f60ef66b8c599081de"
        ),
        ));

        $response = json_decode(curl_exec($curl),true);
        $err = curl_error($curl);
        curl_close($curl);

        $result = $response['rajaongkir']['results'];
        return $result;
    }

    public function getCost($destinasi,$berat,$kurir){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=133&destination={$destinasi}&weight={$berat}&courier={$kurir}",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: fb456c59e23859f60ef66b8c599081de"
        ),
        ));

        $response = json_decode(curl_exec($curl),true);
        $err = curl_error($curl);
        curl_close($curl);

        $result = $response['rajaongkir']['results'][0];
        return $result;
    }

    public function jumlah_keranjang(){
        $table = $table = $this->db->table('keranjang');
        return $table->countAll();
    }

    
}