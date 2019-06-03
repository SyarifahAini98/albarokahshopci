<?php
class Model_Produk extends CI_Model {
	
	function get_table(){
        return $this->db->get("produk");
    }
    
	function get_produk(){
		$query = $this->db->query("SELECT * FROM produk ORDER BY id_produk");
		return $query->result();
	}
    
	function get_detail_produk($id){
		$query = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
		return $query->result();
	}    

	function get_pelanggan(){
		$query = $this->db->query("SELECT * FROM pelanggan ORDER BY id_pelanggan");
		return $query->result();
	}
 
	function get_pemesanan(){
		$query = $this->db->query("SELECT * FROM transaksi WHERE status='Belum Upload' OR status='Terbayar' ORDER BY id_transaksi");
		return $query->result();
	}

	function get_transaksi(){
		$query = $this->db->query("SELECT * FROM transaksi WHERE status='Terkirim' ORDER BY id_transaksi");
		return $query->result();
	}

	function get_testimoni(){
		$query = $this->db->query("SELECT * FROM pelanggan,transaksi,detail_transaksi,produk WHERE pelanggan.id_pelanggan=transaksi.id_pelanggan AND transaksi.id_transaksi=detail_transaksi.id_transaksi AND produk.id_produk=detail_transaksi.id_produk AND detail_transaksi.testimoni!='' ORDER BY transaksi.id_transaksi");
		return $query->result();
	}

}