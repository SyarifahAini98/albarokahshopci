<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rajaongkir extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_Produk');
		$this->load->model('Model_pelanggan');
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
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk());
			$this->load->view('user/checkout',$data);
			$this->load->view('user/footer');
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

	function getCity($province){		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/basic/city?province=$province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: fbd791dbdaa5ed2f93cd83f0f68887ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
			$data = json_decode($response, true);
		  //echo json_encode($k['rajaongkir']['results']);

		  
		  for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
		  

		    echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']." (".$data['rajaongkir']['results'][$j]['type'].")"."</option>";
		  	 /*
		  	 if($data['rajaongkir']['results'][$j]['type']=="Kabupaten"){
		  	 	echo "Kabupaten";
		  	 }esle{
		  	 	echo "Kota";
		  	 }
		  	 */

		  }
		}
	}

	function getCost()
	{
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');

		$data = array('origin' => $origin,
						'destination' => $destination, 
						'berat' => $berat, 
						'courier' => $courier 

		);
		
		$this->load->view('user/rajaongkir/getCost', $data);
	}

	function getResi()
	{
		$waybill = $this->input->get('waybill');

		$data = array('waybill' => $waybill

		);
		
		$this->load->view('user/rajaongkir/getResi', $data);
	}

}