<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user','user');
		auth();
	}


    public function index()
    {
        $data['title'] = 'Akun Saya';
		$data['content'] = 'user/pages/account/index';
		$data['user'] = $this->user->find(array('id' => $this->session->userdata('id')))->row();
        $this->load->view('user/layouts/app',$data);
    }

	public function update()
	{
		$user_id = $this->session->userdata('id');
		$avatar = $_FILES['avatar'];
		if($avatar)
		{
			$config['upload_path']          = './uploads/user/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('avatar')) {
				$uploaded_data = $this->upload->data();
				$avatar_name = $uploaded_data['file_name'];
			}
		}else{
			$avatar_name = NULL;
		}

		$data = [
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender'),
			'phone_number' => $this->input->post('phone_number'),
			'address' => $this->input->post('address'),
			'avatar' => $avatar_name
		];

		$this->user->update($user_id,$data);
		$this->session->set_flashdata('success','Akun berhasil diupdate.');
        redirect('account');

	}

}