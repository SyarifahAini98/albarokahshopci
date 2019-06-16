<?php 
Class upload_images extends CI_Model{

	function save_image($data){	
		$id_trs=$data['id_transaksi'];
		$this->db->update('transaksi',$data);
        $this->db->where('id_trs',$id_trs);
	}
	
	function get_images(){
		$this->db->from('transaksi');
		$query = $this->db->get();
		
		return $query->result();		

	}

}
?>