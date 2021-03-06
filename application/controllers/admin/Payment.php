<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Payment extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_payment','payment');
        $this->load->library('form_validation');
		auth();
		isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Metode Pembayaran';
		$data['content'] = 'admin/pages/payment/index';
		$data['menu'] = 'Metode Pembayaran';
		$data['submenu'] = 'Data';
        $data['payments'] = $this->payment->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Metode Pembayaran';
		$data['content'] = 'admin/pages/payment/create';
		$data['menu'] = 'Metode Pembayaran';
		$data['submenu'] = 'Tambah';
        $this->load->view('admin/layouts/app',$data);
    }

    public function store()
    {
        $data = $this->input->post();
        $this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('number', 'Nomor', 'required');
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required');
		if($this->input->post('id'))
		{
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','Metode Pembayaran gagal diupdate.');
				redirect('admin/payment');
			}

			// update data
			$data = $this->input->post();
			$id = $this->input->post('id');
			$action = $this->payment->update($id,$data);
			if($action)
			{
				$this->session->set_flashdata('success','Metode Pembayaran berhasil di update.');
            	redirect('admin/payment');
			}else{
				$this->session->set_flashdata('error','Metode Pembayaran gagal di update.');
            	redirect('admin/payment');
			}
			
		}else{
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','Metode Pembayaran gagal di tambahkan.');
				redirect('admin/payment');
			}

			// create data
			$data = $this->input->post();
            $action = $this->payment->create($data);
			if($action)
			{
				$this->session->set_flashdata('success','Metode Pembayaran berhasil di tambahkan.');
            	redirect('admin/payment');
			}else{
				$this->session->set_flashdata('error','Metode Pembayaran gagal di tambahkan.');
            	redirect('admin/payment');
			}
		}
    }

	public function edit($id)
    {
		$payment = $this->payment->find(array('id' => $id))->row();
		if(!$payment)
		{
			$this->session->set_flashdata('error','Metode Pembayaran tidak ditemukan.');
			redirect('admin/payment');
		}
        $data['title'] = 'Edit Metode Pembayaran';
		$data['content'] = 'admin/pages/payment/edit';
		$data['menu'] = 'Metode Pembayaran';
		$data['submenu'] = 'Edit';
		$data['payment'] = $payment;
        $this->load->view('admin/layouts/app',$data);
    }

	public function delete($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','Metode Pembayaran gagal di hapus.');
			redirect('admin/payment');
		}
		$this->payment->delete($id);
		$this->session->set_flashdata('success','Metode Pembayaran berhasil dihapus.');
		redirect('admin/payment');
	}

}
