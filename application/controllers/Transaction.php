<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaction','transaction');
		auth();
	}

	public function index()
    {
        $data['title'] = 'Riwayat Transaksi';
		$data['content'] = 'user/pages/transaction/index';
        $user_id = $this->session->userdata('id');
		$data['transactions'] = $this->transaction->getByuser($user_id)->result();
        $this->load->view('user/layouts/app',$data);
    }

	public function show($id)
	{
		$data['transaction'] = $this->transaction->find(array('trx.id' => $id))->row();
		$data['details'] = $this->transaction->getDetail($id)->result();
		$this->load->view('user/pages/transaction/show',$data);
	}

}