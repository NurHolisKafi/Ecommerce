<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function view_produk(){
        $table = $this->db->table('produk');
        $table->select('produk.id_produk,produk.nama as nama,harga,gambar.nama as gambar');
        $table->join('gambar', 'gambar.id_produk = produk.id_produk');
        $table->groupBy("produk.id_produk");
        $query = $table->get()->getResultArray();
        return $query;
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
        $table->select('produk.id_produk,produk.nama as nama,gambar.nama as gambar,keranjang.harga,jumlah');
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
        # code...
    }


    public function add_keranjang($id,$jumlah,$harga){
        $table = $this->db->table('keranjang');
        $data = [
            'id_produk' => $id,
            'jumlah' => $jumlah,
            'harga' => $harga
        ];
        $table->set($data);
        $query = $table->insert();
        return $query;
    }

    public function jumlah_keranjang(){
        $table = $table = $this->db->table('keranjang');
        return $table->countAll();
    }
}