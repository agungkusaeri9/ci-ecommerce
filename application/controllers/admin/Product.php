<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Product extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_product','product');
		$this->load->model('M_category','category');
        $this->load->library('form_validation');
		$this->load->library('session');
		auth();
		isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Produk';
		$data['content'] = 'admin/pages/product/index';
		$data['menu'] = 'Produk';
		$data['submenu'] = 'Data';
        $data['products'] = $this->product->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Produk';
		$data['content'] = 'admin/pages/product/create';
		$data['menu'] = 'Produk';
		$data['submenu'] = 'Tambah';
		$data['categories'] = $this->category->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

    public function store()
    {
        $data = $this->input->post();
        $this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('product_category', 'Produk', 'required');
		$this->form_validation->set_rules('desc', 'Deskripsi', 'required');
		$this->form_validation->set_rules('price', 'Harga', 'required');
		$this->form_validation->set_rules('qty', 'Jumlah', 'required');
		if($this->input->post('id'))
		{
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','Produk gagal diupdate.');
				redirect('admin/product');
			}
			// update data
			$data = $this->input->post();
			$id = $this->input->post('id');
			$image = $_FILES['image'];
			$product = $this->product->find(array('products.id' => $id))->row();
			if($image)
			{
				$config['upload_path']          = './uploads/product/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
                $config['max_size']             = 10000;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					// unlink("uploads/product/".$product->image);
					$uploaded_data = $this->upload->data();
					$data['image'] = $uploaded_data['file_name'];
				}
			}else{
				$data['image'] = $product->image;
			}
			$pname = trim(strtolower($this->input->post('name')));
			$out = explode(" ",$pname);
			$data['slug'] = implode("-",$out);
			$action = $this->product->update($id,$data);
			if($action)
			{
				$this->session->set_flashdata('success','Produk berhasil di update.');
            	redirect('admin/product');
			}else{
				$this->session->set_flashdata('error','Produk gagal di update.');
            	redirect('admin/product');
			}
			
		}else{
			$data = $this->input->post();
			unset($data['image']);
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','Produk gagal di tambahkan.');
				redirect('admin/product');
			}

			$image = $_FILES['image'];
			if($image)
			{
				$config['upload_path']          = './uploads/product/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
                $config['max_size']             = 10000;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$uploaded_data = $this->upload->data();
					
					$data['image'] = $uploaded_data['file_name'];
				}else{
					$this->session->set_flashdata('error','Gambar Produk gagal di tambahkan.');
				}
			}else{
				$data['image'] = 'default-image.png';
			}

			$pname = trim(strtolower($this->input->post('name')));
			$out = explode(" ",$pname);
			$data['slug'] = implode("-",$out);
			// create data
            $action = $this->product->create($data);
			if($action)
			{
				$this->session->set_flashdata('success','Produk berhasil di tambahkan.');
            	redirect('admin/product');
			}else{
				$this->session->set_flashdata('error','Produk gagal di tambahkan.');
            	redirect('admin/product');
			}
		}
    }

	public function show($id)
	{
		$product = $this->product->find(array('products.id' => $id))->row();
		if(!$product)
		{
			$this->session->set_flashdata('error','Produk tidak ditemukan.');
			redirect('admin/product');
		}
        $data['title'] = 'Detail Produk';
		$data['content'] = 'admin/pages/product/show';
		$data['menu'] = 'Produk';
		$data['submenu'] = 'Detail';
		$data['product'] = $product;
        $this->load->view('admin/layouts/app',$data);
	}

	public function edit($id)
    {
		$product = $this->product->find(array('products.id' => $id))->row();
		if(!$product)
		{
			$this->session->set_flashdata('error','Produk tidak ditemukan.');
			redirect('admin/product');
		}
        $data['title'] = 'Edit Produk';
		$data['content'] = 'admin/pages/product/edit';
		$data['menu'] = 'Produk';
		$data['submenu'] = 'Edit';
		$data['product'] = $product;
		$data['categories'] = $this->category->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

	public function delete($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','Produk gagal di hapus.');
			redirect('admin/product');
		}
		$product = $this->product->find(array('products.id' => $id))->row();
		if($product->icon)
		{
			unlink("uploads/product/".$product->icon);
		}

		$this->product->delete($id);
		$this->session->set_flashdata('success','Produk berhasil dihapus.');
		redirect('admin/product');
	}

}

