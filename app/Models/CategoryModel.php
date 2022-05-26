<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    public function view(){
        $table = $this->db->table('category');
        return $table->get()->getResultArray();
    }

    public function insertData($nama){
        $table = $this->db->table('category');
        $data = [
            'nama' => $nama
        ];
        $query = $table->insert($data);
        return $query;
    }

    public function updateData($id,$nama){
        $table = $this->db->table('category');
        $data = [
            'nama' => $nama
        ];
        
        $table->set($data);
        $table->where('id_category',$id);
        $query = $table->update();
        return $query;
    }

    public function dataById($id){
        $table = $this->db->table('category');
        $table->where('id_category',$id);
        $result = $table->get()->getResultArray();
        return $result;
    }

    public function deleteById($id){
        $table = $this->db->table('category');
        $table->where('id_category',$id);
        return $table->delete();
    }
}
