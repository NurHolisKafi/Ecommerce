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
        $table->select('id_order,produk.nama as produk,jumlah,produk.harga as harga,total,users.email as email,status');
        $table->join('produk','produk.id_produk = orders.id_produk');
        $table->join('users','users.id_user = orders.id_users');
        $table->groupBy("id_order");
        return $table->get()->getResultArray();
    }

}