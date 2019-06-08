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
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('user/sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk());
			$this->load->view('user/setelah_login',$data);
			$this->load->view('user/footer');
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

	 function add()
	{
              // Set array for send data.
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 1
		);		

                 // This function add items into cart.
		$this->cart->insert($insert_data);
	      
                // This will show insert data in cart.
		redirect('Beranda_pelanggan/keranjang');
	     }
	
		function remove($rowid) {
                    // Check rowid value.
		if ($rowid==="all"){
                       // Destroy data which store in  session.
			$this->cart->destroy();
		}else{
                    // Destroy selected rowid in session.
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                     // Update cart data, after cancle.
			$this->cart->update($data);
		}
		
                 // This will show cancle data in cart.
		redirect('Beranda_pelanggan/keranjang');
	}
	
	    function update_cart(){
                
                // Recieve post values,calcute them and updates
                $cart_info =  $_POST['cart'] ;
 		foreach( $cart_info as $id => $cart)
		{	
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    	$data = array(
				'rowid'   => $rowid,
                                'price'   => $price,
                                'amount' =>  $amount,
				'qty'     => $qty
			);
             
			$this->cart->update($data);
		}
		redirect('Beranda_pelanggan/keranjang');        
	}	
        function billing_view(){
                // Load "billing_view".
		$this->load->view('billing_view');
        }
        
        	public function save_order()
	{
          // This will store all values which inserted  from user.
		$customer = array(
			'name' 		=> $this->input->post('name'),
			'email' 	=> $this->input->post('email'),
			'address' 	=> $this->input->post('address'),
			'phone' 	=> $this->input->post('phone')
		);		
                 // And store user imformation in database.
		$cust_id = $this->billing_model->insert_customer($customer);

		$order = array(
			'date' 			=> date('Y-m-d'),
			'customerid' 	=> $cust_id
		);		

		$ord_id = $this->billing_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'orderid' 		=> $ord_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);		

                            // Insert product imformation with order detail, store in cart also store in database. 
                
		         $cust_id = $this->billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
	      
                // After storing all imformation in database load "billing_success".
                $this->load->view('billing_success');
	}

	public function keranjang()
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
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('user/sidebar_kiri',$data);
			$data = array(
				'data1'=>$this->Model_Produk->get_jumlah_produk(),
				'data2'=>$this->Model_Produk->get_produk());
			$this->load->view('user/keranjang',$data);
			$this->load->view('user/footer');
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
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
		if($this->Model_pelanggan->cek_session())
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
			}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

	public function edit_profil()
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
				'data1'=>$this->Model_Produk->get_jumlah_produk_alat_musik(),
				'data2'=>$this->Model_Produk->get_jumlah_produk_alat_pancing(),
				'data3'=>$this->Model_Produk->get_jumlah_produk_alat_olahraga());
			$this->load->view('user/sidebar_kiri',$data);
			$data = array(
				'data'=>$this->Model_pelanggan-> get_profil_pelanggan());
			$this->load->view('user/edit_profil',$data);
			$this->load->view('user/footer');
			}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

	public function edit_proses_profil(){
		if($this->input->post('btnEdit')){
		$id_pelanggan=$this->session->userdata('id_pelanggan');
		$data=array(
			"username"=>$this->input->post('username'),
			"email"=>$this->input->post('email'),
			"nama_lengkap"=>$this->input->post('nama_lengkap'),
			"jkel"=>$this->input->post('jkel'),
			"no_telp"=>$this->input->post('no_telp'),
			"alamat"=>$this->input->post('alamat')
		);
		$data2=[
			'username'=>$data['username'],
			'password'=>$data['password'],
			'email'=>$data['email'],
			'nama_lengkap'=>$data['nama_lengkap'],
			'jkel'=>$data['jkel'],
			'no_telp'=>$data['no_telp'],
			'alamat'=>$data['alamat'],
		];
		$this->session->set_userdata($data2);
		$this->Model_pelanggan->edit_proses_profil($id_pelanggan,$data);
		redirect('Beranda_pelanggan/profil_pelanggan');
		}
	}


}
