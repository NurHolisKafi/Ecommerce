<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    //View
    public function view_user(){
        $table = $this->db->table('users');
        $table->select('id_user,email,nama,notelp,alamat');
        $hasil = $table->get()->getResultArray();
        return $hasil;
    }

    public function delete_user($id){
        $table = $this->db->table('users');
        $table->where('id_user',$id);
        return $table->delete();
    }


    public function view_order(){
        $table = $this->db->table('orders');
        $table->select('id_order,total,waktu,users.email as email,status_pengiriman.nama as status,resi');
        $table->join('status_pengiriman','status_pengiriman.id_status = orders.id_status');
        $table->join('users','users.id_user = orders.id_users');
        return $table->get()->getResultArray();
    }

    public function view_detailOrder($id){
        $table = $this->db->table('detail_order');
        $table->select('produk.nama,jumlah');
        $table->join('produk','detail_order.id_produk = produk.id_produk');
        $table->where('id_order',$id);
        return $table->get()->getResultArray();
    }

    public function view_status(){
        $table = $this->db->table('status_pengiriman');
        return $table->get()->getResultArray();
    }

    //UPDATE
    public function update_order($id,$resi,$id_status){
        $table = $this->db->table('orders');
        $data = [
            'resi' => $resi,
            'id_status' => $id_status
        ];
        
        $table->set($data);
        $table->where('id_order',$id);
        $query = $table->update();
        return $query;
    }

    //DATA
    public function get_JumUser(){
        $table = $this->db->table('users');
        $table->selectCount('id_user');
        return $table->get()->getRowArray();
    }

    public function get_JumProduk(){
        $table = $this->db->table('produk');
        $table->selectCount('id_produk');
        return $table->get()->getRowArray();
    }

    public function get_JumOrder(){
        $table = $this->db->table('orders');
        $table->selectCount('id_status');
        $table->where('id_status <','4');
        return $table->get()->getRowArray();
    }
    
}