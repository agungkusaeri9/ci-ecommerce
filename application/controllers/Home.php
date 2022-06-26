<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_product','product');
		$this->load->model('M_category','category');
	}

	public function index()
    {
        $data['title'] = 'Kategori';
		$data['content'] = 'user/pages/home';
		$data['banners'] = $this->product->getBanner(5)->result();
		$data['best_products'] = $this->product->bestProducts(5)->result();
		$data['latest_products'] = $this->product->latestProducts(12)->result();
		$data['categories'] = $this->category->get()->result();
        $this->load->view('user/layouts/app',$data);
    }

}
