<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($nama,$pass,$status){
        if ($status == 1) {
            $table = $this->db->table('admin');
            $table->where(['nama' => $nama,'password' => $pass]);
            return $table->get()->getRowArray();
        }elseif ($status == 2) {
            $table = $this->db->table('users');
            $table->where(['nama' => $nama,'password' => $pass]);
            return $table->get()->getRowArray();
        }
    }
}
