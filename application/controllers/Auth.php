<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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

    }

    public function register()
    {
        $data['title'] = 'Register | Ecommerce';
        $data['content'] = 'auth/pages/register';
        $this->load->view('auth/layouts/app',$data);
    }

}
