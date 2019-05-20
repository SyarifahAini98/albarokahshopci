<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('auth/masuk.php');
		$this->load->view('templates/auth_footer');
	}

	public function daftar()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('auth/daftar.php');
		$this->load->view('templates/auth_footer');
	}
}
