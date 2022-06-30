<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Message extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_message','message');
		$this->load->library('session');
		auth();
		isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Pesan Masuk';
		$data['content'] = 'admin/pages/message/index';
		$data['menu'] = 'Pesan Masuk';
		$data['submenu'] = 'Data';
        $data['messages'] = $this->message->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

	public function delete($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','Pesan Masuk gagal di hapus.');
			redirect('admin/message');
		}
		$this->message->delete($id);
		$this->session->set_flashdata('success','Pesan Masuk berhasil dihapus.');
		redirect('admin/message');
	}
}
