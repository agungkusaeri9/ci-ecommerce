<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_product','product');
		$this->load->model('M_cart','cart');
        $this->load->model('M_transaction','transaction');
		$this->load->library('form_validation');
		auth();
	}

    public function index()
    {
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone_number', 'Nomor Hp', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('payment_id', 'Pembayaran', 'required');
		$this->form_validation->set_rules('courier_id', 'Pengiriman', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Pastikan semua form diisi.');
            redirect('cart');
		}

        $user_id = $this->session->userdata('id');
        $transaction_total = $this->cart->sum('price',$user_id)->row()->price;
        $carts = $this->cart->get($user_id)->result();

		if(!$carts)
		{
			$this->session->set_flashdata('error','Keranjang Kosong.');
            redirect('cart');
		}

		$trxLatest = $this->transaction->latest()->row();
		$prefix = 'TRX';
		if($trxLatest)
		{
			$uuidLatest = substr($trxLatest->uuid, strpos($trxLatest->uuid, $prefix) + 3);
			$uuid = $prefix . str_pad($uuidLatest + 1, 5, "0", STR_PAD_LEFT);
		}else{
			$uuid = $prefix . '00001';
		}
        $data = array(
			'uuid' => $uuid,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'transaction_total' => $transaction_total,
            'transaction_status' => 'PENDING',
            'courier_id' => $this->input->post('courier_id'),
            'payment_id' => $this->input->post('payment_id'),
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s')
        );
        $action = $this->transaction->create($data,$carts);
        if($action)
        {
            // delete cart
            $this->cart->deleteAll($user_id);
            $this->session->set_flashdata('success','Transaksi berhasil dilakukan. Silahkan lakukan pembayaran di bawah ini.');
            redirect('transaction');
        }
    }

}
