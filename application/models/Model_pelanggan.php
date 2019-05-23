<?php
class Model_pelanggan extends CI_model{

    function get_table(){
        return $this->db->get("pelanggan");
    }
    function get_pelanggan(){
        $query = $this->db->query("SELECT * FROM pelanggan");
        return $query->result();
    }
}
