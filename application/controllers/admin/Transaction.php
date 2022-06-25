<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Transaction extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaction','transaction');
		$this->load->model('M_courier','courier');
		$this->load->model('M_payment','payment');
        $this->load->library('form_validation');
		$this->load->library('session');
		auth();
    }

	public function index()
	{
		$data['title'] = 'Transaksi';
		$data['content'] = 'admin/pages/transaction/index';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Data';
        $data['transactions'] = $this->transaction->get()->result();
        $this->load->view('admin/layouts/app',$data);
	}

	public function show($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','Transaction gagal di update.');
			redirect('admin/transaction');
		}
		$data['transaction'] = $this->transaction->find(array('id' => $id))->row();
		$data['title'] = 'Detail Transaksi';
		$data['content'] = 'admin/pages/transaction/show';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Detail';
		$data['details'] = $this->transaction->detail(array('transaction_id' => $id))->result();
        $this->load->view('admin/layouts/app',$data);
	}

	public function edit($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','Transaction gagal di update.');
			redirect('admin/transaction');
		}
		$data['transaction'] = $this->transaction->find(array('id' => $id))->row();
		$data['title'] = 'Edit Transaksi';
		$data['content'] = 'admin/pages/transaction/edit';
		$data['menu'] = 'Transaksi';
		$data['submenu'] = 'Edit';
		$data['couriers'] = $this->courier->get()->result();
		$data['payments'] = $this->payment->get()->result();
        $this->load->view('admin/layouts/app',$data);
	}

	public function update($id)
	{
		$data = [
			'payment_id' => $this->input->post('payment_id'),
			'courier_id' => $this->input->post('courier_id'),
			'transaction_status' => $this->input->post('transaction_status'),
			'receipt_number' => $this->input->post('receipt_number')
		];

		$trx = $this->transaction->update(array('id' => $id),$data);
		if($trx)
		{
			$this->session->set_flashdata('success','Transaksi berhasil di update.');
			redirect('admin/transaction');
		}
	}

	public function delete($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','Transaction gagal di hapus.');
			redirect('admin/transaction');
		}
		$this->transaction->delete($id);
		$this->session->set_flashdata('success','Transaction berhasil di hapus.');
		redirect('admin/transaction');
	}
}
