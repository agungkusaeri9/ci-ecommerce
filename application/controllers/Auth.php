<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('M_auth','auth');
    }

    public function index()
    {
        $data['title'] = 'Login | Ecommerce';
        $data['content'] = 'auth/pages/login';
        $this->load->view('auth/layouts/app',$data);
    }

    public function process_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Email dan Password tidak boleh kosong!');
            redirect('auth');
        }else{
            $this->_process_login();
        }
    }

    private function _process_login()
    {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cekEmail = $this->auth->check(array('email' => $email));
		if($cekEmail)
		{
			if(password_verify($password,$cekEmail->password))
			{
				$session = array(
					'id' => $cekEmail->id,
					'name' => $cekEmail->name,
					'role_id' => $cekEmail->role_id
				);
				$this->session->set_userdata($session);
				redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('error', 'Email yang anda masukan salah');
            	redirect('auth');
			}
		}else{
			$this->session->set_flashdata('error', 'Email yang anda masukan salah');
            redirect('auth');
		}

    }

    public function register()
    {
        $data['title'] = 'Register | Ecommerce';
        $data['content'] = 'auth/pages/register';
        $this->load->view('auth/layouts/app',$data);
    }

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}

}
