<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_pelanggan extends CI_Controller {
	public function index(){
		$data['user']=$this->db->get_where('pelanggan',['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view('user/index');
	}
}