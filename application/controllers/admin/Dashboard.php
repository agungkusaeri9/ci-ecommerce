<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		auth();
    }

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['content'] = 'admin/pages/dashboard';
		$data['menu'] = 'Master';
		$data['submenu'] = 'Dashboard';
        $this->load->view('admin/layouts/app',$data);
	}
}
