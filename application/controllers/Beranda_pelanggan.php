<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_pelanggan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_Produk');
		$this->load->model('Model_pelanggan');
		$this->load->model('model_edit_profil');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}
	
	public function index()
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
		$data = array(
			'data1'=>$this->Model_Produk->get_jumlah_produk(),
			'data2'=>$this->Model_Produk->get_produk());
		$this->load->view('user/setelah_login',$data);
		$this->load->view('user/footer');

	}
	public function kategori_alat_musik()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_produk_terbaru_alat_musik());
			$this->load->view('user/kategori_alat_musik',$data);
			$this->load->view('user/footer');
	}
	
	public function kategori_alat_pancing()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data2'=>$this->Model_Produk->get_produk_terbaru_alat_pancing());
			$this->load->view('user/kategori_alat_pancing',$data);
			$this->load->view('user/footer');
	}
	
	public function kategori_alat_olahraga()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga(),
				'data2'=>$this->Model_Produk->get_produk_terbaru_alat_olahraga());
			$this->load->view('user/kategori_alat_olahraga',$data);
			$this->load->view('user/footer');
	}
	
	public function harga_terendah()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_terendah());
			$this->load->view('user/setelah_login',$data);
			$this->load->view('user/footer');
	}

	public function harga_terendah_alat_musik()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_terendah_alat_musik());
			$this->load->view('user/kategori_alat_musik',$data);
			$this->load->view('user/footer');
	}

	public function harga_terendah_alat_pancing()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_terendah_alat_pancing());
			$this->load->view('user/kategori_alat_pancing',$data);
			$this->load->view('user/footer');
	}

	public function harga_terendah_alat_olahraga()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_terendah_alat_olahraga());
			$this->load->view('user/kategori_alat_olahraga',$data);
			$this->load->view('user/footer');
	}

	public function harga_tertinggi()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_tertinggi());
			$this->load->view('user/setelah_login',$data);
			$this->load->view('user/footer');
	}

	public function harga_tertinggi_alat_musik()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_tertinggi_alat_musik());
			$this->load->view('user/kategori_alat_musik',$data);
			$this->load->view('user/footer');
	}

	public function harga_tertinggi_alat_pancing()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_tertinggi_alat_pancing());
			$this->load->view('user/kategori_alat_pancing',$data);
			$this->load->view('user/footer');
	}

	public function harga_tertinggi_alat_olahraga()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_tertinggi_alat_olahraga());
			$this->load->view('user/kategori_alat_olahraga',$data);
			$this->load->view('user/footer');
	}

	public function populer_alat_musik()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_populer_alat_musik());
			$this->load->view('user/kategori_alat_musik',$data);
			$this->load->view('user/footer');
	}

	public function populer_alat_pancing()
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
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_populer_alat_pancing());
			$this->load->view('user/kategori_alat_pancing',$data);
			$this->load->view('user/footer');
	}

	public function populer_alat_olahraga()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_populer_alat_olahraga());
			$this->load->view('user/kategori_alat_olahraga',$data);
			$this->load->view('user/footer');
	}

	public function populer()
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
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_populer());
			$this->load->view('user/setelah_login',$data);
			$this->load->view('user/footer');
	}

	public function cara_pemesanan()
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
			$this->load->view('user/cara_pemesanan');
			$this->load->view('user/footer');
	}

	public function tentang_kami()
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
			$this->load->view('user/tentang_kami');
			$this->load->view('user/footer');
	}

	public function detail_produk($id)
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
			$data = array(
				'data'=>$this->Model_Produk->get_detail_produk($id));
			$this->load->view('user/detail_produk',$data);
			$this->load->view('user/footer');
	}

	public function profil_pelanggan()
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
			$data = array(
				'data'=>$this->Model_pelanggan-> get_profil_pelanggan());
			$this->load->view('user/profil_pelanggan',$data);
			$this->load->view('user/footer');
	}
	public function edit_profil($id)
	{
		
		$where = array('id_pelanggan' => $id);
		$data['pelanggan'] = $this->model_edit_profil->edit_data($where,'pelanggan')->result();
		$this->load->user('user/edit_profil',$data);
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Anda sudah keluar!</div>');
		redirect('auth');
	}
}
