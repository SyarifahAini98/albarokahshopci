<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_pelanggan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Model_Produk');
		$this->load->model('Model_pelanggan');
		$this->load->model('Model_transaksi');
		$this->load->model('model_edit_profil');
		$this->load->helper('url');
		$this->load->helper('form');
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
			'berat' => $this->input->post('berat'),
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
                    $berat = $cart['berat']*$cart['qty'];
                    
                    	$data = array(
				'rowid'   => $rowid,
                                'price'   => $price,
                                'amount' =>  $amount,
                                'berat' => $berat,
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

	public function checkout()
	{
		redirect("rajaongkir");
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

	public function pesan_sekarang($kurir,$perkiraan,$tarif_ongkir)
	{
		if($this->Model_pelanggan->cek_session())
        {
		$grand_total = 0;
		$berat_total = 0;
		// Calculate grand total.
		if ($cart = $this->cart->contents()):
		    foreach ($cart as $item):
		        $grand_total = $grand_total + $item['subtotal'];
		        $berat_total = $berat_total+$item['berat'];
		    endforeach;
		endif;
		$data=[
        	'id_pelanggan'=>$this->session->userdata('id_pelanggan'),
			'sub_total'=>$grand_total,
			'tarif_ongkir'=>$this->uri->segment('5'),
			'total_bayar'=>'',
			'tgl_pemesanan'=>date('Y-m-d'),
			'tgl_transaksi'=>'',
			'foto'=>'',
			'status'=>'Belum Upload',
			'alamat'=>$this->session->userdata('alamat'),
			'perkiraan'=>$this->uri->segment('4'),
			'rekening'=>'',
			'kurir'=>$this->uri->segment('3'),
			'berat'=>$berat_total
		];
		$this->db->insert('transaksi',$data);
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
			$ty = $this->db->query("SELECT COUNT(*) as total FROM transaksi")->row()->total;
			
			//foreach ($query as $row):
				$order_detail = array(
					'id_transaksi' 		=> $ty,
					'id_produk' 	=> $item['id'],
					'qty' 		=> $item['qty'],
					'total_harga' 		=> $grand_total
				);
			//endforeach;		

                            // Insert product imformation with order detail, store in cart also store in database. 
                
		$this->db->insert('detail_transaksi',$order_detail);
			endforeach;
		endif;
		$this->cart->destroy();
		redirect('Beranda_pelanggan/info_pembayaran');
			}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

		public function info_pembayaran()
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
			$this->load->view('user/info_pembayaran');
			$this->load->view('user/footer');
			}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

		public function transaksi()
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
				'data1'=>$this->Model_transaksi->get_transaksi());
			$this->load->view('user/transaksi',$data);
			$this->load->view('user/footer');
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

			public function konfirmasi_upload_bukti($id)
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
				'data'=>$this->Model_transaksi->get_detail_transaksi($id));
			$this->load->view('user/konfirmasi_upload_bukti',$data);
			$this->load->view('user/footer');
	}

	public function proses_upload_gambar(){
		$data['tgl_transaksi']=date('Y-m-d');
		$data['status']='Terbayar';
		$data['alamat']=$this->input->post('alamat');
		$data['rekening']=$this->input->post('rekening');
            // $data['nama_mobil'] = $this->input->post('nama');
            // $data['harga_sewa'] = $this->input->post('harga_sewa');
            // $data['dp_sewa'] = $this->input->post('dp_sewa');
            // $data['status'] = $this->input->post('status');
            $id_transaksi=$this->input->post('id_transaksi');
            $this->Model_transaksi->update_transaksi($id_transaksi, $data); //memakai fungsi update_mobil pada model mobil di model
            //redirect(site_url('Data/mobil'));
        }

        	public function pencarian()
	{
		if($this->Model_pelanggan->cek_session())
        {
            $pencarian=$this->input->post('pencarian');
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
				'data1'=>$this->Model_Produk->get_jumlah_produk_pencarian($pencarian),
				'data2'=>$this->Model_Produk->get_produk_pencarian($pencarian));
			$this->load->view('user/pencarian',$data);
			$this->load->view('user/footer');
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

		public function testimoni()
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
				'data1'=>$this->Model_transaksi->get_testimoni());
			$this->load->view('user/testimoni',$data);
			$this->load->view('user/footer');
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
            redirect("auth");
        }
	}

}