<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_product','product');
		$this->load->model('M_category','category');
	}

	public function index()
    {
        $data['title'] = 'Produk';
		$data['content'] = 'user/pages/product/index';
		$data['products'] = $this->product->get()->result();
        $this->load->view('user/layouts/app',$data);
    }

	public function show($slug)
	{
		$product = $this->product->find(array('products.slug' => $slug))->row();
		$data['title'] = 'Produk';
		$data['content'] = 'user/pages/product/show';
		$data['product'] = $product;
        $this->load->view('user/layouts/app',$data);
	}

}
