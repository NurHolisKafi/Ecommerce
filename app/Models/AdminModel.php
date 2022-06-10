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
        $table->groupBy("status_pengiriman.id_status");
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

    public function update_order($id,$resi,$id_status){
        $table = $this->db->table('status_pengiriman');
        $data = [
            'nama' => $nama,
            'id_status' => $id_status
        ];
        
        $table->set($data);
        $table->where('id_order',$id);
        $query = $table->update();
        return $query;
    }
}