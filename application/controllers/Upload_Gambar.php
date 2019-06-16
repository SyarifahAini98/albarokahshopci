<?php 
date_default_timezone_set("Asia/Manila"); 
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_Gambar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_Produk');
		$this->load->model('Model_pelanggan');
		$this->load->model('Model_transaksi');
		$this->load->model('model_edit_profil');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('cart');
	}
		public function index()
	{
		if($this->Model_pelanggan->cek_session())
        {
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('user/header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('user/sidebar_kiri',$data);
			$data = array();
			
			$this->load->model('upload_images');
			
			$data['uploaded_images'] = $this->upload_images->get_images();

			$data['id_pelanggan']=>$this->session->userdata('id_pelanggan');
			$data['id_transaksi']=>$this->uri->segment('5');
			$this->load->view('user/konfirmasi_upload_bukti', $data);
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

	function upload(){
		$filename = md5(uniqid(rand(), true));
		$config = array(
			'upload_path' => 'uploads',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
		);
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload())
			{
			$file_data = $this->upload->data();
			
			$data['foto'] = $file_data['file_name'];
			$data['tgl_transaksi'] = date('Y-m-d H:i:s');
			$this->load->model('upload_images');
			$this->upload_images->save_image($data);
			
			$data['message'] = "Bukti Transaksi Telah Terupload";
		
			$this->load->view('user/konfirmasi_upload_bukti', $data);
			}
			else
			{
			$data = array();	
			$this->load->model('upload_images');			
			$data['uploaded_images'] = $this->upload_images->get_images();
			
			$error = $this->upload->display_errors();
			$data['errors'] = $error;

			redirect("Upload_Gambar");
			}
	}

}
?>