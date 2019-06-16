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
		$query = $this->db->query("SELECT * FROM transaksi WHERE id_transaksi='$id'");
		return $query->result();
	}

	function update_transaksi($id_transaksi, $data){
        $config['upload_path'] = './assets/img/images_transaksi/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
       
        $this->load->library('upload', $config);
       
        if (!$this->upload->do_upload('file_name')){
            //$error = array('error'=>$this->upload->display_errors());
            //echo $error;?>
            Ukuran File Terlalu Besar <a href="javascript: history.go(-1)" class="btn btn-default" role="button" style="float:left;">Kembali</a>
            <?php
        }
        else {
            $upload_data = array('upload_data' => $this->upload->data());
            $data['foto'] = $upload_data['upload_data']['file_name'];
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi', $data);
            redirect(site_url('Beranda_pelanggan/transaksi'));
        }
    }
}