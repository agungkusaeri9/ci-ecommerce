<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Courier extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_courier','courier');
        $this->load->library('form_validation');
		$this->load->library('session');
		auth();
		isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Kurir';
		$data['content'] = 'admin/pages/courier/index';
		$data['menu'] = 'Kurir';
		$data['submenu'] = 'Data';
        $data['couriers'] = $this->courier->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

    public function create()
    {
        $data['title'] = 'Kurir';
		$data['content'] = 'admin/pages/courier/create';
		$data['menu'] = 'Kurir';
		$data['submenu'] = 'Tambah';
        $this->load->view('admin/layouts/app',$data);
    }

    public function store()
    {
        $data = $this->input->post();
        $this->form_validation->set_rules('name', 'Nama', 'required');
		if($this->input->post('id'))
		{
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','Kurir gagal diupdate.');
				redirect('admin/courier');
			}

			// update data
			$data = $this->input->post();
			$id = $this->input->post('id');
			$action = $this->courier->update($id,$data);
			if($action)
			{
				$this->session->set_flashdata('success','Kurir berhasil di update.');
            	redirect('admin/courier');
			}else{
				$this->session->set_flashdata('error','Kurir gagal di update.');
            	redirect('admin/courier');
			}
			
		}else{
			$this->form_validation->set_rules('code', 'Kode', 'required|is_unique[couriers.code]');
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','Kurir gagal di tambahkan.');
				redirect('admin/courier');
			}

			// create data
			$data = $this->input->post();
            $action = $this->courier->create($data);
			if($action)
			{
				$this->session->set_flashdata('success','Kurir berhasil di tambahkan.');
            	redirect('admin/courier');
			}else{
				$this->session->set_flashdata('error','Kurir gagal di tambahkan.');
            	redirect('admin/courier');
			}
		}
    }

	public function edit($id)
    {
		$courier = $this->courier->find(array('id' => $id))->row();
		if(!$courier)
		{
			$this->session->set_flashdata('error','Kurir tidak ditemukan.');
			redirect('admin/courier');
		}
        $data['title'] = 'Kurir';
		$data['content'] = 'admin/pages/courier/edit';
		$data['menu'] = 'Kurir';
		$data['submenu'] = 'Edit';
		$data['courier'] = $courier;
        $this->load->view('admin/layouts/app',$data);
    }

	public function delete($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','Kurir gagal di hapus.');
			redirect('admin/courier');
		}
		$this->courier->delete($id);
		$this->session->set_flashdata('success','Kurir berhasil dihapus.');
		redirect('admin/courier');
	}

}

