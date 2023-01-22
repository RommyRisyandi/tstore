<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model user
        $this->CI->load->model('user_model');
	}

	// Fungsi Login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// Jika ada data user, maka create session login
		if($check) {
			$id_user		= $check->id_user;
			$nama			= $check->nama;
			$akses_level	= $check->akses_level;
		// Create session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
		// redirect halaman admin yang diproteksi
			redirect(base_url('admin/dashboard'),'refresh');

		}else{
			// Jika tidak ada, maka login kembali
			$this->CI->session->set_flashdata('warning', 'Username atau Password Salah');
			redirect(base_url('login'),'refresh');
		}
	}
	// Fungsi cek Login
	public function cek_login()
	{
	// Memeriksa apakah session sudah ada atau belum, jika belum alihkan ke halaman login
		if($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum login, Silahkan login terlebih dahulu');
			redirect(base_url('login'),'refresh');
		}
	}

	// Fungsi logout
	public function logout()
	{
	// Membuang semua session yang telah login
			$this->CI->session->unset_userdata('id_user');
			$this->CI->session->unset_userdata('nama');
			$this->CI->session->unset_userdata('username');
			$this->CI->session->unset_userdata('akses_level');
	// Setelah session dibuang, maka redirect login
			$this->CI->session->set_flashdata('sukses', 'Anda sudah berhasil logout');
			redirect(base_url('login'),'refresh');
	}
}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
