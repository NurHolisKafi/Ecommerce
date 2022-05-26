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

}