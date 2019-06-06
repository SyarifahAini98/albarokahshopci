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
    
    function get_keranjang(){
        foreach ($_SESSION['items'] as $key => $val){
            $query = $this->db->query("SELECT * FROM produk where id_produk = '$key'");
             
            $jumlah_harga = $rs['harga_produk'] * $val;
            $total += $jumlah_harga;
        return $query->result();
        }
    }

}
