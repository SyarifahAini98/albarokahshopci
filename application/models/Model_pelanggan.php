<?php
class Model_pelanggan extends CI_model{

    function get_table(){
        return $this->db->get("pelanggan");
    }
    function get_profil_pelanggan(){
        $id_pelanggan=$this->session->userdata('id_pelanggan');
        $query = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
        return $query->result();
    }

    function edit_proses_profil($id_pelanggan,$data)
    {
        $this->db->where('id_pelanggan',$id_pelanggan);
        $this->db->update('pelanggan',$data);
    }

    function cek_session()
    {
        return $this->session->userdata('id_pelanggan');
    }

    function hapus_session(){
        $this->session->sess_destroy();
    } 
    
    

}
