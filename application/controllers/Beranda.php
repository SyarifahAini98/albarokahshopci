<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_Produk');
	}

	public function index()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk());
			$this->load->view('beranda',$data);
			$this->load->view('footer');
	}
	
	public function kategori_alat_musik()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_produk_terbaru_alat_musik());
			$this->load->view('kategori_alat_musik',$data);
			$this->load->view('footer');
	}
	
	public function kategori_alat_pancing()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data2'=>$this->Model_Produk->get_produk_terbaru_alat_pancing());
			$this->load->view('kategori_alat_pancing',$data);
			$this->load->view('footer');
	}
	
	public function kategori_alat_olahraga()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga(),
				'data2'=>$this->Model_Produk->get_produk_terbaru_alat_olahraga());
			$this->load->view('kategori_alat_olahraga',$data);
			$this->load->view('footer');
	}
	
	public function harga_terendah()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_terendah());
			$this->load->view('beranda',$data);
			$this->load->view('footer');
	}

	public function harga_terendah_alat_musik()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_terendah_alat_musik());
			$this->load->view('kategori_alat_musik',$data);
			$this->load->view('footer');
	}

	public function harga_terendah_alat_pancing()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_terendah_alat_pancing());
			$this->load->view('kategori_alat_pancing',$data);
			$this->load->view('footer');
	}

	public function harga_terendah_alat_olahraga()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_terendah_alat_olahraga());
			$this->load->view('kategori_alat_olahraga',$data);
			$this->load->view('footer');
	}

	public function harga_tertinggi()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_tertinggi());
			$this->load->view('beranda',$data);
			$this->load->view('footer');
	}

	public function harga_tertinggi_alat_musik()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_tertinggi_alat_musik());
			$this->load->view('kategori_alat_musik',$data);
			$this->load->view('footer');
	}

	public function harga_tertinggi_alat_pancing()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_tertinggi_alat_pancing());
			$this->load->view('kategori_alat_pancing',$data);
			$this->load->view('footer');
	}

	public function harga_tertinggi_alat_olahraga()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_tertinggi_alat_olahraga());
			$this->load->view('kategori_alat_olahraga',$data);
			$this->load->view('footer');
	}

	public function populer_alat_musik()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_populer_alat_musik());
			$this->load->view('kategori_alat_musik',$data);
			$this->load->view('footer');
	}

	public function populer_alat_pancing()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_populer_alat_pancing());
			$this->load->view('kategori_alat_pancing',$data);
			$this->load->view('footer');
	}

	public function populer_alat_olahraga()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_populer_alat_olahraga());
			$this->load->view('kategori_alat_olahraga',$data);
			$this->load->view('footer');
	}

	public function populer()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk_harga_populer());
			$this->load->view('beranda',$data);
			$this->load->view('footer');
	}

	public function cara_pemesanan()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$this->load->view('cara_pemesanan');
			$this->load->view('footer');
	}

	public function tentang_kami()
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$this->load->view('tentang_kami');
			$this->load->view('footer');
	}

	public function detail_produk($id)
	{
			$data = array(
				'data1'=>$this->Model_Produk->get_header_produk_terbaru_alat_musik(),
				'data2'=>$this->Model_Produk->get_header_produk_terbaru_alat_pancing(),
				'data3'=>$this->Model_Produk->get_header_produk_terbaru_alat_olahraga(),
				'data4'=>$this->Model_Produk->get_produk_header_populer());
			$this->load->view('header',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('sidebar_kiri',$data);
			$data = array(
				'data'=>$this->Model_Produk->get_detail_produk($id));
			$this->load->view('detail_produk',$data);
			$this->load->view('footer');
	}


}
