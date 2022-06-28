<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_product','product');
		$this->load->model('M_payment','payment');
		$this->load->model('M_courier','courier');
		$this->load->model('M_cart','cart');
		auth();
	}

	public function index()
    {
        $data['title'] = 'Keranjang';
		$data['content'] = 'user/pages/cart/index';
		$data['carts'] = $this->cart->get($this->session->userdata('id'))->result();
		$data['payments'] = $this->payment->get()->result();
		$data['couriers'] = $this->courier->get()->result();
        $this->load->view('user/layouts/app',$data);
    }

	public function add()
	{
		$amount = $this->input->post('amount');
		$product = $this->product->find(array('products.id' => $this->input->post('product_id')))->row();

		// cek stok produk
		if($product->qty == 0)
		{
			$this->session->set_flashdata('error','Stok produk kosong');
			redirect('product/show/' . $product->slug);
		}

		// cek stok dengan jumlah pesan
		if($product->qty < $amount)
		{
			$this->session->set_flashdata('error','Jumlah pesanan tidak boleh melebihi stok yang tersedia');
			redirect('product/show/' . $product->slug);
		}

		// jika jumla kosong atau minus
		if($amount < 1)
		{
			$amount = 1;
		}

		$price = $product->price*$amount;

		$data = [
			'user_id' => $this->session->userdata('id'),
			'product_id' => $product->id,
			'amount' => $amount,
			'price' => $price,
			'notes' => $this->input->post('notes')
		];

		// add to cart
		$action = $this->cart->addToCart($data);
		if($action)
		{
			$this->session->set_flashdata('success','Produk berhasil ditambahkan ke keranjang');
			redirect('cart');
		}else{
			$this->session->set_flashdata('error','Produk gagal ditambahkan ke keranjang');
			redirect('cart');
		}
	}

	public function delete($id)
	{
		if(!$id)
		{
			redirect('cart');
		}

		$this->cart->delete($id);
		$this->session->set_flashdata('success','Produk berhasil dihapus dari keranjang');
		redirect('cart');
	}

}
