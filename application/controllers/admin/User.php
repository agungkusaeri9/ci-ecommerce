<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user','user');
        $this->load->library('form_validation');
		$this->load->library('session');
		auth();
		isAdmin();
    }
    public function index()
    {
        $data['title'] = 'Master';
		$data['content'] = 'admin/pages/user/index';
		$data['menu'] = 'Master';
		$data['submenu'] = 'User';
        $data['users'] = $this->user->get()->result();
        $this->load->view('admin/layouts/app',$data);
    }

    public function create()
    {
        $data['title'] = 'Master';
		$data['content'] = 'admin/pages/user/create';
		$data['menu'] = 'Master';
		$data['submenu'] = 'User/Create';
        $this->load->view('admin/layouts/app',$data);
    }

    public function store()
    {
        $data = $this->input->post();
        $this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('role_id', 'Role', 'required|numeric');
		if($this->input->post('id'))
		{
			$user = $this->user->find(array('id' => $this->input->post('id')))->row();
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','User gagal diupdate.');
				redirect('admin/user');
			}

			// update data
			$data = $this->input->post();
			$id = $this->input->post('id');
			$avatar = $_FILES['avatar'];

			if($data['password'])
			{
				$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
				$data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);
			}else{
				$data['password'] = $user->password;
			}
			if($avatar)
			{
				$config['upload_path']          = './uploads/user/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 1024;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('avatar')) {
					unlink("uploads/user/" . $user->avatar);
					$uploaded_data = $this->upload->data();
					$data['avatar'] = $uploaded_data['file_name'];
				}
			}else{
				$data['avatar'] = $user->avatar;
			}

			$action = $this->user->update($id,$data);
			if($action)
			{
				$this->session->set_flashdata('success','User berhasil di update.');
            	redirect('admin/user');
			}else{
				$this->session->set_flashdata('error','User gagal di update.');
            	redirect('admin/user');
			}
			
		}else{
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			if($this->form_validation->run() == false)
			{
				$this->session->set_flashdata('error','User gagal di tambahkan.');
				redirect('admin/user');
			}

			// create data
			$data = $this->input->post();
			$data['password'] = password_hash($data['password'],PASSWORD_BCRYPT);

			$avatar = $_FILES['avatar'];
			if($avatar)
			{
				$config['upload_path']          = './uploads/user/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 1024;
                $config['max_height']           = 1024;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('avatar')) {
					$uploaded_data = $this->upload->data();
					$data['avatar'] = $uploaded_data['file_name'];
				}
			}else{
				$data['avatar'] = NULL;
			}
            $action = $this->user->create($data);
			if($action)
			{
				$this->session->set_flashdata('success','User berhasil di tambahkan.');
            	redirect('admin/user');
			}else{
				$this->session->set_flashdata('error','User gagal di tambahkan.');
            	redirect('admin/user');
			}
		}
    }

	public function edit($id)
    {
		$user = $this->user->find(array('id' => $id))->row();
		if(!$user)
		{
			$this->session->set_flashdata('error','User tidak ditemukan.');
			redirect('admin/user');
		}
        $data['title'] = 'Master';
		$data['content'] = 'admin/pages/user/edit';
		$data['menu'] = 'Master';
		$data['submenu'] = 'User/Edit';
		$data['user'] = $user;
        $this->load->view('admin/layouts/app',$data);
    }

	public function delete($id)
	{
		if(!$id)
		{
			$this->session->set_flashdata('error','User gagal di hapus.');
			redirect('admin/user');
		}
		$this->user->delete($id);
		$this->session->set_flashdata('success','User berhasil dihapus.');
		redirect('admin/user');
	}

}

