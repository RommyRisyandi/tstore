<?php
defined('BASEPATH') OR exit ('No direct access allowed');

class Login extends CI_Controller {
	
	
	public function index(){
		// Validasi
	$this->form_validation->set_rules('username', 'Username', 'required',
	array( 'required' => '%s harus diisi'));

	$this->form_validation->set_rules('password', 'Password', 'required',
	array( 'required' => '%s harus diisi'));

	if($this->form_validation->run())
	{
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		// proses simple login
		$this->simple_login->login($username,$password);
	}

	// End Validasi
	$data = array( 'title' => 'Login Administrator | T-Store Singkawang');
	$this->load->view('login/login', $data, FALSE);
	}	
	
	// Fungsi Logout
	public function logout()
	{
		// Ambil Fungsi logout dari simple login
		$this->simple_login->logout();
	}
}
		
		
