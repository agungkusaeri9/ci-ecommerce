<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('M_user','user');
		$this->load->model('M_product','product');
		$this->load->model('M_transaction','transaction');
		$this->load->model('M_courier','courier');
		auth();
		isAdmin();
    }

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['content'] = 'admin/pages/dashboard';
		$data['menu'] = 'Master';
		$data['submenu'] = 'Dashboard';
		$data['count'] = [
			'user' => $this->user->count(),
			'transaction' => $this->transaction->count(),
			'product' => $this->product->count(),
			'courier' => $this->courier->count()
		];
        $this->load->view('admin/layouts/app',$data);
	}
}
