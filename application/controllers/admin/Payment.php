<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Payment extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_payment','payment');
        $this->load->library('form_validation');
		auth();
    }
    public function index()
    {
        $data['title'] = 'Master';
		$data['content'] = 'admin/pages/payment/index';
		$data['menu'] = 'Master';
		$data['submenu'] = 'Payment';
        $data['payments'] = $this->payment->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

    public function create()
    {
        $data['title'] = 'Master';
		$data['content'] = 'admin/pages/payment/create';
		$data['menu'] = 'Master';
		$data['submenu'] = 'Payment/Create';
        $this->load->view('admin/layouts/app',$data);
    }

    public function store()
    {
        $data = $this->input->post();
        $this->form_validation->set_rules('name', 'Nama Pembayaran', 'required');
        $this->form_validation->set_rules('number', 'Nomor', 'required');
        $this->form_validation->set_rules('desc', 'Deskripsi', 'required');
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error');
            redirect('auth');
        }else{
            
        }

    }

}