<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_product','product');
		$this->load->model('M_cart','cart');
        $this->load->model('M_transaction','transaction');
		auth();
	}

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $transaction_total = $this->cart->sum('price',$user_id)->row()->price;
        $carts = $this->cart->get($user_id)->result();
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'transaction_total' => $transaction_total,
            'transaction_status' => 'PENDING',
            'courier_id' => $this->input->post('courier_id'),
            'payment_id' => $this->input->post('payment_id'),
            'user_id' => $user_id,
            'created_at' => date('Y-m-d')
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