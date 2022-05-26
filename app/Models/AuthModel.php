<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($nama,$pass,int $status = 0){
        if ($status != 0) {
            $table = $this->db->table('admin');
            $table->where(['nama' => $nama,'password' => $pass]);
            return $table->get()->getRowArray();;
        }else {
            $table = $this->db->table('account');
            $table->where(['nama' => $nama,'password' => $pass]);
            return $table->get()->getRowArray();;
        }
    }
}
