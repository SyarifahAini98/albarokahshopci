<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('auth/masuk.php');
		$this->load->view('templates/auth_footer');
	}

	public function daftar()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		if($this->form_validation->run()==false){
			$data['title']='Al - Barokah Shop';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/daftar.php');
			$this->load->view('templates/auth_footer');
	}else{
		echo 'Data berhasil ditambahkan';
	}
	}
}
