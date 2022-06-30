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
		isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Kategori';
		$data['content'] = 'admin/pages/category/index';
		$data['menu'] = 'Kategori';
		$data['submenu'] = 'Data';
        $data['categories'] = $this->category->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Kategori';
		$data['content'] = 'admin/pages/category/create';
		$data['menu'] = 'Kategori';
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
				$this->session->set_flashdata('error','Kategori gagal diupdate.');
				redirect('admin/category');
			}

			// update data
			$data = $this->input->post();
			$id = $this->input->post('id');
			$icon = $_FILES['icon'];
			$category = $this->category->find(array('id' => $id))->row();
			if($icon)
			{
				$config['upload_path']          = './uploads/category/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
                $config['max_size']             = 10000;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('icon')) {
					unlink("uploads/category/".$category->icon);
					$uploaded_data = $this->upload->data();
					$data['icon'] = $uploaded_data['file_name'];
				}
			}else{
				$data['icon'] = $category->icon;
			}

			$pname = trim(strtolower($this->input->post('name')));
			$out = explode(" ",$pname);
			$data['slug'] = implode("-",$out);

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
			$data = $this->input->post();
			$this->form_validation->set_rules('name', 'Nama', 'required');
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','Kategori gagal di tambahkan.');
				redirect('admin/category');
			}

			$icon = $_FILES['icon'];
			if($icon)
			{
				$config['upload_path']          = './uploads/category/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
                $config['max_size']             = 10000;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('icon')) {
					$uploaded_data = $this->upload->data();
					$data['icon'] = $uploaded_data['file_name'];
				}
			}else{
				$data['icon'] = NULL;
			}

			// create data
			$pname = trim(strtolower($this->input->post('name')));
			$out = explode(" ",$pname);
			$data['slug'] = implode("-",$out);
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
        $data['title'] = 'Edit Kategori';
		$data['content'] = 'admin/pages/category/edit';
		$data['menu'] = 'Kategori';
		$data['submenu'] = 'Edit';
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
		$category = $this->category->find(array('id' => $id))->row();
		if($category->icon)
		{
			unlink("uploads/category/".$category->icon);
		}

		$this->category->delete($id);
		$this->session->set_flashdata('success','Kategori berhasil dihapus.');
		redirect('admin/category');
	}

}

