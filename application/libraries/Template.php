<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {
	function __construct(){
		$this->=&getinstance();
	}

	function olshop($template,$data=''){
		$data['content']=$this->load->view($template,$data,TRUE);
		$this->load->view('beranda_pelanggan',$data);
	}
}