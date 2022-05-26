<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    //Produk
    public function view_category(){
        $table = $this->db->table('category');
        return $table->get()->getResultArray();
    }

    public function view_produkByUser(){
        $table = $this->db->table('produk');
        $table->select('produk.id_produk,produk.nama as nama,harga,gambar.nama as gambar');
        $table->join('gambar', 'gambar.id_produk = produk.id_produk');
        $table->groupBy("produk.id_produk");
        $query = $table->get()->getResultArray();
        return $query;
    }

    public function view_produk(){
        $table = $this->db->table('produk');
        $table->select('id_produk,produk.nama as nama,harga,ukuran,deskripsi,berat,category.nama as category');
        $table->join('category', 'category.id_category = produk.id_category');
        $table->groupBy("produk.id_produk");
        $query = $table->get()->getResultArray();
        return $query;
    }


    public function insertData($nama,$harga,$ukuran,$deskripsi,$id_category,$berat){
        $table = $this->db->table('produk');
        $data = [
            'nama' => $nama,
            'harga' => $harga,
            'ukuran' => $ukuran,
            'deskripsi' => $deskripsi,
            'id_category' => $id_category,
            'berat' => $berat,
        ];
        $query = $table->insert($data);
        return $query;
    }

    public function updateData($id,$nama,$harga,$ukuran,$deskripsi,$id_category,$berat){
        $table = $this->db->table('produk');
        $data = [
            'nama' => $nama,
            'harga' => $harga,
            'ukuran' => $ukuran,
            'deskripsi' => $deskripsi,
            'id_category' => $id_category,
            'berat' => $berat,
        ];
        $table->set($data);
        $table->where('id_produk',$id);
        $query = $table->update();
        return $query;
    }

    public function dataById($id){
        $table = $this->db->table('produk');
        $table->where('id_produk',$id);
        $result = $table->get()->getResultArray();
        return $result;
    }

    public function deleteById($id){
        $table = $this->db->table('produk');
        $table->where('id_produk',$id);
        return $table->delete();
    }


    //Gambar Produk
    
    public function view_gambar($id){
        $table = $this->db->table('gambar');
        $table->select('id_gambar,gambar.nama as nama');
        $table->where('gambar.id_produk',$id);
        $query = $table->get()->getResultArray();
        return $query;
    }

    public function data_gambar($id){
        $table = $this->db->table('gambar');
        $table->where('id_gambar',$id);
        $query = $table->get()->getResultArray();
        return $query;
    }

    public function insertData_img($nama,$id){
        $table = $this->db->table('gambar');
        $data = [
            'nama' => $nama,
            'id_produk' => $id
        ];
        $query = $table->insert($data);
        return $query;
    }

    public function delete_img($id){
        $table = $this->db->table('gambar');
        $table->where('id_gambar',$id);
        return $table->delete();
    }
}
