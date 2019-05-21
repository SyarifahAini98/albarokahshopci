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
				'data4'=>$this->Model_Produk->get_produk_populer());
			$this->load->view('header',$data);
			$this->load->view('sidebar_kiri');
			$data = array(
				'data'=>$this->Model_Produk->get_jumlah_produk(),
				'data'=>$this->Model_Produk->get_produk());
			$this->load->view('beranda',$data);
			$this->load->view('footer');
	}
}
