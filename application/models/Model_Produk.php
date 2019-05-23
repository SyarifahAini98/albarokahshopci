<?php
class Model_Produk extends CI_Model {
	
	function get_table(){
        return $this->db->get("produk");
    }
    
	function get_produk(){
		$query = $this->db->query("SELECT * FROM produk");
		return $query->result();
	}
    
	function get_detail_produk($id){
		$query = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
		return $query->result();
	}

	function get_jumlah_produk(){
		$query = $this->db->query("SELECT COUNT(*) as total FROM produk");
		return $query->result();
	}
	function get_jumlah_produk_alat_musik(){
		$query = $this->db->query("SELECT COUNT(*) as total FROM produk WHERE kategori='Alat Musik'");
		return $query->result();
	}
	function get_jumlah_produk_alat_pancing(){
		$query = $this->db->query("SELECT COUNT(*) as total FROM produk WHERE kategori='Alat Pancing'");
		return $query->result();
	}
	function get_jumlah_produk_alat_olahraga(){
		$query = $this->db->query("SELECT COUNT(*) as total FROM produk WHERE kategori='Alat Olahraga'");
		return $query->result();
	}

	function get_produk_header_populer(){
		$query = $this->db->query("SELECT * FROM produk ORDER BY terjual DESC LIMIT 1,2");
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

	function get_produk_harga_terendah(){
		$query = $this->db->query("SELECT * FROM produk ORDER BY harga_produk");
		return $query->result();
	}
	function get_produk_harga_tertinggi(){
		$query = $this->db->query("SELECT * FROM produk ORDER BY harga_produk DESC");
		return $query->result();
	}
	function get_produk_harga_populer(){
		$query = $this->db->query("SELECT * FROM produk ORDER BY terjual DESC");
		return $query->result();
	}

	function get_produk_harga_terendah_alat_musik(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Musik' ORDER BY harga_produk");
		return $query->result();
	}	    
	function get_produk_harga_terendah_alat_pancing(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Pancing' ORDER BY harga_produk");
		return $query->result();
	}	    
	function get_produk_harga_terendah_alat_olahraga(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Olahraga' ORDER BY harga_produk");
		return $query->result();
	}

	function get_produk_harga_tertinggi_alat_musik(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Musik' ORDER BY harga_produk DESC");
		return $query->result();
	}	    
	function get_produk_harga_tertinggi_alat_pancing(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Pancing' ORDER BY harga_produk DESC");
		return $query->result();
	}	    
	function get_produk_harga_tertinggi_alat_olahraga(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Olahraga' ORDER BY harga_produk DESC");
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
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Musik' ORDER BY id_produk DESC LIMIT 0,4");
		return $query->result();
	}
	function get_header_produk_terbaru_alat_pancing(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Pancing' ORDER BY id_produk DESC LIMIT 0,4");
		return $query->result();
	}   
	function get_header_produk_terbaru_alat_olahraga(){
		$query = $this->db->query("SELECT * FROM produk WHERE kategori='Alat Olahraga' ORDER BY id_produk DESC LIMIT 0,4");
		return $query->result();
	}
}