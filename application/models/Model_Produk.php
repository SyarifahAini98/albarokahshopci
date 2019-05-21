<?php
class Model_Produk extends CI_Model {
	
	function get_table(){
        return $this->db->get("produk");
    }
    
	function get_produk(){
		$query = $this->db->query("SELECT * FROM produk");
		return $query->result();
	}

	function get_produk_populer(){
		$query = $this->db->query("SELECT * FROM produk ORDER BY terjual DESC LIMIT(1,2)");
		return $query->result();
	}

	function get_produk_populer_alat_musik(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Musik' ORDER BY terjual DESC");
		return $query->result();
	}   
	function get_produk_populer_alat_pancing(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Pancing' ORDER BY terjual DESC");
		return $query->result();
	}   
	function get_produk_populer_alat_olahraga(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Olahraga' ORDER BY terjual DESC");
		return $query->result();
	}

	function get_produk_alat_musik(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Musik' ORDER BY id_produk");
		return $query->result();
	}	    
	function get_produk_alat_pancing(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Pancing' ORDER BY id_produk");
		return $query->result();
	}	    
	function get_produk_alat_olahraga(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Olahraga' ORDER BY id_produk");
		return $query->result();
	}
	    
	function get_produk_terbaru_alat_musik(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Musik' ORDER BY id_produk DESC");
		return $query->result();
	}
	function get_produk_terbaru_alat_pancing(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Pancing' ORDER BY id_produk DESC");
		return $query->result();
	}
	function get_produk_terbaru_alat_olahraga(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Olahraga' ORDER BY id_produk DESC");
		return $query->result();
	}

	function get_header_produk_terbaru_alat_musik(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Musik' ORDER BY id_produk DESC LIMIT 1,4");
		return $query->result();
	}
	function get_header_produk_terbaru_alat_pancing(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Pancing' ORDER BY id_produk DESC LIMIT 1,4");
		return $query->result();
	}   
	function get_header_produk_terbaru_alat_olahraga(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Olahraga' ORDER BY id_produk DESC LIMIT 1,4");
		return $query->result();
	}
}