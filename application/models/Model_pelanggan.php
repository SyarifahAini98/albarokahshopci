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
    
    function get_keranjang(){
        $total = 0;
        $data=[
            'items'=>'0',
        ];
        $this->session->set_userdata($data);
        $items=$this->session->userdata('items');
        foreach ($items as $key => $val){
            $query = $this->db->query("SELECT * FROM produk where id_produk = '$key'");
            $harga_produk=$this->db->get_where('produk',['harga_produk'=>$harga_produk])->row_array();
            $jumlah_harga = $harga_produk * $val;
            $total += $jumlah_harga;
            return $query->result();
        }
    }

}
