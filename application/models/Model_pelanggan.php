<?php
class Model_pelanggan extends CI_model{

    function get_table(){
        return $this->db->get("pelanggan");
    }
    function get_profil_pelanggan(){
        $query = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan='5'");
        return $query->result();
    }
}
