<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Tentang Kami | Toko Elektronik';
		$data['content'] = 'user/pages/about';
        $this->load->view('user/layouts/app',$data);
	}

}
