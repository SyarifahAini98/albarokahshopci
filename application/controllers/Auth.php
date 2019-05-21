<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['title']='Masuk Pelanggan';
		$this->load->view('templates/auth_header');
		$this->load->view('auth/masuk.php');
		$this->load->view('templates/auth_footer');
	}

	public function daftar()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[pelanggan.email]',[
			'is_unique'=>'Email ini sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'matches'=>'Password tidak sama!',
			'min_length'=>'Password minimal 3 karakter!'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		if($this->form_validation->run()==false){
			$data['title']='Al - Barokah Shop';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/daftar.php');
			$this->load->view('templates/auth_footer');
	}else{
		$data=[
			'nama'=>$this->input->post('nama'),
			'email'=>$this->input->post('email'),
			'foto'=>'default_foto_pelanggan.jpg',
			'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'role_id'=>2,
				'is_active'=>1,
				'date_created'=>time()
		];
		$this->db->insert('pelanggan',$data);
		$this->session->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Selamat! akunmu telah dibuat. Silahkan Masuk</div>');
		redirect('auth');
	}
	}
}
