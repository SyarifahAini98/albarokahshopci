<?php
class Model_pelanggan extends CI_model{

    function get_table(){
        return $this->db->get("pelanggan");
    }
    function get_pelanggan(){
        $query = $this->db->query("SELECT * FROM pelanggan");
        return $query->result();
    }
    function get_nama_lengkap(){
    $query = $this->db->query("SELECT * FROM pelanggan");
        return $query->result();
    }
    function get_username(){
        $query = $this->db->query("SELECT * FROM pelanggan");
            return $query->result();
    }
    function get_password(){
        $query = $this->db->query("SELECT * FROM pelanggan");
            return $query->result();
    }
    function get_email(){
        $query = $this->db->query("SELECT * FROM pelanggan");
            return $query->result();
    }
    function get_jkel(){
        $query = $this->db->query("SELECT * FROM pelanggan");
            return $query->result();
    }
    function get_alamat(){
        $query = $this->db->query("SELECT * FROM pelanggan");
            return $query->result();
    }
    
    function get_foto(){
        $query = $this->db->query("SELECT * FROM pelanggan");
            return $query->result();
    }
    function get_no_telp(){
        $query = $this->db->query("SELECT * FROM pelanggan");
            return $query->result();
    }
}
