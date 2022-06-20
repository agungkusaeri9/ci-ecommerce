<?php


function auth()
{
	$ci = get_instance();
	$ci->load->model('M_auth','auth');
	if(!$ci->auth->user()){
		$ci->session->set_flashdata('error','Silahkan login terlebih dahulu.');
		redirect('auth');
	}

}
