<?php


class Mahasiswa_model{

    private $table = "mahasiswa";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    

    public function getMahasiswa(){
       $this->db->query("SELECT*FROM " . $this->table);
       return $this->db->resultSet();

    }

    public function getMahasiswaByID($id){
        $this->db->query("SELECT*FROM " . $this->table . " WHERE ID =:ID");
        $this->db->bind(":ID", $id);

        return $this->db->single();

    }


}

