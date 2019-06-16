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
    
     function get_Testimoni(){
        $id_pelanggan=$this->session->userdata('id_pelanggan');
        $query = $this->db->query("SELECT * FROM transaksi,detail_transaksi,produk,pelanggan WHERE transaksi.id_transaksi=detail_transaksi.id_transaksi AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND produk.id_produk=detail_transaksi.id_produk AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND transaksi.id_pelanggan = '$id' AND transaksi.status='Terbayar' OR transaksi.status='Terkirim' ORDER BY transaksi.id_transaksi");
        return $query->result();
    }
}
