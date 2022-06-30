<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_message','message');
	}

	public function index()
	{
		$data['title'] = 'Hubungi Kami | Toko Elektronik';
		$data['content'] = 'user/pages/contact';
        $this->load->view('user/layouts/app',$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('text', 'Pesan', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Anda gagal mengirimkan pesan.');
			redirect('contact');
		}

		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'web' => $this->input->post('web'),
			'text' => $this->input->post('text'),
			'created_at' => date('Y-m-d')
		];

		$action =$this->message->create($data);
		if($action)
		{
			$this->session->set_flashdata('success','Pesan berhasil terkirim. Terimakasih telah menghubungi kami.');
			redirect('/');
		}else{
			$this->session->set_flashdata('error','Anda gagal mengirimkan pesan.');
			redirect('contact');
		}
	}

}
