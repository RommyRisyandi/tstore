<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	// Authentication Halaman
		$this->simple_login->cek_login();
	}

	//Data user
	public function index()
	{
		$home = $this->user_model->listing();

		$data = array( 'title' => 'Data User',
					   'home'  => $home,
					   'isi'  => 'admin/home/list'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
		// Tambah User
	public function tambah()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap', 'required',
					array('required' => '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
					array('required' 	=> '%s harus diisi',
						  'valid_email' => '%s tidak valid'));

		$valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32]|is_unique[user_admin.username]',
					array('required' 	=> '%s harus diisi',
						  'min_length' 	=> '%s minimal 6 karakter',
						  'max_length' 	=> '%s maksimal 32 karakter',
						  'is_unique' 	=> '%s sudah ada. Buat Username baru'));

		$valid->set_rules('password', 'Password', 'required',
					array('required' => '%s harus diisi'));
		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 	=> 'Tambah User',
					   'isi'  	=> 'admin/home/tambah'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array('nama' 		=> $i->post('nama'),
					  'email' 		=> $i->post('email'),
					  'username' 	=> $i->post('username'),
					  'password' 	=> SHA1($i->post('password')),
					  'akses_level' => $i->post('akses_level'));

		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data berhasil ditambah');
		redirect(base_url('admin/home'),'refresh');
		}
	// End Masuk database
	}
	// Edit user
	public function edit($id_user)
	{
		$home = $this->user_model->detail($id_user);

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap', 'required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
					array('required' 	=> '%s harus diisi',
						  'valid_email' => '%s tidak valid'));

		$valid->set_rules('password', 'Password', 'required',
					array('required' => '%s harus diisi'));
		if($valid->run()===FALSE) {
			// End Validasi

		$data = array( 'title' 	=> 'Edit User',
					   'home' 	=> $home,
					   'isi'  	=> 'admin/home/edit'
					  );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk database
	}else{
		$i = $this->input;
		$data = array('id_user'		=> $id_user,
					  'nama' 		=> $i->post('nama'),
					  'email' 		=> $i->post('email'),
					  'username' 	=> $i->post('username'),
					  'password' 	=> SHA1($i->post('password')),
					  'akses_level' => $i->post('akses_level'));

		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data berhasil diubah');
		redirect(base_url('admin/home'),'refresh');
		}
	// End Masuk database
	}

	public function delete($id_user)
	{
		$data = array('id_user' => $id_user);

		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/home'),'refresh');
	}
}

/* End of file User2.php */
/* Location: ./application/controllers/admin/User2.php */