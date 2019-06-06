<?php
class Model_pelanggan extends CI_model{

    function get_table(){
        return $this->db->get("pelanggan");
    }
    function get_profil_pelanggan(){
        $query = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan='9'");
        return $query->result();
    }

    function cek_session()
    {
        return $this->session->userdata('id_pelanggan');
    }

    function hapus_session(){
        $this->session->sess_destroy();
    } 
}
