<?php
class Model_transaksi extends CI_Model {
	
	function get_table(){
        return $this->db->get("transaksi");
    }
    
	function get_transaksi(){
		$idp=$this->session->userdata('id_pelanggan');
		$query = $this->db->query("SELECT * FROM transaksi WHERE id_pelanggan='$idp' ORDER BY id_transaksi");
		return $query->result();
	}
    
	function get_detail_transaksi($id){
		$query = $this->db->query("SELECT * FROM produk WHERE id_transaksi='$id'");
		return $query->result();
	}
}