<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Category extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_category','category');
        $this->load->library('form_validation');
		$this->load->library('session');
		auth();
    }
    public function index()
    {
        $data['title'] = 'Master';
		$data['content'] = 'admin/pages/category/index';
		$data['menu'] = 'Master';
		$data['submenu'] = 'Kategori';
        $data['categories'] = $this->category->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

    public function create()
    {
        $data['title'] = 'Master';
		$data['content'] = 'admin/pages/category/create';
		$data['menu'] = 'Master';
		$data['submenu'] = 'Category/Create';
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
				$this->session->set_flashdata('error','Kategori gagal diupdate.');
				redirect('admin/category');
			}

			// update data
			$data = $this->input->post();
			$id = $this->input->post('id');
			$action = $this->category->update($id,$data);
			if($action)
			{
				$this->session->set_flashdata('success','Kategori berhasil di update.');
            	redirect('admin/category');
			}else{
				$this->session->set_flashdata('error','Kategori gagal di update.');
            	redirect('admin/category');
			}
			
		}else{
			$this->form_validation->set_rules('name', 'Nama', 'required');
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','Kategori gagal di tambahkan.');
				redirect('admin/category');
			}

			// create data
			$data = $this->input->post();
            $action = $this->category->create($data);
			if($action)
			{
				$this->session->set_flashdata('success','Kategori berhasil di tambahkan.');
            	redirect('admin/category');
			}else{
				$this->session->set_flashdata('error','Kategori gagal di tambahkan.');
            	redirect('admin/category');
			}
		}
    }

	public function edit($id)
    {
		$category = $this->category->find(array('id' => $id))->row();
		if(!$category)
		{
			$this->session->set_flashdata('error','Kategori tidak ditemukan.');
			redirect('admin/category');
		}
        $data['title'] = 'Master';
		$data['content'] = 'admin/pages/category/edit';
		$data['menu'] = 'Master';
		$data['submenu'] = 'Category/Edit';
		$data['category'] = $category;
        $this->load->view('admin/layouts/app',$data);
    }

	public function delete($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','Kategori gagal di hapus.');
			redirect('admin/category');
		}
		$this->category->delete($id);
		$this->session->set_flashdata('success','Kategori berhasil dihapus.');
		redirect('admin/category');
	}

}

