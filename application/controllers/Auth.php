<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()==false){
			$data['title']='Masuk Pelanggan';
			$this->load->view('templates/auth_header');
			$this->load->view('auth/masuk.php');
			$this->load->view('templates/auth_footer');
	}else{
		//validasinya sukses
		$this->_login();
	}
	}

	private function _login(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$user=$this->db->get_where('pelanggan',['email'=>$email])->row_array();
		if($user){
			if(password_verify($password,$user['password'])){
				$data=[
					'email'=>$user['email'],
				];
				$this->session->set_userdata($data);
				redirect('beranda_pelanggan');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
			redirect('auth');
		}
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
			'nama_lengkap'=>htmlspecialchars($this->input->post('nama',true)),
			'jkel'=>htmlspecialchars($this->input->post('jkel',true)),
			'email'=>htmlspecialchars($this->input->post('email',true)),
			'no_telp'=>$this->input->post('no_telp'),
			'alamat'=>$this->input->post('alamat'),
			'username'=>htmlspecialchars($this->input->post('username',true)),
			'foto'=>'default_foto_pelanggan.jpg',
			'password'=>password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
		];
		$this->db->insert('pelanggan',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Selamat! akunmu telah dibuat. Silahkan Masuk</div>');
		redirect('auth');
	}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Anda sudah keluar!</div>');
		redirect('auth');
	}
}
