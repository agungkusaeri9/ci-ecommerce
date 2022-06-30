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
		if(!$product)
		{
			$this->session->set_flashdata('error','Produk tidak ditemukan.');
			redirect('product');
		}
		$data['title'] = 'Produk';
		$data['content'] = 'user/pages/product/show';
		$data['product'] = $product;
        $this->load->view('user/layouts/app',$data);
	}

	public function search()
	{
		$data['q'] = $this->input->get('q');
		$data['title'] = 'Produk ' . $data['q'];
		$data['content'] = 'user/pages/product/index';
		$data['products'] = $this->product->search($data['q'])->result();
		$this->load->view('user/layouts/app',$data);
	}

	public function category($categorySlug = NULL)
	{
		
		$data['title'] = 'Kategori ' . $categorySlug;
		$data['products'] = $this->product->getWhere(array('product_categories.slug' => $categorySlug))->result();
		$data['content'] = 'user/pages/product/index';
        $this->load->view('user/layouts/app',$data);
	}

}
